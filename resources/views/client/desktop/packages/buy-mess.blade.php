<script>
    (function() {
        // --- CẤU HÌNH ---
        const pageUsername = "anhtoan270189";
        const isIphone = navigator.userAgent.match(/iPhone|iPad|iPod/i);

        document.addEventListener('click', function(e) {
            const buyBtn = e.target.closest('.btn-buy-package');

            if (buyBtn) {
                e.preventDefault();

                // 1. Lấy thông tin từ HTML data attributes
                const packageId = buyBtn.getAttribute('data-id'); // Bạn nên thêm data-id vào nút
                const name = buyBtn.getAttribute('data-name');
                const priceText = buyBtn.getAttribute('data-price');
                // Chuyển đổi giá về dạng số để thống kê (ví dụ "50,000w" -> 50000)
                const priceNumeric = parseFloat(priceText.replace(/[^0-9.]/g, '')) || 0;

                const duration = buyBtn.getAttribute('data-duration');
                const carrier = buyBtn.getAttribute('data-carrier');
                const sim = buyBtn.getAttribute('data-sim');
                const currentUrl = window.location.href;

                // 2. Tạo mã REF cho Gói cước (Tracking nội bộ Facebook)
                const refCode = `P_REG_${packageId}_${name.replace(/\s+/g, '_')}`.toUpperCase();

                // 3. Tạo nội dung tin nhắn
                let message = `Chào Shop, mình muốn đăng ký gói cước:\n`;
                message += `📦 Gói cước: ${name}\n`;
                message += `💰 Giá: ${priceText}\n`;
                message += `⏳ Thời hạn: ${duration} ngày\n`;
                message += `📶 Nhà mạng: ${carrier.toUpperCase()}\n`;
                message += `📱 Loại SIM: ${sim}\n`;
                message += `🔗 Link: ${currentUrl}`;

                const messengerUrl =
                    `https://m.me/${pageUsername}?ref=${refCode}&text=${encodeURIComponent(message)}`;

                // 4. Hiển thị thông báo xác nhận (SweetAlert2)
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'Xác nhận đăng ký',
                        html: `Bạn đang chọn gói <b>${name}</b> (${carrier.toUpperCase()}).<br>Hệ thống sẽ kết nối bạn tới Messenger!`,
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#0084FF',
                        confirmButtonText: 'Đăng ký ngay',
                        cancelButtonText: 'Đóng',
                        reverseButtons: isIphone // Ưu tiên nút xác nhận bên phải trên iPhone
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // --- GỬI THỐNG KÊ VỀ SERVER ---
                            sendTracking(packageId, name, priceNumeric, carrier, duration, sim);

                            // Chuyển hướng
                            redirectMessenger(messengerUrl);
                        }
                    });
                } else {
                    sendTracking(packageId, name, priceNumeric, carrier, duration, sim);
                    redirectMessenger(messengerUrl);
                }
            }
        });

        // Hàm gửi dữ liệu về Database MessengerOrder
        function sendTracking(id, name, price, carrier, duration, sim) {
            fetch("{{ route('track.messenger') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    type: 'package',
                    product_id: id,
                    product_name: name,
                    product_slug: 'package-' + id, // Hoặc slug từ data-attribute nếu có
                    variant_info: `Mạng: ${carrier} | Hạn: ${duration} ngày | SIM: ${sim}`,
                    price: price
                })
            }).catch(err => console.error("Tracking error:", err));
        }

        function redirectMessenger(url) {
            if (isIphone) {
                window.location.href = url;
            } else {
                window.location.assign(url);
            }
        }
    })();
</script>
