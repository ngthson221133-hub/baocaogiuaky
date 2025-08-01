# 🍎 HỆ THỐNG BÁN HÀNG TRÁI CÂY TƯƠI ONLINE

## 📋 TỔNG QUAN DỰ ÁN

Hệ thống bán hàng trái cây tươi online được phát triển bằng PHP thuần với kiến trúc MVC, sử dụng Smarty Template Engine và MySQL database. Hệ thống hỗ trợ cả khách hàng chưa đăng ký (guest) và người dùng đã đăng ký, với các chức năng quản lý đầy đủ cho admin.

## 🏗️ KIẾN TRÚC HỆ THỐNG

### Công nghệ sử dụng:
- **Backend**: PHP 8.0.30
- **Database**: MySQL/MariaDB
- **Template Engine**: Smarty 4.x
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Icons**: FontAwesome 6.5.0
- **Charts**: Chart.js
- **Excel Export**: PhpSpreadsheet 1.28.0

### Cấu trúc thư mục:
```
itc_toi-main/
├── cache/                    # Cache Smarty
├── controller/              # Controllers (MVC)
├── model/                   # Models (MVC)
├── templates/               # Templates Smarty
├── templates_c/             # Compiled templates
├── vendor/                  # Composer dependencies
├── img/                     # Static images
├── config.php              # Database configuration
├── index.php               # Main entry point
└── composer.json           # Dependencies
```

## 🚀 CÁC CHỨC NĂNG CHÍNH

### 1. 🏠 TRANG CHỦ (GUEST USER)

#### 1.1 Giao diện chính
- **Header**: Logo, menu navigation, giỏ hàng, đăng nhập/đăng ký
- **Banner**: Slider hình ảnh sản phẩm nổi bật
- **Danh mục sản phẩm**: Hiển thị theo từng danh mục
- **Footer**: Thông tin liên hệ, social media

#### 1.2 Quản lý giỏ hàng (Guest)
- **Thêm sản phẩm**: AJAX add to cart
- **Cập nhật số lượng**: Real-time update
- **Xóa sản phẩm**: Remove from cart
- **Xóa toàn bộ**: Clear cart
- **Hiển thị tổng tiền**: Dynamic calculation

#### 1.3 Tìm kiếm và lọc
- **Tìm kiếm sản phẩm**: Theo tên, mô tả
- **Lọc theo danh mục**: Dropdown menu
- **Sắp xếp**: Theo giá, tên, mới nhất

### 2. 👤 HỆ THỐNG NGƯỜI DÙNG

#### 2.1 Đăng ký tài khoản
- **Form đăng ký**: Họ tên, email, mật khẩu
- **Validation**: Client-side và server-side
- **AJAX submission**: Không reload trang
- **Thông báo**: Success/error messages

#### 2.2 Đăng nhập/Đăng xuất
- **Form đăng nhập**: Email, mật khẩu
- **Session management**: PHP sessions
- **Remember me**: Cookie-based
- **Security**: Password hashing

#### 2.3 Trang cá nhân (Welcome Page)
- **Thông tin cá nhân**: Hiển thị thông tin user
- **Menu navigation**: Đơn hàng của tôi, giỏ hàng
- **Giỏ hàng riêng**: Tách biệt với guest cart
- **Lịch sử đơn hàng**: Xem trạng thái đơn hàng

### 3. 🛒 QUY TRÌNH MUA HÀNG

#### 3.1 Giỏ hàng nâng cao (Logged-in User)
- **Persistent cart**: Lưu trữ database
- **Sync với guest cart**: Khi đăng nhập
- **Real-time updates**: AJAX operations
- **Quantity validation**: Kiểm tra tồn kho

#### 3.2 Trang thanh toán (Checkout)
- **Thông tin giao hàng**: Form nhập liệu
- **Phương thức thanh toán**:
  - Thanh toán khi nhận hàng (COD)
  - Chuyển khoản ngân hàng
- **Mã khuyến mãi**: Apply/remove promotion codes
- **Tính toán tổng tiền**: Bao gồm giảm giá

#### 3.3 Hệ thống khuyến mãi
- **Mã giảm giá**: Admin tạo promotion codes
- **Giới hạn sử dụng**: Quantity limit per code
- **Validation**: Kiểm tra điều kiện áp dụng
- **Tính toán giảm giá**: Percentage/fixed amount

### 4. 💳 CHỨC NĂNG CHUYỂN KHOẢN NGÂN HÀNG

