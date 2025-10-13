$('#import-location-form').on('submit', function (e) {
    e.preventDefault();

    // Kiểm tra function executeExample có tồn tại không
    if (typeof executeExample !== 'function') {
        alert('Lỗi: Hàm executeExample chưa được định nghĩa!');
        return;
    }

    executeExample("confirm", () => {
        $.ajax({
            url: url_import_location,
            method: "POST",
            data: {
                _token: _token
            },
            success: function (response) {},
            error: function (xhr) {}
        });
    });
});
