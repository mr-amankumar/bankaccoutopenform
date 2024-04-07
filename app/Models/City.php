<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    use HasFactory;
    protected $table='city';
    protected $fillable=['city_code','city_name','city_state_code'];



    public function state()
    {
        return $this->belongsTo(State::class, 'city_state_code', 'id');
    }

}
