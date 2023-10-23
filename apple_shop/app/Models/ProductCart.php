<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCart extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_carts';

    protected $guarded =[];
    public function product():BelongsTo{
        return $this->belongsTo(Product::class);
    }
}
