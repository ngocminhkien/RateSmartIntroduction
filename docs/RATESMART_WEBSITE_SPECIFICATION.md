# 🏛️ ĐẶC TẢ YÊU CẦU & KIẾN TRÚC NỘI DUNG WEBSITE RATESMART
## (Dành cho Dự Án Website Giới Thiệu & Hệ Thống Quản Trị Admin)

---

## I. TỔNG QUAN DOANH NGHIỆP & BỐI CẢNH DỰ ÁN

Dựa trên việc đọc và phân tích chuyên sâu 24 trang tài liệu giới thiệu nội bộ `RateSmart Introduction.pdf`:

### 1. Thông Tin Doanh Nghiệp
* **Tên công ty**: CÔNG TY TNHH RATESMART VIỆT NAM (RATESMART VIETNAM COMPANY LIMITED).
* **Mối quan hệ chiến lược**: Là công ty công nghệ thành viên của **Công ty Thẩm định giá Hoa Sen (Lotus VFI)** – một trong những tổ chức thẩm định giá uy tín hàng đầu Việt Nam.
* **Sứ mệnh**: Ứng dụng công nghệ số, Big Data, học máy (Machine Learning) và Trí tuệ nhân tạo (AI) vào việc thu thập, chuẩn hóa, phân tích và khai thác dữ liệu giá; nâng cao tính chính xác, minh bạch và hiệu quả trong định giá tài sản.
* **Sản phẩm cốt lõi**: Nền tảng định giá tự động **AVM (Automated Valuation Model)** dựa trên dữ liệu giá đa nguồn và bản đồ định vị số.
* **Trụ sở**: Tòa nhà Licogi 13, số 164 Khuất Duy Tiến, Q. Thanh Xuân, Hà Nội.
* **Hotline**: `0853 293 333` | **Website**: `https://ratesmart.com.vn`.

### 2. Đội Ngũ Lãnh Đạo Chủ Chốt
1. **Ông Vũ Văn Quân - CEO RateSmart**:
   - Chủ tịch kiêm Tổng Giám đốc Công ty Thẩm định giá Hoa Sen.
   - Hơn 20 năm kinh nghiệm trong lĩnh vực Thẩm định giá, M&A, Kiểm toán và Tài chính.
2. **Ông Nguyễn Ngọc Bách - COO RateSmart Việt Nam**:
   - Chủ tịch Tập đoàn AsiaInvest, Phó Chủ tịch CLB Bất động sản Hà Nội, Giám đốc điều hành Luxcer Singapore.
   - Hơn 25 năm kinh nghiệm về Định giá doanh nghiệp, M&A và phát triển tài sản.
3. **Ông Nguyễn Vĩnh Lộc - CTO RateSmart**:
   - Giám đốc Kỹ thuật Luxcer Singapore, Cựu sinh viên học bổng Chính phủ Úc (CNTT & Quản trị thông tin).
   - Hơn 20 năm kinh nghiệm kiến trúc hệ thống CNTT quy mô lớn, Big Data và AI.

### 3. Quy Mô & Năng Lực Dữ Liệu Thực Tế
* **Dữ liệu giá Nhà nước**: Bao phủ toàn bộ bảng giá đất ban hành của **63 tỉnh thành** (giai đoạn 2020 - 2025).
* **Dữ liệu giá Thị trường**: Hơn **10.000 tài sản so sánh** đã được làm sạch và xác thực (2024 - Nay).
* **Dữ liệu giá Thẩm định**: Hơn **20.000 tài sản** đã thẩm định chính thức bởi Thẩm định giá Hoa Sen (2024 - Nay).
* **Dữ liệu giá Ngân hàng**: Cơ sở dữ liệu giá tham chiếu tài sản bảo đảm của các ngân hàng tại **35 tỉnh thành**.
* **Đối tác & Khách hàng tiêu biểu**: Agribank, VDB, Public Bank, Co-opBank, PGBank, SCIC, VAMC, Samsung, AEON Mall, Lotte.

---

## II. TƯ DUY KIẾN TRÚC MENU & NỘI DUNG WEBSITE RATESMART

