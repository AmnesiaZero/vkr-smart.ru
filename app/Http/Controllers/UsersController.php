<?php

namespace App\Http\Controllers;

use App\Helpers\ValidatorHelper;
use App\Mail\ResetPassword;
use App\Models\User;
use App\Services\Departments\DepartmentsService;
use App\Services\Users\UsersService;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public UsersService $usersService;


    protected $fillable = [
        'name',
        'role',
        'email',
        'gender',
        'login',
        'password',
        'organization_id',
        'phone',
        'date_of_birth',
        'is_active',
        'department_id'
    ];

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    public function login(Request $request): RedirectResponse
    {
        Log::debug('Вошёл в login');
        DB::enableQueryLog();
        $credentials = $request->validate([
            'login' => ['required', Rule::exists('users', 'login')],
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

    public function resetPassword(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')]
        ]);
        $email = $credentials['email'];
        $user = User::getByEmail($email);
        $userId = $user->id;
        $payload = [
            'exp' => time() + config('jwt.exp'),
            'user_id' => $userId
        ];
        $token = JWT::encode($payload, config('jwt.key'), config('jwt.alg'));
        $resetLink = config('app.url') . '/password/new?token=' . $token;
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

    public function get(): JsonResponse
    {
        $user = Auth::user();
        $organizationId = $user->organization_id;
        return $this->usersService->get($organizationId);
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|max:255',
            'gender' => 'required|integer',
            'is_active' => 'required|integer',

        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $data = $request->only($this->fillable);
        Log::debug('request data ='.print_r($data,true));
        return $this->usersService->create($data);
    }

    public function delete(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required',Rule::exists('users','id')]
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $id = $request->id;
        return $this->usersService->delete($id);
    }
}
