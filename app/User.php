<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'currency',
    ];

    public static function updateUser($id, $request) {
        if ($request->sex) $sex = 2;
            else $sex = 1;
        $currency = $request->currency;
        User::where('id', $id)
            ->update(['sex' => $sex, 'currency' => $currency]);
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}