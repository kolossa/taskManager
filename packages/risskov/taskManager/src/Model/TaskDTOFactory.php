<?php 

namespace Risskov\TaskManager\Model;

use Risskov\TaskManager\Model\DTO\TaskDTO;
use Risskov\TaskManager\Model\Entities\Task;

class TaskDTOFactory
{
	public function create()
	{
		return new TaskDTO();
	}
	
	public function createByTask(Task $task)
	{
		$dto=$this->create();
		$dto->setId($task->id);
		$dto->setTitle($task->title);
		$dto->setContent($task->content);
		$dto->setStatus($task->status);
		$dto->setUserId($task->user_id);
		$dto->setCreatedAt($task->created_at->format('Y-m-d'));
		
		if($task->updated_at)
		{
			$dto->setUpdatedAt($task->updated_at->format('Y-m-d'));
		}
		
		return $dto;
	}
}
