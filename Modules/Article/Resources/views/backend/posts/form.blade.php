<div class="row">
    <div class="col-5">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <?php
            $field_name = 'created_by_alias';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = "Hide Author User's Name and use Alias";
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'intro';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'content';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'featured_image';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {!! Form::label("$field_name", "$field_lable") !!} {!! fielf_required($required) !!}
            <div class="input-group mb-3">
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", 'aria-label'=>'Image', 'aria-describedby'=>'button-image']) }}
                <div class="input-group-append">
                    <button class="btn btn-info" type="button" id="button-image"><i
                            class="fas fa-folder-open"></i> @lang('Browse')</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <?php
            $field_name = 'file';
            $field_lable = __("article::$module_name.File");
            $field_placeholder = $field_lable;
            $valueFile = isset($$module_name_singular->file) ? 'storage/' . $$module_name_singular->file : null;
            ?>
            {!! Form::label("$field_name", "$field_lable") !!}
            <div class="input-group mb-3">
                {{ html()->text('textFile')->placeholder($valueFile)->class('form-control') }}
                {{ html()->input('file',$field_name)->attributes(['accept' => '.pdf, .txt, .doc, .docx, .csv, .zip'])->class('d-none') }}
                <div class="input-group-append">
                    <label class="btn btn-info" for="{{$field_name}}" id="button-file">
                        <i class="fas fa-folder-open"></i> @lang('Browse')</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <?php
            $field_name = 'type';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                \Modules\Article\Constants\PostConstants::TYPE_CASE_STUDIES => 'Case Studies',
                \Modules\Article\Constants\PostConstants::TYPE_NEWS => 'News',
                \Modules\Article\Constants\PostConstants::TYPE_SHAREHOLDERS => 'Shareholders',
            ];
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <?php
            $field_name = 'is_featured';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                '1' => 'Yes',
                '0' => 'No',
            ];
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row tags_news">
    <div class="col-12 col-md-12">
        <?php
        $field_name = 'tags_news[]';
        $field_lable = __("article::$module_name.tags_news");
        $field_relation = "tags";
        $field_placeholder = __("Select an option");
        $required = "";
        ?>
        <div class="form-group">
            {{ html()->label($field_lable, $field_name) }}
            {{ html()->multiselect($field_name,
                $tags_news->pluck('name', 'id'),
                isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('id')->toArray():''
        )->class('form-control select2') }}
        </div>
    </div>
</div>
<div class="row tags_shareholders">
    <div class="col-12 col-md-12">
        <?php
        $field_name = 'tags_shareholders[]';
        $field_lable = __("article::$module_name.tags_shareholder");
        $field_relation = "tags";
        $field_placeholder = __("Select an option");
        $required = "";
        ?>
        <div class="form-group">
            {{ html()->label($field_lable, $field_name) }}
            {{ html()->multiselect($field_name,
                $tags_shareholders->pluck('name', 'id'),
                isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('id')->toArray():''
        )->class('form-control select2') }}
        </div>
    </div>
</div>
<div class="row tags_case_studies">
    <div class="col-4">
        <?php
        $field_name = 'tags_services[]';
        $field_lable = __("article::$module_name.tags_services");
        $field_relation = "tags";
        $field_placeholder = __("Select an option");
        $required = "";
        ?>
        <div class="form-group">
            {{ html()->label($field_lable, $field_name) }}
            {{ html()->multiselect($field_name,
                $tags_services->pluck('name', 'id'),
                isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('id')->toArray():''
        )->class('form-control select2') }}
        </div>
    </div>
    <div class="col-4">
        <?php
        $field_name = 'tags_industries[]';
        $field_lable = __("article::$module_name.tags_industries");
        $field_relation = "tags";
        $field_placeholder = __("Select an option");
        $required = "";
        ?>
        <div class="form-group">
            {{ html()->label($field_lable, $field_name) }}
            {{ html()->multiselect($field_name,
                $tags_industries->pluck('name', 'id'),
                isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('id')->toArray():''
        )->class('form-control select2') }}
        </div>
    </div>
    <div class="col-4">
        <?php
        $field_name = 'tags_technologies[]';
        $field_lable = __("article::$module_name.tags_technologies");
        $field_relation = "tags";
        $field_placeholder = __("Select an option");
        $required = "";
        ?>
        <div class="form-group">
            {{ html()->label($field_lable, $field_name) }}
            {{ html()->multiselect($field_name,
                $tags_technologies->pluck('name', 'id'),
                isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('id')->toArray():''
        )->class('form-control select2') }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = __("article::$module_name.$field_name");
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
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'published_at';
            $field_lable = __("article::$module_name.$field_name");
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
</div>
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <?php
            $field_name = 'meta_title';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <?php
            $field_name = 'meta_keywords';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <?php
            $field_name = 'order';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_description';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_og_image';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'meta_og_url';
            $field_lable = __("article::$module_name.$field_name");
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div></div>
<!-- Select2 Library -->
<x-library.select2/>
<x-library.datetime-picker/>

@push('after-styles')
    <!-- File Manager -->
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endpush

@push ('after-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("input[name='file']").change(function () {
                $("input[name='textFile']").attr('placeholder',this.value)
            });
            var type_case_studies = '<?=\Modules\Article\Constants\PostConstants::TYPE_CASE_STUDIES?>';
            var type_news = '<?=\Modules\Article\Constants\PostConstants::TYPE_NEWS?>';
            var type_shareholders = '<?=\Modules\Article\Constants\PostConstants::TYPE_SHAREHOLDERS?>';
            let selectType = $("select[name='type']");
            toggleSelectMenusTags(selectType.val())
            selectType.change(function () {
                let value = this.value;
                toggleSelectMenusTags(value);
            });

            function toggleSelectMenusTags(value) {
                switch (value) {
                    case type_case_studies:
                        showTagsCaseStudies();
                        break;
                    case type_news:
                        showTagsNews();
                        break;
                    case type_shareholders:
                        showTagsShareholders();
                        break;
                    default:
                        hideTagsMenus();
                }
            }

            function hideTagsMenus() {
                $('.tags_case_studies').hide();
                $('.tags_news').hide();
                $('.tags_shareholders').hide();
            }

            function showTagsCaseStudies() {
                $('.tags_case_studies').show();
                $('.tags_news').hide();
                $('.tags_shareholders').hide();
            }

            function showTagsNews() {
                $('.tags_news').show();
                $('.tags_case_studies').hide();
                $('.tags_shareholders').hide();
            }

            function showTagsShareholders() {
                $('.tags_shareholders').show();
                $('.tags_news').hide();
                $('.tags_case_studies').hide();
            }
        });
    </script>
    <!-- Date Time Picker & Moment Js-->
    <script type="text/javascript">
        $(function () {
            $('.datetime').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                icons: {
                    time: 'far fa-clock',
                    date: 'far fa-calendar-alt',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'far fa-calendar-fcheck',
                    clear: 'far fa-trash-alt',
                    close: 'fas fa-times'
                }
            });
        });
    </script>

    <script type="text/javascript" src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script type="text/javascript">

        CKEDITOR.replace('content', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            language: '{{App::getLocale()}}',
            defaultLanguage: 'en'
        });

        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=800,height=600');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('featured_image').value = $url;
        }
    </script>
@endpush
