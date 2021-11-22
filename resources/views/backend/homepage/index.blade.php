@extends('backend.layouts.app')

@section('title', __('Home Page Slider'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Home Page&nbsp;</strong>

                    <div class="btn btn-info pull-right ml-3" data-toggle="modal" data-target="#exampleModal">Add New</div>
                   
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Order</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->


    <!-- Modal insert -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('admin.homepage.store')}}" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Image/Videos (.jpg,.jpeg,.mp4,.png)</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>

                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" name="link">
                        </div>

                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" class="form-control" name="order" required>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" value="Add New">
                    </div>
                </form>

            </div>
        </div>
    </div>

     <!-- Modal delete -->
     <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this?</h5>
                        </div>                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>
    
    <div class="modal fade" id="overlay">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title pull-left">Instructions for Validations</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">

                <h5 class="mb-3">Home Page Slider</h5>
                <p>Image ( dimensions = width: 730px * height: 464px )</p>
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


    <script type="text/javascript">
        $(function () {
            var table = $('#villadatatable').DataTable({
                processing: true,
                ajax: "{{route('admin.homepage.getdetails')}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'order', name: 'order'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            }); 

            var user_id;

            $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function(){
            $.ajax({
            url:"homepage/delete/"+user_id,
            
            success:function(data)
            {
                setTimeout(function(){
                $('#confirmModal').modal('hide');
                $('#villadatatable').DataTable().ajax.reload();
                });
            }
            })
            });

          
        });
    </script>



@endsection
