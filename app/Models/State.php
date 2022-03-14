<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = ['country_id', 'name'];

    //to get        country_name and country_code
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    //the State hasMany City
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
