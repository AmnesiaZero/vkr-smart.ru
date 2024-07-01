<?php

namespace App\Http\Controllers\Works;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\Comments\CommentsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CommentsController extends Controller
{
    private array $fillable = [
        'work_id',
        'sender_id',
        'receiver_id',
        'title',
        'text',
        'comment_answer',
        'parent_id',
        'read',
    ];

    private CommentsService $commentsService;

    public function __construct(CommentsService $commentsService)
    {
        $this->commentsService = $commentsService;
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'work_id' => ['required','integer',Rule::exists('works','id')],
            'receiver_id' =>  ['required','integer',Rule::exists('users','id')],
            'parent_id' => ['integer',Rule::exists('comments','id')],
            'title' => 'required|max:250',
            'text' => 'required|max:250'
        ]);
        if($validator->fails())
        {
            return ValidatorHelper::error($validator);
        }
        $data = $request->only($this->fillable);
        return  $this->commentsService->create($data);

    }

    public function get(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'work_id' => ['required','integer',Rule::exists('works','id')],
        ]);
        if($validator->fails())
        {
            return ValidatorHelper::error($validator);
        }
        $workId = $request->work_id;
        return  $this->commentsService->get($workId);
    }

    public function delete(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'id' => ['required','integer',Rule::exists('works_comments','id')],
        ]);
        if($validator->fails())
        {
            return ValidatorHelper::error($validator);
        }
        $id = $request->id;
        return  $this->commentsService->delete($id);
    }
}
