# 🚀 Kế Hoạch Dự Án Website RateSmart

> Dựa trên file `RateSmart Introduction.pdf` (24 trang, Canva, tác giả: Loc Nguyen) và yêu cầu trong `Request.md`

---

## 📋 Tổng Quan Dự Án

| Hạng mục | Chi tiết |
|----------|---------|
| **Công ty** | RateSmart – nền tảng đánh giá / xếp hạng thông minh |
| **Stack** | Laravel (PHP) + MySQL + Blade/Tailwind CSS |
| **Thời gian** | 3 tuần (bước 1–3), sau đó phát triển tiếp |
| **Mục tiêu** | Website giới thiệu công ty + trang Admin quản lý nội dung |
| **Skills sử dụng** | `design`, `slides`, `brand`, `ui-ux-pro-max`, `ui-styling`, `design-system`, `banner-design` |

---

## 🗂️ Cấu Trúc Công Việc (3 Giai Đoạn)

---

## ⚡ Giai Đoạn 1 – Nghiên Cứu & Phân Tích (Tuần 1)

### 1.1 Đọc & Phân Tích Tài Liệu

- [ ] Đọc kỹ file **`RateSmart Introduction.pdf`** (24 trang)
  - Tìm hiểu: sứ mệnh, tầm nhìn, giá trị cốt lõi
  - Ghi chú: sản phẩm/dịch vụ chính, đối tượng khách hàng
  - Ghi chú: màu sắc thương hiệu, font, logo style trong slide
  - Ghi chú: số liệu nổi bật (team size, khách hàng, doanh thu…)

- [ ] Đọc file **`Request.md`** – hiểu yêu cầu kỹ thuật
  - Stack: Laravel + PHP + MySQL
  - Có trang Admin quản lý nội dung
  - Mỗi người làm 1 bản thiết kế riêng

### 1.2 Lên Cấu Trúc Menu & Nội Dung Website

> **Skill sử dụng:** `brand` (messaging framework, voice)

Đề xuất cấu trúc menu:

```
📌 Trang chủ (Home)
├── Hero Section – Slogan + CTA
├── Giới thiệu ngắn
├── Các chỉ số nổi bật (stats)
└── Featured Services

📌 Về Chúng Tôi (About Us)
├── Câu chuyện thương hiệu
├── Sứ mệnh & Tầm nhìn
├── Giá trị cốt lõi
└── Đội ngũ lãnh đạo

📌 Dịch vụ (Services)
├── Sản phẩm/Giải pháp Rating
├── Tính năng nổi bật
└── Quy trình làm việc

📌 Khách Hàng (Clients)
├── Logo khách hàng
├── Testimonials / Review
└── Case Studies

📌 Tin Tức / Blog (News)
├── Bài viết mới nhất
└── Danh mục

📌 Liên Hệ (Contact)
├── Form liên hệ
├── Địa chỉ / Map
└── Mạng xã hội
```

---

## 🎨 Giai Đoạn 2 – Thiết Kế UI/UX (Tuần 1–2)

> **Skill sử dụng:** `ui-ux-pro-max`, `design`, `brand`, `design-system`, `banner-design`

### 2.1 Brand Identity

- [ ] **Xác định Brand Colors** (từ PDF slide)
  - Primary color: xanh navy/xanh dương (giả định)
  - Accent: vàng hoặc cam (smart/rating)
  - Neutral: trắng, xám nhạt

- [ ] **Typography** – chọn cặp font phù hợp
  - Heading: Inter / Montserrat / Plus Jakarta Sans
  - Body: Inter / DM Sans

- [ ] **Logo concept** – lên ý tưởng logo (star + chart hoặc rating icon)

### 2.2 Design System Tokens

> **Skill:** `design-system`

- [ ] Tạo bảng **Primitive Tokens** (màu, spacing, radius, shadow)
- [ ] Tạo **Semantic Tokens** (primary, secondary, surface, error…)
- [ ] Mapping **Component Tokens** cho buttons, cards, inputs

### 2.3 Thiết Kế Wireframe & Mockup

> **Skill:** `ui-ux-pro-max`, `ui-styling`

- [ ] Vẽ wireframe các trang chính (low-fidelity)
  - Home, About, Services, Contact
- [ ] Thiết kế mockup high-fidelity bằng HTML/Tailwind CSS
  - Responsive: Desktop (1440px), Tablet (768px), Mobile (375px)
- [ ] Áp dụng shadcn/ui components nếu dùng React hoặc HTML components

### 2.4 Tạo Assets Thiết Kế

> **Skill:** `design`, `banner-design`

- [ ] **Hero Banner** cho trang chủ (1440×600px)
- [ ] **Social Media Banners** (Facebook cover, LinkedIn banner)
- [ ] **OG Image** cho SEO (1200×630px)
- [ ] **Icons** bộ icon riêng cho các section

### 2.5 Tạo Bộ Slides Thuyết Trình Kết Quả

> **Skill:** `slides`

