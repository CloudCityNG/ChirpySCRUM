<?php
namespace App\Services\TodoApi\Http\Controllers;

use App\Services\TodoApi\Features\DeleteTaskFeature;
use App\Services\TodoApi\Features\ListTasksFeature;
use App\Services\TodoApi\Features\ShowTodoFeature;
use App\Services\TodoApi\Features\StoreTodoFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of tasks.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function index(Request $request)
    {
        $request    = $request->only('chunkSize', 'offset');

        return $this->serve(ListTasksFeature::class, [
            'chunkSize' => isset($request['chunkSize']) ? (int) $request['chunkSize'] : null,
            'offset'    => isset($request['offset']) ? (int) $request['offset'] : null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        return $this->serve(StoreTodoFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->serve(ShowTodoFeature::class, compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->serve(DeleteTaskFeature::class, compact('id'));
    }
}
