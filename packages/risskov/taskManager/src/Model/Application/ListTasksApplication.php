<?php 

namespace Risskov\TaskManager\Model\Application;


use Risskov\TaskManager\Model\ITaskRepository;
use Risskov\TaskManager\Model\TaskDTOFactory;

class ListTasksApplication
{
	
	private $repository;
	private $taskDTOFactory;
	
	public function __construct (ITaskRepository $repository, TaskDTOFactory $taskDTOFactory)
	{
		$this->repository=$repository;
		$this->taskDTOFactory=$taskDTOFactory;
	}
	
	public function execute()
	{
		$result=[];
		$tasks=$this->repository->findAll();
		
		foreach($tasks as $task)
		{
			$result[]=$this->taskDTOFactory->createByTask($task);
		}
		
		return $result;
	}
}