<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\RoleUser;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $r)
    {
        $email = $r->input('email');
        $password = $r->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $role_user = RoleUser::where('user_id',Auth::user()->id)->first();
            if ($role_user->role_id==1) {
                return redirect('admin/home');
            }elseif ($role_user->role_id==2) {
                return redirect('account/home');
            }elseif ($role_user->role_id==3) {
                return redirect('warehouse/home');
            }
        }
        else {
            return redirect(url('login'));
        }
    }

    public function logout(Request $r)
    {
        Auth::logout();
        return redirect('login');
    }
}