- [ ] Tạo HTML presentation (6–8 slides) để thuyết trình tại văn phòng
  - Slide 1: Tên dự án + Tên người làm
  - Slide 2: Phân tích yêu cầu
  - Slide 3: Cấu trúc menu đề xuất
  - Slide 4: Bảng màu & Typography
  - Slide 5: Mockup trang chủ
  - Slide 6: Mockup trang dịch vụ / Admin
  - Slide 7: Tech Stack & Timeline
  - Slide 8: Q&A

---

## 💻 Giai Đoạn 3 – Phát Triển Website (Tuần 2–3+)

> **Stack:** Laravel 11 + PHP 8.2 + MySQL 8 + Blade + Tailwind CSS

### 3.1 Khởi Tạo Dự Án Laravel

```bash
composer create-project laravel/laravel ratesmart-web
cd ratesmart-web
php artisan key:generate
```

- [ ] Cấu hình `.env` (DB, mail, APP_URL)
- [ ] Setup **Laravel Breeze** hoặc **Laravel Jetstream** cho Auth
- [ ] Cài **Tailwind CSS** (via Vite)
- [ ] Cài **Spatie Laravel Permission** (quản lý role admin)

### 3.2 Database Schema (MySQL)

- [ ] **Bảng `pages`** – quản lý nội dung trang tĩnh
  ```sql
  id, title, slug, content, meta_title, meta_desc, is_published, order
  ```

- [ ] **Bảng `services`** – dịch vụ/sản phẩm
  ```sql
  id, name, slug, description, icon, image, order, is_active
  ```

- [ ] **Bảng `team_members`** – đội ngũ
  ```sql
  id, name, position, bio, avatar, linkedin, order
  ```

- [ ] **Bảng `testimonials`** – đánh giá khách hàng
  ```sql
  id, client_name, company, content, rating, avatar, is_featured
  ```

- [ ] **Bảng `posts`** – Blog/Tin tức
  ```sql
  id, title, slug, content, excerpt, thumbnail, category_id, author_id, published_at
  ```

- [ ] **Bảng `contacts`** – Form liên hệ
  ```sql
  id, name, email, phone, subject, message, status, created_at
  ```

- [ ] **Bảng `settings`** – Cấu hình chung (logo, địa chỉ, SĐT, social links)
  ```sql
  id, key, value, group
  ```

### 3.3 Frontend – Các Trang Công Khai

- [ ] **Layout chính** (`layouts/app.blade.php`)
  - Header + Nav responsive
  - Footer với social links
  - SEO meta tags động

- [ ] **Trang Chủ** (`/`)
  - Hero Section (ảnh/video nền + CTA)
  - Stats Counter Section
  - Services Cards
  - About Preview
  - Testimonials Slider
  - Latest News/Blog
  - CTA Section

- [ ] **Trang About** (`/about`)
  - Story / Timeline
  - Mission, Vision, Values
  - Team Members Grid

- [ ] **Trang Services** (`/services`)
  - Services Grid / List
  - Detail page cho từng dịch vụ

- [ ] **Trang Clients** (`/clients`)
  - Logo Wall
  - Testimonials

- [ ] **Trang Blog** (`/blog`)
  - Post list với pagination
  - Single post page

- [ ] **Trang Contact** (`/contact`)
  - Form (Laravel validation + CSRF)
  - Google Map embed
  - Info card

### 3.4 Admin Panel

> Trang Admin để quản lý toàn bộ nội dung

- [ ] **Dashboard** (`/admin`)
  - Thống kê: số tin nhắn, bài viết, dịch vụ
  - Quick actions

- [ ] **Quản lý Dịch vụ** (`/admin/services`)
  - CRUD: thêm, sửa, xóa, sắp xếp thứ tự

- [ ] **Quản lý Đội ngũ** (`/admin/team`)
  - CRUD members, upload ảnh

- [ ] **Quản lý Testimonials** (`/admin/testimonials`)
  - CRUD, toggle featured

- [ ] **Quản lý Blog/Tin tức** (`/admin/posts`)
  - CRUD với rich text editor (TinyMCE hoặc Quill)
  - Upload thumbnail

- [ ] **Quản lý Liên hệ** (`/admin/contacts`)
  - Xem danh sách, đánh dấu đã đọc
  - Xuất CSV

- [ ] **Cài đặt Website** (`/admin/settings`)
  - Logo, favicon
  - Thông tin liên hệ
  - Social media links
  - SEO mặc định

### 3.5 Tính Năng Kỹ Thuật

- [ ] **SEO**: Meta tags động, Open Graph, robots.txt, sitemap.xml
- [ ] **Security**: CSRF, XSS protection, rate limiting (login)
- [ ] **Performance**: Image lazy loading, asset minification (Vite)
- [ ] **Responsive**: Mobile-first với Tailwind CSS
- [ ] **Mail**: Gửi email xác nhận khi có form liên hệ mới
- [ ] **Media Upload**: Storage với Laravel Filesystem (local/S3)
- [ ] **Slug tự động**: tự tạo slug từ title

---

## 🛠️ Tech Stack Chi Tiết

