<?php
namespace App\Domains\Todo\Jobs;

use App\Data\Models\Task;
use App\Data\Repositories\Repository;
use Illuminate\Http\Request;
use Lucid\Foundation\Job;

class SaveTaskToDBJob extends Job
{
    protected $input;
    protected $repository;

    public function __construct($input)
    {
        $this->input    = $input;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        return $request->user()->createdTasks()->create($this->input);
    }

    /**
     * @param $model
     * @param null $repository
     */
    public function setRepository($model, $repository = null)
    {
        $this->repository = $repository?: new Repository($model);
    }
}
