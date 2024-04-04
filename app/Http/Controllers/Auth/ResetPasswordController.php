<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email'
        ]);
        $email = $credentials['email'];
        $resetLink = config('app.url') . '/auth/reset-password';
        Mail::to($email)->queue(new ResetPassword($resetLink));
        return redirect('/auth/new-password');
    }

    public function newPassword(Request $request)
    {
        $credentials = $request->validate([
          'password' => 'required'
       ]);
       $password = $credentials['password'];
       $user = Auth::user();
       $user->password = Hash::make($password);
       $user->save();
//       return redirect('')

    }
}
