
<div class="row">
    <div class="col-12 col-md-12">
        <div class="form-group">
            <?php
            $field_name = 'title';
            $field_lable = __('article::imgupload.name');
            $field_placeholder = __('article::imgupload.name');
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}

        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="form-group">
            <?php
            $field_name = 'sub_title';
            $field_lable = __('article::imgupload.sub_title');
            $field_placeholder = __('article::imgupload.sub_title');
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="form-group">
            <?php
            $field_name = 'oder';
            $field_lable = __('article::imgupload.order');
            $field_placeholder = __('article::imgupload.order');
            $required = "";
            $select_options = [
                //'0' => 0,
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10
            ]
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-10">
        <div class="form-group">
            <?php
            //use Modules\Article\Common\ListRoute;
            $field_name = 'link_button';
            $field_lable = __('article::imgupload.link_button');
            $field_placeholder = __('article::imgupload.link_button');
            $required = "required";

            $select_options = [
                route('frontend.index') => "/",
                route('frontend.home') => 'home',
                route('frontend.privacy') => "privacy",
                route('frontend.terms') => 'terms',
                route('frontend.services') => "services",
                route('frontend.mobile_app_development') => 'services/mobile-app-development',
                route('frontend.services_maintain') => 'services/maintenance-operation-managed-services',
                route('frontend.services_legacy')=> 'services/legacy-system-migration',
                route('frontend.services_enterprise') => 'services/enterprise-custom-software-development',
                route('frontend.services_testing') => 'services/testing-services',
                route('frontend.technology') => 'technologies',
                route('frontend.technology_detail') => 'technologies/java-script',
                route('frontend.technology_micro') => 'technologies/microsoft-platform',
                route('frontend.technology_opensource') => 'technologies/open-source',
                route('frontend.technology_mobile') => 'technologies/mobile-technology',
                route('frontend.technology_QA') => 'technologies/software-testing-quality-control',
                route('frontend.technology_frontend') => 'technologies/front-end-development',
                route('frontend.case_studies') => 'case-studies',
                route('frontend.news') => 'news',
//                route('frontend.new_gio_bug') => 'news/gio-bug',
                route('frontend.talent') => 'talent',
                route('frontend.about_us') => 'about-us',
                route('frontend.our_story') => 'about-us/our-story',
                route('frontend.tvj') => 'about-us/tvj',
                route('frontend.contact_us') => 'about-us/contact-us',
                route('frontend.submit_email')=> 'thank-you',
                route('frontend.search_result') => 'result',
            ];
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2 col-md-4') }}
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
        <?php
            $field_name = 'type';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                '2'=>'Logo',
                '1'=>'Technology',
                '0'=>'Home Page',
            ];
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group ">
            <?php
            $field_name = 'image';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {!! Form::label("$field_name", "$field_lable") !!} {!! fielf_required($required) !!}
            <div class="input-group mb-3">
{{--                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", 'aria-label'=>'Image', 'aria-describedby'=>'button-image']) }}--}}
                <div class="input-group-append">
{{--                    <button class="btn btn-info" type="button" id="button-image"><i class="fas fa-folder-open"></i> @lang('Browse')</button>--}}
{{--                    <input type="file" name="image" class="form-control">--}}
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>
        </div>
    </div>
</div>


@push('after-styles')
<!-- File Manager -->
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endpush
@push ('after-scripts')
<script type="text/javascript" src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script type="text/javascript">
// $(function() {
//     $('.datetime').datetimepicker({
//         format: 'YYYY-MM-DD HH:mm:ss',
//         icons: {
//             time: 'far fa-clock',
//             date: 'far fa-calendar-alt',
//             up: 'fas fa-arrow-up',
//             down: 'fas fa-arrow-down',
//             previous: 'fas fa-chevron-left',
//             next: 'fas fa-chevron-right',
//             today: 'far fa-calendar-check',
//             clear: 'far fa-trash-alt',
//             close: 'fas fa-times'
//         }
//     });
// });
CKEDITOR.replace('title', {filebrowserImageBrowseUrl: '/file-manager/ckeditor', language:'{{App::getLocale()}}', defaultLanguage: 'en'});
CKEDITOR.replace('sub_title', {filebrowserImageBrowseUrl: '/file-manager/ckeditor', language:'{{App::getLocale()}}', defaultLanguage: 'en'});

</script>
<script type="text/javascript" src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

@endpush
