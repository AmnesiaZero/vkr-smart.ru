<?php

namespace App\Http\Middleware;

use App\Helpers\JsonHelper;
use Closure;
use DomainException;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;
use UnexpectedValueException;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->token;
        try {
            $decoded = JWT::decode($token, new Key(config('jwt.key'), config('jwt.alg')));
        } catch (InvalidArgumentException $e) {
            // provided key/key-array is empty or malformed.
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Ключ невалиден'
            ]);
        } catch (DomainException $e) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Алгоритм кодирования невалиден'
            ]);
        } catch (SignatureInvalidException $e) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Ошибка в верификации сигнатуры'
            ]);
        } catch (BeforeValidException $e) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Неккоректное время формирования токена'
            ]);
        } catch (ExpiredException $e) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Время жизни токена истекло,обновите его'
            ]);
        } catch (UnexpectedValueException $e) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Токен закодирован неправильным ключом'
            ]);
        }
        return $next($request);
    }
}
