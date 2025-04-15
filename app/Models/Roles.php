<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    protected $fillable = ['name'];

    /** @use HasFactory<\Database\Factories\RolesFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsToMany(User::class, 'role_id');
    }
}
