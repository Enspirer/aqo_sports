<?php
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Performance;
use Modules\Competition\Entities\Competitor;
use Modules\Competition\Entities\JudgmentMarks;
use App\Models\JudgeRequest;
use App\Models\CompetitionVotes;
use Modules\Competition\Entities\JudgeDetails;


if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can('view backend')) {
                return 'admin.dashboard';
            }

            return 'frontend.user.dashboard';
        }

        return 'frontend.index';
    }
}


if (! function_exists('check_module')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function get_module($module_name)
    {
        $module = Module::find($module_name);
        return $module;
    }
}


if (! function_exists('judge_marks_total')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function judge_marks_total($competitor_id, $mark_section,$round_name =null)
    {
        $competitiorDetails = Competitor::where('id',$competitor_id)->first();
        if($round_name)
        {
            $judgeMarks = JudgmentMarks::where('competitor_id',$competitor_id)
                ->where('competition_id',$competitiorDetails->competition_id)
                ->where('round_name',$round_name)
                ->get();
        }else{
            $judgeMarks = JudgmentMarks::where('competitor_id',$competitor_id)
                ->where('competition_id',$competitiorDetails->competition_id)
                ->get();
        }
        $finalout = [];
        foreach ($judgeMarks as $jmarks)
        {
            if ($jmarks)
            {
                if($jmarks->judge_score_details){
                    $json_decode = json_decode($jmarks->judge_score_details);
                    array_push($finalout,$json_decode);

                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        $finalycount =0;
        foreach ($finalout as $finalMark){

            foreach ($finalMark as $markItem)
            {
                $outArray = 0;
                if ($markItem->mark_section == $mark_section)
                {
                    $outArray  += (int)$markItem->score;
                }else{

                }
                $finalycount += $outArray;
            }
        }
        return $finalycount;
    }
}



if (! function_exists('round_total')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function round_total($competitor_id,$round_name =null)
    {
        $competitiorDetails = Competitor::where('id',$competitor_id)->first();

        $competition = Competition::where('id',$competitiorDetails->competition_id)->first();

        $jsonMarkSection =json_decode($competition->marks_sections);

        $outFunctiom =  0;

       foreach ($jsonMarkSection as $jsonmar)
       {

           $details = judge_marks_total($competitiorDetails->id,$jsonmar,$round_name);
           $outFunctiom += $details;
       }
      return $outFunctiom;
    }
}






if (! function_exists('stacker_pa')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function stacker_pa($competitor_id,$round_name =null)
    {
        $competitiorDetails = Competitor::where('id',$competitor_id)->first();

        $competition = Competition::where('id',$competitiorDetails->competition_id)->first();

        $jsonMarkSection =json_decode($competition->marks_sections);

        $outFunctiom =  0;

        foreach ($jsonMarkSection as $jsonmar)
        {

            $details = judge_marks_total($competitiorDetails->id,$jsonmar,$round_name);
            $outFunctiom += $details;
        }
        return $outFunctiom;
    }
}

if (! function_exists('get_competitor_all_score')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function get_competitor_all_score($competitor_id)
    {
        $competitiorDetails = Competitor::where('id',$competitor_id)->first();

        $competition = Competition::where('id',$competitiorDetails->competition_id)->first();

        $getRoundDetails = json_decode($competition->rounds_section);

        $finalOuts = 0;

        foreach ($getRoundDetails as $getRoundDetail)
        {
            $finalOuts += round_total($competitor_id,$getRoundDetail);
        }

        return $finalOuts;


    }
}




if (! function_exists('getScoreMarkSection')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function getScoreMarkSection($competitionID,$competitiorID,$markSection)
    {
        $module = Performance::where('competition_id',$competitionID)
        ->where('competitor_id',$competitiorID)
        ->where('round_name',$markSection)
        ->whereYear('created_at',date('Y'))
        ->first();

        if($module)
        {
            $outputArray = [
              'performance_id' => $module->id,
              'performance_link' => $module->performance_link,
              'performance_description' => $module->performance_description,
              'round_name' => $module->round_name,
              'full_score' => $module->full_score,
              'score_details' => $module->score_details,
              'created_at' => $module->created_at,
              'updated_at' => $module->updated_at,
              'competition_id' => $module->competition_id,
              'competitor_id' => $module->competitor_id,
            ];

            return $outputArray;
        }else{
            $outputArray = [
                'performance_id' => null,
                'performance_link' => null,
                'performance_description' => null,
                'round_name' => null,
                'full_score' => null,
                'score_details' => null,
                'created_at' => null,
                'updated_at' => null,
                'competition_id' => null,
                'competitor_id' => null,
            ];

            return $outputArray;
        }
    }
}


if (! function_exists('is_judge')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_judge($user_id)
    {
        $JudgeRequest = JudgeRequest::where('user_id',$user_id)
        ->where('status','Approved')
        ->first();
        
        if($JudgeRequest){
            return $JudgeRequest;
        }else{
            return null;
        }
    }
}

if (! function_exists('is_judge_requested')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_judge_requested($user_id)
    {
        $JudgeRequest = JudgeRequest::where('user_id',$user_id)->first();
        
        if($JudgeRequest){
            return $JudgeRequest;
        }else{
            return null;
        }
    }
}



if (! function_exists('is_voted')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_voted ($competitor_id, $competition_id)
    {
        $votes = CompetitionVotes::where('user_id', auth()->user()->id)->where('competitor_id', $competitor_id)->where('competition_id', $competition_id)->first();
        
        if($votes){
            return $votes;
        }else{
            return null;
        }
    }
}

if (! function_exists('is_judge_applied')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_judge_applied($user_id, $competition_id)
    {
        $JudgeApplied = JudgeDetails::where('user_id',$user_id)
        ->where('competition_id', $competition_id)
        ->first();
        
        if($JudgeApplied){
            return $JudgeApplied;
        }else{
            return null;
        }
    }
}


if (! function_exists('is_judge_applied_approved')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function is_judge_applied_approved($user_id, $competition_id)
    {
        $JudgeApproved = JudgeDetails::where('user_id',$user_id)
        ->where('competition_id', $competition_id)
        ->where('status', 1)
        ->first();
        
        if($JudgeApproved){
            return $JudgeApproved;
        }else{
            return null;
        }
    }
}


