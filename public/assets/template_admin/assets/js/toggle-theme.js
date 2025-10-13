document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('light-dark-mode');

    // 🔹 1️⃣ Lấy theme đã lưu trong localStorage (nếu có)
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-bs-theme', savedTheme);

    if (themeToggle) {
        let currentTheme = savedTheme;

        themeToggle.addEventListener('click', function (e) {
            e.preventDefault();

            // 🔹 2️⃣ Toggle theme
            let newTheme = (currentTheme === 'light') ? 'dark' : 'light';
            document.documentElement.setAttribute('data-bs-theme', newTheme);

            // 🔹 3️⃣ Lưu vào localStorage
            localStorage.setItem('theme', newTheme);

            // Cập nhật biến tạm
            currentTheme = newTheme;
        });
    }
});
