@props(["route"=>"", "icon"=>"fas fa-wrench", "title", "small"=>"", "class"=>""])

@if($route)
<a href='{{$route}}'
    class='btn btn-primary {{($small=='true')? 'btn-sm' : ''}} {{$class}}'
    data-toggle="tooltip"
    title="{{ __("$title") }}">
    <i class="{{$icon}}"></i>
    {{ __("Edit") }}
</a>
@else
    print_r(');
<button type="submit"
    class='btn btn-primary {{($small=='true')? 'btn-sm' : ''}} {{$class}}'
    data-toggle="tooltip"
    title="{{ __("$title") }}">
    <i class="{{$icon}}"></i>
    {{ __("Edit") }}
</button>
@endif
