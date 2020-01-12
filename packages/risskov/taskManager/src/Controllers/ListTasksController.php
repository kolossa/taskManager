<?php 

namespace Risskov\TaskManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Risskov\TaskManager\Model\Application\ListTasksApplication;

class ListTasksController extends Controller
{
    public function __invoke(Request $request, ListTasksApplication $application)
    {
		$result=$application->execute();
		
		return view('taskManager::listUserTasks', compact('result'));
    }
}