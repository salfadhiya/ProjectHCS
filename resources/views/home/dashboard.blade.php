@extends('layouts.master')
@section('title', 'Human Capital Service   |  PT. Len Industri (Persero)')
@section('content')

<section class="row">
    <div class="col-12">
        <div class="row g-4">
            @php
                $cards = [
                    [
                        'label' => 'Admin General',
                        'count' => $adminGeneral,
                        'color' => 'bg-primary',
                        'icon' => 'bi-people-fill' 
                    ],
                    [
                        'label' => 'Admin IN',
                        'count' => $adminIn,
                        'color' => 'bg-info',
                        'icon' => 'bi-box-arrow-in-right'
                    ],
                    [
                        'label' => 'Admin Maintenance',
                        'count' => $adminMaintenance,
                        'color' => 'bg-success',
                        'icon' => 'bi-tools'
                    ],
                    [
                        'label' => 'Admin OUT',
                        'count' => $adminOut,
                        'color' => 'bg-danger',
                        'icon' => 'bi-box-arrow-right'
                    ],
                ];
            @endphp

            @foreach ($cards as $card)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex align-items-center gap-3 p-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center {{ $card['color'] }}" style="width: 50px; height: 50px;">
                            <i class="bi {{ $card['icon'] }} text-white fs-5"></i>
                        </div>
                        <div>
                            <p class="mb-1 text-muted small">{{ $card['label'] }}</p>
                            <h5 class="mb-0 fw-bold">{{ $card['count'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Grafik --}}
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-bottom-0">
                        <h5 class="mb-0 fw-bold">Grafik Peserta Onboarding per Bulan</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="bar"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Chart JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('bar').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                     'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Peserta Onboarding',
                data: @json($onboardingPerBulan),
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 4,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
