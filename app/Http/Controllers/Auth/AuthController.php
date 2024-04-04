<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Services\Organizations\Repository\EloquentOrganizationsRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        Log::debug('Вошёл в login');
        DB::enableQueryLog();
        $credentials =  $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);
        Log::debug('credidentials = '.print_r($credentials,true));
        if(Auth::attempt($credentials)){
            Log::debug('Успешная авторизация');
            $request->session()->regenerate();
            return redirect()->intended('/login');
        }
        Log::debug('query log = '.print_r(DB::getQueryLog(),true));
        return back()->withErrors([
           'email' => 'Предоставленные данные были некорректными'
        ])->onlyInput('name');
    }
}
