<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GetTab extends Model
{
    protected $fillable = [
        'getall_id',
        'icon',
        'tab_title',
        'tab_description'
    ];

    public function getall()
    {
        return $this->belongsTo(Getall::class);
    }
}

