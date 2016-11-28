<?php
namespace App\Domains\TodoApi\Jobs;

use Illuminate\Http\Request;
use Lucid\Foundation\Job;

class TaskByAuthJob extends Job
{
    protected $id;

    public function __construct($id)
    {
        $this->id   = $id;
    }

    public function handle(Request $request)
    {
        return $request->user()->createdTasks->where('id', $this->id)->first();
    }
}
