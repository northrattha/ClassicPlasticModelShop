<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    public function create(Request $request)
    {
        if ($request['customerNumber'] != '' && $request['checkNumber'] != '' && $request['paymentDate'] != '' && intval($request['amount']) > 0) {
            \App\Payments::insert([
                'customerNumber' => $request['customerNumber'],
                'checkNumber' => $request['checkNumber'],
                'paymentDate' => $request['paymentDate'],
                'amount' => $request['amount'],
            ]);

            return redirect('/admin-payments'); //->with('success', 'Registration successful !');
        } else {
            return redirect('/admin-payments')->with('success', 'Please try again.');
        }
    }
}
