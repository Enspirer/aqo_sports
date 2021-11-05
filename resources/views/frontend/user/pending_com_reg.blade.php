@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="dashboard-body">

        @include('frontend.user.includes.dashboad_nav')

        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                    <div class="exploreBody px-4">
                            
                        <form action="{{route('frontend.user.register_request_update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="exampleModalLabel">Competition Register</h5>
                                    
                                </div>
                                <div class="modal-body">

                                    <div class="" id="reg-render">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="competition_id" value="{{$competition_details->id}}">
                                    <button type="submit" class="btn btn-primary">Update Register</button>
                                </div>
                            </div>
                        </form>



                        <div class="addSectionHorizantle">
                            <div class="container">
                                <img src="assets/image/5e67b03c59a90_thumb900.jpg" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        
    <script src='https://kevinchappell.github.io/formBuilder/assets/js/form-render.min.js'></script>

    <script>
        /*
            This has been updated to use the new userData method available in formRender
         */
        const dataType = 'json' // optional 'js'|'json'|'xml', defaults 'js' 
        $fbEditor.formBuilder('getData', dataType)
        
        const getUserDataBtn = document.getElementById("get-user-data");
        const fbRender = document.getElementById("reg-render");
        const originalFormData = {!! $competition_details->register_form !!};
        jQuery(function($) {
            const formData = JSON.stringify(originalFormData);

            $(fbRender).formRender({ formData });
            getUserDataBtn.addEventListener(
                "click",
                () => {
                    window.alert(window.JSON.stringify($(fbRender).formRender("userData")));
                },
                false
            );
        });
    </script>

    
@endsection
