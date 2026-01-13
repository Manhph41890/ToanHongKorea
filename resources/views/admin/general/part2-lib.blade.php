<!-- Thêm thư viện Chart.js nếu chưa có -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Cấu hình font chung
    Chart.defaults.font.family =
        'Nunito, -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
    Chart.defaults.color = '#858796';

    // 1. BIỂU ĐỒ CỘT (Sản phẩm theo chuyên mục)
    var ctxCategory = document.getElementById("categoryChart").getContext('2d');
    var categoryChart = new Chart(ctxCategory, {
        type: 'bar',
        data: {
            labels: {!! json_encode($catNames) !!}, // Lấy từ controller
            datasets: [{
                label: "Số lượng sản phẩm",
                backgroundColor: "rgba(78, 115, 223, 0.8)",
                hoverBackgroundColor: "rgba(78, 115, 223, 1)",
                borderColor: "#4e73df",
                data: {!! json_encode($catCounts) !!}, // Lấy từ controller
                borderRadius: 8, // Làm cột bo tròn nhìn rất xịn
                barPercentage: 0.6,
            }],
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyColor: "#858796",
                    titleMarginBottom: 10,
                    titleColor: '#6e707e',
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 10
                    }
                },
                y: {
                    ticks: {
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        padding: 10,
                    },
                    grid: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                },
            }
        }
    });

    // 2. BIỂU ĐỒ TRÒN (Phân loại theo nhà mạng - Carrier)
    var ctxCarrier = document.getElementById("carrierChart").getContext('2d');
    var carrierChart = new Chart(ctxCarrier, {
        type: 'doughnut', // Dùng Doughnut nhìn hiện đại hơn Pie
        data: {
            labels: ["SKT", "KT", "LGU+"],
            datasets: [{
                data: {!! json_encode($carrierData) !!}, // Lấy từ biến $carrierData
                backgroundColor: ['#e74a3b', '#4e73df', '#f6c23e'], // Đỏ SK, Xanh KT, Vàng LG
                hoverBackgroundColor: ['#c0392b', '#2e59d9', '#f4b619'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
                spacing: 5 // Tạo khoảng cách giữa các miếng
            }],
        },
        options: {
            maintainAspectRatio: false,
            cutout: '70%', // Độ mỏng của vòng tròn
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                },
                tooltip: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: true,
                    caretPadding: 10,
                }
            }
        }
    });
</script>
