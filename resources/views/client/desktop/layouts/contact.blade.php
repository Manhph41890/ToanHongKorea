<div id="contact-widget-desktop" class="contact-fixed-pc active">
    <!-- Danh sách các nút con -->
    <div class="contact-list-pc" id="contact-list-pc">
        <!-- Nút Messenger -->
        <a href="javascript:void(0)" class="contact-bubble-pc messenger-color" onclick="openMessengerPC()">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/be/Facebook_Messenger_logo_2020.svg"
                alt="Messenger">
            <span class="label-text">Nhắn tin cho shop</span>
        </a>

        <!-- Nút Gọi Số 1 -->
        <a href="tel:01028288333" class="contact-bubble-pc phone-color">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"
                    fill="white" />
            </svg>
            <span class="label-text">010 2828 8333</span>
        </a>

        <!-- Nút Gọi Số 2 -->
        <a href="tel:01082826886" class="contact-bubble-pc phone-color">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"
                    fill="white" />
            </svg>
            <span class="label-text">010 8282 6886</span>
        </a>
    </div>

    <!-- Nút Toggle & Tooltip -->
    <div class="toggle-area-pc">
        <div class="contact-tooltip-pc" id="tooltip-pc">Liên hệ với chúng tôi!</div>
        <div class="contact-bubble-pc toggle-main-pc" onclick="toggleContactPC()">
            <div class="icon-open-pc">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21 11.5C21 16.1944 16.9706 20 12 20C10.5181 20 9.12457 19.6582 7.90616 19.055L3 20L4.10312 15.6841C3.39174 14.4578 3 13.0235 3 11.5C3 6.80558 7.02944 3 12 3C16.9706 3 21 6.80558 21 11.5Z"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class="icon-close-pc" style="display: none;">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6L18 18" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </div>
</div>

<style>
    .contact-fixed-pc {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 12px;
        /* QUAN TRỌNG: Tránh đè diện tích */
        pointer-events: none;
        width: 300px;
        /* Giới hạn chiều rộng khung tàng hình */
    }

    .contact-list-pc {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 12px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .contact-fixed-pc.active .contact-list-pc {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        pointer-events: auto;
        /* Chỉ cho bấm khi mở */
    }

    .contact-bubble-pc {
        width: 55px;
        /* Cố định chiều rộng ban đầu */
        max-width: 55px;
        height: 55px;
        border-radius: 55px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        justify-content: flex-start;
        /* Để icon cố định bên phải khi giãn */
        padding: 0 12px;
        /* Padding cố định để icon không bị dịch chuyển */
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        cursor: pointer;
        background: #fff;
        overflow: hidden;
        /* Quan trọng để giấu chữ */
        pointer-events: auto;
        /* Luôn cho bấm vào nút */
        flex-direction: row-reverse;
        /* Đảo ngược để icon nằm bên phải */
    }

    /* Hiệu ứng giãn nút mượt mà (không giật) */
    .contact-bubble-pc:hover {
        max-width: 250px;
        /* Sử dụng max-width để animate mượt hơn auto */
        padding: 0 20px;
    }

    .label-text {
        opacity: 0;
        white-space: nowrap;
        font-weight: 600;
        font-size: 14px;
        transition: opacity 0.2s ease;
        margin-right: 10px;
        /* Khoảng cách với icon */
    }

    .contact-bubble-pc:hover .label-text {
        opacity: 1;
    }

    /* Màu sắc */
    .messenger-color {
        background: #fff;
        border: 1px solid #e2e8f0;
    }

    .messenger-color .label-text {
        color: #0084FF;
    }

    .phone-color {
        background: #4CAF50;
    }

    .phone-color .label-text {
        color: #fff;
    }

    .toggle-main-pc {
        background: #0084FF;
        border: 2px solid #fff;
        justify-content: center;
        /* Nút chính icon nằm giữa */
        max-width: 55px !important;
        /* Không cho giãn nút chính */
    }

    .contact-fixed-pc.active .toggle-main-pc {
        background: #ff4757;
        transform: rotate(90deg);
    }

    .contact-bubble-pc img,
    .contact-bubble-pc svg {
        width: 28px;
        height: 28px;
        flex-shrink: 0;
    }

    /* Tooltip */
    .toggle-area-pc {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .contact-tooltip-pc {
        background: rgba(51, 51, 51, 0.9);
        color: #fff;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 13px;
        margin-bottom: 8px;
        white-space: nowrap;
        pointer-events: none;
        transition: opacity 0.3s ease;
        animation: bounce-pc 2s infinite;
    }

    @keyframes bounce-pc {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateX(0);
        }

        40% {
            transform: translateX(-5px);
        }

        60% {
            transform: translateX(-3px);
        }
    }
</style>

<script>
    function toggleContactPC() {
        const widget = document.getElementById('contact-widget-desktop');
        const iconOpen = document.querySelector('.icon-open-pc');
        const iconClose = document.querySelector('.icon-close-pc');
        const tooltip = document.getElementById('tooltip-pc');

        const isActive = widget.classList.toggle('active');

        if (isActive) {
            iconOpen.style.display = 'none';
            iconClose.style.display = 'block';
            if (tooltip) tooltip.style.opacity = '0';
        } else {
            iconOpen.style.display = 'block';
            iconClose.style.display = 'none';
            if (tooltip) tooltip.style.opacity = '1';
        }
    }

    function openMessengerPC() {
        const pageId = "100095174172336";
        window.open('https://m.me/' + pageId, '_blank');
    }
</script>
