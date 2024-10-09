<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Link;
use App\Models\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
        ]);

        auth()->login($user);

        $link = Link::generateLink($user);

        return view('auth.welcome', ['segment' => $link->segment]);

    }

    public function loginPage()
    {
        return view('auth.login');
    }
}
