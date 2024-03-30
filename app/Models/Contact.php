<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'id',
        'leveranciersId',
        'straat',
        'huisnummer',
        'postcode',
        'stad'
    ];

    // Inverse One to one relationship with leverancier
    public function leverancier()
    {
        return $this->belongsTo(Leverancier::class, 'leveranciersId');
    }
}
