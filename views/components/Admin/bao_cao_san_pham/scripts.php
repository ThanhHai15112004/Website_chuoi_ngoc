<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // ==========================================
    // 1. Biểu đồ Top SP Bán chạy (Horizontal Bar Chart)
    // ==========================================
    const ctxTopProducts = document.getElementById('topProductsChart').getContext('2d');
    
    const topLabels = <?= json_encode($chartTopProducts['labels']) ?>;
    const topDaBan = <?= json_encode($chartTopProducts['da_ban']) ?>;
    
    const topProductsChart = new Chart(ctxTopProducts, {
        type: 'bar',
        data: {
            labels: topLabels,
            datasets: [{
                label: 'Đã bán',
                data: topDaBan,
                backgroundColor: '#6B0D18', // Đỏ thẳm
                borderRadius: 4,
                barPercentage: 0.6
            }]
        },
        options: {
            indexAxis: 'y', // Chuyển thành biểu đồ ngang
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Ẩn legend vì chỉ có 1 data set
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleFont: { family: "'Inter', sans-serif", size: 13 },
                    bodyFont: { family: "'Inter', sans-serif", size: 13 },
                    padding: 10,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(context) {
                            return 'Đã bán: ' + context.parsed.x + ' sản phẩm';
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        color: '#f3f4f6',
                        drawBorder: false
                    },
                    ticks: {
                        font: { family: "'Inter', sans-serif", size: 11 },
                        color: '#6b7280'
                    },
                    beginAtZero: true
                },
                y: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        font: { family: "'Inter', sans-serif", size: 12, weight: '500' },
                        color: '#374151',
                        callback: function(value, index, values) {
                            // Cắt bớt tên dài nếu cần
                            let label = this.getLabelForValue(value);
                            if (label.length > 25) {
                                return label.substr(0, 25) + '...';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });

    // ==========================================
    // 2. Biểu đồ Doanh thu theo Danh mục (Doughnut Chart)
    // ==========================================
    const ctxCategory = document.getElementById('categoryChart').getContext('2d');
    
    const catLabels = Object.keys(<?= json_encode($chartCategories) ?>);
    const catData = Object.values(<?= json_encode($chartCategories) ?>);

    const categoryChart = new Chart(ctxCategory, {
        type: 'doughnut',
        data: {
            labels: catLabels,
            datasets: [{
                data: catData,
                backgroundColor: [
                    '#6B0D18', // Vòng tay (Đỏ thẳm)
                    '#b91c1c', // Chuỗi ngọc (Đỏ nhạt hơn)
                    '#f59e0b', // Vòng đá (Vàng/Cam)
                    '#10b981', // Quà tặng (Xanh lá)
                ],
                borderWidth: 2,
                borderColor: '#ffffff',
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%', // Vành mỏng
            plugins: {
                legend: {
                    display: false // Tự custom legend bằng HTML cho đẹp
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
                                label += new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(context.parsed);
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
