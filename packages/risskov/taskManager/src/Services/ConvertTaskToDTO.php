<?php 

namespace Risskov\TaskManager\Services;

use Risskov\TaskManager\Model\ITaskRepository;
use Risskov\TaskManager\Model\TaskDTOFactory;

class ConvertTaskToDTO
{
	private $taskRepository;
	private $factory;
	
	public function __construct(ITaskRepository $taskRepository, TaskDTOFactory $factory)
	{
		$this->taskRepository=$taskRepository;
		$this->factory=$factory;
	}
	
	public function convertById($id)
	{
		$task=$this->taskRepository->findByPk($id);
		return $this->factory->createByTask($task);
	}
	
}