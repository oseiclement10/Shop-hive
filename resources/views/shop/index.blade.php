<x-layouts.index>
    <x-layouts.nav />
    <section class="p-5 bg-slate-100  grid grid-cols-4 grid-rows-3  gap-6 h-[calc(100vh-80px)]">
        <div class=" col-span-3 row-span-2  ">
            <x-shop.product-card-large :stock="$stocks[5]" />
        </div>
        <div class="  ">
            <x-shop.product-side :stock="$stocks->first()" />
        </div>
        <div class="  flex items-center justify-center">
            <x-shop.product-side :stock="$stocks[14]" />
        </div>
        <div class="  flex items-center justify-center"> <x-shop.product-side :stock="$stocks[11]" /></div>
        <div class="  flex items-center justify-center"> <x-shop.product-side :stock="$stocks[3]" /></div>
        <div class="  flex items-center justify-center"> <x-shop.product-side :stock="$stocks[17]" /></div>
        <div class="  flex items-center justify-center"> <x-shop.product-side :stock="$stocks[18]" /></div>

    </section>

    {{-- <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800"> --}}

    {{-- </div> --}}



</x-layouts.index>
