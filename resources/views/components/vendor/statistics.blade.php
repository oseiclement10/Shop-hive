@props(['title', 'value', 'growth', 'color'])

<div class="{{ $color }} font-dmsans rounded-xl flex items-center justify-between p-6">
    <div class="">
        <h4 class="font-semibold text-gray-700 text-base mb-1">{{ $title }}</h4>
        <h2 class="text-2xl font-semibold">{{ $value }}</h2>
    </div>
    @if ($growth > 0)
        <div class="flex flex-col space-y-2">
            <svg class="w-6 h-6 text-emerald-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4.5V19a1 1 0 0 0 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.207M20 9v3.207" />
            </svg>
            <span class="text-xs text-slate-700"> {{ $growth }}% </span>
        </div>
    @else
        <div class="flex flex-col space-y-2">
            <svg class="w-6 h-6 text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4.5V19a1 1 0 0 0 1 1h15M7 10l4 4 4-4 5 5m0 0h-3.207M20 15v-3.207" />
            </svg>
            <span class="text-xs text-slate-700"> {{ $growth }}% </span>
        </div>
    @endif
</div>
