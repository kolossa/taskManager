<?php 

namespace Risskov\TaskManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Risskov\TaskManager\Model\Application\ListUserTasksApplication;
use Risskov\TaskManager\Model\Command\ListTasksCommand;

class ListUserTasksController extends Controller
{
    public function __invoke(Request $request, ListUserTasksApplication $userApplication)
    {
		$user=\Auth::user();
		
		$command=new ListTasksCommand();
		$command->setUserId($user->id);
		$result=$userApplication->execute($command);
		
		return view('taskManager::listUserTasks', compact('result'));
    }
}