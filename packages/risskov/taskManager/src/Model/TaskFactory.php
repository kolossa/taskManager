<?php 

namespace Risskov\TaskManager\Model;

use Risskov\TaskManager\Model\Entities\Task;

class TaskFactory{
	
	public function create(){
		
		return new Task();
	}
}