### 1. Mục Tiêu Của Website
* **B2B Trust & Authority**: Thể hiện uy tín chuyên môn thẩm định giá vững chắc kế thừa từ Hoa Sen Valuation kết hợp năng lực công nghệ cao của RateSmart.
* **Product Showcase**: Minh họa sinh động giải pháp Định giá tự động AVM trên bản đồ số, tạo trải nghiệm trực quan cho đối tác Ngân hàng, Doanh nghiệp tài chính và Nhà đầu tư.
* **Lead Generation & Partnership**: Thúc đẩy khách hàng doanh nghiệp đăng ký trải nghiệm hệ thống và chọn các mô hình hợp tác (SaaS, Private Cloud, hoặc May đo hệ thống).
* **Content Management (Admin CMS)**: Cung cấp bảng quản trị cho đội ngũ RateSmart cập nhật nội dung tin tức, dịch vụ, quản lý dữ liệu giá và tiếp nhận hồ sơ yêu cầu.

---

### 2. Sơ Đồ Cấu Trúc Menu Người Dùng (Frontend Sitemap)

```
📌 HEADER NAVIGATION (Thanh Điều Hướng Chính)
│
├── 🏠 Trang Chủ (Home)
│
├── 🏢 Về RateSmart (Giới Thiệu)
│   ├── Tổng quan & Hệ sinh thái Hoa Sen
│   ├── Sứ mệnh, Tầm nhìn & Giá trị cốt lõi
│   ├── Đội ngũ Lãnh đạo chủ chốt
│   └── Đối tác & Khách hàng tiêu biểu
│
├── 📊 Nền Tảng Dữ Liệu & AVM (Công Nghệ)
│   ├── 4 Trụ cột Cơ sở Dữ liệu Giá (Nhà nước, Thị trường, Thẩm định, Ngân hàng)
│   ├── Quy trình 5 bước Xây dựng & Xác thực Dữ liệu Đa lớp
│   └── Mô hình Định giá Tự động (Automated Valuation Model - AVM)
│
├── 💼 Giải Pháp & Dịch Vụ
│   ├── Giải pháp cho Ngân hàng & Tổ chức Tín dụng
│   ├── Giải pháp cho Quỹ đầu tư & Doanh nghiệp
│   ├── 3 Hình thức Hợp tác Doanh nghiệp (SaaS / Private Cloud / Custom Dev)
│   └── Bảng so sánh tính năng các gói
│
├── 🗺️ Trải Nghiệm Tra Cứu AVM (Demo Live)
│   ├── Nhập địa chỉ & định vị vệ tinh GPS
│   ├── Bộ lọc chuẩn mực thẩm định giá (diện tích, mặt tiền, lộ giới, hình thửa)
│   └── Xem kết quả: 3 tài sản so sánh + Phiếu tra cứu giá trị rút gọn/chi tiết
│
├── 📰 Thị Trường & Tin Tức
│   ├── Báo cáo & Phân tích xu hướng BĐS
│   ├── Pháp lý & Chuẩn mực Thẩm định giá mới
│   └── Tin tức hoạt động RateSmart
│
└── 📞 Liên Hệ & Yêu Cầu Hợp Tác
    ├── Form đăng ký dùng thử / Yêu cầu báo giá
    ├── Thông tin liên hệ văn phòng Licogi 13
    └── Đặt lịch Demo trực tiếp 1-on-1
```

---

### 3. Chi Tiết Nội Dung Từng Trang Chính

#### A. Trang Chủ (Landing Page)
1. **Hero Section**:
   - Headline: *"Nền Tảng Dữ Liệu Giá & Định Giá Tự Động Hàng Đầu Việt Nam"*
   - Sub-headline: *"Tiên phong chuyển đổi số ngành thẩm định giá với công nghệ Big Data, AI và nền tảng dữ liệu uy tín từ Thẩm định giá Hoa Sen."*
   - Interactive Search Bar: Ô tìm kiếm nhanh địa chỉ tài sản kèm nút *"Tra Cứu Giá Ngay"*.
   - CTAs: [Khám Phá Giải Pháp AVM] [Đăng Ký Tư Vấn Doanh Nghiệp].
2. **Trust Bar / Proof Points**:
   - Thống kê thời gian thực: `63 Tỉnh Thành` phủ dữ liệu giá Nhà nước | `20.000+` Tài sản thẩm định | `10.000+` BĐS thị trường xác thực | `35 Tỉnh Thành` dữ liệu Ngân hàng.
   - Logo Carousel đối tác: Agribank, Public Bank, Co-opBank, PGBank, VDB, SCIC, VAMC, Samsung, Aeon Mall, Lotte.
