<?php
namespace App\Services\TodoApi\Features;

use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Todo\Jobs\SaveTaskToDBJob;
use App\Domains\Todo\Jobs\ValidateStoreTodoInputJob;
use Carbon\Carbon;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class StoreTodoFeature extends Feature
{
    public function handle(Request $request)
    {
        $input  = $request->all();

        $input  = $this->run(ValidateStoreTodoInputJob::class, compact('input'));

        unset($input['due_date']);

        $result = $this->run(SaveTaskToDBJob::class, compact('input'));

        return $this->run(new RespondWithJsonJob($result));
    }
}
