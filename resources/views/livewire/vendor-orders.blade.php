<section>
    <x-layouts.v-page-caption title="Orders" desc="view and manage orders" />
    <div class="w-[95%] py-1 border rounded-md">
        <x-table striped :headers="$headers" :rows="$orderItems" :cell-decoration="$cell_decoration" @row-click="console.log($event.detail.id)"
            with-pagination>
            @scope('cell_price', $orderItem)
                <span class=" text-slate-800"> Gh₵ {{ $orderItem->price }} </span>
            @endscope

            @scope('cell_total', $orderItem)
                <span class=" text-slate-800"> Gh₵ {{ $orderItem->total }} </span>
            @endscope

            @scope('actions', $orderItem)
                <x-dropdown >
                    <x-slot:trigger>
                        <button class="pr-2" > 
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
