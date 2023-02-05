<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Route;

class PembeliLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pembeli', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.login_new');
    }

    public function login(Request $request)
    {

        // Validate the form data
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required'
        ]);

        // Attempt to log the user in   
        if (Auth::guard('pembeli')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('home'));
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('pembeli')->logout();
        return redirect('/');
    }
}
