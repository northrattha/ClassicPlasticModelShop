<?php

namespace App\Http\Controllers;

use App\Customers as Customers;
use Illuminate\Http\Request;

class memberController extends Controller
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

        if (
            $chcekCustomerNumber == 0 &&
            $request['customerNumber'] != '' &&
            $request['customerName'] != '' &&
            $request['contactLastName'] != '' &&
            $request['contactFirstName'] != '' &&
            $request['phone'] != '' &&
            $request['addressLine1'] != '' &&
            $request['city'] != '' &&
            $request['country'] != ''
        ) {
            \App\Customers::insert([
                'customerNumber' => $request['customerNumber'],
                'customerName' =>   $request['customerName'],
                'contactLastName' =>  $request['contactLastName'],
                'contactFirstName' =>  $request['contactFirstName'],
                'phone' =>  $request['phone'],
                'addressLine1' =>  $request['addressLine1'],
                'addressLine2' =>  $request['addressLine2'],
                'city' =>  $request['city'],
                'state' =>  $request['state'],
                'postalCode' =>  $request['postalCode'],
                'country' =>  $request['country'],
                'salesRepEmployeeNumber' =>  $request['salesRepEmployeeNumber'],
                'creditLimit' => $request['creditLimit'],
                'points' => NULL,
            ]);
            return redirect('/admin-member');
        } else {
            if ($chcekCustomerNumber == 1 && $request['customerNumber'] != '') {
                return redirect('/admin-member-register')->with('successCustomerNumber', 'Duplicate Customer Number !')->with('success', 'Please fill up your information completely.');
            } else {
                return redirect('/admin-member-register')->with('success', 'Please fill up your information completely.');
            }
        }
    }
}
