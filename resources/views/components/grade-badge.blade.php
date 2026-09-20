@props(['grade' => 'X'])

@php
    $grade = strtoupper(trim($grade));
@endphp

@if ($grade === 'X')
    <span class="inline-flex items-center gap-1.5 rounded-full bg-teal-100 px-3 py-1 text-xs font-bold text-teal-700">
        🌱 
    </span>
@elseif ($grade === 'XI')
    <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-100 px-3 py-1 text-xs font-bold text-indigo-700">
        🚀 
    </span>
@elseif ($grade === 'XII')
    <span class="inline-flex items-center gap-1.5 rounded-full bg-rose-100 px-3 py-1 text-xs font-bold text-rose-700">
        🎓 
    </span>
@else
    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">
        🏫 {{ $grade }}
    </span>
@endif