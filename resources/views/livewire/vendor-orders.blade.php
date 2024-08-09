<section>
    <h2 class="mb-4 text-2xl font-semibold text-emerald-900 ">Orders {{ $orderItems->count() }}</h2>

    <div class="w-5/6 py-1 border rounded-md">
        <table class="w-full">
            <thead class="text-base font-semibold text-slate-600">
                <tr class="">
                    <td class="py-2 pl-4">ID</td>
                    <td class="py-2 pl-4">Product</td>
                    <td class="py-2 pl-4">Price</td>
                    <td class="py-2 pl-4">Quantity </td>
                    <td class="py-2 pl-4">Total</td>
                    <td class="py-2 pl-4">Status</td>
                </tr>
            </thead>

            <tbody class="text-base text-slate-700 ">
                @foreach ($orderItems as $orderItem)
                    <tr class="border-y @if ($loop->last) border-none @endif">
                        <td class="py-2 pl-4 ">{{ $orderItem->id }}</td>
                        <td class="py-2 pl-4 ">{{ $orderItem->product->name }}</td>
                        <td class="py-2 pl-4 "> Gh₵ {{ $orderItem->price }} </td>
                        <td class="py-2 pl-4 "> {{ $orderItem->quantity }}</td>
                        <td class="py-2 pl-4 ">
                            Gh₵ {{ $orderItem->total }}
                        </td>
                        <td class="py-2 pl-4 ">{{ $orderItem->status }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</section>
