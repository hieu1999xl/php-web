@props(["route"=>"", "icon"=>"fas fa-desktop", "title", "small"=>"", "class"=>""])

@if($route)
<a href='{{$route}}'
    class='btn btn-success {{($small=='true')? 'btn-sm' : ''}} {{$class}}'
    data-toggle="tooltip"
    title="{{ __('Show') }}">
    <i class="{{$icon}}"></i>
    {{ __('Show') }}
</a>
@else
<button type="submit"
    class='btn btn-success {{($small=='true')? 'btn-sm' : ''}} {{$class}}'
    data-toggle="tooltip"
    title="{{ __('Show') }}">
    <i class="{{$icon}}"></i>
    {{ __('Show') }}
</button>
@endif
