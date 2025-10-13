function executeExample(type, onConfirm) {
    switch (type) {
        // ======= Thông báo cơ bản =======
        case "basicMessage":
            return Swal.fire("Đây là thông báo đơn giản");

        case "success":
            return Swal.fire({
                icon: "success",
                title: "Thành công!",
                timer: 1500,
                showConfirmButton: false
            });

        case "error":
            return Swal.fire({
                icon: "error",
                title: "Lỗi!",
                text: "Có gì đó không đúng"
            });

        case "warning":
            return Swal.fire({
                icon: "warning",
                title: "Cảnh báo!",
                text: "Hãy cẩn thận"
            });

        case "info":
            return Swal.fire({
                icon: "info",
                title: "Thông tin",
                text: "Đây là thông tin"
            });

            // ======= Confirm (thay thế if(confirm(...))) =======
        case "confirm":
            return Swal.fire({
                title: "Bạn chắc chắn chứ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "OK",
                cancelButtonText: "Hủy",
            }).then(result => {
                if (result.isConfirmed && typeof onConfirm === "function") {
                    onConfirm(); // callback khi nhấn OK
                }
            });

            // ======= Thông báo + Confirm với custom nút =======
        case "handleDismiss":
            const swalWithButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger me-2"
                },
                buttonsStyling: false
            });

            return swalWithButtons.fire({
                title: "Bạn chắc chắn chứ?",
                text: "Hành động này không thể hoàn tác!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Đồng ý",
                cancelButtonText: "Hủy",
                reverseButtons: true
            }).then(result => {
                if (result.isConfirmed) {
                    if (typeof onConfirm === "function") onConfirm();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire("Đã hủy", "Hành động không được thực hiện", "info");
                }
            });

        default:
            console.warn("Type modal không tồn tại:", type);
            return null;
    }
}
