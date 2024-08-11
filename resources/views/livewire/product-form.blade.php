<x-form class="space-y-4" wire:submit='save'>
    <x-input label="Product Name" wire:model="name" class="border-emerald-500" placeholder="name goes here" />
    <x-file label="Product Image" wire:model="img" accept="image/png, image/jpeg">
        <img src="{{ Vite::asset('resources/images/upload-img.jpg') }}" alt="product image"
            class="h-24 rounded-lg" />
    </x-file>

    <x-input label="Short Description" wire:model="short_description" class="border-emerald-500" placeholder="description goes here" />
    <x-textarea label="Long Description" wire:model="long_description" placeholder="Product Description ..."
        rows="5" class="border-emerald-500" />

    <x-choices-offline label="Category" wire:model="category" :options="$categories"
        hint="select at least one category" class="border-emerald-500"
        no-result-text="Ops! Nothing here ..." searchable  />


    <div class="border-t">
        <p class="py-2 ml-1 text-sm text-gray-900">Product Stock </p>
        <div class="grid grid-cols-2 gap-6">
            <x-input label="Price"  prefix="Gh₵" wire:model="price" class="border-emerald-500" />
            <x-input label="Quantity" type="number" wire:model="quantity" class="border-emerald-500" />
        </div>

    </div>

    <x-slot:actions>
        <x-button label="Cancel" class="" wire:click="$parent.isModalOpen=false" />
        <x-button label="Save Product"
            class="text-sm text-white border-none rounded-md bg-emerald-500 hover:bg-emerald-600 active:bg-white"
            type="submit" spinner="save" />
    </x-slot:actions>


</x-form>