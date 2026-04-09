<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $userDetails = $request->validate([
            'uname' => ['required'],
            'pass' => ['required'],
        ]);

        if (auth()->attempt(['name' => $userDetails['uname'], 'password' => $userDetails['pass']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function register(Request $request)
    {

        $userDetails = $request->validate([
            'name' => ['required'],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
        ]);
        $userDetails['password'] = bcrypt($userDetails['password']);
        $loginInstance = User::create($userDetails);
        auth()->guard()->login($loginInstance);

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
