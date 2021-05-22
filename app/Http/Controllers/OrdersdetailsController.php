<?php

namespace App\Http\Controllers;

use App\Orders as Orders;
use App\Ordersdetails as Ordersdetails;
use App\Promotions as Promotions;
use Illuminate\Http\Request;

class OrdersdetailsController extends Controller
{
    //
    public function create(Request $request)
    {
        if ($request['productCode'] != '' && intval($request['quantityOrdered']) > 0) {
            if ($request['priceEach'] == '') {
                $products = \App\Products::where('productCode', 'like', $request['productCode'])->first();
                $request['priceEach'] = $products->MSRP;
            }

            date_default_timezone_set('Asia/Bangkok');
            $chcekPromotions = 0; //No
            $Promotions = Promotions::get();
            foreach ($Promotions as $Promotion) {
                if ($Promotion->productCode == $request['productCode'] && $Promotion->expiryDate >= date('Y-m-d')) {
                    $chcekPromotions = 1; //Yes
                    break;
                }
            }

            if ($chcekPromotions == 1) {
                // $IDuseCode = Ordersdetails::select('orders.customerNumber', 'promotionsCode')
                //     ->join('orders', 'orders.orderNumber', '=', 'orderdetails.orderNumber')
                //     ->where('promotionsCode', $Promotion->promotionsCode)->groupBy('promotionsCode')->get();
                // dd($IDuseCode);
                // $CustomerNumberID = \App\Orders::where('orderNumber', 'like', $request['orderNumber'])->first();
                $chcekCustomerNumber = 0; //No
                // foreach ($IDuseCode as $IDuseCodes) {
                //     if ($IDuseCodes == $CustomerNumberID) {
                //         $chcekCustomerNumber = 1; //Yes
                //         break;
                //     }
                // }

                $OrdersIn = Orders::where('orderNumber', 'like', $request['orderNumber'])->first();
                $checkCustomerNumberInOrder = Orders::where('customerNumber', 'like', $OrdersIn->customerNumber)->get();
                $checkPromotionsCodeInOrder = Ordersdetails::where('promotionsCode', 'like', $Promotion->promotionsCode)->get();
                // dd($checkPromotionsCodeInOrder);
                foreach ($checkPromotionsCodeInOrder as $checkPromotionsCodeInOrders) {
                    foreach ($checkCustomerNumberInOrder as $checkCustomerNumberInOrders) {
                        if ($checkPromotionsCodeInOrders->orderNumber == $checkCustomerNumberInOrders->orderNumber) {
                            $chcekCustomerNumber = 1; //Yes
                            break;
                        }
                    }
                }

                // dd($chcekCustomerNumber);
                // if ($CustomerNumberID->whereIn($IDuseCode)) {
                //     $chcekCustomerNumber = 1; //Yes
                // }

                if ($chcekCustomerNumber == 0) {
                    $NewQuantityOrdered = intval($request['quantityOrdered']) + 1;
                    $PromotionsCode = $Promotion->promotionsCode;
                } else {
                    $NewQuantityOrdered = $request['quantityOrdered'];
                    $PromotionsCode = NULL;
                }
            } else {
                $NewQuantityOrdered = $request['quantityOrdered'];
                $PromotionsCode = NULL;
            }

            \App\Ordersdetails::insert([
                'orderNumber' => $request['orderNumber'],
                'productCode' => $request['productCode'],
                'quantityOrdered' => $NewQuantityOrdered,
                'priceEach' => $request['priceEach'],
                'orderLineNumber' => $request['orderLineNumber'],
                'promotionsCode' => $PromotionsCode,
            ]);

            return redirect('/admin-order-detail-add'); //->with('success', 'Registration successful !');
        } else {
            return redirect('/admin-order-detail-add')->with('success', 'Please try again.');
        }
    }

    public function addBillingAddress(Request $request)
    {
        \App\Orders::where('orderNumber', 'like', $request['orderNumber'])->update([
            'billingAddress' => $request['billingAddress'],
        ]);
        return redirect('/admin-order-detail-add'); //->with('success', 'Registration successful !');
    }

    public function addShippingAddress(Request $request)
    {
        \App\Orders::where('orderNumber', 'like', $request['orderNumber'])->update([
            'shippingAddress' => $request['shippingAddress'],
        ]);
        return redirect('/admin-order-detail-add'); //->with('success', 'Registration successful !');
    }
}
