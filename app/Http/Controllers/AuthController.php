<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Display the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        // The login view is displayed here
        // This is called when the user navigates to the login route

    //   User::create([
    //     'name' => 'admin',
    //     'email' => 'admin@localhost.fr',
    //     'password' => Hash::make('0000'),
    //   ]);
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        // This is called when the user submits the login form
        // The request is validated here
        // The user is authenticated here
        // The user is redirected to the home page

        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }
        return back()->withErrors(['email' => 'Identifiant incorrect'])->onlyInput('email');
    }
    

    public function logout()
    {
        auth()->logout();
        return to_route('login')->with('success', 'Vous avez bien été deconnecté');
    }   
}
