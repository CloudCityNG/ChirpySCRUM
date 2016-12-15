<?php
namespace App\Domains\TodoApi\Jobs;

use App\Data\Models\Task;
use Lucid\Foundation\Job;

/**
 * Class TaskExistsJob
 *
 * returns task if exists or false if not
 *
 * @package App\Domains\TodoApi\Jobs
 * @author iemarjay <emarjay921@gmail.com>
 */
class TaskExistsJob extends Job
{
    public $taskId;

    /**
     * TaskExistsJob constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->taskId   = $id;
    }

    public function handle(Task $taskModel)
    {
        return $taskModel->find($this->taskId);
    }
}
