<?php 

Route::group(['middleware' => ['web']], function () {
	Route::get('task-manager/view/{id}', 'Risskov\TaskManager\Controllers\ViewTaskController')->middleware('auth');
	Route::get('task-manager/create', 'Risskov\TaskManager\Controllers\CreateNewTaskController')->middleware('auth');
	Route::post('task-manager/create', 'Risskov\TaskManager\Controllers\CreateNewTaskController')->middleware('auth');
	Route::get('task-manager/update/{id}', 'Risskov\TaskManager\Controllers\UpdateTaskController')->middleware('auth');
	Route::post('task-manager/update/{id}', 'Risskov\TaskManager\Controllers\UpdateTaskController')->middleware('auth');
	Route::get('task-manager/list-user-tasks', 'Risskov\TaskManager\Controllers\ListUserTasksController')->middleware('auth');
	
});

Route::group(['middleware' => ['web', 'admin']], function () {
	Route::get('task-manager/list-tasks', 'Risskov\TaskManager\Controllers\ListTasksController')->middleware('admin');
});
