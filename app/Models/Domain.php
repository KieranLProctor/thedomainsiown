<?php

namespace App\Models;

use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Domain extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'top_level_domain_id',
        'registrar_id',
        'registered_date',
        'yearly_cost',
        'will_autorenew',
        'has_ssl_certificate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'registered_date' => 'date',
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('name', 'like', '%'.$search.'%');
    }

    public function registrar(): BelongsTo
    {
        return $this->belongsTo(Registrar::class);
    }

    public function topLevelDomain(): BelongsTo
    {
        return $this->belongsTo(TopLevelDomain::class);
    }

    public function getFullDomainAttribute(): string
    {
        $hasSSLCertificate = $this->has_ssl_certificate ? 'https://' : 'http://';

        return "{$hasSSLCertificate}{$this->name}.{$this->topLevelDomain->name}";
    }

    public function getFormattedYearlyCostAttribute(): int
    {
        return $this->yearly_cost / 100;
    }
}
