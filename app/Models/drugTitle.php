<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class drugTitle extends Model
{
    //
    protected $table = 'drug_titles';
    protected $guarded = [];

    public function drug()
    {
        return $this->belongsTo(Drug::class, 'drug_id', 'id');
    }
}
