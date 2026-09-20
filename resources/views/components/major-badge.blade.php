@props(['code' => 'AKL'])

@php
    $code = strtoupper(trim($code));
@endphp

@if ($code === 'AKL')
    <span class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-700">
        AKL
    </span>
@elseif ($code === 'BID')
    <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-bold text-blue-700">
        BID
    </span>
@elseif ($code === 'TKJ')
    <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
        TKJ
    </span>
@else
    <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">
        {{ $code }}
    </span>
@endif