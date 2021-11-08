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

@endsection
