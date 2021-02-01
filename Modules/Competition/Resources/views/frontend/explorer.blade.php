@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="contentExplore">
        <div class="container">
            <div class="srarchBar">
                <form action="" method="">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Try Rhythmic Gymnastic" />
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Find</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 breadcrumb">
                <p class="font-Abel">
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span>About Us</span>
                </p>
            </div>
            <div class="headingTitle">
                <h1>Rhythmic Gymnastic</h1>
            </div>
            <div class="searchEvent">
                <select id="countries" name="countries">
                    <option value="All Countries" selected>All Countries</option>
                </select>
                <select id="categories" name="categories">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                     <option value="all" selected>All Categories</option>
                </select>
                <input
                        type="text"
                        name="daterange"
                        value="01/01/2021 - 02/15/2021"
                        placeholder="End Date"
                />
                <button class="btn"><i class="fa fa-times" aria-hidden="true"></i></button>
                <div class="sort">
                    <p>Sort by :</p>
                    <select id="latest" name="latest">
                        <option value="Latest" selected>Latest</option>
                    </select>
                </div>
            </div>
            <div class="exploreBody">
                <div class="row">
                    @foreach($competitions as $competition)
                            <div class="imageCard col-md-3 col-sm-6 col-xs-12">
                                <div class="imageSize">
                                    <a href="{{route('frontend.competition_page',$competition->id)}}">
                                        <img src="{{url('/files/').'/'.$competition->feature_image}}" alt="" srcset=""/>
                                    </a>
                                </div>
                                <div class="container">
                                    <div class="nameCard">
                                        <h4>{{$competition->competition_name}}</h4>
                                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;padding-left: 20px;padding-right: 20px;">
                                            {{$competition->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

                {{--<div class="pagination">--}}
                    {{--<nav aria-label="Page navigation example">--}}
                        {{--<ul class="pagination justify-content-center">--}}
                            {{--<li class="page-item">--}}
                                {{--<a class="page-link" href="#"--}}
                                {{--><i class="fa fa-angle-left" aria-hidden="true"></i--}}
                                    {{--></a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item">--}}
                                {{--<a class="page-link" href="#">1</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item">--}}
                                {{--<a class="page-link" href="#">2</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item">--}}
                                {{--<a class="page-link" href="#">3</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item">--}}
                                {{--<a class="page-link" href="#"--}}
                                {{--><i class="fa fa-angle-right" aria-hidden="true"></i--}}
                                    {{--></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</nav>--}}
                {{--</div>--}}
            </div>
            <div class="addSectionHorizantle">
                <div class="container">
                    <img
                            src="assets/image/5e67b03c59a90_thumb900.jpg"
                            alt=""
                            srcset=""
                    />
                </div>
            </div>
        </div>
    </div>
@endsection
