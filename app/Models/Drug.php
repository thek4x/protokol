<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $table = 'drugs';
    protected $fillable = [
        'name',
        'description',
        'source_id'
    ];

    // public function source()
    // {
    //     return $this->belongsTo(Source::class);
    // }

    public function titles()
    {
        return $this->hasMany(drugTitle::class, 'drug_id', 'id');
    }

    public function scopeWithTitles(Builder $query)
    {
        return $query->with('titles');
    }
}
