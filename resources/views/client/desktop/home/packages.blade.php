{{-- Container bao bọc toàn bộ danh sách --}}
<div class="spc-section-container">

    {{-- Phần tiêu đề --}}
    <div class="spc-section-header">
        <h2 class="spc-main-title">Gói cước Hot</h2>
        <div class="spc-title-underline"></div>
    </div>

    <div class="spc-list-wrapper mb-5">
        @for ($i = 1; $i <= 8; $i++)
            <div class="spc-card-container">
                <!-- Header: Tên và Nút yêu thích -->
                <div class="spc-card-head">
                    <h3 class="spc-product-title">Gói trả trước 60k/ 3 tháng #{{ $i }}</h3>
                    <div class="spc-meta-row">
                        <div class="spc-rating-box">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span class="spc-rating-text">(12)</span>
                        </div>
                        <button class="spc-heart-btn" title="Thêm vào yêu thích">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                </div>

                <div class="spc-card-body">
                    <!-- Thông tin giá -->
                    <div class="spc-price-wrapper">
                        <span class="spc-price-num">60,000 <span class="spc-unit">đ</span></span>
                        <span class="spc-period">/ 30 ngày</span>
                    </div>

                    <!-- Danh sách nổi bật -->
                    <div class="spc-highlight-list">
                        <div class="spc-highlight-item">
                            <i class="fa-solid fa-bolt"></i>
                            <span><strong>5GB</strong>/Ngày</span>
                        </div>
                        <div class="spc-highlight-item">
                            <i class="fa-solid fa-phone"></i>
                            <span>Miễn phí thoại</span>
                        </div>
                    </div>

                    <!-- Chi tiết thông số -->
                    <div class="spc-spec-column">
                        <div class="spc-spec-entry">
                            <span class="spc-spec-key"><i class="fa-solid fa-tower-cell"></i> Nhà mạng:</span>
                            <span class="spc-spec-val spc-brand-color">LGU+</span>
                        </div>
                        <div class="spc-spec-entry">
                            <span class="spc-spec-key"><i class="fa-solid fa-sim-card"></i> Loại SIM:</span>
                            <span class="spc-spec-val">Hợp pháp</span>
                        </div>
                    </div>
                </div>

                <!-- Nút hành động mới -->
                <div class="spc-card-foot">
                    <a href="#" class="spc-btn-buy">
                        <i class="fa-brands fa-facebook-messenger"></i> MUA NGAY
                    </a>
                    <a href="#" class="spc-btn-detail">CHI TIẾT</a>
                </div>
            </div>
        @endfor
    </div>
</div>

@push('styles')
    <style>
        .spc-section-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        /* Style cho Tiêu đề "Gói cước Hot" */
        .spc-section-header {
            margin-bottom: 30px;
            text-align: left;
        }

        .spc-main-title {
            font-size: 28px;
            font-weight: 800;
            color: #2d3436;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .spc-title-underline {
            width: 60px;
            height: 4px;
            background: #4a6cf7;
            border-radius: 2px;
        }

        /* Grid Layout 3 cột */
        .spc-list-wrapper {
            --spc-primary: #4a6cf7;
            --spc-danger: #e74c3c;
            --spc-warning: #f1c40f;
            --spc-dark: #2d3436;
            --spc-gray: #636e72;
            --spc-bg-alt: #f8f9fa;

            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .spc-card-container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 20px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
            border: 1px solid #eee;
        }

        .spc-card-container:hover {
            transform: translateY(-5px);
        }

        /* Header */
        .spc-card-head {
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 12px;
            margin-bottom: 15px;
        }

        .spc-product-title {
            font-size: 18px;
            color: var(--spc-dark);
            margin: 0 0 10px 0;
            font-weight: 700;
            line-height: 1.4;
            min-height: 50px;
        }

        .spc-meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .spc-rating-box {
            color: var(--spc-warning);
            font-size: 12px;
        }

        .spc-rating-text {
            color: var(--spc-gray);
            margin-left: 4px;
        }

        /* Nút trái tim */
        .spc-heart-btn {
            background: none;
            border: none;
            font-size: 18px;
            color: #ff4757;
            cursor: pointer;
            transition: transform 0.2s;
            padding: 0;
        }

        .spc-heart-btn:hover {
            transform: scale(1.2);
        }

        /* Body */
        .spc-card-body {
            display: flex;
            flex-direction: column;
            gap: 15px;
            flex-grow: 1;
        }

        .spc-price-wrapper {
            text-align: center;
            background: #fdf2f2;
            padding: 10px;
            border-radius: 10px;
        }

        .spc-price-num {
            font-size: 22px;
            font-weight: 800;
            color: var(--spc-danger);
        }

        .spc-period {
            color: var(--spc-gray);
            font-size: 13px;
        }

        .spc-highlight-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .spc-highlight-item {
            background: var(--spc-bg-alt);
            padding: 8px 12px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .spc-highlight-item i {
            color: var(--spc-primary);
            width: 15px;
        }

        .spc-spec-column {
            border-top: 1px dashed #eee;
            padding-top: 10px;
        }

        .spc-spec-entry {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .spc-spec-key {
            color: var(--spc-gray);
        }

        .spc-spec-val {
            font-weight: 600;
            color: var(--spc-dark);
        }

        .spc-brand-color {
            color: #e11d48;
        }

        /* Footer - 2 Nút Mua ngay & Chi tiết */
        .spc-card-foot {
            display: flex;
            gap: 8px;
            margin-top: 15px;
        }

        .spc-btn-buy {
            flex: 1.8;
            background-color: #4a6cf7;
            /* Màu xanh đen như ảnh */
            color: white !important;
            text-decoration: none;
            padding: 10px 5px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.3s;
            text-transform: uppercase;
        }

        .spc-btn-buy:hover {
            background-color: #2c3e50;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .spc-btn-detail {
            flex: 1;
            background-color: #f0f2f5;
            color: #2d3436 !important;
            text-decoration: none;
            padding: 10px 5px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            text-transform: uppercase;
        }

        .spc-btn-detail:hover {
            background-color: #e4e6e9;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .spc-list-wrapper {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {
            .spc-list-wrapper {
                grid-template-columns: 1fr;
            }

            .spc-main-title {
                font-size: 22px;
            }
        }
    </style>
@endpush
