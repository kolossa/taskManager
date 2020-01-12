<?php 

namespace Risskov\TaskManager\Model;

use Risskov\TaskManager\Model\Entities\Task;

interface ITaskRepository
{
	public function persist(Task $task);
	public function getByUserId($userId);
	public function findAll();
	public function findByPk($id);
}