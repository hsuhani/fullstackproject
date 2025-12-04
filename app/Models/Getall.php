<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Getall extends Model
{
    protected $fillable = ['title', 'description'];

    public function tabs()
    {
        return $this->hasMany(GetTab::class);
    }
}
