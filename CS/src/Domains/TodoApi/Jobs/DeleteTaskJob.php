<?php
namespace App\Domains\TodoApi\Jobs;

use Lucid\Foundation\Job;

class DeleteTaskJob extends Job
{
    protected $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function handle()
    {
        return $this->task->delete();
    }
}
