@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <style>
        .stage-wrap.empty{
            height: 520px;
        }
    </style>
    <div class="light-style flex-grow-1 container-p-y">
        <form action="{{route('admin.competition.store')}}" method="post" id="create_formInit" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" id="generalTabs" data-toggle="list" href="#general">General</a>
                            <a class="list-group-item list-group-item-action"  id="comeptitionTabs" data-toggle="list" href="#comeptition">Competition</a>
                            <a class="list-group-item list-group-item-action"  id="register_formTabs" data-toggle="list" href="#register_form">Register Form</a>
                            <a class="list-group-item list-group-item-action"  id="game_ruleTabs" data-toggle="list" href="#game_rule">Game Rules</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="general">
                                <div class="card-body pb-2">
                                    @include('competition::backend.competition.includes.general_tabs')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="comeptition">
                                <div class="card-body pb-2">
                                   @include('competition::backend.competition.includes.competition_tabs')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="register_form">
                                <div class="card-body pb-2">
                                    @include('competition::backend.competition.includes.regiter_form_creator')
                                </div>
                            </div>

                            <div class="tab-pane fade" id="game_rule">
                                <div class="card-body pb-2">
                                    @include('competition::backend.competition.includes.game_rule_tabs')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Create Competition</button>&nbsp;
                    <button type="button"  onclick="submitForm()" class="btn btn-default">Cancel</button>
                    <br>  <br>
                </div>
            </div>

        </form>

    </div>

    @stack('before-scripts')
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    {!! script(mix('js/backend.js')) !!}
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

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
                    }}
            };
            var final_out = $(fbTemplate).formBuilder(options);

            $('#create_formInit').submit(function() {
                $('#output_data').val(final_out.actions.getData('json'));
            });
        });
    </script>

    <script>
        function tabInvalied(id) {
           $('#'+id).css("color", "red");
        }
    </script>
@endsection
