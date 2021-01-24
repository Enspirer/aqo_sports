<div class="" style="padding: 20px;border-style: dashed;border-width: 2px;color: grey;text-align: center" id="admin" onclick="add_element()">
    Add Rule
</div>
<br>
<div id="rules_container">

</div>


<script>
    
    function add_element() {
        var constine = Math.floor(Math.random()*1000) + 10000;
        $("#rules_container").append('' +
            '<div class="card" id="'+ constine +'">' +
                '<div class="card-body">' +
                    '<div class="form-group">' +
                        '<label>Name</label>' +
                        '<input type="text" name="rule_name[]" class="form-control" on oninvalid="tabInvalied(\'game_ruleTabs\')" required>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<label>Description</label>' +
                        '<textarea class="form-control" cols="5" name="description_rule[]" required></textarea>' +
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