<?php 

namespace Risskov\TaskManager\Model;

use Risskov\TaskManager\Model\Entities\Task;

class TaskRepository implements ITaskRepository
{
	
	public function persist(Task $task)
	{
		$task->save();
	}
	
	public function getByUserId($userId)
	{
		return Task::where('user_id', $userId)->get();
	}
	
	public function findAll()
	{
		return Task::all();
	}
	
	public function findByPk($id)
	{
		return Task::find($id);
	}
}