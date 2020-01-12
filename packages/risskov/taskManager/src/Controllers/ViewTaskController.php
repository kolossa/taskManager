<?php

namespace Risskov\TaskManager\Controllers;

use App\Http\Controllers\Controller;
use Risskov\TaskManager\Services\ConvertTaskToDTO;
use Illuminate\Support\Facades\Gate;

class ViewTaskController extends Controller
{
    public function __invoke($id, ConvertTaskToDTO $converter)
    {
		$taskDTO=$converter->convertById($id);
		Gate::authorize('task-owner', $taskDTO->getUserId());
		
		
		return view('taskManager::view', compact('taskDTO'));
    }
}