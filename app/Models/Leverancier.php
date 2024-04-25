<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    use HasFactory;

    protected $table = 'leveranciers';

    protected $fillable = [
        'id',
        'naam',
        'contactPersoon',
        'leverancierNummer',
        'mobiel'
    ];

    // One to one relationship with contact
    public function contact()
    {
        return $this->hasOne(Contact::class, 'leveranciersId');
    }
}
