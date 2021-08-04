<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Stackflows\StackflowsPlugin\Auth\BackofficeAuth;
use Stackflows\StackflowsPlugin\Exceptions\InvalidCredentials;
use Stackflows\StackflowsPlugin\Stackflows;

class LoginController extends Controller
{
    private BackofficeAuth $auth;

    public function __construct(Stackflows $stackflows)
    {
        $this->auth = $stackflows->getAuth();
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showForm()
    {
        return view(
            'auth.login',
            [
                'isAuth' => $this->auth->check(),
            ]
        );
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required|string',
            ]
        );

        if ($this->auth->attempt($request->get('email'), $request->get('password'))) {
            return redirect()->back()->with('status', "The authentication token was received");
        }

        return redirect()->back()->with('error', 'These credentials do not match our records.');
    }

    public function logout()
    {
        try {
            $this->auth->logout();
        } catch (GuzzleException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (InvalidCredentials $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('status', 'Logout successful');
    }
}
