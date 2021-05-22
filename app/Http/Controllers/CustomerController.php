<?php

namespace App\Http\Controllers;

use Auth;
use App\Customers as Customers;
use App\MultipleAddress as MultiAddress;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    //protected  $detail;
    public function detail($id)
    {

        $details = Customers::where('customerNumber', $id)->get();
        $multiAdds = MultiAddress::where('customerNumber', $id)->get();
        $i = 1;
        // $details= $this->detail;
        session(["typeg" => $id]);

        return view('/admin-member-edit', compact('details', 'multiAdds', 'i'));
        //return redirect()->route('admin-member-edit', [$id],compact('details','multiAdds','i'));

    }

    public function edit(Request $request, $id)
    {
        if (
            $request['customerName'] != '' &&
            $request['contactFirstName'] != '' &&
            $request['contactLastName'] != '' &&
            $request['phone'] != '' &&
            $request['addressLine1'] != '' &&
            $request['city'] != '' &&
            $request['country'] != ''
        ) {
            $update = Customers::where('customerNumber', $id)
                ->update([
                    'customerName' => $request->input('customerName'),
                    'contactFirstName' => $request->input('contactFirstName'),
                    'contactLastName' => $request->input('contactLastName'),
                    'phone' => $request->input('phone'),
                    'addressLine1' => $request->input('addressLine1'),
                    'addressLine2' => $request->input('addressLine2'),
                    'city' => $request->input('city'),
                    'state' => $request->input('state'),
                    'country' => $request->input('country'),
                    'postalCode' => $request->input('postalCode'),
                    'salesRepEmployeeNumber' => $request->input('salesRepEmployeeNumber'),
                    'creditLimit' => $request->input('creditLimit')
                ]);

            return redirect()->route('admin-member-detail', [$id]);
        } else{
            return redirect()->route('admin-member-detail', [$id])->with('success', 'Please fill up your information completely.');
        }
    }

    public function select(Request $request, $no)
    {
        $id = session("typeg");
        $main = Customers::where('customerNumber', $id)->first();

        // dd($main['customerNumber']);
        $update = MultiAddress::where('addressNo', $no)
            ->update([
                'addressLine1' => $main['addressLine1'],
                'addressLine2' => $main['addressLine2'],
                'city' => $main['city'],
                'state' => $main['state'],
                'country' => $main['country'],
                'postalCode' => $main['postalCode']
            ]);

        $updateMain = Customers::where('customerNumber', $id)
            ->update([
                'addressLine1' => $request->input('addressLine1'),
                'addressLine2' => $request->input('addressLine2'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
                'postalCode' => $request->input('postalCode')
            ]);

        return redirect()->route('admin-member-detail', [$id]);
    }
}
