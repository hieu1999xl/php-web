<div class="text-left">
    @can('edit_'.$module_name)
    <x-buttons.edit route='{!!route("backend.$module_name.edit", $data->id)!!}' title="{{__('Edit')}} {{ ucwords(Str::singular(__($module_name))) }}" small="true" />
    @endcan
    <x-buttons.show route='{!!route("backend.$module_name.show", $data->id)!!}' title="{{__('Show')}} {{ ucwords(Str::singular(__($module_name))) }}" small="true" />
    {{-- <a href='{!!route("backend.$module_name.set_slide", ['id' => $data->id, 'order' => 1])!!}' title="Set Slide1" small="true" class="btn btn-primary" id="slide-1">Set Slide1</a>
    <a href='{!!route("backend.$module_name.set_slide", ['id' => $data->id, 'order' => 2])!!}' title="Set Slide2" small="true" class="btn btn-primary" id="slide-2">Set Slide2</a> 
    
    <a href='{!!route("backend.$module_name.set_slide", ['id' => $data->id, 'order' => 3])!!}' title="Set Slide2" small="true" class="btn btn-primary" id="slide-2">Set Slide2</a> --}}

    @php
        $type = $data->type;
        $selected = 0;
        //dd($type);
        if ($type == 0)
        {
            $selected = $data->oder;
        }
    @endphp
    <select class="form-control mt-2" id="onchange" onchange="onChangeUpdatePosition({{$data->id}}, this.value)">
        <option value="0">---Select Slide---</option>
        <option value="1" {{ $selected == 1 ? 'selected' : ''}}>Slide1</option>
        <option value="2" {{ $selected == 2 ? 'selected' : ''}}>Slide2</option>
        <option value="3" {{ $selected == 3 ? 'selected' : ''}}>Slide3</option>
    </select>
</div>
{{-- <script type="text/javascript">
    $('#onchange').change(function () {
        console.log('test')
    })
</script> --}}
