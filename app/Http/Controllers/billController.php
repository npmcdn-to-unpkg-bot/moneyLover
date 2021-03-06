<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Bill;
use Auth;
use App\Transaction;
use App\Wallet;

class billController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index() {
		$bills = Bill::getAll(Auth::user()->id); 
		$trans = Transaction::getAll();
        $wallets = Wallet::getAll();
		return view('app.bill', compact('bills', 'trans', 'wallets'));
	}

	public function createItem(Request $request) {
		Bill::createNew($request, Auth::user()->id);
		return redirect()->back();
	}

	public function deleteItem($id) {
		Bill::deleteById($id);
		return redirect()->back();
	}

	public function updateItem($id, Request $request) {
		Bill::updateItem($id, $request);
		return redirect()->back();
	}
}
