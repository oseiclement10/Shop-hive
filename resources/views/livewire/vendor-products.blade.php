<section>
    <x-layouts.v-page-caption title="Products" desc="view and manage products and stocks" />

    {{-- STATISTICS --}}

    <div class="grid grid-cols-3 gap-6 mb-8    w-[95%]">
        <x-stat title="Total Products" description="Number of products you own" value="{{ $products->count() }}"
            icon="c-cube" class="border text-emerald-600 border-emerald-400 hover:border-emerald-600 transition-simple "
            color="text-emerald-500" />
    </div>

    {{-- TABLE --}}

    <div class="w-[95%] py-1 border border-emerald-400 rounded-md hover:border-emerald-600">
        <x-table :headers="$headers" :rows="$products" with-pagination>

            @scope('cell_stock.price', $product)
                <span class="text-sm font-semibold  text-slate-700"> Gh₵ {{ $product->stock->price }} </span>
            @endscope

            @scope('cell_category', $product)
                <span>
                    @foreach ($product->categories->take(3)->pluck('name') as $categoryName)
                        <span class="px-1 mx-1 text-xs border rounded-md border-emerald-300"> {{ $categoryName }} </span>
                    @endforeach
                    @if (count($product->categories) > 3)
                        ...
                    @endif
                </span>
            @endscope

            @scope('cell_rating', $product)
                <span> {{ round($product->reviewsAverage(), 1) }} </span>
            @endscope
        </x-table>
    </div>

  

</section>
