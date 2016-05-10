<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\User;

class PageController extends Controller
{
	public function homeIndex() {
		if (Auth::check()) {
			$currency = Auth::user()->currency;
			if ($currency == NULL) {
				return redirect('/currency');
			}
			else return view('app.home', ['yourCurrency'=> Auth::user()->currency]);
		}
			else return redirect('/landing-page');
	}
}
