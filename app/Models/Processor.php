<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
   protected $fillable = ['gyarto', 'tipus'];

    public function laptops()
    {
        return $this->hasMany(Laptop::class);
    }
}
