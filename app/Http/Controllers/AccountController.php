<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function doctorList(Request $request)
    {
        $title = "Doctor List";
        $doctors = User::where(['status' => 1, 'role_id' => 3])->get();
        return view('account.doctor_list', compact('title', 'doctors'));
    }
    public function pendingDoctorList(Request $request)
    {
        $title = "Pending Doctor List";
        $doctors = User::where(['status' => 0, 'role_id' => 3])->get();
        return view('account.doctor_list', compact('title', 'doctors'));
    }
}