<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // ==========================================
    // 1. Biểu đồ đường (Doanh thu theo thời gian)
    // ==========================================
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    
    // Inject mảng PHP sang mảng JavaScript
    const rawLabels = <?= json_encode($chartRevenue['raw_labels'] ?? $chartRevenue['labels']) ?>;
    const baseRevenueKyNay = <?= json_encode($chartRevenue['ky_nay']) ?>;
    const baseRevenueKyTruoc = <?= json_encode($chartRevenue['ky_truoc']) ?>;

    // Helper: get week number
    function getWeekNumber(d) {
        d = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
        d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));
        var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
        var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
        return d.getUTCFullYear() + "-W" + weekNo;
    }

    function groupChartData(interval) {
        if (interval === 'day') {
            return {
                labels: rawLabels.map(d => {
                    const dt = new Date(d);
                    if(isNaN(dt)) return d;
                    return dt.getDate().toString().padStart(2, '0') + '/' + (dt.getMonth() + 1).toString().padStart(2, '0');
                }),
                kyNay: baseRevenueKyNay,
                kyTruoc: baseRevenueKyTruoc
            };
        }

        const grouped = new Map();
        rawLabels.forEach((dStr, i) => {
            const dt = new Date(dStr);
            if(isNaN(dt)) return;
            
            let key = '';
            let label = '';
            if (interval === 'week') {
                key = getWeekNumber(dt);
                label = 'Tuần ' + key.split('-W')[1];
            } else if (interval === 'month') {
                key = dt.getFullYear() + '-' + dt.getMonth();
                label = 'Tháng ' + (dt.getMonth() + 1);
            }

            if (!grouped.has(key)) {
                grouped.set(key, { label, nay: 0, truoc: 0 });
            }
            const g = grouped.get(key);
            g.nay += baseRevenueKyNay[i] || 0;
            g.truoc += baseRevenueKyTruoc[i] || 0;
        });

        const labels = [];
        const kyNay = [];
        const kyTruoc = [];
        grouped.forEach(val => {
            labels.push(val.label);
            kyNay.push(val.nay);
            kyTruoc.push(val.truoc);
        });

        return { labels, kyNay, kyTruoc };
    }

    let currentInterval = 'day';
    let chartData = groupChartData(currentInterval);

    const revenueChart = new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [
                {
                    label: 'Kỳ này',
                    data: chartData.kyNay,
                    borderColor: '#6B0D18',
                    backgroundColor: 'rgba(107, 13, 24, 0.1)',
                    borderWidth: 2,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6B0D18',
                    pointBorderWidth: 2,
                    pointRadius: 0, // Ẩn điểm để đỡ rối
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Kỳ trước',
                    data: chartData.kyTruoc,
                    borderColor: '#9ca3af',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    borderDash: [5, 5],
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#9ca3af',
                    pointBorderWidth: 2,
                    pointRadius: 0, // Ẩn điểm
                    pointHoverRadius: 5,
                    fill: false,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    align: 'end',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 8,
                        font: { family: "'Inter', sans-serif", size: 12 }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleFont: { family: "'Inter', sans-serif", size: 13 },
                    bodyFont: { family: "'Inter', sans-serif", size: 13 },
                    padding: 10,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(context.parsed.y);
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        font: { family: "'Inter', sans-serif", size: 11 },
                        color: '#6b7280'
                    }
                },
                y: {
                    grid: {
                        color: '#f3f4f6',
                        drawBorder: false
                    },
                    ticks: {
                        font: { family: "'Inter', sans-serif", size: 11 },
                        color: '#6b7280',
                        callback: function(value, index, values) {
                            if (value >= 1000000) {
                                return value / 1000000 + ' Tr';
                            }
                            return value;
                        }
                    },
                    beginAtZero: true
                }
            }
        }
    });

    // Handle Interval Tabs
    const tabs = document.querySelectorAll('.chart-tab-btn');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Update active state
            tabs.forEach(t => {
                t.classList.remove('bg-white', 'shadow-sm', 'text-gray-800');
                t.classList.add('text-gray-500');
            });
            this.classList.remove('text-gray-500');
            this.classList.add('bg-white', 'shadow-sm', 'text-gray-800');

            // Update chart
            currentInterval = this.getAttribute('data-interval');
            const newData = groupChartData(currentInterval);
            
            // Adjust point radius based on density
            const pRadius = newData.labels.length <= 15 ? 4 : 0;
            
            revenueChart.data.labels = newData.labels;
            revenueChart.data.datasets[0].data = newData.kyNay;
            revenueChart.data.datasets[0].pointRadius = pRadius;
            revenueChart.data.datasets[1].data = newData.kyTruoc;
            revenueChart.data.datasets[1].pointRadius = pRadius;
            
            revenueChart.update();
        });
    });

    // ==========================================
    // 2. Biểu đồ tròn (Tình trạng đơn hàng)
    // ==========================================
    const ctxOrderStatus = document.getElementById('orderStatusChart').getContext('2d');
    
    // Inject dữ liệu
    const statusLabels = Object.keys(<?= json_encode($chartOrderStatus) ?>);
    const statusData = Object.values(<?= json_encode($chartOrderStatus) ?>);

    const orderStatusChart = new Chart(ctxOrderStatus, {
        type: 'doughnut',
        data: {
            labels: statusLabels,
            datasets: [{
                data: statusData,
                backgroundColor: [
                    '#22c55e', // Thành công (Green)
                    '#3b82f6', // Đang giao (Blue)
                    '#eab308', // Chờ xác nhận (Yellow)
                    '#f87171', // Đã hủy (Red)
                ],
                borderWidth: 2,
                borderColor: '#ffffff',
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%', // Tạo độ mỏng cho vành bánh (nhìn hiện đại hơn)
            plugins: {
                legend: {
                    display: false // Tắt legend mặc định để tự build bằng HTML ở ngoài cho đẹp
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleFont: { family: "'Inter', sans-serif", size: 13 },
                    bodyFont: { family: "'Inter', sans-serif", size: 13 },
                    padding: 10,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed + ' đơn';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });

});
</script>
