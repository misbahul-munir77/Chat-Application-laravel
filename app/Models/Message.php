<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'pengirim_id',
        'penerima_id',
        'pesan'
    ];
}
