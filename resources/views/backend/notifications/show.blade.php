@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}' >
        {{ __($module_title) }}
    </x-backend-breadcrumb-item>
    <x-backend-breadcrumb-item type="active">{{ __("$module_action") }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <h4 class="card-title mb-0">
                    <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>
                </h4>
                <div class="small text-muted">
                    @lang(":module_name ". __("management_dashboard"), ['module_name'=>Str::title(__($module_name))])
                </div>
            </div>
            <!--/.col-->
            <div class="col-4">
                <div class="float-right">
                    <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary mt-1 btn-sm" data-toggle="tooltip" title="{{ ucwords(__($module_name)) }} {{__("List")}}"><i class="fas fa-list"></i> @lang('List')</a>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->

        <hr>

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <?php $data = json_decode($$module_name_singular->data); ?>
                        <tbody>
                            <tr>
                                <th>@lang('Title')</th>
                                <th>
                                    {{ $data->title }}
                                </th>
                            </tr>
                            <tr>
                                <th>@lang('Text')</th>
                                <td>
                                    {!! $data->text !!}
                                </td>
                            </tr>
                            @if($data->url_backend != '')
                            <tr>
                                <th>@lang("URL Backend")</th>
                                <td>
                                    @lang('Backend'): <a href="{{$data->url_backend}}">{{$data->url_backend}}</a>
                                </td>
                            </tr>
                            @endif
                            @if($data->url_frontend != '')
                            <tr>
                                <th>@lang("URL Frontend")</th>
                                <td>
                                    @lang('Frontend'): <a href="{{$data->url_frontend}}">{{$data->url_frontend}}</a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    @lang('Updated'): {{$$module_name_singular->updated_at->diffForHumans()}},
                    @lang('Created'): {{$$module_name_singular->created_at->isoFormat('LLLL')}}
                </small>
            </div>
        </div>
    </div>
</div>

@endsection
