<?php

namespace App\Services\Works;

use App\Helpers\FilesHelper;
use App\Helpers\JsonHelper;
use App\Services\OrganizationsYears\Repositories\OrganizationYearRepositoryInterface;
use App\Services\ProgramsSpecialties\Repositories\ProgramSpecialtyRepositoryInterface;
use App\Services\ScientificSupervisors\Repositories\ScientificSupervisorRepositoryInterface;
use App\Services\Specialties\Repositories\SpecialtyRepositoryInterface;
use App\Services\Works\Repositories\WorkRepositoryInterface;
use App\Services\WorksTypes\Repositories\WorksTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class WorksService
{

    private OrganizationYearRepositoryInterface $yearRepository;

    private WorkRepositoryInterface $workRepository;

    private ProgramSpecialtyRepositoryInterface $programSpecialtyRepository;

    private ScientificSupervisorRepositoryInterface $scientificSupervisorRepository;

    private WorksTypeRepositoryInterface $worksTypeRepository;

    public function __construct(WorkRepositoryInterface $workRepository, OrganizationYearRepositoryInterface $yearRepository,
                                ScientificSupervisorRepositoryInterface $scientificSupervisorRepository, ProgramSpecialtyRepositoryInterface $programSpecialtyRepository,
                                WorksTypeRepositoryInterface $worksTypeRepository)
    {
        $this->workRepository = $workRepository;
        $this->yearRepository = $yearRepository;
        $this->scientificSupervisorRepository = $scientificSupervisorRepository;
        $this->worksTypeRepository = $worksTypeRepository;
        $this->programSpecialtyRepository = $programSpecialtyRepository;

    }

    public function studentsWorksView()
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $years = $this->yearRepository->get($organizationId);
        $works = $this->workRepository->get($organizationId);
        $specialties = $this->specialtyRepository->all();
        return view('templates.dashboard.works.students', ['years' => $years, 'works' => $works, 'specialties' => $specialties]);
    }

    public function get(int $pageNumber): JsonResponse
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $works = $this->workRepository->get($organizationId,$pageNumber);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'works' => $works
        ]);

    }

    public function employeesWorksView()
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $years = $this->yearRepository->get($organizationId);
        $programSpecialties = $this->programSpecialtyRepository->getByOrganization($organizationId);
        $scientificSupervisors = $this->scientificSupervisorRepository->get($organizationId);
        $worksTypes = $this->worksTypeRepository->get($organizationId);
        return view('templates.dashboard.works.employee', [
            'years' => $years,
            'program_specialties' => $programSpecialties,
            'scientific_supervisors' => $scientificSupervisors,
            'works_types' => $worksTypes
        ]);

    }

    public function create( array $data):JsonResponse
    {
        $you = Auth::user();
        $userId = $you->id;
        $organizationId = $you->organization_id;
        $data = array_merge($data,['user_id' => $userId,'organization_id' => $organizationId]);
        $work = $this->workRepository->create($data);
        if($work and $work->id)
        {
            //Вообще,можно в отдельную функцию вынести разбиение по директориям,но лучше не надо
            $workId = $work->id;
            if (isset($data['work_file']) and is_file($data['work_file']))
            {
                $workFile = $data['work_file'];
                $directoryNumber = ceil($workId/1000);
                $workDirectory = 'works/'.$directoryNumber;
                $workFileName = $workId.'.'.$workFile->extension();
                $workPath =  $workFile->storeAs($workDirectory,$workFileName);
                $work->path = $workPath;
            }
            else
            {
                return JsonHelper::sendJsonResponse(false,[
                    'title' => 'Ошибка',
                    'message' => 'В запросе нет файла работы'
                ]);
            }
            if(isset($data['certificate_file']) and is_file($data['work_file']))
            {
                $certificateFile = $data['certificate_file'];
                $certificateFileName = $workId.'.'.$certificateFile->extension();
                $certificateDirectory = 'certificates/'.$directoryNumber;
                $certificatePath = $certificateFile->storeAs($certificateDirectory,$certificateFileName);
                $work->certificate = $certificatePath;
            }
            $work->save();
            //Подгружаю через find,чтобы связь specialty сохранилась
            $workWithRelations = $this->workRepository->find($workId);
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успешно',
                'work' => $workWithRelations
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
           'title' => 'Ошибка',
           'message' => 'Ошибка при добавлении работы'
        ]);
    }

    public function search(array $data): JsonResponse
    {
        $works = $this->workRepository->search($data);
        if ($works)
        {
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успешно',
                'works' => $works
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
            'title' => 'Ошибка',
            'message' => 'Ошибка при поиске работ'
        ]);
    }
}
