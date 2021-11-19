@extends('backend.layouts.app')

@section('title', __('Advertisements'))

@section('content')

<style>
    
    .ui-w-80 {
        width: 80px !important;
        height: auto;
    }
    .btn-default {
        border-color: rgba(24,28,33,0.1);
        background: rgba(0,0,0,0);
        color: #4E5155;
    }
    label.btn {
        margin-bottom: 0;
    }
    .btn-outline-primary {
        border-color: #26B4FF;
        background: transparent;
        color: #26B4FF;
    }
    .btn {
        cursor: pointer;
    }
    .text-light {
        color: #babbbc !important;
    }
    .btn-facebook {
        border-color: rgba(0,0,0,0);
        background: #3B5998;
        color: #fff;
    }
    .btn-instagram {
        border-color: rgba(0,0,0,0);
        background: #000;
        color: #fff;
    }
    .card {
        background-clip: padding-box;
        box-shadow: 0 1px 4px rgba(24,28,33,0.012);
    }
    .row-bordered {
        overflow: hidden;
    }
    .account-settings-fileinput {
        position: absolute;
        visibility: hidden;
        width: 1px;
        height: 1px;
        opacity: 0;
    }
    .account-settings-links .list-group-item.active {
        font-weight: bold !important;
    }
    html:not(.dark-style) .account-settings-links .list-group-item.active {
        background: transparent !important;
    }
    .account-settings-multiselect ~ .select2-container {
        width: 100% !important;
    }
    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .light-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }
    .material-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .material-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }
    .dark-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(255, 255, 255, 0.03) !important;
    }
    .dark-style .account-settings-links .list-group-item.active {
        color: #fff !important;
    }
    .light-style .account-settings-links .list-group-item.active {
        color: #4E5155 !important;
    }
    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24,28,33,0.03) !important;
    }
</style>    

