<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\wallet;

class Transaction extends Model
{
	protected $table="transactions";

	public static function getAll() {
		$user_id =Auth::user()->id;
		return Transaction::where('user_id', $user_id)->get();
	}

	public static function getById($wallet_id) {
		return Transaction::where('wallet_id', $wallet_id)->get();
	}

	public static function deleteByWalletId($wallet_id) {
		Transaction::where('wallet_id', $wallet_id)->delete();
	}

	public static function createItem($request) {
		$new = new Transaction;
		$new->type = $request->type;
		$new->typeGroup = $request->typeGroup;
		$new->totalMoney = $request->totalPay;
		$new->note = $request->note;
		$new->date = $request->date;
		$new->wallet_id = $request->wallet;
		$new->user_id = Auth::user()->id;
		$new->save();
		$cate = Wallet::where('id', $new->wallet_id)->first();
		if($new->typeGroup == 1) $cate->total += $new->totalMoney;
		else $cate->total -= $new->totalMoney;
		$cate->save();
		return;
	}
}
