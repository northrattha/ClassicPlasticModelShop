<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function create(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        if (
            $request['productCode'] != '' && $request['productName'] != '' && $request['productLine'] != '' &&
            $request['productScale'] != '' && $request['productVendor'] != '' && $request['productDescription'] != '' &&
            intval($request['quantityInStock']) >= 0 && intval($request['buyPrice']) > 0 && intval($request['MSRP']) > 0
        ) {
            \App\Products::insert([
                'productCode' => $request['productCode'],
                'productName' => $request['productName'],
                'productLine' => $request['productLine'],
                'productScale' => $request['productScale'],
                'productVendor' => $request['productVendor'],
                'productDescription' => $request['productDescription'],
                'quantityInStock' => $request['quantityInStock'],
                'buyPrice' => $request['buyPrice'],
                'MSRP' => $request['MSRP'],
                'productDate' => date('Y-m-d'),
            ]);

            return redirect('/admin-stock'); //->with('success', 'Registration successful !');
        } else {
            return redirect('/admin-stock-add')->with('success', 'Please try again.');
        }
    }

    public function update(Request $request)
    {
        if (intval($request['quantityInStock']) > 0) {
            date_default_timezone_set('Asia/Bangkok');
            $oldQuantityInStock = \App\Products::Where('productCode', 'like', $request['productCode'])->first();
            $NewQuantityInStock = $oldQuantityInStock->quantityInStock + intval($request['quantityInStock']);
            \App\Products::where('productCode', 'like', $request['productCode'],)->update([
                'quantityInStock' => $NewQuantityInStock,
                'productDate' => date('Y-m-d'),
            ]);

            return redirect('/admin-stock'); //->with('success', 'Registration successful !');
        } else {
            return redirect('/admin-stock')->with('success', 'Please try again.');
        }
    }

    public function edit(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        $oldProducts = \App\Products::Where('productCode', 'like', $request['productCode'])->first();
        if (($request['buyPrice'] == '' || intval($request['buyPrice'] > 0)) && ($request['MSRP'] == '' || intval($request['MSRP']) > 0)) {
            if ($request['productName'] == '') $request['productName'] = $oldProducts->productName;
            if ($request['productLine'] == '') $request['productLine'] = $oldProducts->productLine;
            if ($request['productScale'] == '') $request['productScale'] = $oldProducts->productScale;
            if ($request['productVendor'] == '') $request['productVendor'] = $oldProducts->productVendor;
            if ($request['productDescription'] == '') $request['productDescription'] = $oldProducts->productDescription;
            if ($request['buyPrice'] == '') $request['buyPrice'] = $oldProducts->buyPrice;
            if ($request['MSRP'] == '') $request['MSRP'] = $oldProducts->MSRP;

            \App\Products::where('productCode', 'like', $request['productCode'],)->update([
                'productName' => $request['productName'],
                'productLine' => $request['productLine'],
                'productScale' => $request['productScale'],
                'productVendor' => $request['productVendor'],
                'productDescription' => $request['productDescription'],
                'buyPrice' => $request['buyPrice'],
                'MSRP' => $request['MSRP'],
                'productDate' => date('Y-m-d'),
            ]);

            return redirect('/admin-stock-edit'); //->with('success', 'Registration successful !');
        } else {
            return redirect('/admin-stock-edit')->with('success', 'Please try again.');
        }
    }

    public function delete(Request $request)
    {
        \App\Products::where('productCode', $request['productCode'])->delete();

        return redirect('/admin-stock-edit');
    }
}
