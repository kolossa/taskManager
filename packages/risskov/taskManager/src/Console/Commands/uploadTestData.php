<?php

namespace Risskov\TaskManager\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class uploadTestData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:test-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload data to test the system.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		DB::table('tasks')->insert([
			['title'=>'task 1', 'content'=>'task 1 description', 'status'=>'new', 'user_id'=>1, 'created_at'=>date('Y-m-d H:i:s')],
			['title'=>'task 2', 'content'=>'task 2 description', 'status'=>'new', 'user_id'=>1, 'created_at'=>date('Y-m-d H:i:s')],
			['title'=>'task 3', 'content'=>'task 3 description', 'status'=>'new', 'user_id'=>1, 'created_at'=>date('Y-m-d H:i:s')],
			['title'=>'task 4', 'content'=>'task 4 description', 'status'=>'new', 'user_id'=>1, 'created_at'=>date('Y-m-d H:i:s')],
			['title'=>'task 5', 'content'=>'task 5 description', 'status'=>'new', 'user_id'=>2, 'created_at'=>date('Y-m-d H:i:s')],
			['title'=>'task 6', 'content'=>'task 6 description', 'status'=>'new', 'user_id'=>2, 'created_at'=>date('Y-m-d H:i:s')],
		]);
    }
}
