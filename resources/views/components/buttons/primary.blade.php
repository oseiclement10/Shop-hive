@props(['type' => 'normal'])

@if ($type == 'normal')
    <button
        class="text-white py-[5px] border-2 border-transparent text-sm bg-amber-400 px-4 text-center cursor-pointer  rounded-md transition-primary hover:bg-emerald-500 hover:opacity-70 active:opacity-30">
        {{ $slot }}
    </button>
@elseif ($type == 'secondary')
    <button class="text-sm  py-1 font-semibold flex flex-col group active:opacity-30">
        <span class="flex mb-1 text-slate-800 opacity-80 transition-primary group-hover:opacity-100"> {{ $slot }}
        </span>

        <span class="flex w-2/3 h-[3px] bg-amber-400 transition-primary group-hover:w-full "> </span>
    </button>
@else
    <button class="text-sm  py-1 font-semibold flex flex-col group active:opacity-30">
        <span class="flex mb-1 text-blue-600 opacity-80 transition-primary group-hover:opacity-100"> {{ $slot }}
        </span>

        <span class="flex w-2/3 h-[3px] bg-blue-500 transition-primary group-hover:w-full "> </span>
    </button>
@endif
