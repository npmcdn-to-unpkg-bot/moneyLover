<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\defaultWallet;
use App\Transaction;
use Auth;

class Wallet extends Model
{
	protected $table = "wallets";

	public static function setDefault($userId) {
		$wallets = defaultWallet::getAll();
		foreach ($wallets as $wallet) {
			$new = new Wallet;
			$new->user_id = $userId;
			$new->name = $wallet->name;
			$new->icon = $wallet->icon;
			$new->save();  
		}
	}

	public static function getAll() {
		$user_id = Auth::user()->id;
		return Wallet::where('user_id', $user_id)->get();
	}

	public static function getById($wallet_id) {
		return Wallet::where('id', $wallet_id)->get();
	}

	public static function deleteById($wallet_id) {
		Wallet::where('id', $wallet_id)->delete();
		Transaction::deleteByWalletId($wallet_id);
		return;
	}
}
