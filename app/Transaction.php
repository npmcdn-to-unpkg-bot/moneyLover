<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table="transactions";

	public static function getAll() {
		return Transaction::all();
	}

	public static function getById($wallet_id) {
		return Transaction::where('wallet_id', $wallet_id)->get();
	}

	public static function deleteByWalletId($wallet_id) {
		Transaction::where('wallet_id', $wallet_id)->delete();
	}

	public static function createItem($request, $wallet_id) {
		$new = new Transaction;
		$new->type = $request->type;
		$new->totalMoney = $request->totalPay;
		$new->note = $request->note;
		$new->date = $request->date;
		$new->wallet_id = $wallet_id;
		$new->save();
		return;
	}
}
