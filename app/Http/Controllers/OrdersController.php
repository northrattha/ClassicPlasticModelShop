<?php

namespace App\Http\Controllers;

use App\Orders as Orders;
use App\Ordersdetails as Ordersdetails;
use App\Products as Products;
use App\Customers as Customers;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function create(Request $request)
    {
        $chcekCustomerNumber = 0; //No
        $Customers = Customers::get();
        foreach ($Customers as $Customer) {
            if ($Customer->customerNumber == $request['customerNumber']) {
                $chcekCustomerNumber = 1; //Yes
                break;
            }
        }

        if ($request['requiredDate'] != '' && $chcekCustomerNumber == 1) {
            date_default_timezone_set('Asia/Bangkok');
            \App\Orders::insert([
                'orderNumber' => $request['orderNumber'],
                'orderDate' => date('Y-m-d'),
                'requiredDate' => $request['requiredDate'],
                'shippedDate' => NULL,
                'status' => 'In Process',
                'comments' => $request['comments'],
                'customerNumber' => $request['customerNumber'],
            ]);

            return redirect('/admin-order-detail-add'); //->with('success', 'Registration successful !');
        } else {
            return redirect('/admin-order-add')->with('success', 'Please try again.');
        }
    }

    public function update(Request $request)
    {
        // Update Status
        $oldOrders = Orders::where('orderNumber', 'like', $request['orderNumber'])->first();
        $oldstatus = $oldOrders->status;
        if (
            $request['status'] == 'Cancelled' ||
            $request['status'] == 'Disputed' ||
            $request['status'] == 'On Hold' ||
            $request['status'] == 'Resolved' || ($request['status'] == 'Shipped' && $request['shippedDate'] != '')
        ) {
            \App\Orders::where('orderNumber', 'like', $request['orderNumber'])->update([
                'shippedDate' => $request['shippedDate'],
                'status' => $request['status'],
                'comments' => $request['comments'],
            ]);

            // Inventory (Stock) Update
            //// Cancelled //// if status Before In Process, On Hold, Disputed => stock 0
            // OR
            //// In Process ////
            // OR
            //// On Hold ////
            // ...

            //// Cancelled //// if status Before Shipped => stock +1
            // OR
            //// Disputed ////
            //stock +1

            if (($request['status'] == 'Cancelled' && $oldstatus == 'Shipped') || $request['status'] == 'Disputed') {
                $Ordersdetailss = Ordersdetails::where('orderNumber', 'like', $request['orderNumber'])->orderBy('orderLineNumber')->get();
                foreach ($Ordersdetailss as $Ordersdetails) {
                    $oldQuantityInStock = Products::Where('productCode', 'like', $Ordersdetails->productCode)->first();
                    $NewQuantityInStock = intval($oldQuantityInStock->quantityInStock) + intval($Ordersdetails->quantityOrdered);
                    Products::where('productCode', 'like', $Ordersdetails->productCode)->update([
                        'quantityInStock' => intval($NewQuantityInStock),
                        'productDate' => date('Y-m-d'),
                    ]);
                }
            }

            //// Resolved ////
            // OR
            //// Shipped ////
            // stock -1

            else if ($request['status'] == 'Resolved' || $request['status'] == 'Shipped') {
                $Ordersdetailss = Ordersdetails::where('orderNumber', 'like', $request['orderNumber'])->orderBy('orderLineNumber')->get();
                foreach ($Ordersdetailss as $Ordersdetails) {
                    $oldQuantityInStock = Products::Where('productCode', 'like', $Ordersdetails->productCode)->first();
                    $NewQuantityInStock = intval($oldQuantityInStock->quantityInStock) - intval($Ordersdetails->quantityOrdered);
                    //7933
                    Products::where('productCode', 'like', $Ordersdetails->productCode)->update([
                        'quantityInStock' => intval($NewQuantityInStock),
                        'productDate' => date('Y-m-d'),
                    ]);
                }
            }

            // Add Points
            //// Shipped //// points++
            if ($request['status'] == 'Shipped' && $request['orderDate'] >= '2019-12-10') {
                $oldPoints = \App\Customers::Where('customerNumber', 'like', $request['customerNumber'])->first();
                $NewPoints = intval($oldPoints->points) + intval($request['points']);
                \App\Customers::where('customerNumber', 'like', $request['customerNumber'],)->update([
                    'points' => $NewPoints,
                ]);
            }

            return redirect('/admin-order-edit?txt_keyword=' . $request['orderNumber'] . ''); //->with('success', 'Registration successful !');
        } else {
            return redirect('/admin-order-edit?txt_keyword=' . $request['orderNumber'] . '')->with('success', 'Please try again.');
        }
    }
}
