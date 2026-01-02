<script>
    // Dùng var thay vì const để tránh lỗi "already declared" nếu lỡ bị include 2 lần
    if (typeof VARIANT_DATA === 'undefined') {
        var VARIANT_DATA = @json($variants);
    }

    document.addEventListener('DOMContentLoaded', function() {
        // 1. Khai báo các biến lưu trữ (Đặt tất cả bên trong DOMContentLoaded)
        let selectedCondition = null;
        let selectedSize = null;
        let selectedColor = null;
        let currentVariant = null;

        const pageId = "117918971210547"; // ID Fanpage của bạn
        const phoneName = "{{ $phone->name }}";
        const currentUrl = window.location.href;

        // Lấy các thực thể DOM
        const items = document.querySelectorAll('.ss-pd-v-item');
        const priceEl = document.getElementById('ss-pd-main-price');
        const stockEl = document.getElementById('ss-pd-stock-status');
        const skuEl = document.getElementById('ss-pd-sku');
        const buyBtn = document.getElementById('btn-buy-now'); // Đảm bảo ID này khớp với HTML

        // Kiểm tra nếu không tìm thấy nút mua hàng thì dừng lại để tránh lỗi null
        if (!buyBtn) {
            console.error("Không tìm thấy nút bấm id='btn-buy-now'");
            return;
        }

        // 2. Hàm cập nhật giao diện
        function updateDisplay() {
            if (!VARIANT_DATA) return;

            currentVariant = VARIANT_DATA.find(v =>
                v.condition === selectedCondition &&
                v.size_id == selectedSize &&
                v.color_id == selectedColor
            );

            if (currentVariant) {
                priceEl.innerText = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(currentVariant.price);
                if (skuEl) skuEl.innerText = currentVariant.sku || 'N/A';
                if (stockEl) {
                    stockEl.innerText = currentVariant.stock > 0 ? `Còn hàng (${currentVariant.stock})` :
                        'Hết hàng';
                    stockEl.style.color = currentVariant.stock > 0 ? '#27ae60' : '#e74c3c';
                }
            } else {
                priceEl.innerText = "Chưa có giá";
                if (stockEl) stockEl.innerText = "Vui lòng chọn đủ tùy chọn";
            }
        }

        // 3. Sự kiện click chọn biến thể
        items.forEach(item => {
            item.addEventListener('click', function() {
                const type = this.getAttribute('data-type');
                const value = this.getAttribute('data-value');

                document.querySelectorAll(`.ss-pd-v-item[data-type="${type}"]`).forEach(btn =>
                    btn.classList.remove('active'));
                this.classList.add('active');

                if (type === 'condition') selectedCondition = value;
                if (type === 'size') selectedSize = value;
                if (type === 'color') selectedColor = value;

                updateDisplay();
            });
        });

        // 4. Xử lý nút MUA NGAY
        buyBtn.addEventListener('click', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định nếu là thẻ <a>

            if (!selectedCondition || !selectedSize || !selectedColor) {
                alert('Vui lòng chọn đầy đủ Tình trạng, Dung lượng và Màu sắc!');
                return;
            }

            if (!currentVariant) {
                alert('Phiên bản này hiện không khả dụng!');
                return;
            }

            const sizeText = document.querySelector(`.ss-pd-v-item[data-type="size"].active`).innerText
                .trim();
            const colorText = document.querySelector(`.ss-pd-v-item[data-type="color"].active`)
                .innerText.trim();
            const conditionText = selectedCondition === 'new' ? 'Máy mới 100%' : 'Máy cũ/Like New';

            let message = `Chào Shop, mình muốn mua điện thoại:\n`;
            message += `📱 Sản phẩm: ${phoneName}\n`;
            message += `✨ Tình trạng: ${conditionText}\n`;
            message += `💾 Dung lượng: ${sizeText}\n`;
            message += `🎨 Màu sắc: ${colorText}\n`;
            message += `💰 Giá: ${priceEl.innerText}\n`;
            message += `🔗 Link: ${currentUrl}`;

            const encodedMessage = encodeURIComponent(message);
            const messengerUrl = `https://m.me/${pageId}?text=${encodedMessage}`;

            // Xử lý thông minh cho Mobile và Desktop
            if (/iPhone|Android|iPad/i.test(navigator.userAgent)) {
                window.location.href = messengerUrl;
            } else {
                navigator.clipboard.writeText(message).then(() => {
                    alert(
                        "Đã sao chép chi tiết đơn hàng! Bạn hãy Dán (Ctrl+V) vào Messenger để gửi cho Shop nhé.");
                    window.open(messengerUrl, '_blank');
                }).catch(() => {
                    window.open(messengerUrl, '_blank');
                });
            }
        });
    });
</script>
