<?php

namespace Modules\Competition\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Competitor extends Model
{

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Competition\Database\factories\CompetitorFactory::new();
    }

    public static function IsAppliedCompetition($competition_id)
    {
        if (auth()->check()) {
            $competitorDetails = Competitor::where('competition_id',$competition_id)
                ->where('user_id',auth()->user()->id)
                ->first();
            return $competitorDetails;
        }else{
            return null;
        }
    }
}
