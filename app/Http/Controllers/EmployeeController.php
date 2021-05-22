<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Employees as Employees;
use App\User as User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create(Request $request)
    {
        $chcekEmployeeNumber = 0; //No
        $Employees = Employees::get();
        foreach ($Employees as $Employee) {
            if ($Employee->employeeNumber == $request['id']) {
                $chcekEmployeeNumber = 1; //Yes
                break;
            }
        }

        $chcekUserid = 0;
        $EmployeesUsers = User::get();
        foreach ($EmployeesUsers as $EmployeeUser) {
            if ($EmployeeUser->id == $request['id']) {
                $chcekUserid = 1; //Yes
                break;
            }
        }
        $checkPassword = 0; //No
        $EmployeesUserpw = User::get();
        foreach ($EmployeesUserpw as $EmployeeUser) {
            if (Hash::check($request['password'], $EmployeeUser->password)) {
                $checkPassword = 1; //Yes
                break;
            }
        }

        if ($chcekEmployeeNumber == 1 && $chcekUserid == 0 && $checkPassword == 0 && $request['password'] != '') {
            \App\User::create([
                'id' => $request['id'],
                'password' => Hash::make($request['password']),
            ]);

            return redirect('/login')->with('success', 'Registration successful !');
        } else if ($chcekEmployeeNumber == 0) {
            if ($request['password'] == '') {
                return redirect('/admin-register')->with('success', 'The employee number you entered did not match our records. Please double-check and try again.')->with('successPassword', 'Please enter your password.');
            } else if ($checkPassword == 1) {
                return redirect('/admin-register')->with('success', 'The employee number you entered did not match our records. Please double-check and try again.')->with('successPassword', 'Duplicate Password !');
            } else {
                return redirect('/admin-register')->with('success', 'The employee number you entered did not match our records. Please double-check and try again.');
            }
        } else if ($chcekUserid == 1) {
            if ($request['password'] == '') {
                return redirect('/admin-register')->with('success', 'This code already exists in the system. Please double-check and try again.')->with('successPassword', 'Please enter your password.');
            } else if ($checkPassword == 1) {
                return redirect('/admin-register')->with('success', 'This code already exists in the system. Please double-check and try again.')->with('successPassword', 'Duplicate Password !');
            } else {
                return redirect('/admin-register')->with('success', 'This code already exists in the system. Please double-check and try again.');
            }
        } else if ($checkPassword == 1) {
            return redirect('/admin-register')->with('successPassword', 'Duplicate Password !');
        } else {
            return redirect('/admin-register')->with('successPassword', 'Please enter your password.');
        }
    }

    public function insert(Request $request)
    {
        //dd($request);
        $chcekEmployeeNumber = 0; //No
        $Employees = Employees::get();
        foreach ($Employees as $Employee) {
            if ($Employee->employeeNumber == $request['employeeNumber']) {
                $chcekEmployeeNumber = 1; //Yes
                break;
            }
        }

        if (
            $chcekEmployeeNumber == 0 &&
            $request['employeeNumber'] != '' &&
            $request['extension'] != '' &&
            $request['firstName'] != '' &&
            $request['lastName'] != '' &&
            $request['email'] != ''
        ) {
            Employees::create([
                'employeeNumber' => $request['employeeNumber'],
                'extension' => $request['extension'],
                'firstName' => $request['firstName'],
                'lastName' => $request['lastName'],
                'email' => $request['email'],
                'officeCode' => $request['officeCode'],
                'reportsTo' => $request['reportsTo'],
                'jobTitle' => $request['jobTitle']
            ]);
            return redirect('/admin-ERM'); //->with('success','Registration successful !');
        } else if ($chcekEmployeeNumber == 1) {
            return redirect('/admin-ERM')->with('success', 'Duplicate Employees Number ! Please fill up your information completely.');
        } else {
            return redirect('/admin-ERM')->with('success', 'Please fill up your information completely.');
        }
    }

    public function delete($id)
    {
        $user = Employees::where('employeeNumber', $id)->first();
        $user->employeeNumber()->update(['reportsTo' => null]);
        $user->delete();

        return redirect('/admin-ERM'); //->with('success','Registration successful !');

    }

    public function editJob(Request $request, $id)
    {
        $update = Employees::where('employeeNumber', $id)->first();
        $update->employeeNumber()->update(['reportsTo' => null]);
        $update->update(['jobTitle' => $request->input('jobTitle')]);
        return redirect('/admin-ERM');
        //->with('success','Registration successful !');
    }
}
