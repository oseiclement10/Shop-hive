<x-layouts.index>
    <x-layouts.nav />
    <section class="bg-slate-100 py-6 space-y-6">
        {{-- FEATURED PRODUCTS --}}
        <section class="grid grid-cols-4 grid-rows-3  gap-6 h-[calc(100vh-130px)] w-[95%] mx-auto">
            <div class=" col-span-3 row-span-2">
                <x-shop.product-card-large :stock="$stocks[5]" />
            </div>
            <x-shop.product-side :stock="$stocks->first()" />
            <x-shop.product-side :stock="$stocks[14]" />

            <x-shop.product-side :stock="$stocks[11]" />
            <x-shop.product-side :stock="$stocks[3]" />
            <x-shop.product-side :stock="$stocks[17]" />
            <x-shop.product-side :stock="$stocks[18]" />
        </section>

        {{-- CATEGORIES --}}
        <section class="bg-white w-[95%] mx-auto pb-6">
            <h2 class="text-slate-700 font-semibold text-xl py-3 pl-6 border-b border-slate-200">
                Explore various categories
            </h2>
            <div class="grid grid-cols-6 gap-6">
                @foreach ($categories as $category)
                    <x-shop.category-card :category="$category" />
                @endforeach
            </div>
        </section>

    </section>


</x-layouts.index>