<div class="light-style flex-grow-1 container-p-y">

    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 mt-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home">Home Page Ad</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#competition_ad">Competition Page Ad</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#training_ad">Training Page Ad</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#home_multiple_ad">Home Page Multiple Ads</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#news_multiple_ad">News Page Multiple Ads</a>
        </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">

            <div class="tab-pane fade active show" id="home">
                @if($homepagead == null)
                    <div class="card-body">
                        <form action="{{route('admin.homepage_ad.store')}}" method="post" enctype="multipart/form-data">                    
                            {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div> 
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="link" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4"></textarea>
                                </div>
                                <div class="mt-4" align="right">
                                    <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                </div>
                        </form>
                    </div>
                @else
                    <div class="card-body">
                        <form action="{{route('admin.homepage_ad.update')}}" method="post" enctype="multipart/form-data">                    
                            {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                    <br>
                                    <img src="{{ url('files/advertisement',$homepagead->image) }}" style="width: 40%">
                                </div> 
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" value="{{ $homepagead->link }}" name="link" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4">{{ $homepagead->description }}</textarea>
                                </div>
                                <div class="mt-4" align="right">
                                    <input type="hidden" class="form-control" value="{{ $homepagead->id }}" name="hidden_id" />
                                    <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#homead_delete">Delete</button>
                                    <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                </div>
                        </form>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="competition_ad">
                @if($competitionpagead == null)
                    <div class="card-body">
                        <form action="{{route('admin.competition_ad.store')}}" method="post" enctype="multipart/form-data">                    
                            {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div> 
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="link" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4"></textarea>
                                </div>
                                <div class="mt-4" align="right">
                                    <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                </div>
                        </form>
                    </div>
                @else
                    <div class="card-body">
                        <form action="{{route('admin.competition_ad.update')}}" method="post" enctype="multipart/form-data">                    
                            {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                    <br>
                                    <img src="{{ url('files/advertisement',$competitionpagead->image) }}" style="width: 40%">
                                </div> 
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" value="{{ $competitionpagead->link }}" name="link" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4">{{ $competitionpagead->description }}</textarea>
                                </div>
                                <div class="mt-4" align="right">
                                    <input type="hidden" class="form-control" value="{{ $competitionpagead->id }}" name="hidden_id" />
                                    <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#competitionad_delete">Delete</button>
                                    <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                </div>
                        </form>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="training_ad">
                @if($trainingpagead == null)
                    <div class="card-body">
                        <form action="{{route('admin.training_ad.store')}}" method="post" enctype="multipart/form-data">                    
                            {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div> 
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="link" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4"></textarea>
                                </div>
                                <div class="mt-4" align="right">
                                    <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                </div>
                        </form>
                    </div>
                @else
                    <div class="card-body">
                        <form action="{{route('admin.training_ad.update')}}" method="post" enctype="multipart/form-data">                    
                            {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                    <br>
                                    <img src="{{ url('files/advertisement',$trainingpagead->image) }}" style="width: 40%">
                                </div> 
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" value="{{ $trainingpagead->link }}" name="link" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4">{{ $trainingpagead->description }}</textarea>
                                </div>
                                <div class="mt-4" align="right">
                                    <input type="hidden" class="form-control" value="{{ $trainingpagead->id }}" name="hidden_id" />
                                    <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#trainingad_delete">Delete</button>
                                    <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                </div>
                        </form>
                    </div>
                @endif
            </div>



            <div class="tab-pane fade" id="home_multiple_ad">

                <div class="row">
                    <div class="col-6">
                        @if($left == null)
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                    <h5>Left Advertisement</h5>
                                    <form action="{{route('admin.multiple_left.store')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4"></textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="left" value="left" />
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                <h5>Left Advertisement</h5>
                                    <form action="{{route('admin.multiple_left.update')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                <img src="{{ url('files/advertisement',$left->image) }}" style="width: 40%">
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" value="{{ $left->link }}" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4">{{ $left->description }}</textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="left" value="left" />
                                                <input type="hidden" class="form-control" value="{{ $left->id }}" name="hidden_id" />
                                                <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#left_delete">Delete</button>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($right == null)
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                    <h5>Right Advertisement</h5>
                                    <form action="{{route('admin.multiple_right.store')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4"></textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="right" value="right" />
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                <h5>Right Advertisement</h5>
                                    <form action="{{route('admin.multiple_right.update')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                <img src="{{ url('files/advertisement',$right->image) }}" style="width: 20%">
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" value="{{ $right->link }}" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4">{{ $right->description }}</textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="right" value="right" />
                                                <input type="hidden" class="form-control" value="{{ $right->id }}" name="hidden_id" />
                                                <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#right_delete">Delete</button>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <hr class="border">

                <div class="row">
                    <div class="col-6">
                        @if($middle_top == null)
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                    <h5>Middel Top Advertisement</h5>
                                    <form action="{{route('admin.multiple_middle_top.store')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4"></textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="middle_top" value="middle_top" />
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                <h5>Middle Top Advertisement</h5>
                                    <form action="{{route('admin.multiple_middle_top.update')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                <img src="{{ url('files/advertisement',$middle_top->image) }}" style="width: 40%">
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" value="{{ $middle_top->link }}" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4">{{ $middle_top->description }}</textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="middle_top" value="middle_top" />
                                                <input type="hidden" class="form-control" value="{{ $middle_top->id }}" name="hidden_id" />
                                                <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#middle_top_delete">Delete</button>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($middle_bottom == null)
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                    <h5>Middle Bottom Advertisement</h5>
                                    <form action="{{route('admin.multiple_middle_bottom.store')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4"></textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="middle_bottom" value="middle_bottom" />
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                <h5>Middle Bottom Advertisement</h5>
                                    <form action="{{route('admin.multiple_middle_bottom.update')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                <img src="{{ url('files/advertisement',$middle_bottom->image) }}" style="width: 40%">
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" value="{{ $middle_bottom->link }}" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4">{{ $middle_bottom->description }}</textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="middle_bottom" value="middle_bottom" />
                                                <input type="hidden" class="form-control" value="{{ $middle_bottom->id }}" name="hidden_id" />
                                                <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#middle_bottom_delete">Delete</button>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
            </div>           


            <!-- ************************************************************************ -->

            <div class="tab-pane fade" id="news_multiple_ad">

                <div class="row">
                    <div class="col-6">
                        @if($nleft == null)
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                    <h5>Left Advertisement</h5>
                                    <form action="{{route('admin.news_multiple_left.store')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4"></textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="nleft" value="nleft" />
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                <h5>Left Advertisement</h5>
                                    <form action="{{route('admin.news_multiple_left.update')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                <img src="{{ url('files/advertisement',$nleft->image) }}" style="width: 40%">
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" value="{{ $nleft->link }}" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4">{{ $nleft->description }}</textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="nleft" value="nleft" />
                                                <input type="hidden" class="form-control" value="{{ $nleft->id }}" name="hidden_id" />
                                                <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#nleft_delete">Delete</button>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($nright == null)
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                    <h5>Right Advertisement</h5>
                                    <form action="{{route('admin.news_multiple_right.store')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4"></textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="nright" value="nright" />
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                <h5>Right Advertisement</h5>
                                    <form action="{{route('admin.news_multiple_right.update')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                <img src="{{ url('files/advertisement',$nright->image) }}" style="width: 20%">
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" value="{{ $nright->link }}" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4">{{ $nright->description }}</textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="nright" value="nright" />
                                                <input type="hidden" class="form-control" value="{{ $nright->id }}" name="hidden_id" />
                                                <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#nright_delete">Delete</button>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <hr class="border">

                <div class="row">
                    <div class="col-6">
                        @if($nmiddle_top == null)
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                    <h5>Middel Top Advertisement</h5>
                                    <form action="{{route('admin.news_multiple_middle_top.store')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4"></textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="nmiddle_top" value="nmiddle_top" />
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                <h5>Middle Top Advertisement</h5>
                                    <form action="{{route('admin.news_multiple_middle_top.update')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                <img src="{{ url('files/advertisement',$nmiddle_top->image) }}" style="width: 40%">
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" value="{{ $nmiddle_top->link }}" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4">{{ $nmiddle_top->description }}</textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="nmiddle_top" value="nmiddle_top" />
                                                <input type="hidden" class="form-control" value="{{ $nmiddle_top->id }}" name="hidden_id" />
                                                <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#nmiddle_top_delete">Delete</button>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($nmiddle_bottom == null)
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                    <h5>Middle Bottom Advertisement</h5>
                                    <form action="{{route('admin.news_multiple_middle_bottom.store')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4"></textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="nmiddle_bottom" value="nmiddle_bottom" />
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Submit">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                                <h5>Middle Bottom Advertisement</h5>
                                    <form action="{{route('admin.news_multiple_middle_bottom.update')}}" method="post" enctype="multipart/form-data">                    
                                        {{csrf_field()}}
                                            
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <br>
                                                <img src="{{ url('files/advertisement',$nmiddle_bottom->image) }}" style="width: 40%">
                                            </div> 
                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" class="form-control" value="{{ $nmiddle_bottom->link }}" name="link" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="4">{{ $nmiddle_bottom->description }}</textarea>
                                            </div>
                                            <div class="mt-4" align="right">
                                                <input type="hidden" name="nmiddle_bottom" value="nmiddle_bottom" />
                                                <input type="hidden" class="form-control" value="{{ $nmiddle_bottom->id }}" name="hidden_id" />
                                                <button type="button" class="btn rounded-pill px-4 py-2 me-2 btn-danger" data-toggle="modal" data-target="#nmiddle_bottom_delete">Delete</button>
                                                <input type="submit" class="btn rounded-pill px-4 py-2 ml-2 ms-2 btn-success" value="Update">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
            </div>       
            
          </div>
        </div>
      </div>
    </div>

 
  </div>


@if($homepagead != null)
    <div class="modal fade" id="homead_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.homepage_ad.delete',$homepagead->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif  
 
 @if($competitionpagead != null)
    <div class="modal fade" id="competitionad_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.competition_ad.delete',$competitionpagead->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif

 @if($trainingpagead != null)
    <div class="modal fade" id="trainingad_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.training_ad.delete',$trainingpagead->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif










 @if($left != null)
    <div class="modal fade" id="left_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.multiple_left.delete',$left->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif
 @if($right != null)
    <div class="modal fade" id="right_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.multiple_right.delete',$right->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif
 @if($middle_top != null)
    <div class="modal fade" id="middle_top_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.multiple_middle_top.delete',$trainingpagead->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif
 @if($middle_bottom != null)
    <div class="modal fade" id="middle_bottom_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.multiple_middle_bottom.delete',$trainingpagead->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif

 @if($nleft != null)
    <div class="modal fade" id="nleft_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.news_multiple_left.delete',$nleft->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif
 @if($nright != null)
    <div class="modal fade" id="nright_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.news_multiple_right.delete',$nright->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif
 @if($nmiddle_top != null)
    <div class="modal fade" id="nmiddle_top_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.news_multiple_middle_top.delete',$nmiddle_top->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif
 @if($nmiddle_bottom != null)
    <div class="modal fade" id="nmiddle_bottom_delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('admin.news_multiple_middle_bottom.delete',$nmiddle_bottom->id)}}" type="button" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
 @endif


 <div class="modal fade" id="overlay">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title pull-left">Instructions for Validations</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
      </div>
      <div class="modal-body">

        <h5 class="mb-3">Home Page Ad</h5>
        <p>Image ( dimensions = width: 350px * height: 464px )</p>
        <p>Image ( Size = Maximum size should be 25MB )</p>
        <p>Image ( Type = jpeg,png,jpg )</p>
        <hr>
        <h5 class="mb-3">Competition Page Ad</h5>
        <p>Image ( dimensions = width: 160px * height: 480px )</p>
        <p>Image ( Size = Maximum size should be 25MB )</p>
        <p>Image ( Type = jpeg,png,jpg )</p>
        <hr>
        <h5 class="mb-3">Training Page Ad</h5>
        <p>Image ( dimensions = width: 350px * height: 464px )</p>
        <p>Image ( Size = Maximum size should be 25MB )</p>
        <p>Image ( Type = jpeg,png,jpg )</p>

        <hr>
        <h5 class="mb-3">Home Page Multiple Ads</h5>
        <p>Image Left ( dimensions = width: 540px * height: 320px )</p>
        <p>Image Right ( dimensions = width: 375px * height: 155px )</p>
        <p>Image Middle Top ( dimensions = width: 375px * height: 155px )</p>
        <p>Image Middle Right ( dimensions = width: 164px * height: 320px )</p>
        <p>Image ( Size = Maximum size should be 25MB )</p>
        <p>Image ( Type = jpeg,png,jpg )</p>

        <hr>
        <h5 class="mb-3">News Page Multiple Ads</h5>
        <p>Image Left ( dimensions = width: 540px * height: 320px )</p>
        <p>Image Right ( dimensions = width: 375px * height: 155px )</p>
        <p>Image Middle Top ( dimensions = width: 375px * height: 155px )</p>
        <p>Image Middle Right ( dimensions = width: 164px * height: 320px )</p>
        <p>Image ( Size = Maximum size should be 25MB )</p>
        <p>Image ( Type = jpeg,png,jpg )</p>

        <hr>
        <h5 class="mb-3">Explore Page Multiple Ads</h5>
        <p>Image Left ( dimensions = width: 540px * height: 320px )</p>
        <p>Image Right ( dimensions = width: 375px * height: 155px )</p>
        <p>Image Middle Top ( dimensions = width: 375px * height: 155px )</p>
        <p>Image Middle Right ( dimensions = width: 164px * height: 320px )</p>
        <p>Image ( Size = Maximum size should be 25MB )</p>
        <p>Image ( Type = jpeg,png,jpg )</p>     
                
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">

$(window).on('load', function() {
        $('#overlay').modal('show');
    });
$("#close-btn").click(function () {
       $('#overlay').modal('hide');
});

</script> 

@endsection
