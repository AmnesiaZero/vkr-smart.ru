<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        Log::debug('Вошёл в login');
        DB::enableQueryLog();
        $credentials = $request->validate([
            'name' => ['required', Rule::exists('users', 'name')],
            'password' => 'required'
        ]);
        Log::debug('credidentials = ' . print_r($credentials, true));
        if (Auth::attempt($credentials)) {
            Log::debug('Успешная авторизация');
            $request->session()->regenerate();
            return redirect('dashboard');
        }
        Log::debug('query log = ' . print_r(DB::getQueryLog(), true));
        return back()->withErrors(['Предоставленные данные были некорректными']);
    }
}
