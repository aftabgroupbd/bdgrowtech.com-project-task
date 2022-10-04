<?php

namespace App\Http\Controllers;

use App\Models\CurrencyInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    /**
     * Create new user
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateUser()
    {

        $user = new User();
        $user->name             = 'Arif Hossen';
        $user->username         = 'arif6222';
        $user->password         = Hash::make(12345678);
        $user->created_at       = date('Y-m-d H:i:s');
        $user->modified_at      = date('Y-m-d H:i:s');
        $user->save();

    }
    /**
     * login view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->CreateUser();
        return view('login',['title'=>'Login']);
    }
    /**
     * login verification
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $request->validate([
                'username'              => 'required|string|exists:users',
                'password'              => 'required|string|min:8',
            ]);

            $credentials = $request->only('username', 'password');
            
            if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])) {
                Auth::user()->modified_at   = date('Y-m-d H:i:s');;
                Auth::user()->last_login    = date('Y-m-d H:i:s');;
                Auth::user()->last_ip       = $request->ip();
                Auth::user()->update();
                return redirect('/currency')->with(['success'=>'Successfully logged in.']);
            }
            return redirect("/")->with(['error'=>'Login details are not valid or your account status is pending!']);
        }
    }
    /**
     * session flash.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
