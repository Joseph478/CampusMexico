<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $typeField;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->typeField = $this->typeFieldUsername();
    }

    public function typeFieldUsername(): string
    {
        $username = request()->input('dni');

        $fieldType = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'dni';

        request()->merge([$fieldType => $username]);

        return $fieldType;
    }

    public function username(): string
    {
        return $this->typeField;
    }

    protected function credentials(Request $request): array
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['state'] = 1;
        return $credentials;
    }
}
