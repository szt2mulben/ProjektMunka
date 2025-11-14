<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperatingSystem extends Model
{
    protected $fillable = ['nev'];

    public function laptops()
    {
        return $this->hasMany(Laptop::class);
    }

}