3. **Core Solutions (3 Trục Giải Pháp)**:
   - *Dữ liệu giá Đa nguồn & Chuẩn hóa*: Cập nhật liên tục, gắn nhãn metadata chi tiết.
   - *Thuật toán AVM Thông minh*: Đưa ra biên độ giá chính xác dựa trên 3 tài sản so sánh tương đồng nhất.
   - *Báo cáo & Phiếu Định giá Tốc độ cao*: Xuất kết quả phiếu rút gọn hoặc bản phân tích chi tiết chỉ trong vài giây.
4. **Interactive Feature Showcase (Mô Phỏng Trực Quan Map AVM)**:
   - Minh họa cách hệ thống tìm kiếm 3 tài sản so sánh lân cận, vẽ biểu đồ biến động giá bình quân và xuất phiếu kết quả.
5. **3 Gói Hợp Tác Dành Cho Doanh Nghiệp**:
   - Gói 1: Thuê dịch vụ tra cứu (SaaS Online + Upload bảng giá bảo mật).
   - Gói 2: Cho thuê hệ thống On-Premise/Private Cloud + Cập nhật data định kỳ.
   - Gói 3: Phát triển hệ thống riêng (Custom Enterprise Development).
6. **Ban Lãnh Đạo & Chuyên Gia**:
   - Giới thiệu hình ảnh, học vấn, uy tín chuyên môn của ông Vũ Văn Quân, ông Nguyễn Ngọc Bách, ông Nguyễn Vĩnh Lộc.
7. **Tin Tức Thị Trường Mới Nhất**: 3 bài phân tích xu hướng giá đất đô thị và chính sách bảng giá mới.
8. **CTA Footer**: Kêu gọi đăng ký dùng thử giải pháp dành riêng cho ngân hàng.

---

#### B. Trang Về Chúng Tôi (About Us)
* **Câu chuyện thương hiệu**: Sự kết hợp giữa bề dày 20 năm chuyên môn của Thẩm định giá Hoa Sen và công nghệ dữ liệu tiên tiến từ Singapore & Úc.
* **Tầm nhìn & Sứ mệnh**: Trở thành hạ tầng dữ liệu giá số tin cậy nhất cho thị trường tài chính và bất động sản Việt Nam.
* **Giá trị cốt lõi**: *Chính xác – Minh bạch – Khách quan – Đổi mới sáng tạo*.
* **Sơ đồ năng lực**: Đội ngũ chuyên gia định giá viên thẻ Bộ Tài chính kết hợp cùng đội ngũ kỹ sư AI/Data Science.

---

#### C. Trang Công Nghệ & Dữ Liệu Giá (Technology & Big Data)
* **4 Nguồn dữ liệu trụ cột**:
  1. *Giá Nhà Nước*: Bảng giá 63 tỉnh thành, chuẩn hóa hệ số K và phân loại tuyến đường.
  2. *Giá Thẩm Định*: 20.000 hồ sơ lưu trữ thực tế từ Hoa Sen Valuation.
  3. *Giá Thị Trường*: 10.000 giao dịch thực tế đã qua lọc bất thường và làm sạch.
  4. *Giá Ngân Hàng*: Bảng giá tham chiếu nội bộ phục vụ định giá tài sản bảo đảm.
* **Quy trình chuẩn hóa 5 bước độc quyền**:
  1. Thu thập dữ liệu đa nguồn (Multi-source Ingestion).
  2. Chuẩn hóa & làm sạch dữ liệu (Data Cleaning & Deduplication).
  3. Phân loại & gắn ngữ cảnh dữ liệu (Contextual Enrichment & Metadata Tagging).
  4. Xác thực đa lớp (Multi-layer Validation: Thống kê + Đối chiếu chéo + Thẩm định viên rà soát).
  5. Cập nhật và hiệu chỉnh liên tục (Continuous Real-time Calibration).

---

