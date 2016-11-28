<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class CreateTodoFeature extends Feature
{
    public function handle(Request $request)
    {
        return $request->user();
    }
}
