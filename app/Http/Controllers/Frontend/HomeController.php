<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\Competition\Entities\CompetitionCategory;
use Modules\Competition\Entities\Competition;
use App\Models\HomePage;
use App\Models\HomepageAd;
use App\Models\HomepageMultipleAd;


/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $competitionCategory = CompetitionCategory::all();
        $trendingCompetition = Competition::where('is_feature', 1)->get();
        $sliders = HomePage::orderBy('order','ASC')->get();
        $homepage_ad = HomepageAd::first();

        $left = HomepageMultipleAd::where('position','left')->first();
        $right = HomepageMultipleAd::where('position','right')->first();
        $middle_top = HomepageMultipleAd::where('position','middle_top')->first();
        $middle_bottom = HomepageMultipleAd::where('position','middle_bottom')->first();

        return view('frontend.index',[
            'competitionCategory' => $competitionCategory,
            'trendingCompetition' => $trendingCompetition,
            'sliders' => $sliders,
            'homepage_ad' => $homepage_ad,
            'left' => $left,
            'right' => $right,
            'middle_top' => $middle_top,
            'middle_bottom' => $middle_bottom
        ]);

    }

    public function facebook_news()
    {
        $xml=simplexml_load_file("http://fetchrss.com/rss/6163bb4465c6a34d4a4a1b536183976edb514653017bb6a2.xml") or die("Error: Cannot create object");
        $fb_news = [];
        foreach ($xml->channel->item as $key => $itemr)
        {
            array_push($fb_news,$itemr);
        }
        $last_fb_news = $fb_news[0];
        $doc = new \DOMDocument();
        $doc->loadHTML($last_fb_news->description);
        $xpath = new \DOMXPath($doc);
        $src = $xpath->evaluate("string(//img/@src)");
        $last_fb_news->image = $src;

        return json_encode($last_fb_news);

    }

    public function twitter_news()
    {
        $xml=simplexml_load_file("http://fetchrss.com/rss/6163bb4465c6a34d4a4a1b5361641714308e6f15f55a46a2.xml") or die("Error: Cannot create object");
        $fb_news = [];
        foreach ($xml->channel->item as $key => $itemr)
        {
            array_push($fb_news,$itemr);
        }
        // dd($fb_news);
        $last_fb_news = $fb_news[0];
        $doc = new \DOMDocument();
        $doc->loadHTML($last_fb_news->description);
        $xpath = new \DOMXPath($doc);
        $src = $xpath->evaluate("string(//img/@src)");
        $last_fb_news->image = $src;

        return json_encode($last_fb_news);
    }

}
