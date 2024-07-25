<x-layouts.index>
    {{-- <x-layouts.nav /> --}}
    <header> </header>
    <section class="grid grid-cols-4 gap-8 px-8 bg-white">
        @foreach ($stocks as $stock)
            <x-shop.product-card />
        @endforeach
    </section>
    <div class="my-3">
        {{ $stocks->links() }}
    </div>

</x-layouts.index>
