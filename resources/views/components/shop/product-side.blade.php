@props(['stock'])

<div class="grid grid-cols-2 place-items-center h-full bg-white p-4 rounded-lg gap-4">
    <div class="">
        <h2 class="text-slate-700 font-semibold text-xl capitalize">
            {{ $stock->product->name }}
        </h2>
        <h4 class="text-slate-700 text-base font-semibold my-2">
            Gh₵   {{ $stock->price }}
        </h4>
        <x-buttons.primary type="secondary"> Shop Now </x-buttons.primary>
    </div>
    <div class="">
        <img src="{{ $stock->product->img }}" alt="{{ $stock->product->name }}" class=" w-full object-contain" />
    </div>
</div>
