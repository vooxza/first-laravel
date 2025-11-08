
@props(['href', 'active' => false])

<a href="{{ $href }}"
   {{ $attributes->class([
       'rounded-md px-3 py-2 text-sm font-medium',
       $active
           ? 'bg-gray-950/50 text-white'
           : 'text-gray-300 hover:bg-white/5 hover:text-white'
   ]) }}>
    {{ $slot }}
</a>
