@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/about_us.css') }}">
@endpush


@section('content')

<div class="container-fluid p-0 banner about-banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6" style="padding-top: 8rem">
                <h1 class="title" style="font-size: 70px;">About</h1>
                <h1 style="font-size: 85px; color: white">AQOSE</h1>

                <h2 class="d-none">About AQOSE</h2>
            </div>
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-12 text-md-center">
            <p class="mb-1">AQO Sports and Entertainment is a purpose driven online platform that brings together a wide variety of talent and creativity from the Sporting and Creativity arenas along with passionate individuals from each specific genre to support and uplift the younger generations by harnessing and enhancing their skills, capabilities and talents. <br>AQOSE is a part of the AQO Foundation which has been established by Anna Marie Ondaatje to give back to the society by supporting individuals, matching their diverse needs with available resources, uplifting their lives and improving their livelihood.</p>
        </div>
    </div>
</div>


<div class="container-fluid vision-mission" style="margin-top: 7rem;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 vision">
                <div class="card border-0 custom-shadow" style="background-color: #f9f9f9; height: 13rem;">
                    <div class="card-body py-5 px-4 position-relative text-center">
                        <p class="position-absolute large-title" style="opacity: 0.05; top: -5rem; left: 16%; font-size: 7rem;font-weight: 600; line-height: 1.2; z-index: -1;">VISION</p>
                        <h1 class="card-title mb-2 position-absolute" style="font-size: 80px; top: -2.8rem; left: 25%;">VISION</h1>
                        <p class="card-text" style="line-height: 1.6rem; color: #76777a">To be a leading Sports & Entertainment platform that will allow to showcase skill and talent within an equal opportunity framework through proper development and delivery of a wide variety of sporting and entertainment opportunities.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mission">
                <div class="card border-0 custom-shadow" style="background-color: #f9f9f9; height: 13rem;">
                    <div class="card-body py-5 px-4 position-relative text-center">
                        <p class="position-absolute large-title" style="opacity: 0.05; top: -5rem; left: 8%; font-size: 7rem;font-weight: 600; line-height: 1.2; z-index: -1;">MISSION</p>
                        <h1 class="card-title mb-2 position-absolute" style="font-size: 80px; top: -2.8rem; left: 21%;">MISSION</h1>
                        <p class="card-text" style="line-height: 1.6rem; color: #76777a">AQO Sports and Entertainment is committed to providing world class sports and entertainment opportunities and activities for multiple audiences. AQOSE will celebrate the best in sport and entertainment, respecting diversity and humanity whilst working with the community to improve the lives of those involved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid why-us" style="background-color: #f9f9f9; margin-top: 6rem; margin-bottom: 5rem;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="card border-0" style="background-color: #f9f9f9;">
                    <div class="card-body position-relative">
                        <p class="position-absolute large-title" style="opacity: 0.05; top: 0rem; font-size: 7rem; font-weight: 350; line-height: 1.2;">Why Us?</p>
                        <h1 class="card-title mt-2 mt-md-4 mb-2" style="font-size: 70px;">Why Us?</h1>
                        <p class="card-text" style="line-height: 1.6rem; color: #76777a">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat obcaecati minima ut itaque nesciunt, vero velit eligendi accusamus voluptatum amet debitis? Ducimus illum voluptate delectus nesciunt accusantium dolorem, ipsam officiis provident omnis doloremque officia, rem molestias. Facilis porro minima quidem assumenda nesciunt nemo nihil reprehenderit alias voluptas eos veritatis ea, ducimus illum voluptatum nisi. Accusantium obcaecati possimus, rem sequi necessitatibus accusamus dolorem eius, fugit sunt aliquam saepe ducimus ab omnis asperiores quae illum sapiente ipsa? Quidem cum non libero tempore dolor, error ratione fugit quaerat molestias? Voluptatum, quae sint! Excepturi distinctio qui fuga quas id reprehenderit corporis suscipit laboriosam vitae?</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5 text-center position-relative side-image">
                <img src="{{url('aqo_se/assets/image/about_us/choose.png')}}" class="w-100 position-absolute" style="top: -4rem; right: 4rem;">
            </div>
        </div>
    </div>
</div>
@endsection
