<?php 

namespace Risskov\TaskManager\Model\Application;

use Risskov\TaskManager\Model\TaskFactory;
use Risskov\TaskManager\Model\ITaskRepository;
use Risskov\TaskManager\Model\Command\CreateTaskCommand;

class CreateTaskApplication
{
	
	private $repository;
	private $factory;
	
	public function __construct (ITaskRepository $repository, TaskFactory $factory)
	{
		
		$this->repository=$repository;
		$this->factory=$factory;
	}
	
	public function execute(CreateTaskCommand $taskCommand)
	{
		
		$task=$this->factory->create();
		
		$task->title=$taskCommand->getTitle();
		$task->content=$taskCommand->getContent();
		$task->status=$taskCommand->getStatus();
		$task->user_id=$taskCommand->getUserId();
		$this->repository->persist($task);
		
		return $task->id;
	}
}