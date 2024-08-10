@props(['href', 'label'])

@php
    $isActive = Route::is($href);
@endphp


<a href="{{ route($href) }}"
    class="flex border-l-4 py-2 text-base font-normal  group {{ $isActive ? 'border-emerald-500 text-emerald-600 bg-white' : 'border-transparent text-slate-600 hover:text-emerald-500  ' }} "
    wire:navigate>
    <div class="flex items-center pt-1 ml-5 space-x-2 ">
        <span> {{ $slot }} </span>
        <h3 class="font-semibold ">{{ $label }}</h3>
    </div>

</a>
