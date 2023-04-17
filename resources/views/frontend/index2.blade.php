<ul class="navbar-nav ml-auto">
    @foreach (config('app.available_locales') as $locale)
        <li class="nav-item">
            <a class="nav-link"
               href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
               @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
        </li>
@endforeach



<br />
<br />
<br />
<br />

    Đây là ngôn ngữ: {{$lang}}
