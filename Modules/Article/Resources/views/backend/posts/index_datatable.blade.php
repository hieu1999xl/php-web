@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ $module_title }} @stop

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ $module_title }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <h4 class="card-title mb-0">
                    <i class="{{ $module_icon }}"></i> {{ $module_title }} <small class="text-muted">Data Table {{ __($module_action) }}</small>
                </h4>
                <div class="small text-muted">
                    @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
                </div>
            </div>
            <div class="col-4">
                <div class="float-right">
                    @can('create_'.$module_name)
                    <x-buttons.create route='{{ route("backend.$module_name.create") }}' title="{{__('Create')}} {{ ucwords(Str::singular($module_name)) }}"/>
                    @endcan

                    <div class="btn-group" role="group" aria-label="Toolbar button groups">
                        <div class="btn-group" role="group">
                            <button id="btnGroupToolbar" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupToolbar">
                                <a class="dropdown-item" href="{{ route("backend.$module_name.trashed") }}">
                                    <i class="fas fa-eye-slash"></i> @lang('article::posts.view_trash')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->

        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                @lang('article::posts.name')
                            </th>
                            <th>
                                @lang('article::posts.status')
                            </th>
                            <th>
                                @lang('article::posts.type')
                            </th>
                            <th>
                                @lang('article::posts.published_at')
                            </th>
                            <th class="text-right">
                                @lang('article::posts.action')
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">

                </div>
            </div>
            <div class="col-5">
                <div class="float-right">

                </div>
            </div>
        </div>
    </div>
</div>

@stop

@push ('after-styles')
<!-- DataTables Core and Extensions -->
<link rel="stylesheet" href="{{ asset('vendor/datatable/datatables.min.css') }}">

@endpush

@push ('after-scripts')
<!-- DataTables Core and Extensions -->
<script type="text/javascript" src="{{ asset('vendor/datatable/datatables.min.js') }}"></script>

<script type="text/javascript">
    function loadDataTable(data_ajax) {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: true,
            responsive: true,
            ajax: data_ajax,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'type', name: 'type'},
                {data: 'published_at', name: 'published_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            language: {
                lengthMenu:"{{ __('article::posts.show')}} _MENU_ {{ __('article::posts.entries') }}",
                search: "{{ __('article::posts.search') }}",
                info: "{{ __('article::posts.info',['start' => "_START_", 'end' => "_END_", 'total' => "_TOTAL_"])}}",
                paginate:{
                    next: "{{ __('article::posts.next') }}",
                    previous:"{{ __('article::posts.previous') }}",
                }
            },
        });
        $('div.dataTables_length select').addClass('col-md-6');
        renderSelect();
    }

    function renderSelect()
    {
        $("#datatable_filter").addClass("row d-flex justify-content-end mr-1");
        let htmlSelect = `
        <label class="mr-3">
            Menu
            <select id="searchType" name="type">
                <option value="0"> Tất cả </option>
        `;
        let options =  [
            {"key": '<?= \Modules\Article\Constants\PostConstants::TYPE_CASE_STUDIES ?>', "value":"Case Studies"},
            {"key": '<?= \Modules\Article\Constants\PostConstants::TYPE_NEWS ?>', "value":"News"},
            {"key": '<?= \Modules\Article\Constants\PostConstants::TYPE_SHAREHOLDERS ?>', "value":"Shareholders"},
        ];        
        options.forEach((option) => {
            htmlSelect += `<option value="${option.key}"> ${option.value} </option>`;
        });
        htmlSelect += `
            </select>
        </label>
        `;
        $("#datatable_filter").prepend(htmlSelect);
        $("#searchType").change(function() {
            $('#datatable').DataTable().ajax.reload(null, false);
        });
    }
    
    $(function() {
        let data = {
            'url': '{{ route("backend.$module_name.index_data") }}',
            'data': function (d) {
                d.type = $('#searchType').val();
            }
        };
        loadDataTable(data);
    });
    
</script>
@endpush
