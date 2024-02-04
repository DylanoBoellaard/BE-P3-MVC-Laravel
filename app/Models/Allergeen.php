<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergeen extends Model
{
    use HasFactory;

    protected $table = 'allergeens';

    protected $fillable = [
        'id',
        'naam',
        'omschrijving'
    ];
}
