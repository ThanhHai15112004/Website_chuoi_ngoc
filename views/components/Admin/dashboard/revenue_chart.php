<?php
// views/components/Admin/dashboard/revenue_chart.php
?>
<!-- Revenue Chart -->
<div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-bold text-gray-800">Biểu đồ doanh thu</h3>
        <select class="text-sm border-gray-200 rounded-lg text-gray-600 bg-gray-50 focus:ring-red-900 focus:border-red-900">
            <option>7 ngày qua</option>
            <option>Tháng này</option>
            <option>Năm nay</option>
        </select>
    </div>
    <div class="h-72 w-full">
        <canvas id="revenueChart"></canvas>
    </div>
</div>

<!-- Chart.js Initialization -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('revenueChart').getContext('2d');
        
        // Gradient for chart
        let gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(107, 13, 24, 0.2)'); // color-crimson with opacity
        gradient.addColorStop(1, 'rgba(107, 13, 24, 0)');
        
        const revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
                datasets: [{
                    label: 'Doanh thu (Triệu VNĐ)',
                    data: [12, 19, 15, 25, 22, 30, 28],
                    borderColor: '#6B0D18',
                    backgroundColor: gradient,
                    borderWidth: 2,
                    pointBackgroundColor: '#C5A880',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        padding: 10,
                        titleFont: { family: 'Inter', size: 13 },
                        bodyFont: { family: 'Inter', size: 14, weight: 'bold' },
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + ' Triệu VNĐ';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f3f4f6',
                            drawBorder: false,
                        },
                        ticks: {
                            font: { family: 'Inter', size: 11 },
                            color: '#9ca3af'
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            font: { family: 'Inter', size: 11 },
                            color: '#9ca3af'
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
            }
        });
    });
</script>
