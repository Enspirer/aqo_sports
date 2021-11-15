@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/about_us.css') }}">
@endpush


@section('content')

<div class="container-fluid p-0 banner cookie-banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8" style="padding-top: 11rem">
                <h1 class="title" style="font-size: 70px;">Cookie Policy</h1>
                <h2 class="d-none">Cookie Policy</h2>
            </div>
        </div>
    </div>
</div>


<div class="container my-5 cookie">
    <div class="row">
        <div class="col-12">
            <h5 class="font-weight-bold">Cookie Policy</h5>

            <h6 class="font-weight-bold">Cookie Pop-up Banner</h6>
            <h6 class="font-weight-bold">This website uses cookies</h6>
            <p style="font-size: 0.95rem;">We use cookies to personalise content and ads, to provide social media features and to analyse our traffic. We also share information about your use of our site with our social media, advertising and analytics partners who may combine it with other information that you’ve provided to them or that they’ve collected from your use of their services.</p>

            <h6 class="font-weight-bold mt-4">Types of Cookies</h6>
            <h6 class="font-weight-bold mb-1">Necessary</h6>
            <p style="font-size: 0.95rem;">Necessary cookies help make a website usable by enabling basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Preferences</h6>
            <p style="font-size: 0.95rem;">Preference cookies enable a website to remember information that changes the way the website behaves or looks, like your preferred language or the region that you are in.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Statistics</h6>
            <p style="font-size: 0.95rem;">Statistic cookies help website owners to understand how visitors interact with websites by collecting and reporting information anonymously.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Marketing</h6>
            <p style="font-size: 0.95rem;">Marketing cookies are used to track visitors across websites. The intention is to display ads that are relevant and engaging for the individual user and thereby more valuable for publishers and third party advertisers.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Unclassified</h6>
            <p style="font-size: 0.95rem;">Unclassified cookies are cookies that we are in the process of classifying, together with the providers of individual cookies.</p>

            <h6 class="font-weight-bold mt-3 mb-1">About Cookies</h6>
            <p class="mb-0" style="font-size: 0.95rem;">Cookies are small text files that can be used by websites to make a user's experience more efficient. The law states that we can store cookies on your device if they are strictly necessary for the operation of this site. For all other types of cookies we need your permission.</p>
            <p class="mb-0" style="font-size: 0.95rem;">This site uses different types of cookies. Some cookies are placed by third party services that appear on our pages.</p>
            <p class="mb-0" style="font-size: 0.95rem;">You can at any time change or withdraw your consent from the <span class="font-weight-bold" style="color: #DCA10D">Cookie Declaration</span> on our website.</p>
            <p class="mb-0" style="font-size: 0.95rem;">Learn more about who we are, how you can contact us and how we process personal data in our  <span class="font-weight-bold" style="color: #DCA10D">Privacy Policy</span>.</p>
            <p class="mb-0" style="font-size: 0.95rem;">Please state your full name, ID details and date when you contact us regarding your consent.</p>
        </div>
    </div>
</div>
@endsection
