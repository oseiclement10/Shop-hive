<section>
    <x-layouts.v-page-caption title="Products" desc="view and manage products and stocks" />

    {{-- STATISTICS --}}
    <div class="grid grid-cols-3 gap-6 mb-2    w-[95%]">
        <x-stat title="Total Products" description="Number of products you own" value="{{ $products->count() }}"
            icon="c-cube" class="border text-emerald-600 border-emerald-400 hover:border-emerald-600 transition-simple "
            color="text-emerald-500" />
    </div>


    <div class="w-[95%] flex items-end justify-end mb-6">
        <button @click="$wire.isModalOpen=true"
            class="px-4 py-2 text-sm text-white rounded-md bg-emerald-500 hover:bg-emerald-600 active:bg-white">
            Add Product <x-icon name="eos.add" />
        </button>

    </div>

    {{-- TABLE --}}
    <div class="w-[95%] py-1 border border-emerald-400 rounded-md hover:border-emerald-600">
        <x-table :headers="$headers" :rows="$products" with-pagination>

            @scope('cell_stock.price', $product)
                <span class="text-sm font-semibold text-slate-700"> Gh₵ {{ $product->stock->price }} </span>
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

    {{-- FORM --}}

    <x-modal wire:model="isModalOpen" title="Add New Product" subtitle="Fill form to create new product" separator>
        <x-form class="space-y-4">
            <x-input label="Product Name" wire:model="name"  class="border-emerald-500" />
            <x-file label="Product Image" wire:model="photo" accept="image/png, image/jpeg"> 
                <img src="{{Vite::asset("resources/images/upload-img.jpg") }}" alt="product image" class="h-24 rounded-lg"  />
            </x-file>
            
            <x-input label="Short Description" wire:model="description" class="border-emerald-500" />
            <x-textarea label="Long Description" wire:model="long_description" placeholder="Product Description ..."
                rows="5"  class="border-emerald-500" />
            <x-input label="Product Price" type="number" wire:model="price" class="border-emerald-500" />
            <x-input label="Product Quantity" type="number" wire:model="stock" class="border-emerald-500" />
        </x-form>

        <x-slot:actions>
            <button @click='$wire.isModalOpen=false'>Cancel</button>
            <button>Confirm</button>
        </x-slot:actions>
    </x-modal>

</section>
