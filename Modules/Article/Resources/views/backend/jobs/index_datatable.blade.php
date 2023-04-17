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
                <x-buttons.create route='{{ route("backend.$module_name.create") }}' title="{{__('Create')}} {{ ucwords(Str::singular($module_name)) }}"/>
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
                                {{ trans('labels.backend.jobs.index.name') }}
                            </th>
                            <th>
                                {{ trans('labels.backend.jobs.index.title') }}
                            </th>
                            <th>
                                {{ trans('labels.backend.jobs.index.salary') }}
                            </th>
                            <th>
                                {{ trans('labels.backend.jobs.index.status') }}
                            </th>
                            <th class="text-right">
                                {{ trans('labels.backend.jobs.index.action') }}
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

    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: true,
        responsive: true,
        ajax: '{{ route("backend.$module_name.index_data") }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'job_name', name: 'job_name'},
            {data: 'job_title', name: 'job_title'},
            {data: 'job_salary', name: 'job_salary'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: true}
        ],
        language: {
            lengthMenu:"{{ __('article::categories.show')}} _MENU_ {{ __('article::categories.entries') }}",
            search: "{{ __('article::categories.search') }}",
            info: "{{ __('article::categories.info',['start' => "_START_", 'end' => "_END_", 'total' => "_TOTAL_"])}}",
            paginate:{
                next: "{{ __('article::categories.next') }}",
                previous:"{{ __('article::categories.previous') }}",
            }
        },

    });
    $('div.dataTables_length select').addClass('col-md-6');

</script>
@endpush
