<?php
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Performance;

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


