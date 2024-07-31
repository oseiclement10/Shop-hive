@props(['name'])

@php    
    $isActive = Route::is($name);
@endphp

<a href="{{ route($name) }}"
    class="text-sm border-b-2 font-semibold leading-6 text-gray-900 {{ $isActive ? 'border-emerald-600' : 'border-transparent' }} ">{{ $slot }}</a>
