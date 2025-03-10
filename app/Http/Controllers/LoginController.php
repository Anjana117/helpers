<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index() {
        return view( 'auth.login' );
    }

    public function login( Request $request ) {
        $credentials = $request->validate( [
            'email' => 'required|email',
            'password' => 'required',
        ] );
        if ( Auth::attempt( $credentials ) ) {
            return redirect()->route( 'dashboard' );
        } else {
            return 'Invalid User Credential';
        }
    }
    public function dashboardPage() {
        if (Auth::check()) {
            $users = User::paginate(5);
         return view('auth.dashboard', compact('users'));
        } else {
            return redirect('/login');
        }
    }
    public function logout() {
        Auth::logout();
        return redirect( '/login' );
    }


}
