<?php
namespace App\Domains\TodoApi\Jobs;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Validator;
use Lucid\Foundation\Job;

class ValidateStoreTodoInputJob extends Job
{
    use ValidatesRequests;
    /**
     * input to validate
     * @var
     */
    private $input;

    public function __construct($input)
    {
        $this->input    = $input;
    }

    /**
     * Validates input sent to store a new task
     *
     * @param Request $request
     * @return array
     */
    public function handle(Request $request)
    {
        $rule   = [
            'subject'           => 'required|unique:tasks',
            'parent_task_id'    => 'integer',
            'status'            => 'present'
        ];

        $message    = [
            'parent_task_id.integer'    => 'Kindly select a correct parent task',
        ];

        $this->validate($request, $rule, $message);

        return $request->all();
    }
}
