@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="{{route('admin.competition.register_judge.judge_form_edit')}}" method="post"  id="create_formInit">
                    {{csrf_field()}}

                    <div class="card-header">Judge Register Form Builder</div>
                    <div class="card-body">
                        <div id="build-wrap"></div><br><br>
                        <input type="hidden" name="register_form_data" value="{!! json_encode($judge_register_form) !!}" id="output_data" oninvalid="tabInvalied('register_formTabs')" required>

                        <input type="hidden" name="id" value="{{$competitionDetails->id}}">
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
                formData: '{!! json_encode($judge_register_form) !!}'
            };
            var final_out = $(fbTemplate).formBuilder(options);

            $('#create_formInit').submit(function() {
                $('#output_data').val(final_out.actions.getData('json'));
            });
        });
    </script>


@endsection
