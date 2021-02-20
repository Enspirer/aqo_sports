<?php

namespace Modules\Competition\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JudgeDetails extends Model
{

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Competition\Database\factories\JudgeDetailsFactory::new();
    }


    public static function getJudgeCompetition($userID)
    {
        $judgeDetails = JudgeDetails::where('user_id',$userID)
            ->get();



        $OutputID = [];
        if(count($judgeDetails) != 0)
        {
            foreach ($judgeDetails as $jDetails)
            {
                array_push($OutputID,$jDetails->competition_id);

            }
        }

        return $OutputID;

    }



}
