<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $fillable = [
        'gyarto','tipus','kijelzo','memoria','merevlemez','videovezerlo',
        'ar','processor_id','operating_system_id','db'
    ];

    public function processor()
    {
        return $this->belongsTo(Processor::class, 'processor_id');
    }

    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class, 'operating_system_id');
    }
}
