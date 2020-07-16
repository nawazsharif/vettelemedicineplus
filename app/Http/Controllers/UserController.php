<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Category;
use App\CategoryDoctor;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function registerDoctor(Request $request)
	{
		$role_id = Role::where('name', 'doctor')->first();
		return view('users.doctors.registration', compact('role_id'));
	}

	public function registerUser(Request $request)
	{
		return view('auth.register');
	}
	public function addEditDoctor(Request $request, $id)
	{
		if ($request->isMethod('post')) {
			$user = User::find($id);
			CategoryDoctor::where(['doctor_id' => $id])->delete();
			$service = Category::find($request->role);
			foreach ($request->role as $role) {
				$categoryDoctor = new CategoryDoctor;
				$categoryDoctor->doctor_id = $id;
				$categoryDoctor->category_id = $role;
				$categoryDoctor->save();
			}
			$request->session()->flash('success_message', 'Service Added Successful');
			return redirect()->back();
		}
		$services = Category::where(['status' => 1])->get();
		$selectedService = CategoryDoctor::where('doctor_id', $id)->get();
		$doctor = User::where(['id' => $id])->first();
		return view('account.edit_doctor', compact('doctor', 'services', 'selectedService'));
	}
}