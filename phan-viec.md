SV1 – Trưởng nhóm / Phân tích & Kiến trúc
Nhiệm vụ chính:
Thu thập yêu cầu, viết mục tiêu, phạm vi, use case cho hệ thống.
Thiết kế kiến trúc tổng thể (mô hình MVC, phân chia controllers/models/views).
Thiết kế sơ bộ routing (index.php, controller/action).
Quản lý tiến độ, họp nhóm, tổng hợp báo cáo.
Sản phẩm:
Phần “Giới thiệu đề tài”, “Mô tả bài toán”, “Phân tích chức năng” trong báo cáo.
Sơ đồ kiến trúc và mô tả luồng xử lý chính.
SV2 – Thiết kế & triển khai CSDL
Nhiệm vụ chính:
Thiết kế lược đồ CSDL: bảng users, products, categories, brands, cart, orders, order_details, payment_methods, news,…
Viết file tech-shop.sql (CREATE TABLE, INSERT dữ liệu mẫu).
Xây dựng class Database, các model cơ bản: User, Product, Order, News, Category, Brand, Cart.
Sản phẩm:
File tech-shop.sql, phần “Thiết kế CSDL” trong báo cáo (mô tả bảng, ERD).
Các model PHP tương ứng.
SV3 – Backend chức năng người dùng (Auth, User, Cart, Order)
Nhiệm vụ chính:
Cài đặt AuthController (đăng nhập, đăng ký, đăng xuất).
Luồng session, phân quyền guest / customer / admin.
Chức năng giỏ hàng và đặt hàng: CartController, Order model.
Trang thông tin cá nhân & lịch sử đơn hàng (PageController::user).
Sản phẩm:
Controllers: AuthController, CartController, phần user trong PageController.
View: login.php, register.php, cart/index.php, pages/user.php.
SV4 – Backend sản phẩm & tin tức + Admin
Nhiệm vụ chính:
Chức năng hiển thị sản phẩm: HomeController, ProductController.
Chức năng tin tức: NewsController + view list/detail.
Toàn bộ phần Admin:
AdminController (dashboard, users, manageProducts, manageNews, add/edit/delete).
Upload ảnh hoặc tải ảnh từ URL vào assets/Images.
Sản phẩm:
Controllers: HomeController, ProductController, NewsController, AdminController.
View admin: admin/dashboard.php, admin/profile.php, admin/products_list.php, admin/edit_product.php, admin/add_product.php, admin/news_list.php, admin/edit_news.php, admin/add_news.php.
SV5 – Frontend giao diện & kiểm thử, tài liệu
Nhiệm vụ chính:
Thiết kế giao diện: assets/css/main.css, assets/css/login.css.
Layout header/footer, navbar, card sản phẩm, trang chi tiết, form đẹp và thống nhất.
Viết README.md, hướng dẫn chạy project, hướng dẫn dùng ngrok.
Kiểm thử chức năng, viết phần “Kết quả – Đánh giá – Hướng phát triển” trong báo cáo.
Sản phẩm:
CSS và chỉnh sửa các file view cho đẹp, responsive cơ bản.
README, hình chụp màn hình giao diện, test scenario.
