@php
    echo $attributes;
@endphp

<a {{ $attributes }}>
    {{ $slot }}
</a>
