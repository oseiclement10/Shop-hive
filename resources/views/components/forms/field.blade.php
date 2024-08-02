@props(['name', 'placeholder' => '', 'label', 'type' => 'text', 'required' => false])
<div>
    <label for="{{ $name }}" class="text-base font-medium text-gray-800">
        {{ $label }}
    </label>

    <div class="mt-2.5">
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name) }}"
            autocomplete="email" placeholder="{{ $placeholder }}"
            class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-emerald-600 focus:bg-white caret-emerald-600"
            {{ $required ? 'required' : '' }} />
        @error($name)
            <p class="text-xs  text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

