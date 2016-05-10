<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class defaultWallet extends Model
{
	protected $table="default_wallets";

	public static function getAll() {
		return defaultWallet::all();
	}
}
