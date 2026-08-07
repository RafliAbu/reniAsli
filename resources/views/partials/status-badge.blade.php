@php
    $label = $status === 'Disetujui' ? 'Selesai' : $status;
    $classes = [
        'Menunggu' => 'status-waiting',
        'Dalam Proses' => 'status-process',
        'Disetujui' => 'status-done',
        'Ditolak' => 'status-rejected',
    ];
@endphp

<span class="status-badge {{ $classes[$status] ?? 'status-waiting' }}">{{ $label }}</span>
