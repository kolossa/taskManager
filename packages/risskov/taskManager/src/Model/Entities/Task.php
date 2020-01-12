<?php

namespace Risskov\TaskManager\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS_NEW='new';
    const STATUS_IN_PROGRESS='in_progress';
    const STATUS_DONE='done';
    const STATUS_CANCELLED='cancelled';
	
	protected $table = 'tasks';
	protected $primaryKey = 'id';
	
	public static function getStatusLabels(){
		
		return [
			self::STATUS_NEW=>'New',
			self::STATUS_IN_PROGRESS=>'In progress',
			self::STATUS_DONE=>'Done',
			self::STATUS_CANCELLED=>'Cancelled',
		];
	}
}