#### D. Trang Demo Tra Cứu AVM (Live Map Preview)
* Giao diện mô phỏng đúng slide 13 đến 16 của tài liệu:
  - Bản đồ tương tác vệ tinh Google Maps / Leaflet.
  - Ô nhập địa chỉ (VD: Số 631 Thanh Lương, Bích Hoà, Thanh Oai, Hà Nội).
  - Modal thiết lập tiêu chí thẩm định: Mặt tiền, lộ giới đường, diện tích, hình thái đất (nở hậu, vuông vức, vạt góc...), lợi thế kinh doanh.
  - Hiển thị danh sách tài sản so sánh lân cận (STT, khoảng cách, đơn giá tr/m2, nguồn kiểm định).
  - Mẫu phiếu tra cứu nhanh giá trị tài sản (Rút gọn & Chi tiết có biểu đồ).

---

### 4. Sơ Đồ Cấu Trúc Menu Trang Admin (Admin CMS Sitemap)

Dành cho yêu cầu Bước 4 (Laravel + MySQL):

```
⚙️ ADMIN CONTROL PANEL (`/admin`)
│
├── 📊 1. Dashboard (Bảng Điều Khiển Tổng Quan)
│   ├── Thống kê tổng số lượt tra cứu giá hôm nay / tuần / tháng
│   ├── Thống kê tài sản đã lưu trong kho dữ liệu (Nhà nước, Thị trường, Thẩm định)
│   ├── Biểu đồ biến động lượt truy vấn theo khu vực tỉnh thành
│   └── Danh sách yêu cầu tư vấn / demo mới cần xử lý
│
├── 🗺️ 2. Quản Lý Dữ Liệu Giá & Bất Động Sản (`/admin/properties`)
│   ├── Danh sách bảng giá Nhà nước theo tỉnh thành (CRUD)
│   ├── Danh sách tài sản so sánh thị trường (CRUD, Geocoding GPS, lọc trùng)
│   ├── Hồ sơ tài sản thẩm định Hoa Sen (Import Excel/CSV, gán trạng thái kiểm định)
│   └── Quản lý hệ số điều chỉnh AVM (vị trí, mặt tiền, hình dáng)
│
├── 💼 3. Quản Lý Dịch Vụ & Mô Hình Hợp Tác (`/admin/services`)
│   ├── Danh sách gói dịch vụ (SaaS, Private Cloud, Custom Dev)
│   ├── Cập nhật mô tả, tính năng nổi bật, bảng giá tham chiếu
│   └── Quản lý tài liệu giải pháp đính kèm (PDF brochure, whitepaper)
│
├── 📝 4. Quản Lý Tin Tức & Báo Cáo Nghiên Cứu (`/admin/posts`)
│   ├── Danh mục bài viết (Thị trường BĐS, Pháp lý thẩm định, Tin tức nội bộ)
│   ├── Soạn thảo bài viết (Rich Text Editor TinyMCE, Upload Thumbnail, SEO Meta)
│   └── Quản lý tác giả và trạng thái xuất bản
│
├── 👥 5. Quản Lý Đội Ngũ Nhân Sự & Khách Hàng (`/admin/team-clients`)
│   ├── Quản lý profile ban lãnh đạo (Ảnh, chức vụ, tiểu sử, LinkedIn)
│   └── Quản lý danh sách logo đối tác / khách hàng (Ngân hàng, Quỹ đầu tư)
│
├── 📬 6. Quản Lý Yêu Cầu Liên Hệ & Báo Giá (`/admin/leads`)
│   ├── Danh sách form khách hàng gửi về (Họ tên, SĐT, Email, Ngân hàng/Cty, Nội dung)
│   ├── Phân loại trạng thái: Mới tiếp nhận -> Đang tư vấn -> Đã ký kết -> Lưu trữ
│   └── Xuất dữ liệu Excel/CSV
│
└── ⚙️ 7. Cấu Hình Hệ Thống (`/admin/settings`)
    ├── Thông tin công ty (Tên, địa chỉ Licogi 13, hotline, email, MST)
    ├── Quản lý tài khoản Admin & Phân quyền (Super Admin, Editor, Valuation Analyst)
    └── Cấu hình API Google Maps / Leaflet & Cấu hình SMTP gửi mail thông báo
```

---

## III. THIẾT KẾ DATABASE SCHEMA (MYSQL CHO LARAVEL)

Kiến trúc cơ sở dữ liệu MySQL chuẩn mực cho framework Laravel 11:

### 1. Bảng `users` & Phân Quyền (`roles`, `permissions`)
- Quản lý tài khoản đăng nhập admin và đối tác ngân hàng.
- Columns: `id`, `name`, `email`, `password`, `phone`, `role` (super_admin, analyst, client_bank), `bank_name`, `is_active`, `remember_token`, `timestamps`.

