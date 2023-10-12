<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyMany;

class orders extends Model
{
    use HasFactory;

    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }

}


