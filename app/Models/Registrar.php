<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registrar extends Model
{
    use HasFactory;

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('name', 'like', '%'.$search.'%');
    }

    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class);
    }
}
