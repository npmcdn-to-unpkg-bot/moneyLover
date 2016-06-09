<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Hash;
use App\User;

class userController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	return view('app.user');
    }

    public function changeInfo(Request $request) {

    	$id = Auth::user()->id;
    	if (!Hash::check($request->current_password, Auth::user()->password)) return redirect()->back()->withErrors(['curPass'=> 'Mật khẩu không đúng']);
    	if ($request->password != "" && $request->password != $request->re_password)
    		return back()->withErrors(['rePass' => 'Mật khẩu không khớp']);
    	User::changeUser($id, $request);
    	return back()->withErrors(['changeSucc' => 'Thay đổi thành công']);
    }
}
