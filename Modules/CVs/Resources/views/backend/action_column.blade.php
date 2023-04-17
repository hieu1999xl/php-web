<div class="text-right">
    <div class="row">
        <div class="col-9">
        @can('edit_'.$module_name)
        @include ("cvs::backend.formStatus")
        <!-- <x-buttons.edit route='{!!route("backend.$module_name.edit", $data->id)!!}' title="{{__('Edit')}} {{ ucwords(Str::singular(__($module_name))) }}" small="true" /> -->
        @endcan
        </div>
        <div class="col-3">
        <x-buttons.show route='{!!route("backend.$module_name.show", $data->id)!!}' title="{{__('Show')}} {{ ucwords(Str::singular(__($module_name))) }}" small="true" />
    </div>
    </div>
</div>
