@props(['category'])

<div class="py-4 px-2 flex flex-col items-center justify-center">
    <img src="{{ $category->img }}" alt="{{ $category->name }}" class="h-20 w-fit max-w-[200px] py-2 object-contain mb-3" />
    <h2 class="text-slate-800 font-semibold text-base">{{ $category->name }}</h2>
    <h4 class="text-gray-500 text-sm">{{ $category->products->count() }} Product{{$category->products->count()>1 ? 's' : ''}}  </h4>
</div>
