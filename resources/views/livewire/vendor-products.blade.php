<section>
    <x-layouts.v-page-caption title="Products" desc="view and manage products and stocks" />

    {{-- STATISTICS --}}
    <div class="grid grid-cols-3 gap-6 mb-2    w-[95%]">
        <x-stat title="Total Products" description="Number of products you own" value="{{ $products->count() }}"
            icon="c-cube" class="border text-emerald-600 border-emerald-400 hover:border-emerald-600 transition-simple "
            color="text-emerald-500" />
    </div>


    <div class="w-[95%] flex items-end justify-end mb-6">

        <button @click="$wire.showAdd()"
            class="px-4 py-2 text-sm text-white rounded-md bg-emerald-500 hover:bg-emerald-600 active:bg-white">
            Add Product <x-icon name="eos.add" />
        </button>

    </div>
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



    {{-- FORM --}}

    <x-modal wire:model="isModalOpen" title="{{ $isEditMode ? 'Edit Product' : 'Add New Product' }}"
        subtitle="Fill form to {{ $isEditMode ? 'update' : 'add new' }} product">
        <x-form class="space-y-4" wire:submit='save'>
            <x-input label="Product Name" name="name" wire:model="form.name" class="border-emerald-500"
                placeholder="name goes here" />
            <x-file label="Product Image" name="img" wire:model="form.img" accept="image/png, image/jpeg">
                <img src="{{ Vite::asset('resources/images/upload-img.jpg') }}" alt="product image"
                    class="h-24 rounded-lg" />
            </x-file>

            <x-input label="Short Description" name="desc" wire:model="form.short_description" class="border-emerald-500"
                placeholder="description goes here" />
            <x-textarea label="Long Description" name="desc" wire:model="form.long_description"
                placeholder="Product Description ..." rows="5" class="border-emerald-500" />

            <x-choices-offline label="Category" name="category" wire:model="form.category" :options="$categories"
                hint="select at least one category" class="border-emerald-500" no-result-text="Ops! Nothing here ..."
                searchable />


            <div class="border-t">
                <p class="py-2 ml-1 text-sm text-gray-900">Product Stock </p>
                <div class="grid grid-cols-2 gap-6">
                    <x-input label="Price" prefix="Gh₵" wire:model="form.price" class="border-emerald-500" />
                    <x-input label="Quantity" type="number" wire:model="form.quantity" class="border-emerald-500" />
                </div>

            </div>

            <x-slot:actions>
                <x-button label="Cancel" class="" wire:click="$wire.isModalOpen=false" />
                <x-button label="Save Product"
                    class="text-sm text-white border-none rounded-md bg-emerald-500 hover:bg-emerald-600 active:bg-white"
                    type="submit" spinner="save" />
            </x-slot:actions>


        </x-form>
    </x-modal>

</section>
