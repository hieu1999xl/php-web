@extends('backend.layouts.app')

@section('title') {{ __("tag::tags.$module_action") }} {{ __("tag::tags.$module_title") }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __("tag::tags.$module_title") }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <h4 class="card-title mb-0">
                    <i class="{{ $module_icon }}"></i> {{ __("tag::tags.$module_title") }} <small class="text-muted">{{__('tag::tags.data_table')}} {{ __("tag::tags.$module_action") }}</small>
                </h4>
                <div class="small text-muted">
                    {{ Str::title(__("tag::tags.$module_name")) }} @lang('tag::tags.management_dashboard')
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
                                    <i class="fas fa-eye-slash"></i> @lang('tag::tags.view_trash')
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
                                @lang('tag::tags.name')
                            </th>
                            <th>
                                @lang('tag::tags.updated_at')
                            </th>
                            <th class="text-right">
                                @lang('tag::tags.action')
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
            {data: 'name', name: 'name'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        language: {
            lengthMenu:"{{ __('tag::tags.show')}} _MENU_ {{ __('tag::tags.entries') }}",
            search: "{{ __('tag::tags.search') }}",
            info: "{{ __('tag::tags.info',['start' => "_START_", 'end' => "_END_", 'total' => "_TOTAL_"])}}",
            paginate:{
                next: "{{ __('tag::tags.next') }}",
                previous:"{{ __('tag::tags.previous') }}",
            }
        },
    });
    $('div.dataTables_length select').addClass('col-md-6');

</script>
@endpush
