<?php


use App\Http\Controllers\InviteCodesController;
use App\Http\Controllers\Organizations\FacultiesController;
use App\Http\Controllers\Organizations\DepartmentsController;
use App\Http\Controllers\Organizations\OrganizationsController;
use App\Http\Controllers\Organizations\OrganizationsYearsController;
use App\Http\Controllers\Organizations\ProgramsController;
use App\Http\Controllers\Organizations\ProgramsSpecialtiesController;
use App\Http\Controllers\Organizations\SpecialtiesController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('home', function () {
    return view('templates.site.index');
});
Route::get('/', function () {
    return view('templates.site.index');
});

Route::group([
    'prefix' => 'about'
], function () {

    Route::get('storage', function () {
        return view('templates.site.about.storage');
    });
    Route::get('program', function () {
        return view('templates.site.about.program');
    });
    Route::get('product', function () {
        return view('templates.site.about.product');
    });
    Route::get('for-whom', function () {
        return view('templates.site.about.for_whom');
    });
    Route::get('price', function () {
        return view('templates.site.about.price');
    });
    Route::get('benefits', function () {
        return view('templates.site.about.benefits');
    });
    Route::get('algorithm', function () {
        return view('templates.site.about.algorithm');
    });
    Route::get('roles', function () {
        return view('templates.site.about.roles');
    });
});

Route::group([
    'prefix' => 'search'
], function () {
    Route::get('borrowings', function () {
        return view('templates.site.borrowings.borrowings');
    });
    Route::get('index', function () {
        return view('templates.site.borrowings.index');
    });
});

Route::get('test-access', function () {
    return view('templates.site.test_access');
});

Route::get('portfolio', function () {
    return view('templates.site.portfolio.portfolio');
});

Route::get('reviews', function () {
    return view('templates.site.reviews');
});

Route::get('check-reference', function () {
    return view('templates.site.check_reference');
});


Route::get('reset-password', function () {
    return view('templates.site.auth.reset_password');
});

Route::group([
    'prefix' => 'login'
],function (){
    Route::get('/', function () {
        return view('templates.site.auth.login');
    })->name('login');
    Route::post('/', [UsersController::class, 'login']);
    Route::post('by-code',[UsersController::class,'loginByCode']);
});


Route::group([
    'prefix' => 'registration',
],function (){
    Route::get('by-code',[UsersController::class,'registerByCodeView']);
});



Route::group([
    'prefix' => 'password',
    'middleware' => 'verifyToken'
], function () {
    Route::get('new', function (Request $request) {
        $token = $request->token;
        return view('templates.site.auth.new_password', ['token' => $token]);
    });
    Route::post('new', [UsersController::class, 'newPassword']);
});

Route::group([
    'prefix' => 'mail'
], function () {
    Route::post('reset-password', [UsersController::class, 'resetPassword']);
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['web', 'auth', 'role:admin']
], function () {
    Route::get('/', [OrganizationsController::class, 'organizationsStructure']);

    Route::group([
        'prefix' => 'settings'
    ], function () {
        Route::get('organizations-structure', [OrganizationsController::class, 'organizationsStructure']);
        Route::get('access', function () {
            return view('templates.dashboard.settings.access');
        });
        Route::get('invite-codes', function () {
            return view('templates.dashboard.settings.invite_codes');
        });
        Route::get('user-management', function () {
            return view('templates.dashboard.settings.user_management');
        });
        Route::get('handbook-management', function () {
            return view('templates.dashboard.settings.handbook_management');
        });
        Route::get('integration', function () {
            return view('templates.dashboard.settings.integration');
        });
        Route::get('api', function () {
            return view('templates.dashboard.settings.api');
        });
    });

    Route::group([
        'prefix' => 'works'
    ], function () {
        Route::get('student', function () {
            return view('templates.dashboard.works.student');
        });
        Route::get('employee', function () {
            return view('templates.dashboard.works.employee');
        });
    });

    Route::group([
        'prefix' => 'portfolio'
    ], function () {
        Route::get('students', function () {
            return view('templates.dashboard.portfolio.students');
        });
        Route::get('teachers', function () {
            return view('templates.dashboard.portfolio.teachers');
        });
    });

    Route::get('report', function () {
        return view('templates.dashboard.report');
    });
    Route::get('documentation', function () {
        return view('templates.dashboard.documentation');
    });

    Route::group([
        'prefix' => 'organizations'
    ], function () {

        Route::post('inspectors-access',[OrganizationsController::class,'configureInspectorsAccess']);

        Route::group([
            'prefix' => 'years'
        ], function () {
            Route::get('get', [OrganizationsYearsController::class, 'get']);
            Route::post('create', [OrganizationsYearsController::class, 'create']);
            Route::post('update', [OrganizationsYearsController::class, 'update']);
            Route::post('delete', [OrganizationsYearsController::class, 'delete']);
            Route::post('copy', [OrganizationsYearsController::class, 'copy']);
            Route::get('find',[OrganizationsYearsController::class, 'find']);
        });
        Route::group([
            'prefix' => 'faculties'
        ], function () {
            Route::get('get', [FacultiesController::class, 'get']);
            Route::post('create', [FacultiesController::class, 'create']);
            Route::post('update', [FacultiesController::class, 'update']);
            Route::post('delete', [FacultiesController::class, 'delete']);
        });

        Route::group([
            'prefix' => 'departments'
        ], function () {
            Route::get('get', [DepartmentsController::class, 'get']);
            Route::post('create', [DepartmentsController::class, 'create']);
            Route::post('update', [DepartmentsController::class, 'update']);
            Route::post('delete', [DepartmentsController::class, 'delete']);
            Route::get('by-user', [DepartmentsController::class, 'getByUserId']);
            Route::get('get-info',[DepartmentsController::class, 'getInfo']);
        });

        Route::group([
            'prefix' => 'programs'
        ], function () {
            Route::get('get', [ProgramsController::class, 'get']);
            Route::post('create', [ProgramsController::class, 'create']);
            Route::post('delete', [ProgramsController::class, 'delete']);
            Route::post('update', [ProgramsController::class, 'update']);
            Route::get('find', [ProgramsController::class, 'find']);
            Route::group([
                'prefix' => 'specialties'
            ], function () {
                Route::post('create', [ProgramsSpecialtiesController::class, 'create']);
                Route::get('get', [ProgramsSpecialtiesController::class, 'get']);
                Route::post('delete', [ProgramsSpecialtiesController::class, 'delete']);
            });
        });

        Route::group([
            'prefix' => 'specialties'
        ], function () {
            Route::get('all', [SpecialtiesController::class, 'all']);
        });
    });

    Route::group([
        'prefix' => 'users'
    ], function () {
        Route::get('get', [UsersController::class, 'get']);
        Route::post('create', [UsersController::class, 'create']);
        Route::post('delete',[UsersController::class,'delete']);
        Route::get('find',[UsersController::class,'find']);
        Route::post('update',[UsersController::class,'update']);
        Route::post('add-department',[UsersController::class,'addDepartment']);
        Route::get('search',[UsersController::class,'search']);
        Route::get('you',[UsersController::class,'you']);
        Route::post('configure-departments',[UsersController::class,'configureDepartments']);

    });

    Route::group([
        'prefix' => 'invite-codes'
    ],function (){
       Route::post('create',[InviteCodesController::class,'create']);
       Route::get('get',[InviteCodesController::class,'get']);
    });


});








