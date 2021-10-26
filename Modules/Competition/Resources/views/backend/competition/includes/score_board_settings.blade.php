<label>Marks Section</label>

<div class="row">
    <div class="col-md-6">
        <div class="card" style="padding: 10px;">
            <div class="" style="padding: 20px;border-style: dashed;border-width: 2px;color: grey;text-align: center" id="admin" onclick="add_mark_section()">
                Add Mark Section
            </div>
            <br>
            <div id="add_mark_container">

            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="padding: 10px;">
            <div class="" style="padding: 20px;border-style: dashed;border-width: 2px;color: grey;text-align: center" id="admin" onclick="add_round_section()">
                Add Round Section
            </div>
            <br>
            <div id="add_round_container">

            </div>
        </div>
    </div>
</div>








<script>

    function add_mark_section() {
        var constine = Math.floor(Math.random()*1000) + 10000;
        $("#add_mark_container").append('' +
            '<div class="card" id="'+ constine +'">' +
                '<div class="card-body">' +
                    '<div class="form-group">' +
                        '<label>Mark Section</label>' +
                        '<input type="text" name="marks_sections[]" class="form-control" on oninvalid="tabInvalied(\'score_board_settings_ruleTabs\')" required>' +
                    '</div>' +
                    '<button class="btn btn-danger" onclick="deleteRule('+constine+')">' +
                        '<i class="fa fa-trash"></i>' +
                    '</button>' +
                '</div>' +
            '</div>');
    }

    function add_round_section() {
        var constine = Math.floor(Math.random()*1000) + 10000;
        $("#add_round_container").append('' +
            '<div class="card" id="'+ constine +'">' +
            '<div class="card-body">' +
            '<div class="form-group">' +
            '<label>Round Section</label>' +
            '<input type="text" name="rounds_section[]" class="form-control" on oninvalid="tabInvalied(\'score_board_settings_ruleTabs\')" required>' +
            '</div>' +
            '<button class="btn btn-danger" onclick="deleteRule('+constine+')">' +
            '<i class="fa fa-trash"></i>' +
            '</button>' +
            '</div>' +
            '</div>');
    }


    function deleteRule(id) {
        $("#"+id).remove();
    }

</script>
