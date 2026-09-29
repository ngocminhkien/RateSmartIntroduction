# 🌟 RateSmart - Nền Tảng Dữ Liệu Giá & Định Giá Tự Động (AVM)

> **Công ty thành viên:** Công ty Thẩm định giá Hoa Sen (Lotus VFI)  
> **Trụ sở:** Tòa nhà Licogi 13, 164 Khuất Duy Tiến, Thanh Xuân, Hà Nội  
> **Hotline:** 0853 293 333 | **Website:** [https://ratesmart.com.vn](https://ratesmart.com.vn)

---

## 📖 Giới Thiệu Dự Án

Dự án xây dựng Website giới thiệu công ty và Hệ thống Quản trị Nội dung & Cơ sở dữ liệu giá (Admin CMS) cho **RateSmart**, dựa trên tài liệu giới thiệu chính thức từ Thẩm định giá Hoa Sen.

Dự án gồm 4 giai đoạn phát triển:
1. **Nghiên cứu & Phân tích chuyên sâu:** Trích xuất và phân tích toàn bộ 24 trang tài liệu công ty.
2. **Kiến trúc thông tin & Nội dung:** Xây dựng sitemap người dùng (Frontend) và sitemap quản trị (Admin CMS).
3. **Thiết kế UI/UX & Bản Prototype Tương Tác:** Tạo bản thiết kế độc bản cùng bộ slide thuyết trình phục vụ buổi họp văn phòng.
4. **Phát triển mã nguồn với Laravel + PHP + MySQL:** Hiện thực hóa website hoàn chỉnh với đầy đủ trang quản trị.

---

## 🏛️ Ban Lãnh Đạo Chủ Chốt

* **Ông Vũ Văn Quân - CEO RateSmart**: Chủ tịch kiêm Tổng Giám đốc Công ty Thẩm định giá Hoa Sen. Hơn 20 năm kinh nghiệm thẩm định giá, M&A, kiểm toán, tài chính.
* **Ông Nguyễn Ngọc Bách - COO RateSmart**: Chủ tịch Tập đoàn AsiaInvest, Phó Chủ tịch CLB Bất động sản Hà Nội, Giám đốc điều hành Luxcer Singapore. Hơn 25 năm kinh nghiệm định giá tài sản & M&A.
* **Ông Nguyễn Vĩnh Lộc - CTO RateSmart**: Giám đốc kỹ thuật Luxcer Singapore, Cựu sinh viên học bổng Chính phủ Úc. Hơn 20 năm kinh nghiệm kiến trúc Big Data, AI và hệ thống CNTT quy mô lớn.

---

## 📊 Năng Lực Dữ Liệu Giá (Big Data)

- **Bảng giá Nhà nước:** Bao phủ 100% của **63 tỉnh thành** (2020 - 2025).
- **Dữ liệu giá Thẩm định Hoa Sen:** **20.000+ tài sản** đã thẩm định chính thức (2024 - Nay).
- **Dữ liệu giá Thị trường:** **10.000+ tài sản so sánh** thực tế đã làm sạch & xác thực (2024 - Nay).
- **Dữ liệu giá Ngân hàng:** Cơ sở dữ liệu tham chiếu tài sản bảo đảm của **35 tỉnh thành**.
- **Khách hàng tiêu biểu:** Agribank, VDB, Public Bank, Co-opBank, PGBank, SCIC, VAMC, Samsung, AEON Mall, Lotte.

---

## 📁 Cấu Trúc Thư Mục Dự Án

```
RateSmartIntroduction/
├── docs/                                # Tài liệu đặc tả kỹ thuật & phân tích
│   └── RATESMART_WEBSITE_SPECIFICATION.md
├── prototype/                           # Bản thiết kế Interactive Prototype cao cấp
│   └── index.html                       # Xem trước Frontend, Live AVM Map & Admin Panel
├── presentation/                        # Bộ Slide thuyết trình chuẩn 16:9 cho buổi họp
│   └── presentation.html
├── slides_img/                          # 24 hình ảnh trích xuất từ tài liệu PDF gốc
├── RATESMART_PROJECT_PLAN.md            # Kế hoạch phát triển chi tiết 3 tuần
├── Request.md                           # Yêu cầu đầu bài dự án
└── README.md
```

---

## 🚀 Trải Nghiệm Prototype & Slide Thuyết Trình

- **Xem Prototype tương tác:** Mở file `prototype/index.html` trong bất kỳ trình duyệt web nào (Chrome, Edge, Firefox).
  - Có thanh công cụ trên cùng để chuyển nhanh giữa: **Website Người Dùng**, **Trải Nghiệm Tra Cứu AVM**, và **Giao Diện Admin Quản Trị**.
- **Xem Bộ Slide Thuyết Trình:** Mở file `presentation/presentation.html` để trình chiếu chuẩn 16:9 với các phím mũi tên `[←]` / `[→]`.

---

## 🛠️ Kế Hoạch Triển Khai Bước 4 (Laravel + MySQL)

- **Backend:** Laravel 11, PHP 8.2+
- **Database:** MySQL 8.0 với 8 bảng dữ liệu: `users`, `property_data`, `services`, `posts`, `categories`, `team_members`, `clients`, `contact_leads`, `settings`.
- **Frontend Template:** Blade Templates + Tailwind CSS + Alpine.js + Leaflet.js
