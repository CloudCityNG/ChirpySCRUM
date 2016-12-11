<?php
namespace App\Services\TodoApi\Features;

use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\TodoApi\Jobs\SaveTaskToDBJob;
use App\Domains\TodoApi\Jobs\ValidateStoreTodoInputJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class StoreTodoFeature extends Feature
{
    public function handle(Request $request)
    {
        $input  = $request->all();

        $input  = $this->run(ValidateStoreTodoInputJob::class, compact('input'));

//        unset($input['due_date']);

        $result = $this->run(SaveTaskToDBJob::class, compact('input'));

        return $this->run(new RespondWithJsonJob($result));
    }
}
