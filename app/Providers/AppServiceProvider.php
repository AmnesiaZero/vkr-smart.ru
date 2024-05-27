<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(HelperServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $repositories = [
            'Organization' => 'Organizations',
            'OrganizationYear' => 'OrganizationsYears',
            'User' => 'Users',
            'Faculty' => 'Faculties',
            'Department' => 'Departments',
            'Program' => 'Programs',
            'Specialty' => 'Specialties',
            'ProgramSpecialty' => 'ProgramsSpecialties',
            'Role' => 'Roles',
            'InviteCode' => 'InviteCodes',
            'Work' => 'Works'
        ];

        foreach ($repositories as $k => $v) {
            $this->app->bind('App\\Services\\' . $v . '\\Repositories\\' . $k . 'RepositoryInterface',
                'App\\Services\\' . $v . '\\Repositories\\Eloquent' . $k . 'Repository');
        }

    }
}
