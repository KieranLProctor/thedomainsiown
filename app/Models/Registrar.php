<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registrar extends Model
{
    use HasFactory;

    /**
     * Return the domains registered under this registrar.
     *
     * @return HasMany
     */
    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
}
