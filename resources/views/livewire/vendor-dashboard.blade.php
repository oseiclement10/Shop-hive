<section>
    <div class="flex justify-between mb-6">
        <div class="">
            <h4 class="text-2xl font-semibold text-slate-800 "> Dashboard </h4>
            <p class="-mt-1 text-sm text-gray-600">view sales, orders, products & general overview</p>
        </div>

        <span class="text-xs text-gray-600"> {{ Auth::guard('vendor')->user()->name }} &copy; </span>
    </div>
    <div class="grid w-5/6 grid-cols-3 gap-6">
        <x-vendor.statistics color="bg-red-100" title="Total Revenue" :growth="16" value="Gh₵ 678.88" />
        <x-vendor.statistics color="bg-amber-100" title="Products Sold" :growth="-22" value="Gh₵ 178.88" />
        <x-vendor.statistics color="bg-blue-100" title="Pending Orders" :growth="6" value="Gh₵ 48.88" />
    </div>

</section>
