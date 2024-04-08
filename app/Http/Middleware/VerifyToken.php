<?php

namespace App\Http\Middleware;

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
        if ($token == null) {
            return redirect('home')->withErrors('Отсутствует токен');
        }
        $secretKey = config('jwt.key');
        try {
            $decoded = JWT::decode($token, new Key($secretKey, config('jwt.alg')));
        } catch (InvalidArgumentException $e) {
            // provided key/key-array is empty or malformed.
            return redirect('home')->withErrors('Ключ невалиден');
        } catch (DomainException $e) {
            return redirect('home')->withErrors('Алгоритм кодирования невалиден');
        } catch (SignatureInvalidException $e) {
            return redirect('home')->withErrors('Ошибка верификации сигнатуры');
        } catch (BeforeValidException $e) {
            return redirect('home')->withErrors('Неккоректное время формирования токена');
        } catch (ExpiredException $e) {
            // provided JWT is trying to be used after "exp" claim.
            return redirect('home')->withErrors('Время жизни токена истекло,обновите его');
        } catch (UnexpectedValueException $e) {
            // provided JWT is malformed OR
            // provided JWT is missing an algorithm / using an unsupported algorithm OR
            // provided JWT algorithm does not match provided key OR
            // provided key ID in key/key-array is empty or invalid.
            return redirect('home')->withErrors('Токен закодирован неправильным ключом');
        }
        return $next($request);
    }
}
