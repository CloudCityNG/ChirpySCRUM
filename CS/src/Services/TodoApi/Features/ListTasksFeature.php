<?php
namespace App\Services\TodoApi\Features;

use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\TodoApi\Jobs\ListTasksJob;
use App\Domains\TodoApi\Jobs\ListTasksPaginatedJob;
use Lucid\Foundation\Feature;

class ListTasksFeature extends Feature
{
    /**
     * sends list in 'chunkSize' per batch
     *
     * @var int $chunkSize
     */
    private $chunkSize;

    /**
     * indicates the next batch to send
     *
     * @var int $offset
     */
    private $offset;

    public function __construct($chunkSize  = null, $offset = null)
    {
        $this->chunkSize    = $chunkSize;
        $this->offset       = $offset;
    }

    public function handle()
    {
        //if chunkSize is set get tasks for current batch
        //else get all tasks
        $allTasks  = $this->chunkSize ?
                        $this->run(ListTasksPaginatedJob::class, [
                            'chunkSize' => $this->chunkSize,
                            'offset'    => $this->offset,
                        ]) :
                        $this->run(ListTasksJob::class);

        //respond with json
        return $this->run(new RespondWithJsonJob($allTasks));
    }
}
