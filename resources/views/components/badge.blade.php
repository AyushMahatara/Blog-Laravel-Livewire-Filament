@props([
'textColor',
'bgColor',
])

@php
$textColor = match($textColor) {
'gray' => 'text-gray-100',
'blue' => 'text-blue-400',
'red' => 'text-red-400',
'gray' => 'text-gray-100',
'white' => 'text-white',
default => 'text-white',
}
@endphp

@php
$bgColor = match($bgColor) {
'gray' => 'bg-gray-100',
'blue' => 'bg-blue-400',
'red' => 'bg-red-400',
'gray' => 'bg-gray-100',
'white' => 'bg-white',

default => 'bg-white',
}
@endphp

<button {{ $attributes }} class=" {{ $bgColor }} {{ $textColor }} rounded-xl px-3 py-1 text-base">
    {{ $slot }}
</button>