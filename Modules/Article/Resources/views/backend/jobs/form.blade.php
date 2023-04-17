<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'job_name';
            $field_lable = trans('labels.backend.jobs.create.name');
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
            $field_name = 'job_intro';
            $field_lable = trans('labels.backend.jobs.create.intro');
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = trans('labels.backend.jobs.create.status');
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                '1' => trans('labels.backend.jobs.status.published'),
                '0' => trans('labels.backend.jobs.status.unpublished'),
            ];
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <!-- <div class="col-12 col-md-12">
        <div class="form-group">
            <?php
    $field_name = 'slug';
    $field_lable = __('article::menu.slug');
    $field_placeholder = __('article::menu.slug');
    $required = "";
    ?>
    {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
    {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
    </div>
</div> -->
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'job_description';
            $field_lable = trans('labels.backend.jobs.create.description');
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'job_requirement';
            $field_lable = trans('labels.backend.jobs.create.requirement');
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'job_benefits';
            $field_lable = trans('labels.backend.jobs.create.benefits');
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'job_title';
            $field_lable = trans('labels.backend.jobs.create.title');
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
            $field_name = 'job_salary';
            $field_lable = trans('labels.backend.jobs.create.salary');
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'job_left_time';
            $field_lable = trans('labels.backend.jobs.create.time_left');
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            <div class="input-group date datetime" id="{{$field_name}}" data-target-input="nearest">
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control datetimepicker-input')->attributes(["$required", 'data-target'=>"#$field_name"]) }}
                <div class="input-group-append" data-target="#{{$field_name}}" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <?php
            $field_name = 'job_time';
            $field_lable = trans('labels.backend.jobs.create.time');
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                'Full time' => 'Full time',
                'Part time' => 'Part time',
                'Freelancer' => 'Freelancer'
            ];
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <?php
            $field_name = 'job_location';
            $field_lable = trans('labels.backend.jobs.create.location');
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                'Ha Noi Office' => 'Ha Noi Office',
                'Ho Chi Minh Office' => 'Ho Chi Minh Office',
                'Japan Office' => 'Japan Office'
            ];
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'position_quantity';
            $field_lable = trans('labels.backend.jobs.create.position_quantity');
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class(['form-control', $field_name])->attributes(["$required", 'min' => '0']) }}
        </div>
    </div>
</div>
<x-library.datetime-picker/>
@push('after-styles')
    <!-- File Manager -->
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endpush
@push ('after-scripts')
    <script type="text/javascript" src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.datetime').datetimepicker({
                format: 'YYYY-MM-DD',
                icons: {
                    time: 'far fa-clock',
                    date: 'far fa-calendar-alt',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'far fa-calendar-check',
                    clear: 'far fa-trash-alt',
                    close: 'fas fa-times'
                }
            });
            $('#position_quantity').change(function () {
                let positionQuantity = $(this).val();
                if (positionQuantity < 0) {
                    $(this).val(0);
                }
            });
        });
        CKEDITOR.replace('job_description', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            language: '{{App::getLocale()}}',
            defaultLanguage: 'en'
        });
        // CKEDITOR.config.extraPlugins = 'colorbutton';
        CKEDITOR.replace('job_requirement', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            language: '{{App::getLocale()}}',
            defaultLanguage: 'en'
        });
        CKEDITOR.replace('job_benefits', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            language: '{{App::getLocale()}}',
            defaultLanguage: 'en'
        });

        CKEDITOR.replace('job_description_vi', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            language: '{{App::getLocale()}}',
            defaultLanguage: 'en'
        });
        CKEDITOR.replace('job_requirement_vi', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            language: '{{App::getLocale()}}',
            defaultLanguage: 'en'
        });
        CKEDITOR.replace('job_benefits_vi', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            language: '{{App::getLocale()}}',
            defaultLanguage: 'en'
        });
    </script>
    <script type="text/javascript" src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

@endpush
