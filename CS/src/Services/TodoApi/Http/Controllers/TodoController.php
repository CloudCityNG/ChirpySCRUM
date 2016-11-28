<?php
namespace App\Services\TodoApi\Http\Controllers;

use App\Services\TodoApi\Features\DeleteTaskFeature;
use App\Services\TodoApi\Features\ListTasksFeature;
use App\Services\TodoApi\Features\StoreTodoFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of tasks.
     *
     * @param int|null $chunkSize
     * @param int|null $offset
     *
     * @return \Illuminate\Http\Response
     */
    public function index($chunkSize  = null, $offset = null)
    {
        return $this->serve(ListTasksFeature::class, [
            'chunkSize'     => (int) $chunkSize,
            'offset'  => (int) $offset
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
        //
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
        $this->serve(DeleteTaskFeature::class, compact('id'));
    }
}
