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
    {{ $formMode }}
    {{-- TABLE --}}
    <div class="w-[95%] py-1 border border-emerald-400 rounded-md hover:border-emerald-600">
        <x-table :headers="$headers" :rows="$products" with-pagination>

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
                        <x-menu-item title="Update Stock" icon="s-arrow-path" wire:click="setFormMode('updateStock')"  />
                        <x-menu-item title="Edit Product" icon="o-trash" wire:click="setFormMode('editProduct')" />
                    </x-dropdown>   
                    <button icon='o-trash' title="Delete"  class="text-gray-500 hover:text-red-600"  >
                        <x-icon name="o-trash" class="w-4 h-4 " />    
                    </button> 
                   
                </span>
                
            @endscope
        </x-table>
    </div>



    {{-- FORM --}}

    <x-modal wire:model="isModalOpen" title="Add New Product" subtitle="Fill form to create new product">
        <livewire:product-form  />
    </x-modal>

</section>
