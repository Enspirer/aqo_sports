@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))


@push('after-styles')
    <link rel="stylesheet" href="{{ url('aqo_se/Styles/css/about_us.css') }}">
@endpush


@section('content')

<div class="container-fluid p-0 banner">
    <div class="container">
        <div class="row">
            <div class="col-6" style="padding-top: 8rem">
                <h1 style="font-size: 70px;">About</h1>
                <h1 style="font-size: 85px;">AQOSE</h1>
            </div>
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, totam. Fuga eum voluptatem rerum placeat repellendus, illum quidem provident ullam impedit eligendi quae assumenda suscipit blanditiis corrupti deserunt quisquam alias laudantium sunt commodi consequuntur! Nulla harum tenetur autem ipsam error ab eligendi? Sunt sint quis est similique, vero distinctio. Nesciunt quae neque eos ea culpa eveniet enim consectetur, saepe provident quasi dolor labore fugit, accusantium deserunt nobis nulla quis esse est fugiat, recusandae optio similique. Ducimus ipsum error vitae, eveniet aperiam labore ab dolorum officiis fugit dolorem corporis animi necessitatibus cupiditate voluptate odit sed reprehenderit deserunt iure explicabo hic id doloremque. Sed rerum nulla, eligendi quos aliquam, error laudantium officiis corrupti, eos dicta quia voluptatem officia animi ut repellat.</p>
        </div>
    </div>
</div>


<div class="container-fluid" style="margin-top: 7rem;">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card border-0 custom-shadow" style="background-color: #f9f9f9;">
                    <div class="card-body py-5 px-4 position-relative text-center">
                        <p class="position-absolute large-title" style="opacity: 0.05; top: -5rem; left: 16%; font-size: 7rem;font-weight: 600; line-height: 1.2; z-index: -1;">VISION</p>
                        <h1 class="card-title mb-2 position-absolute" style="font-size: 80px; top: -2.8rem; left: 25%;">VISION</h1>
                        <p class="card-text" style="line-height: 1.6rem; color: #76777a">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem ipsum pariatur natus architecto ullam odio doloremque perferendis dolore incidunt tempora cupiditate temporibus numquam quisquam nesciunt, sed unde consequatur officia voluptatum necessitatibus asperiores, neque ipsa minus? Molestias enim perferendis quisquam mollitia alias at molestiae necessitatibus, voluptas in repudiandae! Dolores culpa veritatis quibusdam voluptate voluptas</p>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card border-0 custom-shadow" style="background-color: #f9f9f9;">
                    <div class="card-body py-5 px-4 position-relative text-center">
                        <p class="position-absolute large-title" style="opacity: 0.05; top: -5rem; left: 8%; font-size: 7rem;font-weight: 600; line-height: 1.2; z-index: -1;">MISSION</p>
                        <h1 class="card-title mb-2 position-absolute" style="font-size: 80px; top: -2.8rem; left: 21%;">MISSION</h1>
                        <p class="card-text" style="line-height: 1.6rem; color: #76777a">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem ipsum pariatur natus architecto ullam odio doloremque perferendis dolore incidunt tempora cupiditate temporibus numquam quisquam nesciunt, sed unde consequatur officia voluptatum necessitatibus asperiores, neque ipsa minus? Molestias enim perferendis quisquam mollitia alias at molestiae necessitatibus, voluptas in repudiandae! Dolores culpa veritatis quibusdam voluptate voluptas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid" style="background-color: #f9f9f9; margin-top: 6rem; margin-bottom: 5rem;">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="card border-0" style="background-color: #f9f9f9;">
                    <div class="card-body position-relative">
                        <p class="position-absolute large-title" style="opacity: 0.05; top: 0rem; font-size: 7rem; font-weight: 350; line-height: 1.2;">Why Us?</p>
                        <h1 class="card-title mt-4 mb-2" style="font-size: 70px;">Why Us?</h1>
                        <p class="card-text" style="line-height: 1.6rem; color: #76777a">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat obcaecati minima ut itaque nesciunt, vero velit eligendi accusamus voluptatum amet debitis? Ducimus illum voluptate delectus nesciunt accusantium dolorem, ipsam officiis provident omnis doloremque officia, rem molestias. Facilis porro minima quidem assumenda nesciunt nemo nihil reprehenderit alias voluptas eos veritatis ea, ducimus illum voluptatum nisi. Accusantium obcaecati possimus, rem sequi necessitatibus accusamus dolorem eius, fugit sunt aliquam saepe ducimus ab omnis asperiores quae illum sapiente ipsa? Quidem cum non libero tempore dolor, error ratione fugit quaerat molestias? Voluptatum, quae sint! Excepturi distinctio qui fuga quas id reprehenderit corporis suscipit laboriosam vitae?</p>
                    </div>
                </div>
            </div>

            <div class="col-5 text-center position-relative">
                <img src="{{url('aqo_se/assets/image/about_us/choose.png')}}" class="w-100 position-absolute" style="top: -4rem; right: 4rem;">
            </div>
        </div>
    </div>
</div>
@endsection
