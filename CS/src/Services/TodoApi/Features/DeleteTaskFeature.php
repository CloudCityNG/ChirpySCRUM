<?php
namespace App\Services\TodoApi\Features;

use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\TodoApi\Jobs\DeleteTaskJob;
use App\Domains\TodoApi\Jobs\TaskByAuthJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class DeleteTaskFeature extends Feature
{
    protected $id;

    public function __construct($id)
    {
        $this->id   = $id;
    }

    public function handle(Request $request)
    {
        $task   = $this->run(TaskByAuthJob::class, [
            'id'    => $this->id
        ]);

        if (!$task)
            return $this->run(new RespondWithJsonJob('Task Not Found.', 422));

        $isDeleted  = $this->run(DeleteTaskJob::class, compact('task'));

        return $isDeleted ? $this->run(new RespondWithJsonJob($this->id)) : $this->run(new RespondWithJsonJob('There was an Error'), 500);

    }
}