#### 4.1 Tạo mã chuyển khoản
- **QR Code tự động**: VietQR standard
- **Nội dung random**: ITC + 6 số ngẫu nhiên
- **Thời gian hết hạn**: 30 phút
- **Ngân hàng**: MB Bank (STK: 333777555)

#### 4.2 Trang thanh toán chuyển khoản
- **Hiển thị QR Code**: Responsive design
- **Thông tin tài khoản**: Bank details
- **Countdown timer**: Real-time countdown
- **Kiểm tra thanh toán**: Manual check button
- **Trạng thái rõ ràng**: "Chờ thanh toán"

#### 4.3 Quản lý chuyển khoản (Admin)
- **Danh sách chờ xử lý**: Pending transfers
- **Xác nhận thanh toán**: Mark as paid
- **Thống kê**: Pending, paid, expired counts
- **Auto refresh**: 30 seconds interval

### 5. 📦 QUẢN LÝ SẢN PHẨM

#### 5.1 CRUD Operations
- **Thêm sản phẩm**: Form với image upload
- **Chỉnh sửa**: Update product information
- **Xóa sản phẩm**: Soft delete
- **Danh sách**: Pagination, search, filter

#### 5.2 Quản lý hình ảnh
- **Upload từ máy tính**: Local file upload
- **Validation**: File type, size limits
- **Safe naming**: Unique filename generation
- **Preview**: Image preview before save

#### 5.3 Quản lý tồn kho
- **Số lượng sản phẩm**: Quantity tracking
- **Trạng thái tự động**: 
  - Hết hàng (0)
  - Sắp hết hàng (≤10)
  - Còn hàng (>10)
- **Cập nhật khi bán**: Auto decrease quantity

### 6. 📋 QUẢN LÝ ĐƠN HÀNG

#### 6.1 Trạng thái đơn hàng
- **Pending**: Chờ xử lý
- **Confirmed**: Đã xác nhận
- **Shipping**: Đang giao hàng
- **Delivered**: Đã giao hàng
- **Cancelled**: Đã hủy

#### 6.2 Quản lý đơn hàng (Admin)
- **Danh sách theo trạng thái**: Filter by status
- **Chi tiết đơn hàng**: Order details view
- **Cập nhật trạng thái**: Status management
- **Tìm kiếm**: Search by order ID, customer

#### 6.3 Xử lý đơn hàng
- **Tự động cập nhật**: Khi thanh toán thành công
- **Email notification**: Order confirmation
- **Inventory update**: Auto decrease stock
- **Order history**: Track all changes

### 7. 📊 BÁO CÁO VÀ THỐNG KÊ

#### 7.1 Dashboard tổng quan
- **Thống kê tổng hợp**:
  - Tổng doanh thu
  - Số đơn hàng
  - Số sản phẩm
  - Số người dùng
- **Biểu đồ**: Chart.js visualization
- **Đơn hàng gần đây**: Recent orders
- **Top sản phẩm**: Best selling products

#### 7.2 Báo cáo bán hàng
- **Thống kê theo thời gian**:
  - Hôm nay
  - Tuần này
  - Tháng này
- **Biểu đồ doanh thu**: Line chart
- **Top sản phẩm bán chạy**: Bar chart
- **Danh sách đơn hàng**: Detailed list

#### 7.3 Xuất Excel
- **Báo cáo bán hàng**: Sales report export
- **Dashboard data**: Overview export
- **Multiple sheets**: Separate data sheets
- **Professional formatting**: Styled Excel files

### 8. 👥 QUẢN LÝ NGƯỜI DÙNG

#### 8.1 Phân quyền
- **Admin**: Full access to all features
- **User**: Shopping and order management
- **Guest**: Basic shopping features

#### 8.2 Quản lý user (Admin)
- **Danh sách người dùng**: User list
- **Thống kê**: User statistics
- **Chi tiết**: User information
- **Block/Unblock**: User management

### 9. 🎨 GIAO DIỆN VÀ UX

#### 9.1 Responsive Design
- **Mobile-first**: Optimized for mobile
- **Tablet support**: Medium screen layouts
- **Desktop**: Full feature access
- **Cross-browser**: Chrome, Firefox, Safari, Edge

#### 9.2 UI/UX Features
- **Modern design**: Clean, professional look
- **Loading states**: Spinner animations
- **Error handling**: User-friendly messages
- **Success feedback**: Confirmation messages
- **Smooth transitions**: CSS animations

