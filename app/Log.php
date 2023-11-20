<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id',
        'tipe',
        'angka_input',
        'angka_output',
        'lama',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
