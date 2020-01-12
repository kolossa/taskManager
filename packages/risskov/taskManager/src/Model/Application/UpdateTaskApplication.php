<?php 

namespace Risskov\TaskManager\Model\Application;

use Risskov\TaskManager\Model\ITaskRepository;
use Risskov\TaskManager\Model\Command\UpdateTaskCommand;

class UpdateTaskApplication
{
	
	private $repository;
	
	public function __construct (ITaskRepository $repository)
	{
		
		$this->repository=$repository;
	}
	
	public function execute(UpdateTaskCommand $taskCommand)
	{
		$task=$this->repository->findByPk($taskCommand->getId());
		$task->title=$taskCommand->getTitle();
		$task->content=$taskCommand->getContent();
		$task->status=$taskCommand->getStatus();
		$task->user_id=$taskCommand->getUserId();
		$this->repository->persist($task);
		
		return $task->id;
	}
}