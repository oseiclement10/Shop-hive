@props(['stock'])

<div class="grid bg-white px-8  py-6 place-items-center rounded-lg grid-cols-3  h-full">
    <div class="col-span-1 ml-6 ">
        <h2 class="text-slate-700 font-semibold text-4xl capitalize">
            {{ $stock->product->name }}
        </h2>
        <h4 class="text-slate-700 text-lg font-semibold my-2">
            Gh₵ {{ $stock->price }}
        </h4>
        <div class="">
            <x-buttons.primary>
                <span class="flex space-x-2">
                    Shop Now
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </span>

            </x-buttons.primary>
        </div>

    </div>
    <div class="col-span-2 overflow-hidden ">
        {{-- <img src="{{ $stock->product->img }}" alt="{{ $stock->product->name }}" class=" h-full object-cover " /> --}}
        <img src="https://pngimg.com/d/macbook_PNG75.png" alt="{{ $stock->product->name }}" class=" object-contain " />
    </div>
</div>
