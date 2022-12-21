<?php

namespace App\Http\Controllers;

use App\Models\Todoitem;
use App\Http\Requests\StoreTodoitemRequest;
use App\Http\Requests\UpdateTodoitemRequest;

class TodoitemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('todolist.index', ['title' => 'Todo list']);
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
     * @param  \App\Http\Requests\StoreTodoitemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoitemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todoitem  $todoitem
     * @return \Illuminate\Http\Response
     */
    public function show(Todoitem $todoitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todoitem  $todoitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Todoitem $todoitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoitemRequest  $request
     * @param  \App\Models\Todoitem  $todoitem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoitemRequest $request, Todoitem $todoitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todoitem  $todoitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todoitem $todoitem)
    {
        //
    }
}
