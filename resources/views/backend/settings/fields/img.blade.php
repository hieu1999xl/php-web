{{-- @php
$required = (Str::contains($field['rules'], 'required')) ? "required" : "";
$required_mark = ($required != "") ? '<span class="text-danger"> <strong>*</strong> </span>' : '';
@endphp

<div class="form-group d-flex flex-column{{ $errors->has($field['name']) ? ' has-error' : '' }}">
	<label for="{{ $field['name'] }}"> <strong>{{ $field['label'] }}</strong></label> {!! $required_mark !!}
     <img src="{{ $field['src'] }}"
           id="{{ $field['name'] }}">

    @if ($errors->has($field['name'])) <small class="invalid-feedback">{{ $errors->first($field['name']) }}
   </small> @endif
</div> --}}
