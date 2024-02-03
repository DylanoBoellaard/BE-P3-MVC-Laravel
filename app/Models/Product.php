<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'naam',
        'barcode',
    ];

    public function productsPerLeveranciers()
    {
        return $this->hasMany(ProductsPerLeverancier::class, 'productsId');
    }
}
