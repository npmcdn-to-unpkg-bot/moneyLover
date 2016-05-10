<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	protected $table = "categories";

	static public function getAll() {
		return Categories::all();
	}

	static public function setDefault($user_id) {
		Categories::getQuery()->delete();
		$Categories_default = defaultCategories::all();
		foreach ($Categories_default as $cat) {
			$newCat = new Categories;
			$newCat->type = $cat->type;
			$newCat->name = $cat->name;
			$newCat->icon = $cat->icon;
			$newCat->user_id = $user_id;
			$newCat->save();
		}
		return;
	}

	static public function createItem($request, $user_id) {
		$newCat = new Categories;
		$newCat->type = $request->type;
		$newCat->name = $request->category;
		$newCat->icon = "image_file1.png";
		$newCat->user_id = $user_id;
		$newCat->save();
		return;
	}

	static public function getById($id) {
		return Categories::find($id);
	}

	static public function updateById($id, $request) {
		$Cat = Categories::find($id);
		$Cat->type = $request->type;
		$Cat->name = $request->category;
		//$Cat->icon = "image_file1.png";
		$Cat->save();
		return;	
	}

	static public function deleteById($id) {
		$cat = Categories::find($id);
		if (!is_null($cat)) $cat->delete();
		return;
	}
 }
