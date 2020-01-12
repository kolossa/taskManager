<?php

namespace Risskov\TaskManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Risskov\TaskManager\Model\Application\UpdateTaskApplication;
use Risskov\TaskManager\Model\Command\UpdateTaskCommand;
use Risskov\TaskManager\Services\ConvertTaskToDTO;
use Illuminate\Support\Facades\Gate;
use Risskov\TaskManager\Model\Entities\Task;
use Illuminate\Validation\Rule;

class UpdateTaskController extends Controller
{
    public function __invoke($id, Request $request,ConvertTaskToDTO $converter, UpdateTaskApplication $application)
    {
		$taskDTO=$converter->convertById($id);
		
		Gate::authorize('task-owner', $taskDTO->getUserId());
		
		if ($request->isMethod('post')) 
		{
			$validatedData = $request->validate([
				'task.title' => 'required|max:255',
				'task.content' => 'required',
				'task.status' => [
					'required',
					Rule::in(array_keys(Task::getStatusLabels())),
				],
			]);
			
			$taskCommand=new UpdateTaskCommand();
			$taskCommand->setId($id);
			$taskCommand->setTitle($request->input('task.title'));
			$taskCommand->setContent($request->input('task.content'));
			$taskCommand->setStatus($request->input('task.status'));
			$taskCommand->setUserId(\Auth::user()->id);
		
			$taskId=$application->execute($taskCommand);
			return redirect()->action('\Risskov\TaskManager\Controllers\ViewTaskController', ['id'=>$taskId]);
		}
		
		
        
		return view('taskManager::form', compact('taskDTO'));
    }
}