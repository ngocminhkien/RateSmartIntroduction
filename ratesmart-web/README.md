# 🚀 RateSmart Web - Laravel 11 Backend & Admin CMS

Ứng dụng web chính thức của RateSmart xây dựng trên nền tảng **Laravel 11, PHP 8.2+ và MySQL 8.0**.

---

## 📋 Yêu Cầu Môi Trường

* **PHP:** >= 8.2 (với các extensions: `pdo_mysql`, `mbstring`, `openssl`, `bcmath`, `curl`)
* **Composer:** >= 2.x
* **MySQL:** >= 8.0 (hoặc MariaDB 10.4+)
* **Node.js & npm:** (cho build Vite assets)

---

## ⚡ Hướng Dẫn Cài Đặt & Khởi Chạy (Khi có PHP & Composer)

### 1. Cài đặt các thư viện phụ thuộc
```bash
cd ratesmart-web
composer install
npm install
```

### 2. Cấu hình môi trường `.env`
Tệp `.env` đã được chuẩn bị sẵn:
```env
APP_NAME=RateSmart
APP_ENV=local
APP_KEY=base64:s7O8qHh1Kz2Xy5Wv3Tu1Qp8Lm6Jk4Ig2Fe0Dc8Ba6Yg=
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ratesmart_db
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Khởi tạo Cơ sở dữ liệu và nạp dữ liệu mẫu
Tạo database `ratesmart_db` trong MySQL, sau đó chạy:
```bash
php artisan migrate --seed
```
*Lệnh này sẽ tự động chạy `RateSmartSeeder` nạp đầy đủ ban lãnh đạo, 10 đối tác ngân hàng, 3 gói giải pháp, bảng dữ liệu giá tại Thanh Oai và tài khoản Super Admin.*

### 4. Tài khoản Admin mặc định
- **Email:** `admin@ratesmart.com.vn`
- **Mật khẩu:** `RateSmart@2026`
- **Đường dẫn Admin CMS:** `http://localhost:8000/admin`

### 5. Chạy máy chủ phát triển
```bash
# Terminal 1: Chạy máy chủ Laravel
php artisan serve

# Terminal 2: Chạy Vite biên dịch assets (nếu cần phát triển frontend)
npm run dev
```

---

## 🗺️ Bản Đồ Tuyến Đường (Routes)

| Phương thức | Đường dẫn URL | Mô tả chức năng |
|---|---|---|
| `GET` | `/` | Trang chủ Landing Page giới thiệu RateSmart |
| `GET` | `/tra-cuu-avm` | Trải nghiệm định giá trực tuyến trên bản đồ Leaflet |
| `POST` | `/api/avm/calculate` | API tính toán định giá AVM theo tiêu chí & 3 TSSS |
| `POST` | `/lien-he` | Tiếp nhận đăng ký tư vấn & tài khoản demo |
| `GET` | `/admin` | Bảng điều khiển quản trị (Dashboard) |
| `GET` | `/admin/properties` | Quản lý danh sách cơ sở dữ liệu giá 63 tỉnh |
| `GET` | `/admin/leads` | Quản lý danh sách liên hệ từ khách hàng |
