<?php

namespace App\Http\Controllers;

use App\BkashConfirmation;
use App\Category;
use App\CategoryDoctor;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        return view('welcome', compact('categories'));
    }
    public function serviceDetails(Request $request, $id)
    {
        $doctorList = DB::select('SELECT users.*,categories.name as cat_name, categories.id as cat_id FROM `categories_doctors` as cadc LEFT JOIN users ON users.id = cadc.doctor_id LEFT JOIN categories ON categories.id = cadc.category_id where cadc.category_id =' . $id);

        return view('dr_list', compact('doctorList'));
    }
    public function doctorDetails(Request $request, $id)
    {
        $doctor = User::where('id', $id)->first();
        return view('doctor_details', compact('doctor'));
    }
    public function bkashConfirmation(Request $request)
    {
        $bkash = new BkashConfirmation;
        if (Auth::check()) {
            $bkash->user_id = Auth::user()->id;
        }
        $findUser = User::where(['status' => 1, 'phone' => $request->bkash_no])->first();
        if (!empty($findUser)) {
            $bkash->user_id = $findUser->id;
        }


        $bkash->bkash_no = $request->bkash_no;
        $bkash->bkash_tx_id = $request->bkash_tx_no;
        $bkash->bkash_amount = $request->bkash_amount;
        $bkash->dr_id = $request->dr_id;
        $bkash->save();
        $request->session()->flash('success_message', 'Message send successfully');
        return redirect()->back();
    }
    public function allPatients(Request $request)
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            $bkashList = BkashConfirmation::where('status', 1)->get();
        } else {
            $bkashList = BkashConfirmation::where(['status' => 1, 'dr_id' => Auth::user()->id])->get();
        }
        $title = "All Confirm Payment List";

        return view('bkashConfirm_list', compact('bkashList', 'title'));
    }
    public function allPendingPatients(Request $request)
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            $bkashList = BkashConfirmation::where('status', 0)->get();
        } else {
            $bkashList = BkashConfirmation::where(['status' => 0, 'dr_id' => Auth::user()->id])->get();
        }
        $title = "All Pending Payment List";

        return view('bkashConfirm_list', compact('bkashList', 'title'));
    }
    public function allRejectPatients(Request $request)
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            $bkashList = BkashConfirmation::where('status', 2)->get();
        } else {
            $bkashList = BkashConfirmation::where(['status' => 2, 'dr_id' => Auth::user()->id])->get();
        }
        $title = "All Rejected Payment List";

        return view('bkashConfirm_list', compact('bkashList', 'title'));
    }
    public function paymentStatus(Request $request, $id)
    {
        BkashConfirmation::where('id', $id)->update(['status' => $request->status]);
        $request->session()->flash('success_message', 'Status updated successfully');
        return redirect()->back();
    }
    public function payment(Request $request)
    {
        $title = "Payment list and status";
        $bkashList = BkashConfirmation::where(['user_id' => Auth::user()->id])->orWhere(['bkash_no' => Auth::user()->phone])->get();
        return view('users.payment', compact('bkashList', 'title'));
    }
}