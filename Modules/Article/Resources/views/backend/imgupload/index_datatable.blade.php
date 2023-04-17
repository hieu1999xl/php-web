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
                                Sub_Title
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Link Button
                            </th>
                            <th>
                                Image
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
    var URL = window.location.href;
    var str = URL.split('/', 3)
    var URLdefault = str.join('/')
    var URLdefault1 = str
    console.log("URLdefault1",URLdefault1)

    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: true,
        responsive: true,
    ajax: '{!! route("backend.$module_name.index_data") !!}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'sub_title', name: 'sub_title'},
            {data: 'title', name: 'title'},
            {data: 'link_button', name: 'link_button'},
            {data: 'image', name: 'image'},
            {data: 'action', name: 'action', orderable: false, searchable: true}
        ],
        columnDefs: [
            {
                "targets": 4,
                "width": "17%",
                "data": 'image',
                "render": function (data, type, row, meta) {
                    return '<img src="' + URLdefault + '/' + data + '"height="128" width="256"/>';
                }
            },
            {
                "width": "27%",
                "targets": 1, 
            },
            {
                "width": "3%",
                "targets": 0,
            },
            {
                "width": "20%",
                "targets": 2, 
            },
            {
                "width": "13%",
                "targets": 5,
            },
            {
                "width": "13%",
                "targets": 3,
                "data":"link_button",
                "render": function (data, type, row, meta) {
                    return row.link_button.split(URLdefault).slice(1,60);
                }
            }
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

function onChangeUpdatePosition (id, value) {
    //console.log(value);
    // let formData = new FormData();
    // formData.append('_token', "{{csrf_token()}}");
    // formData.append('id', )
    $.ajax({
        url: '{!! route("backend.$module_name.set_slide") !!}',
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            id: id,
            order: value
        },
        success: (data) => {
            console.log('data: ', data);
            location.reload();
        },
        error: (err) => {
            console.log(err);
        }
    })
}
</script>

@endpush
@push('scripts')
{{-- <script type="text/javascript">
 $('#select-slide').change(function() {
       console.log('test'); 
    });
</script> --}}
@endpush
