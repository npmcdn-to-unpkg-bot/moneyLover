<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use App\User;

class mailController extends Controller
{
	public function sendMail(Request $request) {
		$email = $request->email;
		$user = User::where('email', $email)->first();
		Mail::send('emails.findPasswordMail', ['user' => $user], function ($message) use ($user) {
			$message->to($user->email, $user->name)->subject('Tìm lại mật khẩu');
		});
		return redirect('/login');
	}
}
