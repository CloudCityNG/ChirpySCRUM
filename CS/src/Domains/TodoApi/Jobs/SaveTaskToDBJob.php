<?php
namespace App\Domains\TodoApi\Jobs;

use App\Data\Models\Task;
use App\Data\Repositories\Repository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Lucid\Foundation\Job;

class SaveTaskToDBJob extends Job
{
    protected $input;
    protected $repository;
    protected $carbon;

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
//        if ($this->input['due_date'])
//        {
            $this->setCarbon($this->input['due_date']);
            $this->input['due_date'] = $this->carbon->format('Y-m-d H:i:s');
//        }

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

    /**
     * instantiate Carbon
     *
     * @param $time
     * @param Carbon|null $carbon
     */
    public function setCarbon($time, Carbon $carbon = null)
    {
        $this->carbon   = $carbon ?: new Carbon($time);
    }
}
