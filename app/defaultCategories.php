<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;

class defaultCategories extends Model
{
	protected $tablle = "default_categories";

	static public function getAll() {
		return defaultCategories::all();
	}
}
