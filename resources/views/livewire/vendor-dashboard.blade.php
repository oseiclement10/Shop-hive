<section>
    <div class="flex justify-between mb-6">
        <div class="">
            <h4 class="text-2xl font-semibold text-slate-800 "> Dashboard </h4>
            <p class="-mt-1 text-sm text-gray-600">view sales, orders, products & general overview</p>
        </div>

        <span class="text-xs text-gray-600"> {{ Auth::guard('vendor')->user()->name }} &copy; </span>
    </div>
    <div class="grid w-5/6 grid-cols-3 gap-6">
        <x-vendor.statistics color="bg-red-100" title="Total Revenue" :growth="16" value="Gh₵ 678.88" />
        <x-vendor.statistics color="bg-amber-100" title="Products Sold" :growth="-22" value="Gh₵ 178.88" />
        <x-vendor.statistics color="bg-blue-100" title="Pending Orders" :growth="6" value="Gh₵ 48.88" />
    </div>

    <h4 class="mt-10 mb-2 text-xl font-semibold text-slate-800">Top Selling</h4>
        
    <div class="w-[95%] py-1 border border-gray-200 rounded-md hover:border-emerald-600">
        <x-table :headers="$headers" :rows="$products" >

            @scope('cell_stock.price', $product)
                <span class="text-sm font-semibold text-slate-700"> Gh₵ {{ optional($product->stock)->price ?? 'N/A' }}
                </span>
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

            @scope('actions', $product)
                <span class="flex space-x-1">
                    <x-dropdown>
                        <x-slot:trigger>
                            <button class="pr-2 text-gray-500 hover:text-emerald-600">
                                <x-icon name="s-pencil-square" class="w-4 h-4 " />
                            </button>
                        </x-slot:trigger>
                        <x-menu-item title="Update Stock" icon="s-arrow-path" />
                        <x-menu-item title="Edit Product" icon="o-trash" @click="$wire.showEdit({{ $product->id }})" />
                    </x-dropdown>
                    <button icon='o-trash' title="Delete" class="text-gray-500 hover:text-red-600">
                        <x-icon name="o-trash" class="w-4 h-4 " />
                    </button>

                </span>
            @endscope
        </x-table>
    </div>



</section>
