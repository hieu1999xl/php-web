<div class="row">
    @php
        $checked_radio = "checked";
    @endphp
    @foreach($levels as $level)
        <div class="col-4 col-md-4">
            <?php
            $field_name = 'level';
            $field_lable = 'Level ' . $level;
            $required = "required";
            ?>
            <div class="form-group">
                {{ html()->label($field_lable, $field_name)->for($field_name) }}
                {{ html()->radio($field_name,null,$level)->attributes(["$checked_radio"]) }}
            </div>
        </div>
        @php
            $checked_radio = "";
        @endphp
    @endforeach
</div>
<div class="row">
    <div class="col-12 col-md-12" id="parent-level2">
        <div class="form-group">
            <?php
            $field_name = 'parent_id_level_2';
            $field_lable = __("article::menu.parent_id");
            $field_placeholder = __("Select an option");
            $select_options = $menu_parent_level_2->pluck('name', 'id');
            ?>
            {{ html()->label($field_lable, $field_name) }}
            {{ html()->select($field_name,
            $select_options,isset($$module_name_singular) ? [$$module_name_singular->parent_id] : '')->placeholder($field_placeholder)->class('form-control select2-parent-level2') }}
        </div>
    </div>
    <div class="col-12 col-md-12" id="parent-level3">
        <div class="form-group">
            <?php
            $field_name = 'parent_id_level_3';
            $field_lable = __("article::menu.parent_id");
            $field_placeholder = __("Select an option");
            $select_options = $menu_parent_level_3->pluck('name', 'id');
            ?>
            {{ html()->label($field_lable, $field_name) }}
            {{ html()->select($field_name,
            $select_options,isset($$module_name_singular) ? [$$module_name_singular->parent_id] : '')->placeholder($field_placeholder)->class('form-control select2-parent-level3') }}

        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_lable = __('article::menu.name');
            $field_placeholder = __('article::menu.name');
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_lable = __('article::menu.slug');
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = __('article::menu.status');
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                '1' => 'Published',
                '0' => 'Unpublished',
                '2' => 'Draft'
            ];
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'order';
            $field_lable = __('article::menu.order');
            $field_placeholder = __('article::menu.order');
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_lable = __('article::menu.description');
            $field_placeholder = $field_lable;
            ?>
            {!! Form::label("$field_name", "$field_lable") !!}
            <div class="input-group mb-3">
                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["rows"=>5]) }}
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'image';
            $field_lable = __('article::menu.image');
            $field_placeholder = $field_lable;
            ?>
            {!! Form::label("$field_name", "$field_lable") !!}
            <div class="input-group mb-3">
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(['aria-label'=>'Image', 'aria-describedby'=>'button-image-menu']) }}
                <div class="input-group-append">
                    <button class="btn btn-info" type="button" id="button-image-menu"><i
                            class="fas fa-folder-open"></i> @lang('Browse')</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 mt-2 mb-2">
        <div class="form-group">
            <?php
            $field_name = 'create_tag';
            $field_lable = __('article::menu.create_tag');
            ?>
            {{ html()->label($field_lable, $field_name) }}
            {{ html()->checkbox($field_name, isset($$module_name_singular) ? $$module_name_singular->create_tag : 1)->class('ml-1') }}
        </div>
    </div>
</div>
<div class="row">

</div>
<x-library.select2/>
@push('after-styles')
    <!-- File Manager -->
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endpush
@push ('after-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#parent-level2').hide();
            $('#parent-level3').hide();
            let level = $('input[name=level]:checked').val();
            if (parseInt(level) === 1) {
                $('#parent-level3').hide();
                $('#parent-level2').hide();
            }
            if (parseInt(level) === 2) {
                $('#parent-level3').hide();
                $('#parent-level2').show();
            }
            if (parseInt(level) === 3) {
                $('#parent-level2').hide();
                $('#parent-level3').show();
            }
            $("input[name='level']").change(function () {
                if (parseInt(this.value) === 1) {
                    $('#parent-level3').hide();
                    $('#parent-level2').hide();
                }
                if (parseInt(this.value) === 2) {
                    $('#parent-level3').hide();
                    $('#parent-level2').show();
                    $('.select2-parent-level3').val('null');
                }
                if (parseInt(this.value) === 3) {
                    $('#parent-level2').hide();
                    $('#parent-level3').show();
                    $('.select2-parent-level2').val('null');
                }
            });
            $('.select2-parent-level2').select2({
                theme: "bootstrap",
                placeholder: '@lang("Select an option")',
                allowClear: true,
                tags: true,
            });
            $('.select2-parent-level3').select2({
                theme: "bootstrap",
                placeholder: '@lang("Select an option")',
                allowClear: true,
                tags: true,
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('button-image-menu').addEventListener('click', (event) => {
                event.preventDefault();
                console.log(event);
                window.open('/file-manager/fm-button', 'fm', 'width=800,height=600');
            });
        });
        // set file link
        function fmSetLink($url) {
            document.getElementById('image').value = $url;
        }
    </script>
@endpush
