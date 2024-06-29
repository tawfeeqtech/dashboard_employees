<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country_code', 'name',];

    //the Country hasMany State
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
