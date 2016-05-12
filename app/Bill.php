<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Auth;

class Bill extends Model
{
	protected $table = "bills";

	static public function getAll($user_id) {
		$today = date('y.m.d');
		return Bill::where('user_id', $user_id)->where('deadLine', '>=', $today)->orderBy('deadLine', 'asc')->get();
	}

	static public function createNew($request, $user_id) {
		$new = new Bill;
		$new->name = $request->name;
		$new->totalPay = $request->totalPay;
		$new->deadLine = $request->deadLine;
		$new->user_id = $user_id;
		$new->save();
		return;
	}

	static public function deleteById($id) {
		Bill::find($id)->delete();
		return;
	}

	static public function updateItem($id, $request) {
		$update = Bill::find($id);
		$update->name = $request->name;
		$update->totalPay = $request->totalPay;
		$update->deadLine = $request->deadLine;
		$update->save();
		return;
	}
}
