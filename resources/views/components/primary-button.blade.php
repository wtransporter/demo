@props(['icon'])
<a {{ $attributes->merge(['class' => 'btn h-10 bg-blue-700 hover:bg-blue-600 before:scale-0 ease-in-out active:bg-blue-700 focus:outline-none focus:ring-2 text-white font-semibold']) }}>
    {{ $slot }}
    @if (!empty($icon))
        <i class="fas fa-{{ $icon }} ml-1" style="font-size: 14px;"></i>
    @endif
</a>