@extends ('backend.layouts.app')

<?php
$module_name_singular = Str::singular(__("tag::tags.$module_name"));
?>

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
                    <i class="{{ $module_icon }}"></i> {{ __("tag::tags.$module_title") }} <small class="text-muted">{{ __("tag::tags.$module_action") }}</small>
                </h4>
                <div class="small text-muted">
                    {{ ucwords(__("tag::tags.$module_name")) }} @lang('tag::tags.management_dashboard')
                </div>
            </div>
            <!--/.col-->
            <div class="col-4">
                <div class="float-right">
                    <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary mt-1 btn-sm" data-toggle="tooltip" title="{{ ucwords(__("tag::tags.$module_name")) }} {{__("tag::tags.List")}}"><i class="fas fa-list"></i> @lang('tag::tags.list')</a>
                </div>
            </div>
            <!--/.col-->
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
                            <th>
                                @lang('tag::tags.created_at')
                            </th>
                            <th class="text-right">
                                @lang('tag::tags.action')
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($$module_name as $module_name_singular)
                        <tr>
                            <td>
                                {{ $module_name_singular->id }}
                            </td>
                            <td>
                                <strong>
                                    {{ $module_name_singular->name }}
                                </strong>
                            </td>
                            <td>
                                {{ $module_name_singular->updated_at->isoFormat('llll') }}
                            </td>
                            <td>
                                {{ $module_name_singular->created_by }}
                            </td>
                            <td class="text-right">
                                <a href="{{route("backend.$module_name.restore", $module_name_singular)}}" class="btn btn-warning btn-sm" data-method="PATCH" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.restore')}}"><i class='fas fa-undo'></i> {{__('labels.backend.restore')}}</a>
                                <a href="{{route("backend.$module_name.destroy", $module_name_singular)}}" 
                                    class="btn btn-danger btn-sm" 
                                    data-method="delete" 
                                    data-token="{{csrf_token()}}" 
                                    data-toggle="tooltip" 
                                    title="{{__('labels.backend.delete')}}">
                                    <i class='fas fa-trash-alt'></i> {{__('labels.backend.delete')}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    @lang('tag::tags.total') {{ $$module_name->total() }} {{ ucwords(__("tag::tags.$module_name")) }}
                </div>
            </div>
            <div class="col-5">
                <div class="float-right">
                    {!! $$module_name->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section ('after-scripts-end')

@stop
