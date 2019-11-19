<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create(Request $request)
    {
       \App\User::create([
           'id' =>$request['id'], 
           'password' => Hash::make($request['password']),
           ]);

       return redirect('/login')->with('success','Registration successful !');
    }
}
