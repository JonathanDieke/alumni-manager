<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests\Auth\LoginRequest;

class AdminAuthController extends Controller
{

    // use AuthenticatesUsers;

    protected $redirectTo = "admin/dashboard";

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard(){
        return Auth::guard('admin');
    }

    public function create(){
        return view("admin.login");
    }

    public function store(LoginRequest $request){
        $request->authenticate($guard = "admin");

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
