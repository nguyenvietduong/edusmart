import './bootstrap';

// Lắng nghe sự kiện từ Laravel Echo
$('#import-location-form').on('submit', function (e) {
    e.preventDefault();

    if (typeof executeExample !== 'function') {
        alert('Lỗi: Hàm executeExample chưa được định nghĩa!');
        return;
    }

    const $btn = $(this).find('button[type="submit"]');
    $btn.prop('disabled', true); // disable ngay khi submit

    executeExample("confirm", () => {
        $.ajax({
            url: url_import_location,
            method: "POST",
            data: { _token: _token },
            success: function (response) {
                console.log('Đang chạy import...');

                // Lắng nghe event private từ Laravel Echo
                const channel = window.Echo.private(`location.${userId}`);
                const callback = function (e) {
                    alert(`📦 Nhập dữ liệu xong: ${e.message}`);
                    $btn.prop('disabled', false); // enable nút khi event xong
                    channel.stopListening('.import.done'); // chỉ nhận 1 lần
                };
                channel.listen('.import.done', callback);
            },
            error: function (xhr) {
                console.log('Có lỗi xảy ra!');
                $btn.prop('disabled', false); // enable nút khi AJAX lỗi
            }
        });
    });
});