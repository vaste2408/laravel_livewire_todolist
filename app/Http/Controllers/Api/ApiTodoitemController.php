<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoitemRequest;
use App\Http\Requests\UpdateTodoitemRequest;
use App\Models\Todoitem;
use Illuminate\Http\Request;

class ApiTodoitemController extends Controller
{
    public function __construct()
    {
        $this->middleware('authtoken');
    }

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
        return Todoitem::create([
            'text' =>  $request->text,
            'user_id' => $request->token
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todoitem  $todoitem
     * @return \Illuminate\Http\Response
     */
    public function show(Todoitem $todoitem)
    {
        return Todoitem::findOrFailt($todoitem);
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
        $item = Todoitem::findOrFailt($todoitem);
        $item->text = $request->text;
        $item->complete = $request->complete ?? $item->complete;
        $item->save();
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todoitem  $todoitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todoitem $todoitem)
    {
        $item = Todoitem::findOrFailt($todoitem);
        if ($item->delete()) return response('Deleted', 204);
        return response('Delete failed', 403);
    }
}