#### 9.3 Navigation
- **Breadcrumbs**: Page navigation
- **Search functionality**: Global search
- **Category navigation**: Dropdown menus
- **Quick actions**: Shortcut buttons

## 🔧 CÀI ĐẶT VÀ TRIỂN KHAI

### Yêu cầu hệ thống:
- **PHP**: >= 8.0.30
- **MySQL**: >= 5.7
- **Web Server**: Apache/Nginx
- **Composer**: Dependency management

### Cài đặt:
1. **Clone repository**
2. **Install dependencies**: `composer install`
3. **Configure database**: Edit `config.php`
4. **Import database**: SQL schema
5. **Set permissions**: Cache directories
6. **Configure web server**: Virtual host

### Database Schema:
```sql
-- Core tables
users (id, username, email, password, role, created_at)
products (id, name, description, price, quantity, category_id, image_url)
categories (id, name, description)
orders (id, user_id, total_amount, status, payment_method, created_at)
order_items (id, order_id, product_id, quantity, price)
cart (id, user_id, product_id, quantity)
cart_guest (session_id, product_id, quantity)
promotions (id, code, discount_type, discount_value, quantity_limit)
promotion_usage (id, promotion_id, user_id, order_id, used_at)
bank_transfer (id, order_id, qr_code, transfer_content, amount, status, expires_at)
```

## 🛡️ BẢO MẬT

### Security Features:
- **Password hashing**: bcrypt encryption
- **SQL injection prevention**: Prepared statements
- **XSS protection**: Input sanitization
- **CSRF protection**: Token validation
- **Session security**: Secure session handling
- **File upload security**: Type and size validation

### Data Protection:
- **User privacy**: Personal data protection
- **Order security**: Secure payment processing
- **Admin access**: Role-based permissions
- **Audit trail**: Activity logging

## 📈 HIỆU SUẤT VÀ TỐI ƯU

### Performance Optimization:
- **Caching**: Smarty template caching
- **Database indexing**: Optimized queries
- **Image optimization**: Compressed images
- **CDN integration**: Static asset delivery
- **Lazy loading**: On-demand content loading

### Scalability:
- **Modular architecture**: Easy to extend
- **Database optimization**: Efficient queries
- **Caching strategy**: Multiple cache layers
- **Load balancing**: Ready for scaling

## 🧪 TESTING

### Test Coverage:
- **Unit tests**: Individual component testing
- **Integration tests**: Feature testing
- **User acceptance**: End-to-end testing
- **Performance testing**: Load testing

### Test Scenarios:
- **User registration/login**
- **Shopping cart operations**
- **Order placement**
- **Payment processing**
- **Admin operations**

## 📚 TÀI LIỆU API

### RESTful Endpoints:
```
POST /api/cart/add          # Add to cart
PUT  /api/cart/update       # Update cart
DELETE /api/cart/remove     # Remove from cart
POST /api/checkout          # Process checkout
POST /api/promotion/apply   # Apply promotion
GET  /api/orders            # Get user orders
```

### AJAX Operations:
- **Cart management**: Real-time updates
- **User authentication**: Login/register
- **Order processing**: Checkout flow
- **Payment verification**: Bank transfer check

## 🚀 ROADMAP

### Future Features:
- **Mobile app**: React Native/Flutter
- **Payment gateway**: VNPay, Momo integration
- **Inventory management**: Advanced stock control
- **Customer support**: Live chat system
- **Analytics**: Advanced reporting
- **Multi-language**: Internationalization

## 👥 ĐÓNG GÓP

### Development Team:
- **Backend Development**: PHP, MySQL
- **Frontend Development**: HTML, CSS, JavaScript
- **UI/UX Design**: User interface design
- **Testing**: Quality assurance
- **Documentation**: Technical writing

### Code Standards:
- **PSR-4**: Autoloading standard
- **PSR-12**: Coding style guide
- **Git workflow**: Feature branch workflow
- **Code review**: Peer review process

## 📄 LICENSE

This project is licensed under the MIT License - see the LICENSE file for details.

## 📞 LIÊN HỆ

- **Email**: support@fruitstore.com
- **Phone**: +84 123 456 789
- **Address**: 123 Fruit Street, Ho Chi Minh City, Vietnam

---

**© 2025 Fruit Store. All rights reserved.** #   B a n t r a i c a y  
 