<?php
namespace App\Domains\TodoApi\Jobs;

use Illuminate\Http\Request;
use Lucid\Foundation\Job;

class ListTasksJob extends Job
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        $user   = $request->user();

        $tasksAuthCreated   = $user->createdTasks()->orderBy('updated_at', 'desc')->get();
        $taskAssignedToAuth = $user->assignedTasks()->orderBy('updated_at', 'desc')->get();

        return $tasksAuthCreated->merge($taskAssignedToAuth);
    }
}