| Layer | Technology |
|-------|-----------|
| **Backend** | Laravel 11, PHP 8.2 |
| **Database** | MySQL 8.0 |
| **Frontend** | Blade Templates + Alpine.js |
| **Styling** | Tailwind CSS 3.x |
| **Build Tool** | Vite |
| **Auth** | Laravel Breeze |
| **Permission** | Spatie Laravel Permission |
| **Editor** | TinyMCE / Quill.js |
| **Image** | Intervention Image |
| **SEO** | artesaos/seotools |
| **Icons** | Phosphor Icons / Heroicons |

---

## 📁 Cấu Trúc Thư Mục Laravel

```
ratesmart-web/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── AboutController.php
│   │   ├── ServiceController.php
│   │   ├── BlogController.php
│   │   ├── ContactController.php
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── ServiceController.php
│   │       ├── TeamController.php
│   │       ├── PostController.php
│   │       ├── TestimonialController.php
│   │       ├── ContactController.php
│   │       └── SettingController.php
│   ├── Models/
│   │   ├── Service.php
│   │   ├── TeamMember.php
│   │   ├── Post.php
│   │   ├── Testimonial.php
│   │   ├── Contact.php
│   │   └── Setting.php
│   └── ...
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   └── admin.blade.php
│   │   ├── pages/
│   │   │   ├── home.blade.php
│   │   │   ├── about.blade.php
│   │   │   ├── services.blade.php
│   │   │   ├── blog.blade.php
│   │   │   └── contact.blade.php
│   │   └── admin/
│   │       ├── dashboard.blade.php
│   │       └── ...
│   ├── css/app.css
│   └── js/app.js
├── routes/
│   ├── web.php
│   └── admin.php
├── database/
│   ├── migrations/
│   └── seeders/
└── public/
    ├── images/
    └── ...
```

---

## 📅 Timeline 3 Tuần

```
Tuần 1 (Ngày 1–7):
  ✅ Đọc PDF + phân tích yêu cầu
  ✅ Lên menu và nội dung
  ✅ Brand Identity (màu, font, logo concept)
  ✅ Wireframe các trang chính
  🎯 Nộp: Bản thiết kế wireframe + Brand guide

Tuần 2 (Ngày 8–14):
  ✅ Mockup high-fidelity (HTML/Tailwind)
  ✅ Tạo slides thuyết trình (8 slides)
  ✅ Tạo banner hero + social banners
  ✅ Khởi tạo dự án Laravel + cấu hình DB
  🎯 Nộp: Mockup hoàn chỉnh + Laravel project setup

Tuần 3 (Ngày 15–21):
  ✅ Phát triển Frontend (Home, About, Services, Contact)
  ✅ Phát triển Admin Panel (CRUD cơ bản)
  ✅ Test + Fix bugs
  ✅ Deploy local / demo
  🎯 Nộp: Website demo hoàn chỉnh
```

---

## 🎯 Checkpoint & Thuyết Trình

Sau 3 tuần → đến văn phòng thuyết trình:

| Hạng mục | Cần chuẩn bị |
|----------|-------------|
| **Slides** | HTML presentation 8 slides (dùng skill `slides`) |
| **Demo** | Website chạy được trên localhost |
| **Design** | Mockup PNG/PDF trang chủ + admin |
| **Tài liệu** | DB schema, cấu trúc routes |

---

## 🔑 Skills `.agents` Được Sử Dụng

| Skill | Mục đích | Khi nào dùng |
|-------|---------|-------------|
| `brand` | Brand voice, màu sắc, messaging | Giai đoạn 1–2: brand identity |
| `design` | Logo, banner, CIP, slides | Giai đoạn 2: tạo assets thiết kế |
| `design-system` | Design tokens, CSS variables | Giai đoạn 2: trước khi code CSS |
| `ui-ux-pro-max` | UI patterns, typography, màu sắc | Giai đoạn 2: thiết kế mockup |
| `ui-styling` | shadcn/ui, Tailwind CSS | Giai đoạn 3: code frontend |
| `slides` | HTML presentation | Cuối tuần 2: tạo slides thuyết trình |
| `banner-design` | Hero banner, social banners | Giai đoạn 2: tạo ảnh marketing |

---

## ⚠️ Lưu Ý Quan Trọng

> [!IMPORTANT]
> Mỗi người tự tạo **1 thiết kế riêng biệt** – không được copy thiết kế của người khác. Chỉ có nội dung (từ PDF) là giống nhau.

> [!TIP]
> Bắt đầu từ **brand colors trong PDF** trước khi thiết kế. Đây là nền tảng cho toàn bộ giao diện.

> [!NOTE]
> Sau bước 3 (có mockup), cả nhóm sẽ họp tại văn phòng để review và thống nhất trước khi code.

> [!WARNING]
> Không được bỏ qua trang **Admin**. Đây là yêu cầu bắt buộc trong `Request.md`.

---

*Cập nhật lần cuối: 2026-09-26 | Người lập kế hoạch: AI Agent*
