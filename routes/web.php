<?php


use App\Http\Controllers\Organizations\OrganizationsController;
use App\Http\Controllers\Organizations\OrganizationsFacultiesController;
use App\Http\Controllers\Organizations\OrganizationsFacultiesDepartmentsController;
use App\Http\Controllers\Organizations\OrganizationsYearsController;
use App\Http\Controllers\UsersController;
use App\Models\OrganizationYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

Route::get('login', function () {
    return view('templates.site.auth.login');
})->name('login');
Route::get('reset-password', function () {
    return view('templates.site.auth.reset_password');
});

Route::post('login', [UsersController::class, 'login']);


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
        Route::get('organizations-structure',[OrganizationsController::class, 'organizationsStructure']);
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
    ],function (){
        Route::group([
             'prefix' => 'years'
           ],function (){
               Route::get('get',[OrganizationsYearsController::class,'get']);
               Route::post('create',[OrganizationsYearsController::class,'create']);
               Route::post('update',[OrganizationsYearsController::class,'update']);
               Route::post('destroy',[OrganizationsYearsController::class,'destroy']);
           });
        Route::group([
            'prefix' => 'faculties'
        ],function (){
            Route::get('get',[OrganizationsFacultiesController::class,'get']);
            Route::post('create',[OrganizationsFacultiesController::class,'create']);
            Route::post('update',[OrganizationsFacultiesController::class,'update']);
            Route::post('destroy',[OrganizationsFacultiesController::class,'destroy']);
        });

        Route::group([
            'prefix' => 'faculties-departments'
        ],function (){
             Route::get('get',[OrganizationsFacultiesDepartmentsController::class,'get']);
             Route::post('create',[OrganizationsFacultiesDepartmentsController::class,'create']);
        });
    });

});








