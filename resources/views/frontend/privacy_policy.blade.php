@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/about_us.css') }}">
@endpush


@section('content')

<div class="container-fluid p-0 banner privacy-banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8" style="padding-top: 11rem">
                <h1 class="title" style="font-size: 70px;">Privacy Policy</h1>
                <h2 class="d-none">Privacy Policy</h2>
            </div>
        </div>
    </div>
</div>


<div class="container my-5 cookie">
    <div class="row">
        <div class="col-12">
            <h5 class="font-weight-bold">Privacy Policy for AQO Sports and Entertainment</h5>

            <p style="font-size: 0.95rem;">At AQOSE, accessible from www.AQOSE.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by AQOSE and how we use it.</p>

            <p style="font-size: 0.95rem;">If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

            <p style="font-size: 0.95rem;">This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in AQOSE. This policy is not applicable to any information collected offline or via channels other than this website.</p>

            <h6 class="font-weight-bold mt-4">Consent</h6>
            <p style="font-size: 0.95rem;">By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Information we collect</h6>
            <p style="font-size: 0.95rem;">The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information. If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide. When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>

            <h6 class="font-weight-bold mt-3 mb-1">How we use your information</h6>
            <p style="font-size: 0.95rem;">We use the information we collect in various ways, including to:</p>

            <ul class="ml-5" style="list-style-type: disc">
                <li>Provide, operate, and maintain our website</li>
                <li>Improve, personalize, and expand our website</li>
                <li>Understand and analyze how you use our website</li>
                <li>Develop new products, services, features, and functionality</li>
                <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
                <li>Send you emails</li>
                <li>Find and prevent fraud</li>
            </ul>

            <h6 class="font-weight-bold mt-3 mb-1">Log Files</h6>
            <p style="font-size: 0.95rem;">AQOSE follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Cookies</h6>
            <p style="font-size: 0.95rem;">Like any other website, AQOSE uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>
            <p style="font-size: 0.95rem;">For more general information on cookies, please read more on the <a href="{{ route('frontend.cookie_policy') }}">Cookie Policy</a>.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Our Advertising Partners</h6>
            <p class="mb-0" style="font-size: 0.95rem;">Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data.</p>
            <p class="mb-3" style="font-size: 0.95rem;">Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on AQOSE, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

            <p>Note that AQOSE has no access to or control over these cookies that are used by third-party advertisers.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Third Party Privacy Policies</h6>
            <p class="mb-0" style="font-size: 0.95rem;">AQOSE's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>
            <p class="mb-3" style="font-size: 0.95rem;">You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>

            <h6 class="font-weight-bold mt-3 mb-1">GDPR Data Protection Rights</h6>
            <p style="font-size: 0.95rem;">We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
            <p style="font-size: 0.95rem;">The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
            <p style="font-size: 0.95rem;">The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
            <p style="font-size: 0.95rem;">The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
            <p style="font-size: 0.95rem;">The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
            <p style="font-size: 0.95rem;">The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
            <p style="font-size: 0.95rem;">The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
            <p style="font-size: 0.95rem;">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Children's Information</h6>
            <p style="font-size: 0.95rem;">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity. AQOSE does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Changes to this Privacy Policy</h6>
            <p style="font-size: 0.95rem;">We may update this Privacy Policy over time to reflect changes in how we manage information or changes in the functionality of our site. We will notify you about material changes to this Privacy Policy by placing the updated Privacy Policy on the site and/or contacting you using any contact information that you have provided us, as appropriate for the nature of the changes made, and we will indicate the date on which the Privacy Policy was most recently updated. Your continued use of the site after we modify the Privacy Policy indicates that you accept these changes and is governed by the practices described in the updated Privacy Policy. We encourage you to periodically review this page for the latest information on our privacy practices.</p>

            <h6 class="font-weight-bold mt-3 mb-1">Access to your information</h6>
            <p style="font-size: 0.95rem;">You can access and update the personal information you have provided on our website by contacting through the address listed on our website. You can also forward your complaints, questions or queries if any, about our use of your personal data to the same address. We will investigate all complaints received and will endeavor to respond to complaints promptly.</p>
        </div>
    </div>
</div>
@endsection
