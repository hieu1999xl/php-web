@props(["route"=>"", "icon"=>"fas fa-plus-circle", "title", "small"=>"", "class"=>""])

@if($route)
<a href='{{$route}}'
    class='btn btn-success {{($small=='true')? 'btn-sm' : ''}} {{$class}}'
    data-toggle="tooltip"
    title="{{ __('Create') }}">
    <i class="{{$icon}}"></i>
    {{ __('Create') }}
</a>
@else
<button type="submit"
    class='btn btn-success {{($small=='true')? 'btn-sm' : ''}} {{$class}}'
    data-toggle="tooltip"
    title="{{ __('Create') }}">
    <i class="{{$icon}}"></i>
    {{ __('Create') }}
</button>
@endif
