<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'users';

    protected $guarded =[];
    public function profile():HasOne{
        return $this->hasOne(CustomerProfile::class);
    }
}
