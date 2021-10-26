<?php

namespace Modules\Competition\Entities;

use App\Models\Auth\User;
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



    public static function getAppliedCompetitorsUsers($competitionID,$status)
    {
        $getCompetitions = Competitor::where('competition_id',$competitionID)
            ->where('competitor_status', $status)
            ->get();
        $output = [];
        foreach ($getCompetitions as $competionDetails)
        {
            $getUser = User::where('id',$competionDetails->user_id)->first();

            $outputAppend = [
                'competitor_name' => $getUser->first_name.' '.$getUser->last_name,
                'score' => $competionDetails->score,
                'votes' => $competionDetails->votes,
                'score_details' => $competionDetails->score,
                'competitor_id' => $competionDetails->id,
                'created_at' => $competionDetails->created_at,
            ];
            array_push($output,$outputAppend);
        }

       return $output;
    }
}
