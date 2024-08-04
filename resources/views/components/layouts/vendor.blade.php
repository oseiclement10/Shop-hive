<x-layouts.index>
    <section class="grid font-dmsans grid-cols-6 min-h-dvh bg-emerald-100 gap-4 p-4">
        <aside class="col-span-1">
            <x-layouts.v-sidebar />
        </aside>
        <section class="col-span-5 h-full bg-white rounded-xl px-10 py-6"> {{ $slot }} </section>

    </section>
</x-layouts.index>
