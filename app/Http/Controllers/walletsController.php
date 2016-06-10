<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Wallet;
use App\Transaction;
use App\Categories;

class walletsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index() {
		$wallets = Wallet::getAll();
		$trans = Transaction::getAll();
		$currentWallet = -1;
		$categories = Categories::getAll();
 		return view('app.wallet', compact('wallets', 'trans', 'currentWallet', 'categories'));
	}

	public function showWallet($wallet_id) {
		$wallets = Wallet::getAll();
		$wall = Wallet::getById($wallet_id);
		$trans = Transaction::getById($wallet_id);
		$categories = Categories::getAll();
		$currentWallet = $wallet_id;
		return view('app.wallet', compact('wallets', 'trans', 'wall', 'currentWallet', 'categories'));
	}

	public function deleteWallet($wallet_id) {
		Wallet::deleteById($wallet_id);
		return route('wallets.show');
	}

	public function createWallet(Request $request) {
		Wallet::createItem($request);
		return redirect()->back();
	}

	public function createTransaction(Request $request) {
		Transaction::createItem($request);
		return redirect()->back();
	}
}
