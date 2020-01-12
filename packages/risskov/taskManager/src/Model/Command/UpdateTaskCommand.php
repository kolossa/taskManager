<?php 

namespace Risskov\TaskManager\Model\Command;

class UpdateTaskCommand
{
	private $id;
	private $title;
	private $content;
	private $status;
	private $userId;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($value)
	{
		$this->id=$value;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($value)
	{
		$this->title=$value;
	}
	
	public function getContent()
	{
		return $this->content;
	}
	
	public function setContent($value)
	{
		$this->content=$value;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function setStatus($value)
	{
		$this->status=$value;
	}
	
	public function getUserId()
	{
		return $this->userId;
	}
	
	public function setUserId($value)
	{
		$this->userId=$value;
	}
}