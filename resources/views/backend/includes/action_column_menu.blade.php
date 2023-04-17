<div class="text-right">
    <x-buttons.show route='{!!route("backend.$module_name.show", $data->id)!!}' title="{{__('Show')}} {{ ucwords(Str::singular(__($module_name))) }}" small="true" />
</div>
