<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoitemRequest;
use App\Http\Requests\UpdateTodoitemRequest;
use App\Models\Todoitem;
use App\Services\CreateTodoitemService;
use App\Services\UpdateTodoitemService;
use Illuminate\Http\Request;

class ApiTodoitemController extends Controller
{
    public function index(Request $request)
    {
        return Todoitem::where(['user_id' => $request->token])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoitemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoitemRequest $request)
    {
        return CreateTodoitemService::viaRequest($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todoitem  $todoitem
     * @return \Illuminate\Http\Response
     */
    public function show(Todoitem $todoitem)
    {
        return Todoitem::findOrFail($todoitem->id);
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
        return UpdateTodoitemService::viaRequest($request, $todoitem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todoitem  $todoitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todoitem $todoitem)
    {
        $item = Todoitem::findOrFail($todoitem->id);
        if ($item->delete()) return response('Deleted', 204);
        return response('Delete failed', 403);
    }
}
