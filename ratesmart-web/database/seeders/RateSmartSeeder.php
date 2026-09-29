<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\TeamMember;
use App\Models\Client;
use App\Models\Service;
use App\Models\Category;
use App\Models\Post;
use App\Models\PropertyData;
use App\Models\ContactLead;
use App\Models\Setting;

class RateSmartSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Super Admin User
        User::firstOrCreate(
            ['email' => 'admin@ratesmart.com.vn'],
            [
                'name' => 'Vũ Văn Quân',
                'password' => Hash::make('RateSmart@2026'),
                'role' => 'super_admin',
                'phone' => '0853293333',
                'organization' => 'Công ty Thẩm định giá Hoa Sen & RateSmart',
                'is_active' => true,
            ]
        );

        // 2. Team Members (from Slide 4)
        $leaders = [
            [
                'name' => 'Vũ Văn Quân',
                'role_title' => 'CEO RateSmart',
                'organization' => 'Chủ tịch kiêm Tổng Giám đốc Công ty Thẩm định giá Hoa Sen',
                'bio' => 'Hơn 20 năm kinh nghiệm trong lĩnh vực thẩm định giá, M&A, kiểm toán, tài chính doanh nghiệp.',
                'experience_years' => 20,
                'avatar_url' => '/images/team/vu-van-quan.png',
                'badge_color' => 'emerald',
                'order' => 1,
            ],
            [
                'name' => 'Nguyễn Ngọc Bách',
                'role_title' => 'COO RateSmart Việt Nam',
                'organization' => 'Chủ tịch AsiaInvest, Phó CT CLB BĐS Hà Nội, GĐĐH Luxcer Singapore',
                'bio' => 'Hơn 25 năm kinh nghiệm trong lĩnh vực định giá doanh nghiệp, định giá tài sản và xúc tiến đầu tư M&A.',
                'experience_years' => 25,
                'avatar_url' => '/images/team/nguyen-ngoc-bach.png',
                'badge_color' => 'blue',
                'order' => 2,
            ],
            [
                'name' => 'Nguyễn Vĩnh Lộc',
                'role_title' => 'CTO RateSmart',
                'organization' => 'Giám đốc Kỹ thuật Luxcer Singapore, Cựu sinh viên học bổng Chính phủ Úc',
                'bio' => 'Hơn 20 năm kinh nghiệm thực tế về kiến trúc hệ thống CNTT lớn, cơ sở dữ liệu lớn (Big Data) và thuật toán AI.',
                'experience_years' => 20,
                'avatar_url' => '/images/team/nguyen-vinh-loc.png',
                'badge_color' => 'purple',
                'order' => 3,
            ],
        ];
        foreach ($leaders as $l) {
            TeamMember::updateOrCreate(['name' => $l['name']], $l);
        }

        // 3. Clients & Partners (from Slide 5)
        $clients = [
            ['name' => 'AGRIBANK', 'category' => 'bank', 'color_class' => 'text-slate-800', 'order' => 1],
            ['name' => 'VDB Bank', 'category' => 'bank', 'color_class' => 'text-red-600', 'order' => 2],
            ['name' => 'PUBLIC BANK', 'category' => 'bank', 'color_class' => 'text-slate-900', 'order' => 3],
            ['name' => 'Co-opBank', 'category' => 'bank', 'color_class' => 'text-red-700', 'order' => 4],
            ['name' => 'PGBank', 'category' => 'bank', 'color_class' => 'text-blue-700', 'order' => 5],
            ['name' => 'SCIC', 'category' => 'fund', 'color_class' => 'text-amber-700', 'order' => 6],
            ['name' => 'VAMC', 'category' => 'fund', 'color_class' => 'text-blue-900', 'order' => 7],
            ['name' => 'SAMSUNG', 'category' => 'corporate', 'color_class' => 'text-blue-800', 'order' => 8],
            ['name' => 'AEON MALL', 'category' => 'corporate', 'color_class' => 'text-fuchsia-800', 'order' => 9],
            ['name' => 'LOTTE', 'category' => 'corporate', 'color_class' => 'text-red-600', 'order' => 10],
        ];
        foreach ($clients as $c) {
            Client::updateOrCreate(['name' => $c['name']], $c);
        }

        // 4. Services (3 Cooperation Packages from Slide 21-23)
        $services = [
            [
                'name' => 'Cho Thuê Dịch Vụ Định Giá Trực Tuyến (SaaS)',
                'slug' => 'cho-thue-dich-vu-saas',
                'code' => 'saas',
                'badge' => 'Tiêu Chuẩn',
                'short_description' => 'RateSmart tạo tài khoản để ngân hàng truy cập trực tiếp vào hệ thống dữ liệu giá và sử dụng mô hình AVM để thẩm định tài sản nhanh.',
                'features' => [
                    'Truy cập cơ sở dữ liệu giá 63 tỉnh thành',
                    'Cho phép ngân hàng tự upload bảng giá nội bộ riêng',
                    'Bảo mật tuyệt đối dữ liệu nội bộ của ngân hàng',
                    'Xuất phiếu tra cứu nhanh chuẩn mực Lotus VFI'
                ],
                'pricing_note' => 'Thương thảo theo số lượng user & quy mô truy vấn',
                'icon' => 'globe',
                'order' => 1,
                'is_featured' => false,
            ],
            [
                'name' => 'Cho Thuê Hệ Thống & Cung Cấp Dịch Vụ Cập Nhật Dữ Liệu Giá',
                'slug' => 'cho-thue-he-thong-private-cloud',
                'code' => 'private_cloud',
                'badge' => 'Khuyên Dùng Cho Ngân Hàng',
                'short_description' => 'Tạo riêng 1 hệ thống tra cứu cài đặt trên hạ tầng đám mây (Private Cloud) hoặc máy chủ của ngân hàng, định kỳ update dữ liệu giá mới.',
                'features' => [
                    'Cài đặt riêng biệt trên hạ tầng máy chủ của ngân hàng',
                    'Đào tạo cán bộ ngân hàng tự chủ vận hành 100%',
                    'RateSmart định kỳ cập nhật dữ liệu giá thị trường và thẩm định',
                    'Tự động hóa báo cáo và phiếu định giá thẩm định nội bộ'
                ],
                'pricing_note' => 'Thương thảo theo mong muốn cài đặt & tần suất update data',
                'icon' => 'server',
                'order' => 2,
                'is_featured' => true,
            ],
            [
                'name' => 'Phát Triển Hệ Thống May Đo Riêng (Custom Enterprise)',
                'slug' => 'phat-trien-he-thong-rieng',
                'code' => 'custom_enterprise',
                'badge' => 'Chuyên Biệt Theo Yêu Cầu',
                'short_description' => 'Sử dụng công nghệ lõi RateSmart để phát triển giải pháp tra cứu giá tích hợp sâu theo đúng quy trình nghiệp vụ và hệ thống Core Banking của ngân hàng.',
                'features' => [
                    'Tùy biến thuật toán trọng số AVM theo khẩu vị rủi ro ngân hàng',
                    'Tích hợp API trực tiếp vào phần mềm phê duyệt tín dụng (LOS)',
                    'Định kỳ đồng bộ hóa kho dữ liệu giá hàng triệu bản ghi',
                    'Bảo trì, nâng cấp và hỗ trợ kỹ thuật 24/7'
                ],
                'pricing_note' => 'Dự toán chi tiết theo phạm vi dự án',
                'icon' => 'cpu',
                'order' => 3,
                'is_featured' => false,
            ],
        ];
        foreach ($services as $s) {
            Service::updateOrCreate(['code' => $s['code']], $s);
        }

        // 5. Categories & News
        $cat1 = Category::updateOrCreate(['slug' => 'phan-tich-thi-truong'], ['name' => 'Phân Tích Thị Trường', 'order' => 1]);
        $cat2 = Category::updateOrCreate(['slug' => 'cong-nghe-dinh-gia'], ['name' => 'Công Nghệ Định Giá', 'order' => 2]);
        $cat3 = Category::updateOrCreate(['slug' => 'hoat-dong-ratesmart'], ['name' => 'Hoạt Động Doanh Nghiệp', 'order' => 3]);

        $posts = [
            [
                'category_id' => $cat1->id,
                'title' => 'Tác động của Luật Đất đai mới đến bảng giá đất 63 tỉnh thành',
                'slug' => 'tac-dong-luat-dat-dai-moi-bang-gia-dat',
                'excerpt' => 'Phân tích chi tiết sự khác biệt giữa khung giá đất cũ 2020-2025 và cơ chế định giá theo nguyên tắc thị trường.',
                'content' => 'Nội dung chi tiết phân tích bảng giá đất 63 tỉnh thành theo luật mới...',
                'tag_badge' => 'PHÂN TÍCH',
                'is_featured' => true,
                'views_count' => 1240,
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
            [
                'category_id' => $cat2->id,
                'title' => 'Mô hình định giá tự động (AVM): Xu hướng tất yếu của ngân hàng hiện đại',
                'slug' => 'mo-hinh-dinh-gia-tu-dong-avm-xu-huong-ngan-hang',
                'excerpt' => 'Cách các ngân hàng số rút ngắn thời gian phê duyệt hồ sơ vay thế chấp từ 3 ngày xuống 15 phút nhờ AVM.',
                'content' => 'Nội dung chi tiết về giải pháp ứng dụng AVM trong phê duyệt tín dụng...',
                'tag_badge' => 'CÔNG NGHỆ',
                'is_featured' => true,
                'views_count' => 980,
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
        ];
        foreach ($posts as $p) {
            Post::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // 6. Property Data (from Slide 13 - 19)
        $properties = [
            [
                'address' => 'Số 631 QL21B, Bích Hoà, Thanh Oai, Hà Nội',
                'province' => 'Hà Nội',
                'district' => 'Thanh Oai',
                'ward' => 'Bích Hòa',
                'latitude' => 20.90797442,
                'longitude' => 105.76125368,
                'property_type' => 'residential_land',
                'data_source' => 'hoasen_appraisal',
                'area_m2' => 96.00,
                'frontage_m' => 6.00,
                'road_width_m' => 12.00,
                'road_position' => 'VT1',
                'shape' => 'rectangle',
                'business_advantage' => 'good',
                'unit_price' => 101584000.00,
                'total_value' => 9752064000.00,
                'valuation_date' => '2026-02-04',
                'verified_by' => 'Vũ Văn Quân - Admin',
                'source_note' => 'Tài sản thẩm định mục tiêu tại Thanh Oai',
                'status' => 'verified',
            ],
            [
                'address' => 'Thị trấn Kim Bài, Huyện Thanh Oai, Hà Nội',
                'province' => 'Hà Nội',
                'district' => 'Thanh Oai',
                'ward' => 'Kim Bài',
                'latitude' => 20.91060850,
                'longitude' => 105.76054280,
                'property_type' => 'residential_land',
                'data_source' => 'market_comparable',
                'area_m2' => 90.00,
                'frontage_m' => 5.00,
                'road_width_m' => 12.00,
                'road_position' => 'VT1',
                'shape' => 'rectangle',
                'business_advantage' => 'good',
                'unit_price' => 120000000.00,
                'total_value' => 10800000000.00,
                'valuation_date' => '2025-12-30',
                'verified_by' => 'Agribank-Thanh Oai',
                'source_note' => 'TĐG TSSS (Chưa kiểm định)',
                'status' => 'verified',
            ],
            [
                'address' => 'Thôn Kỳ Thủy, Xã Bích Hòa, Thanh Oai, Hà Nội (cách QL21B 50m)',
                'province' => 'Hà Nội',
                'district' => 'Thanh Oai',
                'ward' => 'Bích Hòa',
                'latitude' => 20.90640920,
                'longitude' => 105.76225880,
                'property_type' => 'residential_land',
                'data_source' => 'market_comparable',
                'area_m2' => 30.00,
                'frontage_m' => 4.00,
                'road_width_m' => 5.00,
                'road_position' => 'VT2',
                'shape' => 'rectangle',
                'business_advantage' => 'fair',
                'unit_price' => 105000000.00,
                'total_value' => 3150000000.00,
                'valuation_date' => '2025-05-12',
                'verified_by' => 'Chuyên viên khảo sát',
                'source_note' => 'TĐG TSSS',
                'status' => 'verified',
            ],
            [
                'address' => 'Thị trấn Kim Bài (Đoạn cầu Thạch Bích đến ngã ba bệnh viện), Thanh Oai',
                'province' => 'Hà Nội',
                'district' => 'Thanh Oai',
                'ward' => 'Kim Bài',
                'latitude' => 20.91019400,
                'longitude' => 105.76066000,
                'property_type' => 'residential_land',
                'data_source' => 'market_comparable',
                'area_m2' => 90.00,
                'frontage_m' => 5.00,
                'road_width_m' => 12.00,
                'road_position' => 'VT1',
                'shape' => 'rectangle',
                'business_advantage' => 'good',
                'unit_price' => 100000000.00,
                'total_value' => 9000000000.00,
                'valuation_date' => '2026-12-31',
                'verified_by' => 'Agribank-Thanh Oai',
                'source_note' => 'TĐG TSSS',
                'status' => 'verified',
            ],
        ];
        foreach ($properties as $prop) {
            PropertyData::updateOrCreate(['address' => $prop['address']], $prop);
        }

        // 7. General Settings
        $settings = [
            ['group_name' => 'general', 'key' => 'site_name', 'value' => 'RateSmart', 'description' => 'Tên thương hiệu'],
            ['group_name' => 'general', 'key' => 'slogan', 'value' => 'Nền Tảng Dữ Liệu Giá & Định Giá Tự Động Hàng Đầu', 'description' => 'Khẩu hiệu'],
            ['group_name' => 'contact', 'key' => 'hotline', 'value' => '0853 293 333', 'description' => 'Hotline tư vấn'],
            ['group_name' => 'contact', 'key' => 'address', 'value' => 'Tòa nhà Licogi 13, 164 Khuất Duy Tiến, Thanh Xuân, Hà Nội', 'description' => 'Trụ sở'],
            ['group_name' => 'contact', 'key' => 'website', 'value' => 'https://ratesmart.com.vn', 'description' => 'Website chính thức'],
            ['group_name' => 'contact', 'key' => 'parent_company', 'value' => 'Công ty Thẩm định giá Hoa Sen (Lotus VFI)', 'description' => 'Công ty mẹ'],
        ];
        foreach ($settings as $st) {
            Setting::updateOrCreate(['key' => $st['key']], $st);
        }

        // 8. Contact Leads Sample
        ContactLead::updateOrCreate(
            ['email' => 'hung.tq@agribank.com.vn'],
            [
                'full_name' => 'Trần Quốc Hưng',
                'phone' => '0983456789',
                'company_name' => 'Agribank Ba Đình',
                'interested_package' => 'Private Cloud',
                'message' => 'Ngân hàng muốn thử nghiệm hệ thống Private Cloud phục vụ định giá khoản vay thế chấp BĐS.',
                'status' => 'new',
            ]
        );
    }
}
