<?php

namespace App\Http\Controllers;

use App\Promotions as Promotions;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    //
    public function create(Request $request)
    {
        if ($request['expiryDate'] != '') {
            // $chcekProductCode = 0;
            // $promotionss = Promotions::get();
            // foreach ($promotionss as $promotions) {
            //     if ($promotions->productCode == $request['productCode']) {
            //         $chcekProductCode = 1;
            //         break;
            //     }
            // }
            // if ($chcekProductCode == 0) {
            //     \App\Promotions::insert([
            //         'productCode' => $request['productCode'],
            //         'expiryDate' => $request['expiryDate'],
            //     ]);
            // } else if ($chcekProductCode == 1) {
            //     \App\Promotions::where('productCode', 'like', $request['productCode'],)->update([
            //         'expiryDate' => $request['expiryDate'],
            //     ]);
            // 
            $PromotionsCode = $request['productCode'] . $request['expiryDate'];
            \App\Promotions::insert([
                'productCode' => $request['productCode'],
                'expiryDate' => $request['expiryDate'],
                'promotionsCode' => $PromotionsCode,
            ]);
            return redirect('/admin-marketing'); //->with('success', 'Create Promotion successful !');
        } else {
            return redirect('/admin-marketing')->with('success', 'Please try again.');
        }
    }
}
