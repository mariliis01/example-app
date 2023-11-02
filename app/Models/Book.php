<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    
    public function author(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    
    use HasFactory;
    public function orders(): HasMany
    {
    return $this->hasMany(Order::class);
    }
    

 }
