<?php
namespace App\Services\TodoApi\Features;

use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\TodoApi\Jobs\TaskExistsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowTodoFeature extends Feature
{
    public $taskId;

    /**
     * ShowTodoFeature constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->taskId   = $id;
    }

    public function handle()
    {
        $task   = $this->run(TaskExistsJob::class, ['id' => $this->taskId]);

        if (!$task)
        {
            $data   = 'Task Not Found';
            $status = 403;

            return $this->run(new RespondWithJsonJob($data, $status));
        }

        return $this->run(new RespondWithJsonJob($task));

    }
}
