<?php

namespace App\Services\InviteCodes;

use App\Helpers\JsonHelper;
use App\Services\InviteCodes\Repositories\InviteCodeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InviteCodesService
{
    public InviteCodeRepositoryInterface $_repository;


    public function __construct(InviteCodeRepositoryInterface $_repository)
    {
        $this->_repository = $_repository;
    }

    public function create(array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ], 400);
        }
        $user = Auth::user();
        $additionalData = [
            'organization_id' => $user->organization_id,
            'expires_at' => now()->addYear(),
            'status' => true
        ];
        $data = array_merge($data,$additionalData);
        Log::debug(print_r($data,true));
        if(!isset($data['amount'])){
            $data['amount'] = 1;
        }
        $amount = $data['amount'];
        $inviteCodes = [];
        for ($i=0;$i<$amount;$i++){
            $data['code'] = rand(10000,99999);
            $inviteCode = $this->_repository->create($data);
            if($inviteCode and  $inviteCode->id){
                $inviteCodes[] = $inviteCode;
            }
        }
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'message' => 'Коды приглашений успешно созданы',
            'invite_codes' => $inviteCodes
        ]);
    }


    public function get(int $organizationId): JsonResponse
    {
        $inviteCodes = $this->_repository->get($organizationId);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно получены коды регистраций',
            'invite_codes' => $inviteCodes
        ]);
    }
}