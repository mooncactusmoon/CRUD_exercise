<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'account_info';
    protected $fillable = [
        'account',
        'name',
        'gender',
        'birthday',
        'email',
        'remark',
    ];

    protected $casts = [
        'birthday' => 'datetime:Y-m-d',
    ];
}
