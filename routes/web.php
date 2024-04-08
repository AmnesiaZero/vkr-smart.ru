<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Mail\MailController;
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




Route::get('home',function (){
   return view('templates.site.index');
});
Route::get('/',function (){
    return view('templates.site.index');
});

Route::group([
    'prefix' => 'about'
],function (){

    Route::get('storage',function (){
        return view('templates.site.about.storage');
    });
    Route::get('program',function (){
        return view('templates.site.about.program');
    });
    Route::get('product',function (){
        return view('templates.site.about.product');
    });
    Route::get('for-whom',function (){
        return view('templates.site.about.for_whom');
    });
    Route::get('price',function (){
        return view('templates.site.about.price');
    });
    Route::get('benefits',function (){
         return view('templates.site.about.benefits');
    });
    Route::get('algorithm',function (){
        return view('templates.site.about.algorithm');
    });
    Route::get('roles',function (){
       return view('templates.site.about.roles');
    });
});

Route::group([
    'prefix' => 'search'
],function (){
    Route::get('borrowings',function (){
        return view('templates.site.borrowings.borrowings');
    });
    Route::get('index',function (){
        return view('templates.site.borrowings.index');
    });
});

Route::get('test-access',function (){
    return view('templates.site.test_access');
});

Route::get('portfolio',function (){
    return view('templates.site.portfolio.portfolio');
});

Route::get('reviews',function (){
    return view('templates.site.reviews');
});

Route::get('check-reference',function (){
   return view('templates.site.check_reference');
});

Route::get('login',function (){
    return view('templates.site.auth.login');
});
Route::get('reset-password',function (){
    return view('templates.site.auth.reset_password');
});

Route::group([
    'prefix' => 'auth'
],function (){
     Route::post('login',[AuthController::class,'login']);
});

Route::group([
    'prefix' => 'password',
    'middleware' => 'verifyToken'
],function (){
    Route::get('new',function (Request $request){
        $token = $request->token;
        return view('templates.site.auth.new_password',['token' => $token]);
    });
    Route::post('new',[ResetPasswordController::class, 'newPassword']);
});

Route::group([
    'prefix' => 'mail'
],function (){
    Route::post('reset-password',[ResetPasswordController::class, 'resetPassword']);
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['web','auth','role:admin']
],function (){
    Route::group([
        'prefix' => 'portfolio'
    ],function (){
        Route::get('students',function (){
            return view('templates.dashboard.portfolio.students');
        });
        Route::get('teachers',function (){
           return view('templates.dashboard.portfolio.teachers');
        });
    });

    Route::group([
        'prefix' => 'settings'
    ],function (){
        Route::get('organizations-structure',function (){
             return view('templates.dashboard.settings.organizations_structure');
        });
        Route::get('access',function (){
           return view('templates.dashboard.settings.access');
        });
        Route::get('invite-codes',function (){
           return view('templates.dashboard.settings.invite_codes');
        });
        Route::get('handbook-management',function (){
            return view('templates.dashboard.settings.handbook_management');
        });
        Route::get('integration',function (){
           return view('templates.dashboard.settings.integration');
        });
        Route::get('api',function (){
            return view('templates.dashboard.settings.api');
        });
    });

    Route::group([
        'prefix' => 'works'
    ],function (){
        Route::get('student',function (){
            return view('templates.dashboard.works.student');
        });
        Route::get('employee',function (){
            return view('templates.dashboard.works.employee');
        });
    });

    Route::get('report',function (){
        return view('templates.dashboard.report');
    });
    Route::get('documentation',function (){
        return view('templates.dashboard.documentation');
    });
});







