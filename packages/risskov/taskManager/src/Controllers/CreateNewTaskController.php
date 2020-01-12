<?php

namespace Risskov\TaskManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Risskov\TaskManager\Model\Application\CreateTaskApplication;
use Risskov\TaskManager\Model\TaskDTOFactory;
use Risskov\TaskManager\Model\Command\CreateTaskCommand;
use Risskov\TaskManager\Model\Entities\Task;
use Illuminate\Validation\Rule;

class CreateNewTaskController extends Controller
{
    public function __invoke(Request $request, CreateTaskApplication $application, TaskDTOFactory $taskDTOFactory)
    {
		$taskDTO=$taskDTOFactory->create();
		
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
			
			$taskCommand=new CreateTaskCommand();
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