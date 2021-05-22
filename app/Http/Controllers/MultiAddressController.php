<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MultipleAddress as MultiAddress;
use App\Customers as Customers;

class MultiAddressController extends Controller
{
    //
    public function create(Request $request, $id)
    {
        if (
            $request['addressLine1'] != '' &&
            $request['city'] != '' &&
            $request['country'] != ''
        ) {
            MultiAddress::create([
                'customerNumber' => $id,
                'addressLine1' => $request['addressLine1'],
                'addressLine2' => $request['addressLine2'],
                'city' => $request['city'],
                'state' => $request['state'],
                'postalCode' => $request['postalCode'],
                'country' => $request['country']
            ]);

            return redirect()->route('admin-member-detail', [$id]);
        } else {
            return redirect()->route('admin-member-detail', [$id])->with('success', 'Please fill up your information completely.');
        }
    }


    public function update(Request $request, $no)
    {
        if (
            $request['addressLine1'] != '' &&
            $request['city'] != '' &&
            $request['country'] != ''
        ) {
            $update = MultiAddress::where('addressNo', $no)
                ->update([
                    'addressLine1' => $request->input('addressLine1'),
                    'addressLine2' => $request->input('addressLine2'),
                    'city' => $request->input('city'),
                    'state' => $request->input('state'),
                    'country' => $request->input('country'),
                    'postalCode' => $request->input('postalCode')
                ]);

            $user = MultiAddress::where('addressNo', $no)->first();
            //dd($user);
            $id = $user['customerNumber'];

            return redirect()->route('admin-member-detail', [$id]);
        } else {

            $user = MultiAddress::where('addressNo', $no)->first();
            //dd($user);
            $id = $user['customerNumber'];

            return redirect()->route('admin-member-detail', [$id])->with('successMulti', 'Please fill up your information completely.');
        }
    }

    public function delete($no)
    {
        //dd($no);
        $user = MultiAddress::where('addressNo', $no)->first();
        //dd($user);
        $id = $user['customerNumber'];
        $user->delete();


        return redirect()->route('admin-member-detail', [$id]);
    }
}
