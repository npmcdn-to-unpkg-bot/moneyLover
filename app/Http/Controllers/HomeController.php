<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Categories;
use App\Wallet;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function currencyIndex() {
    	return view('currency');
    }

    public function postCurrency(Request $request) {
        $user_id = Auth::user()->id;
    	User::updateUser($user_id, $request);
        Categories::setDefault($user_id);
        Wallet::setDefault($user_id);
    	return redirect('/');
    }

}
