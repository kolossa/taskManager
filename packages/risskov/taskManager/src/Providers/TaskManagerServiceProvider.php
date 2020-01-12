<?php

namespace Risskov\TaskManager\Providers;

use Illuminate\Support\ServiceProvider;

class TaskManagerServiceProvider extends ServiceProvider
{
	protected $namespace='';
	
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/../routes/web.php';
		
		$this->app->make('Risskov\TaskManager\Controllers\ViewTaskController');
		$this->app->make('Risskov\TaskManager\Controllers\CreateNewTaskController');
		$this->app->make('Risskov\TaskManager\Controllers\ListUserTasksController');
		$this->app->make('Risskov\TaskManager\Controllers\ListTasksController');
		$this->app->make('Risskov\TaskManager\Controllers\UpdateTaskController');
		
		$this->loadViewsFrom(__DIR__.'/../views', 'taskManager');
		
		$this->commands([
			\Risskov\TaskManager\Console\Commands\uploadTestData::class,
		]);
		
		
		
		
		$this->app->singleton('Risskov\TaskManager\Model\ITaskRepository', function ($app) {
			return new \Risskov\TaskManager\Model\TaskRepository();
		});
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}
