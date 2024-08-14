<section>
    <x-layouts.v-page-caption title="Orders" desc="view and manage orders" />
    
    {{-- STATISTICS --}}

    <div class="grid grid-cols-3 gap-6 mb-8    w-[95%]">
        <x-stat title="Sales Today" description="Orders completed ({{ $todayOrders }})" :value="$todayOrders" icon="o-arrow-trending-up"
            class="border text-emerald-600 border-emerald-300 hover:border-emerald-600 transition-simple "
            color="text-emerald-500" tooltip-right="Sales today" />
      
        <x-stat title="Pending Orders" description="Orders unprocessed" :value="$pendingOrders" icon="o-arrow-trending-down"
            class="text-orange-500 border border-orange-300 hover:border-orange-600" color="text-orange-500"
            tooltip-right="Pending Orders" />
    </div>
    
    {{-- TABLE --}}

    <div class="w-[95%] pt-1 pb-4 border border-emerald-400 rounded-md">
        <x-table striped :headers="$headers" :rows="$orderItems" :cell-decoration="$cell_decoration"
            @row-click="console.log($event.detail.id)" with-pagination>
            @scope('cell_price', $orderItem)
                <span class=" text-slate-800"> Gh₵ {{ $orderItem->price }} </span>
            @endscope

            @scope('cell_total', $orderItem)
                <span class=" text-slate-800"> Gh₵ {{ $orderItem->total }} </span>
            @endscope

            @scope('actions', $orderItem)
                <x-dropdown>
                    <x-slot:trigger>
                        <button class="pr-2">
                            <x-icon name="ri.more-fill" />
                        </button>
                    </x-slot:trigger>
                    <x-menu-item title="Change Status" icon="s-arrow-path" />
                    <x-menu-item title="Delete" icon="o-trash" />

                </x-dropdown>
            @endscope
        </x-table>
    </div>
</section>
