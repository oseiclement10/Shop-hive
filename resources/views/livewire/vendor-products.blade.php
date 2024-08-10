<section>
    <x-layouts.v-page-caption title="Products" desc="view and manage products and stocks" />
    
    {{-- STATISTICS --}}

    <div class="grid grid-cols-3 gap-6 mb-8    w-[95%]">
        <x-stat title="Total Products" description="Number of products you own" value="44" icon="c-cube"
            class="border text-emerald-600 border-emerald-300 hover:border-emerald-600 transition-simple "
            color="text-emerald-500"  />
    </div>
    
    {{-- TABLE --}}

    <div class="w-[95%] py-1 border rounded-md">
        <x-table :headers="$headers" :rows="$products" />
    </div>
    
    {{-- <h2 class="mb-4 text-2xl font-semibold text-emerald-900">Products</h2>
    <section class="w-5/6 py-1 border rounded-md">
        <table class="w-full">
            <thead class="text-base font-semibold text-slate-600">
                <tr class="">
                    <td class="py-2 pl-4">ID</td>
                    <td class="py-2 pl-4">Name</td>
                    <td class="py-2 pl-4">Rating</td>
                    <td class="py-2 pl-4">Price </td>
                    <td class="py-2 pl-4">Category</td>
                    <td class="py-2 pl-4">Quantity</td>
                </tr>
            </thead>

            <tbody class="text-base text-slate-700 ">
                @foreach ($products as $product)
                    <tr class="border-y @if ($loop->last) border-none @endif">
                        <td class="py-2 pl-4 ">{{ $product->id }}</td>
                        <td class="py-2 pl-4 ">{{ $product->name }}</td>
                        <td class="py-2 pl-4 ">{{ round($product->reviewsAverage(), 1) }} </td>
                        <td class="py-2 pl-4 "> Gh₵ {{ $product->stocks->first()->price }}</td>
                        <td class="py-2 pl-4 "> <span class="px-2 text-sm border rounded-md bg-slate-50">
                                {{ $product->categories()->first()->name }} </span>
                        </td>
                        <td class="py-2 pl-4 ">{{ $product->totalQuantity() }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </section> --}}

</section>
