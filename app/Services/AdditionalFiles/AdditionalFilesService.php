<?php

namespace App\Services\AdditionalFiles;

use App\Helpers\JsonHelper;
use App\Services\AdditionalFiles\Repositories\AdditionalFileRepositoryInterface;
use App\Services\Works\Repositories\WorkRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdditionalFilesService
{

    private AdditionalFileRepositoryInterface $additionalFileRepository;

    public function __construct(AdditionalFileRepositoryInterface $additionalFileRepository)
    {
        $this->additionalFileRepository = $additionalFileRepository;
    }

    public function get(int $workId): JsonResponse
    {
        $additionalFiles = $this->additionalFileRepository->get($workId);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'additional_files' => $additionalFiles
        ]);
    }

    public function create(array $data):JsonResponse
    {
        $you = Auth::user();
        $userId = $you->id;
        $organizationId = $you->organization_id;
        $data = array_merge($data,['user_id' => $userId,'organization_id' => $organizationId]);
        $additionalFile = $this->additionalFileRepository->create($data);
        if($additionalFile and $additionalFile->id)
        {
            $id = $additionalFile->id;
            if (isset($data['additional_file']) and is_file($data['additional_file']))
            {
                $file = $data['additional_file'];
                $workId = $additionalFile->work_id;
                $fileDirectory = 'additional_files/'.$workId;
                Storage::makeDirectory($fileDirectory);
                $extension = $file->extension();
                $originalFileName = $file->getClientOriginalName();
                $storeFileName = 'additional_file_'.$id.'.'.$extension;
                $filePath =  $file->storeAs($fileDirectory,$storeFileName);
                $fileSize = $file->getSize()/1024;//в КБ
                $additionalData = [
                    'file_name' => $originalFileName,
                    'path' => $filePath,
                    'extension' => $extension,
                    'file_size' => $fileSize
                ];
                $this->additionalFileRepository->update($id,$additionalData);
            }
            else
            {
                return JsonHelper::sendJsonResponse(false,[
                    'title' => 'Ошибка',
                    'message' => 'В запросе нет файла'
                ]);
            }
            $additionalFile = $this->additionalFileRepository->find($id);
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успешно',
                'additional_file' => $additionalFile
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
            'title' => 'Ошибка',
            'message' => 'Ошибка при добавлении файла'
        ]);
    }

    public function download(int $id)
    {
        $additionalFile = $this->additionalFileRepository->find($id);
        if($additionalFile and $additionalFile->id)
        {
            $path = $additionalFile->path;
            if(isset($path) and Storage::exists($path))
            {
                return Storage::download($path);
            }
        }
        return back();
    }

    public function delete(int $id): JsonResponse
    {
        $additionalFile = $this->additionalFileRepository->find($id);
        if($additionalFile and $additionalFile->id)
        {
            $path = $additionalFile->path;
            if(Storage::delete($path))
            {
                $flag = $this->additionalFileRepository->delete($id);
                if($flag)
                {
                    return JsonHelper::sendJsonResponse(true,[
                        'title' => 'Успешно',
                        'message' => 'Дополнительный файл успешно удален'
                    ]);
                }
            }
        }
        return JsonHelper::sendJsonResponse(false,[
            'title' => 'Ошибка',
            'message' => 'Возникла ошибка при удалении дополнительного файла'
        ]);
    }


}
