<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'name',
        'password',
    ];

    public function todoitems()
    {
        return $this->hasMany(Todoitem::class);
    }
}
