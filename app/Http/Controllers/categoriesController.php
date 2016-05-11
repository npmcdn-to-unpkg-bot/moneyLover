<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categories;
use Auth;
use App\Icon;

class categoriesController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

	public function Index() {
		$categories = Categories::getAll();
		$icons = Icon::getAll();
		return view('app.categories', compact('categories', 'icons'));
	}

	public function createNew(Request $request) {
		$userId = Auth::user()->id;
		Categories::createItem($request, $userId);
		return redirect()->back();
	}

	public function reset() {
		$userId = Auth::user()->id;
		Categories::setDefault($userId);
		return redirect()->back();
	}

	public function showCategory($id) {
		$cat = Categories::getById($id);
		$icons = Icon::getAll();
		return view('app.showDetail', compact('cat', 'icons'));
	}

	public function update($id, Request $request) {
		Categories::updateById($id, $request);
		return redirect()->back();
	}

	public function deleteItem($id) {
		Categories::deleteById($id);
		return redirect()->back();
	}
}
