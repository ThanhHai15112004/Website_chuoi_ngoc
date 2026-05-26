<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // ==========================================
    // 1. Biểu đồ đường (Doanh thu theo thời gian)
    // ==========================================
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    
    // Inject mảng PHP sang mảng JavaScript (Sử dụng json_encode rất an toàn và đúng chuẩn)
    const revenueLabels = <?= json_encode($chartRevenue['labels']) ?>;
    const revenueKyNay = <?= json_encode($chartRevenue['ky_nay']) ?>;
    const revenueKyTruoc = <?= json_encode($chartRevenue['ky_truoc']) ?>;

    const revenueChart = new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: revenueLabels,
            datasets: [
                {
                    label: 'Kỳ này',
                    data: revenueKyNay,
                    borderColor: '#6B0D18',
                    backgroundColor: 'rgba(107, 13, 24, 0.1)',
                    borderWidth: 2,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6B0D18',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4 // Làm cong mượt đường line
                },
                {
                    label: 'Kỳ trước',
                    data: revenueKyTruoc,
                    borderColor: '#9ca3af',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    borderDash: [5, 5], // Nét đứt
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#9ca3af',
                    pointBorderWidth: 2,
                    pointRadius: 3,
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
