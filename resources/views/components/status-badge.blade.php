@props(['status' => 'Aktif'])

@php
    $status = trim($status);
@endphp

@if (strtolower($status) === 'aktif')
    <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
        {{ $status }}
    </span>
@elseif (strtolower($status) === 'tidak aktif')
    <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
        {{ $status }}
    </span>
@else
    <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">
        {{ $status }}
    </span>
@endif