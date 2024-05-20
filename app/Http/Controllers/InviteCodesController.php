<?php

namespace App\Http\Controllers;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Models\InviteCodesExport;
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

    public function get(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'page' => 'required|integer',
            'type' => 'required|integer|in:1,2'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $user = Auth::user();
        $organizationId = $user->organization_id;
        $pageNumber = $request->page;
        $type = $request->type;
        return $this->inviteCodesService->get($organizationId,$pageNumber,$type);
    }


    //Будет работать,когда эта библиотека наконец установится,думаю её можно сразу на серваке настроить
    public function loadExcel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|integer|in:1,2'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $type = $request->type;
        return Excel::download(new InviteCodesExport($organizationId,$type), 'invite_codes.xlsx');
    }
}
