<x-layouts.v>
    <h2 class="text-2xl font-semibold mb-4 text-emerald-900">Products</h2>
    <section class="border w-5/6  py-1 rounded-md">
        <table class="w-full">
            <thead class="text-slate-600 text-base font-semibold">
                <tr class="">
                    <td class="py-2 pl-4">ID</td>
                    <td class="py-2 pl-4">Name</td>
                    <td class="py-2 pl-4">Rating</td>
                    <td class="py-2 pl-4">Price </td>
                    <td class="py-2 pl-4">Category</td>
                    <td class="py-2 pl-4">Quantity</td>
                </tr>
            </thead>

            <tbody class="text-slate-700 text-base ">
                @foreach ($products as $product)
                    <tr class="border-y @if($loop->last) border-none @endif">
                        <td class="py-2 pl-4 ">{{ $product->id }}</td>
                        <td class="py-2 pl-4 ">{{ $product->name }}</td>
                        <td class="py-2 pl-4 ">{{ round($product->reviewsAverage(), 1) }} </td>
                        <td class="py-2 pl-4 "> Gh₵ {{ $product->stocks->first()->price }}</td>
                        <td class="py-2 pl-4 "> <span class="border rounded-md bg-slate-50 text-sm px-2">
                                {{ $product->categories()->first()->name }} </span>
                        </td>
                        <td class="py-2 pl-4 ">{{ $product->totalQuantity() }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </section>


</x-layouts.v>
