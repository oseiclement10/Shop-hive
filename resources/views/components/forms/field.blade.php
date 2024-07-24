@props(['name', 'label', 'type' => 'text', 'required' => false])
<div>
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }}
    </label>
    <div class="mt-2">
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name) }}"
            autocomplete="email"
            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-emerald-600 sm:text-sm sm:leading-6"
            {{ $required ? 'required' : '' }} />
        @error($name)
            <p class="text-xs  text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
