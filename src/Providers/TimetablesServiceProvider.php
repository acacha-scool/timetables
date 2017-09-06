<?php

namespace Scool\Timetables\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class TimetablesServiceProvider.
 *
 * @package Scool\Timetables\Providers
 */
class TimetablesServiceProvider extends ServiceProvider
{
    /**
     * Register package services.
     */
    public function register()
    {
        if (!defined('SCOOL_TIMETABLES_PATH')) {
            define('SCOOL_TIMETABLES_PATH', realpath(__DIR__.'/../../'));
        }

        $this->app->bind('Timetables', function () {
            return new \Scool\Timetables\Timetables();
        });
    }

    /**
     * Bootstrap package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrations();
    }

    /**
     * Load migrations.
     */
    private function loadMigrations()
    {
        $this->loadMigrationsFrom(SCOOL_TIMETABLES_PATH . '/database/migrations');
    }

}