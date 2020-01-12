<?php 

namespace Risskov\TaskManager\Model\Application;


use Risskov\TaskManager\Model\ITaskRepository;
use Risskov\TaskManager\Model\Command\ListTasksCommand;
use Risskov\TaskManager\Model\TaskDTOFactory;

class ListUserTasksApplication
{
	
	private $repository;
	private $taskDTOFactory;
	
	public function __construct (ITaskRepository $repository, TaskDTOFactory $taskDTOFactory)
	{
		$this->repository=$repository;
		$this->taskDTOFactory=$taskDTOFactory;
	}
	
	public function execute(ListTasksCommand $taskCommand)
	{
		$result=[];
		$tasks=$this->repository->getByUserId($taskCommand->getUserId());
		
		foreach($tasks as $task)
		{
			$result[]=$this->taskDTOFactory->createByTask($task);
		}
		
		return $result;
	}
}