<?php

namespace App\Models;

use App\Models\CustomerProfile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory ;
    protected $table = 'users';

    protected $guarded =[];
    public function profile():HasOne{
        return $this->hasOne(CustomerProfile::class);
    }
}
