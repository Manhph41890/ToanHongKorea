{{-- Container bao bọc toàn bộ danh sách để test --}}
{{-- add create part title for it, with title are 'Gói cước Hot' --}}
<div class="spc-list-wrapper mb-5">
    @for ($i = 1; $i <= 4; $i++)
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
                        <span class="spc-rating-text">(12 đánh giá)</span>
                    </div>
                    <button class="spc-heart-btn" title="Thêm vào yêu thích">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>
            </div>

            <div class="spc-card-body">
                <!-- Cột trái: Thông tin giá và data chính -->
                <div class="spc-main-column">
                    <div class="spc-price-wrapper">
                        <span class="spc-label-text">Giá cước:</span>
                        <span class="spc-price-num">60,000 <span class="spc-unit">đ</span></span>
                        <span class="spc-period">/ 30 ngày</span>
                    </div>

                    <div class="spc-highlight-list">
                        <div class="spc-highlight-item">
                            <i class="fa-solid fa-bolt"></i>
                            <span><strong>5GB</strong>/Ngày</span>
                        </div>
                        <div class="spc-highlight-item">
                            <i class="fa-solid fa-globe"></i>
                            <span><strong>150GB</strong>/Tháng</span>
                        </div>
                        <div class="spc-highlight-item">
                            <i class="fa-solid fa-phone"></i>
                            <span>Miễn phí thoại</span>
                        </div>
                    </div>
                </div>

                <!-- Cột phải: Chi tiết thông số -->
                <div class="spc-spec-column">
                    <div class="spc-spec-entry">
                        <span class="spc-spec-key"><i class="fa-solid fa-tower-cell"></i> Nhà mạng:</span>
                        <span class="spc-spec-val spc-brand-color">LGU+</span>
                    </div>
                    <div class="spc-spec-entry">
                        <span class="spc-spec-key"><i class="fa-solid fa-sim-card"></i> Loại SIM:</span>
                        <span class="spc-spec-val">Hợp pháp</span>
                    </div>
                    <div class="spc-spec-entry">
                        <span class="spc-spec-key"><i class="fa-solid fa-credit-card"></i> Hình thức:</span>
                        <span class="spc-spec-val">Trả trước</span>
                    </div>
                    <div class="spc-spec-entry">
                        <span class="spc-spec-key"><i class="fa-solid fa-check-circle"></i> Trạng thái:</span>
                        <span class="spc-spec-val spc-status-active">Còn hàng</span>
                    </div>
                </div>
            </div>

            <!-- Nút hành động -->
            <div class="spc-card-foot">
                <a href="LINK_FACEBOOK_CUA_BAN" class="spc-btn-buy">
                    <i class="fa-brands fa-facebook-messenger"></i> MUA NGAY
                </a>
                <a href="LINK_CHI_TIET" class="spc-btn-detail">CHI TIẾT</a>
            </div>
        </div>
    @endfor
</div>

@push('styles')
    <style>
        .spc-list-wrapper {
            --spc-primary: #4a6cf7;
            --spc-danger: #e74c3c;
            --spc-warning: #f1c40f;
            --spc-dark: #2d3436;
            --spc-gray: #636e72;
            --spc-bg-alt: #f8f9fa;

            padding: 20px;
            max-width: 1200px;
            /* Chiều rộng tối đa 1200px */
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* Chia 3 cột đều nhau */
            gap: 20px;
            background-color: #f0f2f5;
            border-radius: 20px;
            box-sizing: border-box;
        }

        .spc-card-container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            padding: 20px;
            font-family: 'Segoe UI', Roboto, sans-serif;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .spc-card-container:hover {
            transform: translateY(-5px);
        }

        /* Container chứa 2 nút */
        .spc-card-foot {
            display: flex;
            gap: 10px;
            /* Khoảng cách giữa 2 nút */
            margin-top: 20px;
        }

        /* Nút MUA NGAY (Màu xanh đen/Messenger) */
        .spc-btn-buy {
            flex: 2;
            /* Chiếm 2 phần diện tích */
            background-color: #1c2b3d;
            /* Màu xanh đen đậm */
            color: white !important;
            text-decoration: none;
            padding: 12px 5px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            /* Khoảng cách giữa icon và chữ */
            transition: all 0.3s ease;
            border: none;
            text-transform: uppercase;
        }

        .spc-btn-buy:hover {
            background-color: #2c3e50;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .spc-btn-buy i {
            font-size: 18px;
            /* Phóng to icon Messenger */
        }

        /* Nút CHI TIẾT (Màu xám nhạt) */
        .spc-btn-detail {
            flex: 1;
            /* Chiếm 1 phần diện tích */
            background-color: #f0f2f5;
            /* Màu nền xám nhạt */
            color: #4a6cf7 !important;
            /* Màu chữ xanh hoặc tối */
            text-decoration: none;
            padding: 12px 5px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .spc-btn-detail:hover {
            background-color: #e4e6e9;
            color: #3451d1 !important;
        }

        /* Header */
        .spc-card-head {
            border-bottom: 1px solid #eee;
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
            /* Giúp các card cao bằng nhau */
        }

        .spc-meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* CSS CHO NÚT TRÁI TIM CỦA BẠN ĐÂY */
        .spc-heart-btn {
            background: none;
            border: none;
            font-size: 20px;
            color: #ff4757;
            cursor: pointer;
            transition: transform 0.2s;
            padding: 0;
            line-height: 1;
        }

        .spc-heart-btn:hover {
            transform: scale(1.2);
        }

        .spc-rating-box {
            color: var(--spc-warning);
            font-size: 12px;
        }

        .spc-rating-text {
            color: var(--spc-gray);
            margin-left: 4px;
        }

        /* Body Layout - Chuyển dọc để tiết kiệm diện tích */
        .spc-card-body {
            display: flex;
            flex-direction: column;
            gap: 15px;
            flex-grow: 1;
            /* Đẩy footer xuống đáy */
        }

        /* Price */
        .spc-price-wrapper {
            text-align: center;
            margin-bottom: 10px;
            background: #fff5f5;
            padding: 10px;
            border-radius: 8px;
        }

        .spc-price-num {
            font-size: 22px;
            font-weight: 800;
            color: var(--spc-danger);
        }

        .spc-period {
            color: var(--spc-gray);
            font-size: 14px;
        }

        /* Highlights */
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
            width: 16px;
            text-align: center;
        }

        /* Specs */
        .spc-spec-column {
            background: #fdfdfd;
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            padding: 12px;
        }

        .spc-spec-entry {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px dashed #eee;
            font-size: 13px;
        }

        .spc-spec-entry:last-child {
            border-bottom: none;
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

        .spc-status-active {
            color: #2ecc71;
        }

        /* Footer Button */
        .spc-btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #4a6cf7 0%, #3451d1 100%);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 15px;
            margin-top: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .spc-btn-submit:hover {
            opacity: 0.9;
            box-shadow: 0 5px 15px rgba(74, 108, 247, 0.3);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .spc-list-wrapper {
                grid-template-columns: repeat(2, 1fr);
                /* Màn hình vừa còn 2 cột */
            }
        }

        @media (max-width: 650px) {
            .spc-list-wrapper {
                grid-template-columns: 1fr;
                /* Điện thoại 1 cột */
            }
        }
    </style>
@endpush
