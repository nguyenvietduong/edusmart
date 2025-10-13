<p align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</a>
</p>

<p align="center">
<a href="https://github.com/your-repo/students-management/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Hệ thống quản lý học sinh (Student Management System)

Hệ thống này được xây dựng bằng **Laravel**, nhằm quản lý toàn diện một **trường học**, bao gồm:
- Quản lý **trường, lớp học, học sinh, giáo viên**.
- Quản lý **môn học, lịch học, phòng học**.
- Quản lý **kỳ thi, điểm, điểm tổng kết, thi lại**.
- Quản lý **buổi học, điểm danh** (manual, RFID, QR, nhận diện khuôn mặt).
- Quản lý **thiết bị** và **log hoạt động** của hệ thống.
- Hỗ trợ **quản lý phụ huynh, thông báo, sự kiện, thư viện** và nhiều tính năng mở rộng.

## Tính năng nổi bật

- **Quản lý học sinh và giáo viên**: Thêm, sửa, xóa thông tin cá nhân, lớp học, môn học.
- **Quản lý lớp học và môn học**: Lớp nào học môn nào, giáo viên nào dạy, phòng học.
- **Điểm thi & điểm tổng kết**: Lưu trữ tất cả lần thi, thi lại, tính điểm trung bình tự động.
- **Điểm danh thông minh**: Hỗ trợ nhiều nguồn điểm danh (manual, RFID, QR, camera nhận diện khuôn mặt), lưu lịch sử và đồng bộ với hệ thống.
- **Thiết bị IoT**: Quản lý các thiết bị điểm danh (RFID, camera, QR Scanner) và đồng bộ dữ liệu.
- **Activity Log**: Ghi lại toàn bộ hoạt động của người dùng và hệ thống.
- **Thời khóa biểu**: Lưu lịch học chi tiết theo lớp, môn, giáo viên, phòng học và tiết học.
- **Hệ thống mở rộng**: Có thể thêm phụ huynh, thư viện, sự kiện, thông báo, học phí,...

## Cài đặt

1. Clone repo:
```bash
git clone https://github.com/your-repo/students-management.git
cd students-management