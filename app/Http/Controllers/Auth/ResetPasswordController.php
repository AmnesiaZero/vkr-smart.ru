<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $credentials = $request->validate([
            'email' => ['required','email',Rule::exists('users','email')]
        ]);
        $email = $credentials['email'];
        $user = User::getByEmail($email);
        $userId = $user->id;
        $payload = [
            'exp' => time() + config('jwt.exp'),
            'user_id' => $userId
        ];
        $token = JWT::encode($payload,config('jwt.key'),config('jwt.alg'));
        $resetLink = config('app.url') . '/password/new?token='.$token;
        Mail::to($email)->queue(new ResetPassword($resetLink));
        return redirect('home');
    }


    public function newPassword(Request $request)
    {
        $credentials = $request->validate([
          'password' => 'required'
       ]);
       $password = $credentials['password'];
       $token = $request->token;
       list($headersB64, $payloadB64, $sig) = explode('.', $token);
       $decoded = json_decode(base64_decode($payloadB64), true);
       $userId = (int)$decoded['user_id'];
       $user = User::query()->find($userId);
       $user->password = Hash::make($password);
       $user->save();
       return redirect('home');

    }
}
