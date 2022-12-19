<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todoitem extends Model
{
    use HasFactory;

    protected $table = 'todoitems';
    protected $fillable = [
        'text',
        'user_id',
        'complete',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function switchComplete()
    {
        $this->complete = !$this->complete;
        $this->save();
    }

    public function changeText($text)
    {
        $this->text = $text;
        $this->save();
    }
}
