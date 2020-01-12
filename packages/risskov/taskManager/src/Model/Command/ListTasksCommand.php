<?php 

namespace Risskov\TaskManager\Model\Command;

class ListTasksCommand
{
	private $userId;
	
	public function getUserId()
	{
		return $this->userId;
	}
	
	public function setUserId($value)
	{
		$this->userId=$value;
	}
}