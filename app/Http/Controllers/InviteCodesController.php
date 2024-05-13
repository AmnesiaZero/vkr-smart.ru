<?php

namespace App\Http\Controllers;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\InviteCodes\InviteCodesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class InviteCodesController extends Controller
{
    private InviteCodesService $inviteCodesService;

    protected array $fillable = [
        'type',
        'amount'
    ];

    public function __construct(InviteCodesService $inviteCodesService)
    {
        $this->inviteCodesService = $inviteCodesService;
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|integer|in:1,2',
            'amount' => 'required|integer|max:150'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $data = $request->only($this->fillable);
        return $this->inviteCodesService->create($data);
    }

    public function get():JsonResponse
    {
        $user = Auth::user();
        $organizationId = $user->organization_id;
        return $this->inviteCodesService->get($organizationId);
    }
}