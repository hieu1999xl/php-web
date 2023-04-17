@if (count($breadcrumbs))
<div class="bg-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb_ol font-size-breadcrumb">
                    @foreach ($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb['url'] && !$loop->last)
                    <li class="breadcrumb-item"><a class="font-size-breadcrumb" href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
                    @else
                    <li class="breadcrumb-item active font-size-breadcrumb breadcrumbDetail" class="d-inline-block" >
                        {{ $breadcrumb['title'] }}
                    </li>
                    @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endif