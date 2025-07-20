@props(['id', 'name', 'label' => null, 'required' => false])

<div class="mb-4">
    @if ($label)
        <label class="block text-gray-300" for="{{ $id }}">{{ $label }}</label>
    @endif

    <input id="{{ $id }}" name="{{ $name }}" type="file" {{ $required ? 'required' : '' }}
        class="text-gray-400 w-full px-4 py-2 border rounded focus:outline-none cursor-pointer
            @error($name)
                border-red-500                            
            @enderror" />
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
