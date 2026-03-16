## TechShop - Website bán hàng công nghệ (PHP MVC cơ bản)

### 1. Giới thiệu
- **TechShop** là website bán hàng thiết bị công nghệ (điện thoại, laptop, phụ kiện, v.v.) xây dựng bằng **PHP thuần** theo mô hình **MVC đơn giản**.
- Hỗ trợ:
  - Tài khoản **khách / khách hàng / admin**
  - Xem sản phẩm, giỏ hàng, đặt hàng
  - Trang tin tức công nghệ
  - Trang quản trị cho admin: quản lý user, sản phẩm, tin tức.

### 2. Cấu trúc thư mục chính
- `index.php`: Front controller + routing theo `controller` / `action`.
- `app/controllers`: các controller (`HomeController`, `ProductController`, `CartController`, `AuthController`, `NewsController`, `PageController`, `AdminController`).
- `app/models`: các model làm việc với DB (`User`, `Product`, `Order`, `News`, `Cart`, `Category`, `Brand`).
- `app/views`: view cho từng phần (auth, home, product, cart, pages, news, admin).
- `config/database.php`: cấu hình kết nối MySQL (class `Database` dùng `mysqli_connect`).
- `assets/css`: CSS giao diện (`main.css`, `login.css`).
- `assets/Images`: thư mục ảnh sản phẩm, tin tức, banner.
- `tech-shop.sql`: file dump database (schema + dữ liệu mẫu).

### 3. Yêu cầu môi trường
- **PHP** >= 8.0 (test với 8.5.x).
- **MariaDB / MySQL** (schema trong `tech-shop.sql`).
- Web server: Apache / Nginx / hoặc **PHP built-in server**.

### 4. Hướng dẫn cài đặt & chạy
1. **Clone / copy project** vào thư mục web root (ví dụ: `/var/www/html/techshop` hoặc thư mục bạn đặt).
2. **Tạo database và import dữ liệu**:
   - Tạo database tên `tech-shop` (hoặc tên khác, sau đó sửa trong `config/database.php`).
   - Import file:
     ```sql
     tech-shop.sql
     ```
3. **Cấu hình kết nối DB**:
   - Mở `config/database.php` và chỉnh:
     ```php
     private $host = "localhost";
     private $username = "admin";
     private $password = "123456";
     private $dbname = "tech-shop";
     ```
   - Đổi `username`, `password`, `dbname` theo máy của bạn.
4. **Chạy dự án**:
   - Cách 1: Apache/Nginx trỏ DocumentRoot vào thư mục project, truy cập:
     - `http://localhost/` (hoặc theo VirtualHost).
   - Cách 2: PHP built-in server:
     ```bash
     cd /path/to/project
     php -S localhost:8000
     ```
     Sau đó vào `http://localhost:8000/index.php`.

#### 4.1. Chạy web và share ra ngoài bằng ngrok
Nếu bạn muốn demo website cho người khác xem qua Internet (trên máy thật hoặc trong LAN), có thể dùng **ngrok**:

1. **Cài ngrok** (nếu chưa có):
   - Tải từ trang chủ `https://ngrok.com` và làm theo hướng dẫn cài đặt cho Linux.
2. **Chạy PHP built-in server cục bộ** (ví dụ cổng 8000):
   ```bash
   cd /path/to/project
   php -S localhost:8000
   ```
3. **Mở một terminal khác và chạy ngrok**:
   ```bash
   ngrok http 8000
   ```
4. Ngrok sẽ tạo một **URL công khai** dạng:
   - `https://xxxx-xx-xx-xx.ngrok-free.app`
5. Gửi URL đó cho người khác, họ có thể truy cập trực tiếp vào:
   - `https://xxxx-xx-xx-xx.ngrok-free.app/index.php`

Lưu ý:
- Khi dùng ngrok, **terminal chạy PHP server và terminal chạy ngrok phải luôn mở**.
- Nếu bạn đổi cổng PHP server (ví dụ 8080) thì lệnh ngrok cũng phải đổi theo: `ngrok http 8080`.

### 5. Tài khoản mẫu
- **Admin**
  - Email: `admin@gmail.com`
  - Mật khẩu: (đã được hash, xem trong `tech-shop.sql`; có thể đăng ký mới và sửa role trong DB).
- **Customer**
  - Email: `user@gmail.com`, `vu@gmail.com`, ...
  - Mật khẩu: tương tự hash trong DB (hoặc tự đăng ký user mới).

> Gợi ý: để dễ test, có thể vào bảng `users` và đặt lại password hash bằng `password_hash('123456', PASSWORD_DEFAULT)` trong 1 script PHP tạm.

### 6. Các chức năng chính
1. **Guest (chưa đăng nhập)**
   - Xem trang chủ, danh sách sản phẩm, chi tiết sản phẩm.
   - Xem trang giới thiệu, liên hệ, tin tức.
   - Khi bấm **thêm vào giỏ / thanh toán / xem thông tin tài khoản** sẽ được chuyển tới trang đăng nhập/đăng ký.
2. **User đã đăng nhập**
   - Thêm sản phẩm vào giỏ hàng, cập nhật/xóa sản phẩm trong giỏ.
   - Chọn phương thức thanh toán, tạo đơn hàng.
   - Xem và cập nhật thông tin tài khoản, xem lịch sử đơn hàng.
3. **Admin**
   - **Dashboard**: thống kê nhanh số lượng user, admin, khách.
   - **Quản lý người dùng**: xem danh sách, đổi role (admin/customer).
   - **Quản lý sản phẩm**:
     - Danh sách sản phẩm, **thêm / sửa / xóa**.
     - Khi thêm/sửa có thể:
       - Upload ảnh từ máy (tự lưu vào `assets/Images`).
       - Hoặc nhập URL ảnh để hệ thống tải ảnh về thư mục `assets/Images`.
   - **Quản lý tin tức**:
     - Danh sách bài viết, **thêm / sửa / xóa**.
     - Hỗ trợ upload hoặc tải ảnh từ URL như phần sản phẩm.

### 7. Routing cơ bản
- Tham số `controller` / `action` được đọc từ query string:
  - `index.php?controller=home` → trang chủ.
  - `index.php?controller=products` → danh sách sản phẩm.
  - `index.php?controller=product&action=detail&id=...` → chi tiết sản phẩm.
  - `index.php?controller=news` → danh sách tin tức.
  - `index.php?controller=cart` → giỏ hàng.
  - `index.php?controller=auth&action=login` → đăng nhập.
  - `index.php?controller=admin&action=dashboard` → admin dashboard.

### 8. Ghi chú
- Dự án mang tính demo/bài tập, chưa có:
  - Phân trang danh sách sản phẩm/tin tức.
  - Validate dữ liệu nâng cao, CSRF token, v.v.
- Nếu đưa lên môi trường thật, cần:
  - Ẩn/thay đổi tài khoản admin mặc định.
  - Cấu hình lại thông tin DB, domain, HTTPS.
  - Bổ sung validate & bảo mật (filter input, CSRF, XSS, quyền hạn chi tiết hơn).

