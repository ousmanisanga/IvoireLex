<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Loi;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
       return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        // $loi = Loi::findOrFail($id);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('law.create');

            // if (URL::current() === route('law.create')) {
            //     return redirect()->route('law.create');
            // } else {
            //     return redirect()->route('references.create', ['id' => $loi->id]);
            // }
        }

        return redirect()->route('auth.login')->withErrors([
            'email' => "l'un des deux champs est invalide",
            'password' => "l'un des deux champs est invalide",
        ])->onlyInput('email', 'password');





    }


}
