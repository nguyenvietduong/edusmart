import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher", // vẫn để "pusher"
    key: "local",           // có thể là bất kỳ chuỗi nào, miễn trùng bên server
    wsHost: "edusmart.test", // domain hoặc localhost
    wsPort: 6001,            // port mà bạn chạy `php artisan websockets:serve`
    forceTLS: false,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
    cluster: "mt1", // 🟩 THÊM VÀO DÙ KHÔNG DÙNG PUSHER THẬT, ĐỂ NÓ KHỎI BÁO LỖI
});

// Khi kết nối thành công
window.Echo.connector.pusher.connection.bind('connected', () => {
    console.log("%c✅ Đã kết nối WebSocket thành công!", "color: green; font-weight: bold;");
});

// Khi bị mất kết nối
window.Echo.connector.pusher.connection.bind('disconnected', () => {
    console.log("%c⚠️ Mất kết nối WebSocket!", "color: orange; font-weight: bold;");
});

// Khi có lỗi trong kết nối
window.Echo.connector.pusher.connection.bind('error', (err) => {
    console.error("❌ Lỗi WebSocket:", err);
});