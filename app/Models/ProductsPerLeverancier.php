<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsPerLeverancier extends Model
{
    use HasFactory;

    protected $table = 'productsPerLeveranciers';

    protected $fillable = [
        'id',
        'leveranciersId',
        'productsId',
        'datumLevering',
        'aantal',
        'datumEerstVolgendeLevering'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productsId');
    }

    public function leverancier()
    {
        return $this->belongsTo(Leverancier::class, 'leveranciersId');
    }
}
