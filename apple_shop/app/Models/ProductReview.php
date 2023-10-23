<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductReview extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_reviews';

    protected $guarded =[];

    public function profile():BelongsTo{
        return $this->belongsTo(CustomerProfile::class);
    }
}
