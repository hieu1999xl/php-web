<div class="row">
    <div class="col-5">
            <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = 'Status';
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                0 =>'Open',
                1 =>'Inprogress',
                2 =>'Interview',
                3 =>'Done', 
                4 =>'Cancel'
            ];
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
            </div>
    </div>
</div>