@extends('backend.layouts.app')

@section('title') {{ __("tag::tags.$module_action") }} {{ __("tag::tags.$module_title") }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}' >
        {{ __("tag::tags.$module_title") }}
    </x-backend-breadcrumb-item>
    <x-backend-breadcrumb-item type="active">{{ __("tag::tags.$module_action") }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <h4 class="card-title mb-0">
                    <i class="{{ $module_icon }}"></i> {{ __("tag::tags.$module_title") }} <small class="text-muted">{{ $module_action }}</small>
                </h4>
                <div class="small text-muted"> @lang('tag::tags.management_dashboard')
                </div>
            </div>
            <!--/.col-->
            <div class="col-4">
                <div class="float-right">
                    <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary mt-1 btn-sm" data-toggle="tooltip" title="{{ ucwords(__("tag::tags.$module_name")) }} {{__("tag::tags.list")}}"><i class="fas fa-list"></i> @lang('tag::tags.list')</a>
                    @can('edit_'.$module_name)
                    <a href="{{ route("backend.$module_name.edit", $$module_name_singular) }}" class="btn btn-primary mt-1 btn-sm" data-toggle="tooltip" title="{{__("tag::tags.edit")}} {{ Str::singular(__("tag::tags.$module_name")) }} "><i class="fas fa-wrench"></i> @lang('tag::tags.edit')</a>
                    @endcan
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->

        <hr>

        <div class="row mt-4">
            <div class="col-12 col-sm-5">

                @include('backend.includes.show')

            </div>
            <div class="col-12 col-sm-7">

                <div class="text-center">
                    <a href="{{route("frontend.$module_name.show", [encode_id($$module_name_singular->id), $$module_name_singular->slug])}}" class="btn btn-success" target="_blank"><i class="fas fa-link"></i> Public View</a>
                </div>
                <hr>

                <div class="card">
                    <div class="card-header">
                        @lang('tag::tags.posts')
                    </div>

                    <div class="card-body">
                        <ul class="fa-ul">
                            @forelse($posts as $row)
                            @php
                            switch ($row->status) {
                                case 0:
                                    // Unpublished
                                    $text_class = 'text-danger';
                                    break;

                                case 1:
                                    // Published
                                    $text_class = 'text-success';
                                    break;

                                case 2:
                                    // Draft
                                    $text_class = 'text-warning';
                                    break;

                                default:
                                    // Default
                                    $text_class = 'text-primary';
                                    break;
                            }
                            @endphp
                            <li>
                                <span class="fa-li"><i class="fas fa-check-square {{$text_class}}"></i></span> <a href="{{route('backend.posts.show', $row->id)}}">{{$row->name}}</a> <a href="{{route('frontend.posts.show', [encode_id($row->id), $row->slug])}}" class="btn btn-sm btn-outline-primary" target="_blank" data-toggle="tooltip" title="Public View" > <i class="fas fa-external-link-square-alt"></i> </a>
                            </li>
                            @empty
                            <p class="text-center">
                                @lang('tag::tags.no_post_found').
                            </p>
                            @endforelse
                        </ul>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    @lang('tag::tags.updated_at'): {{$$module_name_singular->updated_at->diffForHumans()}},
                    @lang('tag::tags.created_at'): {{$$module_name_singular->created_at->isoFormat('LLLL')}}
                </small>
            </div>
        </div>
    </div>
</div>

@stop
