@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

    <style>
        .stage-wrap.empty{
            height: 520px;
        }
    </style>
    <div class="dashboard-body">
        @include('frontend.user.includes.dashboad_nav')
        <div class="dashboard-content">
            <div class="contentExplore">
                <div class="container">
                    <div class="exploreBody">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <form action="" method="post"  id="create_formInit">
                                        {{csrf_field()}}
                                        <div class="card-header">Judge Register Form Builder</div>
                                        <div class="card-body">
                                            <div id="build-wrap"></div><br><br>
                                            <input type="hidden" name="register_form_data" value="" id="output_data" oninvalid="tabInvalied('register_formTabs')" required>
                                            <input type="hidden" name="id" value="">
                                            <button type="submit" class="btn btn-success" name="">Save</button>
                                            <a href="" class="btn btn-primary">View Competition</a>
                                            <a href="" class="btn btn-primary">Edit Competition</a>
                                            <a href="" class="btn btn-primary">View Judges</a>
                                        </div>
                                    </form>
                                </div><!--card-->
                            </div><!--col-->
                        </div><!--row-->

                        @stack('after-scripts')
                        <script src='{{url('js/form-builder.min.js')}}'></script>
                        <script>
                            jQuery($ => {
                                const fbTemplate = document.getElementById('build-wrap');
                                var options = {
                                    showActionButtons: false ,// defaults: `true`
                                    typeUserEvents: {
                                        text: {
                                            onAddField: function(fld) {
                                                console.log('aaaa');
                                            }
                                        }},
                                    formData: ''
                                };
                                var final_out = $(fbTemplate).formBuilder(options);

                                $('#create_formInit').submit(function() {
                                    $('#output_data').val(final_out.actions.getData('json'));
                                });
                            });
                        </script>


                    </div>
                </div>
            </div>
        </div>

@endsection

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
        <script src='{{url('js/form-builder.min.js')}}'></script>

