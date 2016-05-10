<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
	protected $table = "bills";

	static public function getAll() {
		$today = date('y.m.d');
		return Bill::where('deadLine', '>=', $today)->orderBy('deadLine', 'asc')->get();
	}

	static public function createNew($request) {
		$new = new Bill;
		$new->name = $request->name;
		$new->totalPay = $request->totalPay;
		$new->deadLine = $request->deadLine;
		$new->save();
		return;
	}

	static public function deleteById($id) {
		Bill::find($id)->delete();
		return;
	}
}
