<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsPerAllergeen extends Model
{
    use HasFactory;

    protected $table = 'productsPerAllergeens';

    protected $fillable = [
        'id',
        'productsId',
        'allergeensId'
    ];
}
