<?php

namespace Modules\Competition\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Performance extends Model
{

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Competition\Database\factories\PerformanceFactory::new();
    }
}
