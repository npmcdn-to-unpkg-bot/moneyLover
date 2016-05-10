<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Bill;

class billController extends Controller
{
	public function index() {
		$bills = Bill::getAll(); 
		return view('app.bill', compact('bills'));
	}

	public function createItem(Request $request) {
		Bill::createNew($request);
		return redirect()->back();
	}

	public function deleteItem($id) {
		Bill::deleteById($id);
		return redirect()->back();
	}
}
