@props(['stock'])

<div class="bg-slate-100 px-6 pb-10 pt-4 rounded-md">
    <p class="bg-red-500 text-white px-2 py-[2px] w-fit rounded-sm text-xs">Out of Stock</p>
    <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="test title"
        class="h-40 w-full object-contain" />
    <h3 class="mt-4 leading-tight w-5/6 text-lg font-semibold text-gray-900"> {{ $stock->product->name }} </h3>

    <div class="mb-4 flex items-center justify-between text-sm text-gray-700">
        <span> {{ $stock->product->short_description }} </span>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-amber-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 22 22">
                <path
                    d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z" />
            </svg>
            <svg class="w-6 h-6 text-amber-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 22 22">
                <path
                    d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z" />
            </svg>

            <svg class="w-6 h-6 text-amber-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 22 22">
                <path
                    d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z" />
            </svg>
        </div>
    </div>

    <p class="mt-1 text-xl text-gray-900 font-bold"> GH₵ {{ $stock->price ?? 0 }}</p>
</div>
