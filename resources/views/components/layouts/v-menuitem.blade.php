@props(['href', 'label'])

@php
    $isActive = Route::is($href);
@endphp


<a href="{{ route($href)}}"
    class="flex border-l-4 py-1 text-base font-normal  group {{ $isActive ? 'border-emerald-600 text-emerald-800 bg-emerald-50 ' : 'border-transparent text-slate-600' }}">
    <div class="flex pt-1 items-center space-x-2 ml-3 ">
        <span> {{ $slot }} </span>
        <h3 class="font-semibold text-slate-700 ">{{ $label }}</h3>
    </div>

</a>
