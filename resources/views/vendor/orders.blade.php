<x-layouts.v>
    <h2 class="text-2xl font-semibold mb-4 text-emerald-900 ">Orders {{$orderItems->count()}}</h2>
    
    <section class="border w-5/6  py-1 rounded-md">
        <table class="w-full">
            <thead class="text-slate-600 text-base font-semibold">
                <tr class="">
                    <td class="py-2 pl-4">ID</td>
                    <td class="py-2 pl-4">Product</td>
                    <td class="py-2 pl-4">Price</td>
                    <td class="py-2 pl-4">Quantity </td>
                    <td class="py-2 pl-4">Total</td>
                    <td class="py-2 pl-4">Status</td>
                </tr>
            </thead>

            <tbody class="text-slate-700 text-base ">
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
    </section>
</x-layouts.v>
