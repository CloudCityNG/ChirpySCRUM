<?php
namespace App\Domains\TodoApi\Jobs;

use Illuminate\Http\Request;
use Lucid\Foundation\Job;

class ListTasksPaginatedJob extends Job
{
    public $chunkSize;
    public $offset;

    public function __construct($chunkSize, $offset)
    {
        $this->chunkSize    = $chunkSize;
        $this->offset       = $offset;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        $user   = $request->user();

        $tasksAuthCreated   = $user->createdTasks()
                                ->take($this->chunkSize)
                                ->skip($this->offset)
                                ->orderBy('updated_at', 'desc')
                                ->get();

        $taskAssignedToAuth = $user->assignedTasks()
                                ->take($this->chunkSize)
                                ->skip($this->offset)
                                ->orderBy('updated_at', 'desc')
                                ->get();

        return $tasksAuthCreated->merge($taskAssignedToAuth);
    }
}