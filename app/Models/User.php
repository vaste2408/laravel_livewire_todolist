<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    use Uuids;

    protected $table = 'users';
    protected $fillable = [
        'id',
        'name',
        'password',
    ];

    public function todoitems()
    {
        return $this->hasMany(Todoitem::class);
    }
}