### 2. Bảng `property_data` (Dữ liệu giá tài sản & so sánh)
- Columns:
  * `id`: BIGINT (PK)
  * `address`: VARCHAR(255) (Địa chỉ chi tiết)
  * `province_id`, `district_id`, `ward_id`: INT (Phân cấp hành chính)
  * `latitude`, `longitude`: DECIMAL(10, 8) (Tọa độ định vị GPS)
  * `property_type`: ENUM ('residential_land', 'apartment', 'commercial', 'movable')
  * `data_source`: ENUM ('government', 'market', 'hoasen_appraisal', 'bank_internal')
  * `area`: DECIMAL(10, 2) (Diện tích m2)
  * `frontage`: DECIMAL(10, 2) (Mặt tiền mét)
  * `road_width`: DECIMAL(10, 2) (Lộ giới đường trước mặt)
  * `shape`: VARCHAR(50) (Hình chữ nhật, Nở hậu, Thóp hậu, Vát góc...)
  * `unit_price`: DECIMAL(15, 2) (Đơn giá đ/m2)
  * `total_value`: DECIMAL(18, 2) (Tổng giá trị VND)
  * `valuation_date`: DATE (Thời điểm khảo sát / thẩm định)
  * `status`: ENUM ('raw', 'cleaned', 'verified', 'published')
  * `verified_by`: BIGINT (FK tới chuyên gia kiểm định)
  * `created_at`, `updated_at`

### 3. Bảng `services` (Sản phẩm & Giải pháp)
- Columns: `id`, `title`, `slug`, `summary`, `description`, `icon`, `image`, `service_type` (saas, onpremise, custom), `order`, `is_active`, `timestamps`.

### 4. Bảng `posts` & `categories` (Tin tức & Nghiên cứu)
- Columns: `id`, `category_id`, `author_id`, `title`, `slug`, `excerpt`, `content` (LONGTEXT), `thumbnail`, `views_count`, `is_featured`, `status`, `published_at`, `timestamps`.

### 5. Bảng `team_members` (Đội ngũ chuyên gia)
- Columns: `id`, `full_name`, `position`, `organization`, `bio` (TEXT), `experience_years`, `avatar`, `order`, `is_active`, `timestamps`.

### 6. Bảng `clients` (Khách hàng & Đối tác)
- Columns: `id`, `name`, `logo`, `category` (bank, fund, enterprise), `order`, `website_url`, `is_featured`, `timestamps`.

### 7. Bảng `contact_leads` (Khách hàng liên hệ & Đăng ký demo)
- Columns: `id`, `fullname`, `phone`, `email`, `company_name`, `interest_solution`, `message`, `status` (new, contacting, completed), `created_at`.

### 8. Bảng `settings` (Cấu hình toàn trang)
- Columns: `id`, `group` (general, contact, seo, api), `key`, `value` (TEXT), `timestamps`.

---

## IV. BỘ DESIGN SYSTEM & QUY CHUẨN THIẾT KẾ (BRAND IDENTITY)

* **Primary Color (Màu chủ đạo)**: `#008037` (RateSmart Green – Thể hiện sự tin cậy tài chính, số hóa, tăng trưởng bền vững).
* **Primary Dark / Hover**: `#005e28`.
* **Secondary / Dark Slate**: `#0f172a` & `#1e293b` (Độ sang trọng, thẩm mỹ B2B công nghệ cao).
* **Accent Gold / Rating**: `#f59e0b` (Màu ngôi sao biểu trưng cho đánh giá / thẩm định chất lượng cao).
* **Background Light**: `#f8fafc` / `#f0fdf4` (Tạo không gian thoáng đãng, sắc nét).
* **Typography**:
  - Font tiêu đề chính: `Plus Jakarta Sans`, sans-serif (nét chữ hiện đại, hình học khỏe khoắn).
  - Font nội dung: `Inter`, sans-serif (tối ưu khả năng đọc trên màn hình máy tính và điện thoại di động).
* **Card & Border Style**: Bo góc mềm `rounded-xl` (12px - 16px), đổ bóng tinh tế `shadow-sm hover:shadow-md`, viền nét mảnh `border border-slate-200/80`.
