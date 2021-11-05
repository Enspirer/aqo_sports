@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    
    <form action="{{route('admin.training.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">

                            <div class="row">                                        
                                <div class="row pe-0">
                                    <div class="col-12">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td width="14%" style="font-weight: 600;">Name:</td>
                                                    <td>{{ $training->first_name }} {{ $training->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Email:</td>
                                                    <td>{{ $training->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Phone Number:</td>
                                                    <td>{{ $training->phone_number }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Country:</td>
                                                    <td>{{ $training->country }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">State:</td>
                                                    <td>{{ $training->state }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Address:</td>
                                                    <td>{{ $training->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">City:</td>
                                                    <td>{{ $training->city }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Postal Code:</td>
                                                    <td>{{ $training->postal_code }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Assisting with:</td>
                                                    <td>{{ $training->description }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Questions & Comments:</td>
                                                    <td>{{ $training->comments }}</td>
                                                </tr>
                                            </tbody>                                            
                                        </table>
                                    </div>                                            
                                            
                                </div>
                            </div>                            

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">

                            <div class="row">                                        
                                <div class="row pe-0">
                                    <div class="col-12">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td width="20%" style="font-weight: 600;">Time Zone:</td>
                                                    <td>{{ $training->time_zone }}</td>
                                                </tr>
                                            </tbody>                                            
                                        </table>
                                    </div>    
                                </div>
                            </div>    
                            
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Approved" {{ $training->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Disapproved" {{ $training->status == 'Disapproved' ? "selected" : "" }}>Disapprove</option> 
                                    <option value="Pending" {{ $training->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>                        

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $training->id }}"/>
                                <a href="{{route('admin.training.index')}}" type="button" class="btn rounded-pill px-4 py-2 me-2 btn-warning">Cancel</a>                               
                                <input type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success" value="Update" />                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>






<br><br>
@endsection
