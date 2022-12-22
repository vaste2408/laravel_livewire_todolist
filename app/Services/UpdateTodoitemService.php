<?php

namespace App\Services;

use App\Http\Requests\UpdateTodoitemRequest;
use App\Models\Todoitem;

class UpdateTodoitemService
{
    public static function update(Todoitem $todoitem, $text, $complete = null)
    {
        $item = Todoitem::findOrFail($todoitem->id);
        $item->text = $text;
        $item->complete = $complete ?? $item->complete;
        $item->save();
        return $item;
    }

    public static function viaRequest(UpdateTodoitemRequest $request, Todoitem $todoitem)
    {
        return self::update($todoitem, $request->text, $request->complete);
    }
}
