<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm - {$product.name}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        /* Header */
        .header {
            background: #29532a;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        
        .logo {
            font-size: 1.8em;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
        }
        
        .nav-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        
        .nav-menu a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
            padding: 8px 12px;
            border-radius: 4px;
        }
        
        .nav-menu a:hover {
            background: #3e6b3a;
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-label {
            cursor: pointer;
            color: #fff;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background 0.2s;
        }
        
        .dropdown-label:hover {
            background: #3e6b3a;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background: white;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-radius: 8px;
            z-index: 1;
            padding: 8px 0;
        }
        
        .dropdown-content a {
            color: #374151;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background 0.3s;
        }
        
        .dropdown-content a:hover {
            background: #f3f4f6;
            color: #22c55e;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
        
        .user-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .cart-icon {
            position: relative;
            color: #fff;
            font-size: 1.2em;
            text-decoration: none;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7em;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .welcome-message {
            color: #fff;
            font-weight: 600;
        }
        
        .logout-btn {
            background: #ef4444;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s;
        }
        
        .logout-btn:hover {
            background: #dc2626;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .product-detail {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            display: flex;
            min-height: 500px;
        }
        
        .product-image {
            flex: 1;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        
        .product-image img {
            max-width: 100%;
            max-height: 400px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .product-info {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .product-category {
            color: #22c55e;
            font-weight: 600;
            font-size: 0.9em;
            margin-bottom: 8px;
        }
        
        .product-name {
            font-size: 2.2em;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 16px;
            line-height: 1.2;
        }
        
        .product-price {
            font-size: 2em;
            font-weight: 700;
            color: #22c55e;
            margin-bottom: 20px;
        }
        
        .product-description {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 30px;
            font-size: 1.1em;
        }
        
        .product-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
        }
        
        .meta-item {
            text-align: center;
        }
        
        .meta-label {
            font-size: 0.9em;
            color: #6b7280;
            margin-bottom: 4px;
        }
        
        .meta-value {
            font-weight: 600;
            color: #1f2937;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: auto;
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1em;
        }
        
        .btn-primary {
            background: #22c55e;
            color: white;
        }
        
        .btn-primary:hover {
            background: #16a34a;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
        }
        
        .btn-secondary:hover {
            background: #e5e7eb;
        }
        
        .btn[style*="background: #ef4444"]:hover {
            background: #dc2626 !important;
            transform: translateY(-2px);
        }
        
        .quantity-selector {
            margin-bottom: 30px;
        }
        
        .quantity-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
            display: block;
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 10px;
        }
        
        .quantity-btn {
            padding: 12px 16px;
            background: #f3f4f6;
            border: none;
            cursor: pointer;
            font-weight: 600;
            color: #374151;
            transition: background 0.3s;
        }
        
        .quantity-btn:hover {
            background: #e5e7eb;
        }
        
        .quantity-input {
            width: 80px;
            padding: 12px;
            text-align: center;
            border: none;
            outline: none;
            font-weight: 600;
            font-size: 1em;
        }
        
        .stock-info {
            color: #6b7280;
            font-size: 0.9em;
        }
        
        .stock-count {
            color: #22c55e;
            font-weight: 600;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #6b7280;
            text-decoration: none;
            margin-bottom: 20px;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .back-link:hover {
            color: #22c55e;
        }
        
        /* Footer */
        .footer {
            background: #29532a;
            color: #fff;
            padding: 40px 0 0 0;
            margin-top: 60px;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            gap: 40px 0;
            justify-content: space-between;
            align-items: flex-start;
            padding: 0 30px 30px 30px;
        }
        
        .footer-section {
            flex: 1;
            min-width: 260px;
        }
        
        .footer h3 {
            color: #22c55e;
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        
        .footer p {
            color: #d1d5db;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 20px;
            margin-top: 30px;
            text-align: center;
            color: #9ca3af;
        }
        
        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #22c55e;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.3s;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .back-to-top:hover {
            background: #16a34a;
            transform: translateY(-2px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .product-detail {
                flex-direction: column;
            }
            
            .product-image {
                padding: 20px;
            }
            
            .product-info {
                padding: 30px 20px;
            }
            
            .product-name {
                font-size: 1.8em;
            }
            
            .product-price {
                font-size: 1.6em;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .nav-menu {
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <a href="/itc_toi-main/index.php" class="logo">
                <i class="fas fa-leaf"></i> TRAI CAY SHOP
            </a>
            <nav class="nav-menu">
                <a href="/itc_toi-main/index.php">Trang chủ</a>
                <div class="dropdown">
                    <div class="dropdown-label">Danh mục</div>
                    <div class="dropdown-content">
                        <a href="#" onclick="scrollToCategory('trai-cay-noi-dia')">Trái cây nội địa</a>
                        <a href="#" onclick="scrollToCategory('trai-cay-nhap-khau')">Trái cây nhập khẩu</a>
                        <a href="#" onclick="scrollToCategory('hop-qua-tang')">Hộp quà tặng</a>
                    </div>
                </div>
                <a href="#">Liên hệ</a>
            </nav>
            <div class="user-section">
                <a href="#" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
                <div class="welcome-message">Xin chào, {$smarty.session.username}</div>
                <a href="/itc_toi-main/index.php?controller=user&action=logout" class="logout-btn">Đăng xuất</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <a href="/itc_toi-main/index.php?controller=user&action=welcome" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Quay lại
        </a>
        
        <div class="product-detail">
            <div class="product-image">
                <img src="/itc_toi-main/{$product.image_url}" alt="{$product.name}" onerror="this.src='https://via.placeholder.com/400x300?text=Không+có+ảnh'">
            </div>
            <div class="product-info">
                <div class="product-category">
                    <i class="fas fa-tag"></i>
                    {if $category}
                        {$category.name}
                    {else}
                        Danh mục #{$product.category_id}
                    {/if}
                </div>
                <h1 class="product-name">{$product.name}</h1>
                <div class="product-price">{$product.price|number_format:0:",":"."} đ</div>
                <p class="product-description">{$product.description}</p>
                
                <div class="product-meta">
                    <div class="meta-item">
                        <div class="meta-label">Mã sản phẩm</div>
                        <div class="meta-value">#{$product.id}</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Số lượng</div>
                        <div class="meta-value">{$product.quantity|default:0}</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Ngày tạo</div>
                        <div class="meta-value">{$product.created_at|date_format:'%d/%m/%Y'}</div>
                    </div>
                </div>
                
                <div class="quantity-selector">
                    <label class="quantity-label">Số lượng:</label>
                    <div class="quantity-controls">
                        <button type="button" onclick="changeQuantity(-1)" class="quantity-btn">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" id="quantity" value="1" min="1" max="{$product.quantity}" class="quantity-input">
                        <button type="button" onclick="changeQuantity(1)" class="quantity-btn">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <span class="stock-info">Còn lại: <span class="stock-count">{$product.quantity}</span> sản phẩm</span>
                </div>
                
                <div class="action-buttons">
                    {if $product.quantity > 0}
                        <button onclick="addToCart()" class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i>
                            Thêm vào giỏ hàng
                        </button>
                        <button onclick="buyNow()" class="btn" style="background: #ef4444; color: white;">
                            <i class="fas fa-bolt"></i>
                            Mua ngay
                        </button>
                    {else}
                        <button disabled class="btn" style="background: #6b7280; color: white; cursor: not-allowed;">
                            <i class="fas fa-times"></i>
                            Hết hàng
                        </button>
                    {/if}
                    <a href="/itc_toi-main/index.php?controller=user&action=welcome" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Back to top button -->
    <div class="back-to-top" id="backToTop" onclick="scrollToTop()">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <div style="font-size:2em;font-weight:700;margin-bottom:18px;">TRAI CAY SHOP</div>
                <div style="margin-bottom:8px;">Địa chỉ : 123 Đường Võ Văn Kiệt, Phường 16, Quận 8, TP.HCM, Việt Nam</div>
                <div style="margin-bottom:8px;">Điện thoại : <a href="tel:0123456789" style="color:#7ec6f7;text-decoration:none;">0123 456 789</a></div>
                <div style="margin-bottom:8px;">Email : <a href="mailto:ayshop@email.com" style="color:#7ec6f7;text-decoration:none;">ayshop@email.com</a></div>
                <div style="margin-bottom:8px;">HKD AY SHOP | MST : 0123456789</div>
                <div style="margin-bottom:8px;">Giấy chứng nhận ĐKKD số : 123456789 | Ngày cấp : 01/01/2020</div>
            </div>
            <div class="footer-section">
                <div style="font-size:1.2em;font-weight:600;margin-bottom:18px;">QUY ĐỊNH - CHÍNH SÁCH</div>
                <div style="margin-bottom:10px;"><a href="#" style="color:#fff;text-decoration:none;">» HƯỚNG DẪN ĐẶT HÀNG VÀ THANH TOÁN</a></div>
                <div style="margin-bottom:10px;"><a href="#" style="color:#fff;text-decoration:none;">» CHÍNH SÁCH GIAO HÀNG VÀ ĐỔI TRẢ</a></div>
                <div style="margin-bottom:10px;"><a href="#" style="color:#fff;text-decoration:none;">» CHÍNH SÁCH BẢO MẬT THÔNG TIN</a></div>
            </div>
            <div class="footer-section">
                <div style="font-size:1.2em;font-weight:600;margin-bottom:18px;">FANPAGE - FACEBOOK</div>
                <div style="background:#fff;border-radius:8px;padding:8px;max-width:320px;">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/minhphuongfruit&tabs&width=300&height=120&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="120" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
        <div style="text-align:center;color:#b2f5ea;font-size:14px;padding:12px 0 8px 0;">© 2025 TRAI CAY SHOP. All rights reserved.</div>
    </footer>

    <script>
    // Function scroll về đầu trang
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
    
    // Hiển thị/ẩn nút back to top
    window.addEventListener('scroll', function() {
        const backToTopBtn = document.getElementById('backToTop');
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });
    
    // Function scroll đến mục danh mục
    function scrollToCategory(categoryId) {
        // Tìm tất cả các section có class category-section
        const sections = document.querySelectorAll('.category-section');
        
        // Tìm section có heading chứa text tương ứng
        let targetSection = null;
        
        switch(categoryId) {
            case 'trai-cay-noi-dia':
                targetSection = Array.from(sections).find(section => 
                    section.querySelector('h2').textContent.toLowerCase().includes('nội địa') ||
                    section.querySelector('h2').textContent.toLowerCase().includes('noi dia')
                );
                break;
            case 'trai-cay-nhap-khau':
                targetSection = Array.from(sections).find(section => 
                    section.querySelector('h2').textContent.toLowerCase().includes('nhập khẩu') ||
                    section.querySelector('h2').textContent.toLowerCase().includes('nhap khau')
                );
                break;
            case 'hop-qua-tang':
                targetSection = Array.from(sections).find(section => 
                    section.querySelector('h2').textContent.toLowerCase().includes('quà tặng') ||
                    section.querySelector('h2').textContent.toLowerCase().includes('qua tang') ||
                    section.querySelector('h2').textContent.toLowerCase().includes('hộp quà')
                );
                break;
        }
        
        if (targetSection) {
            // Scroll đến section với animation mượt mà
            targetSection.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
            
            // Thêm hiệu ứng highlight cho section
            targetSection.style.transition = 'all 0.3s ease';
            targetSection.style.backgroundColor = '#f0f9ff';
            targetSection.style.borderRadius = '8px';
            targetSection.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
            
            // Xóa hiệu ứng sau 2 giây
            setTimeout(() => {
                targetSection.style.backgroundColor = '';
                targetSection.style.borderRadius = '';
                targetSection.style.boxShadow = '';
            }, 2000);
        } else {
            // Nếu không tìm thấy section, hiển thị thông báo
            alert('Không tìm thấy mục danh mục này. Vui lòng thử lại sau.');
        }
    }
    
    // Functions cho chọn số lượng và mua hàng
    function changeQuantity(delta) {
        const quantityInput = document.getElementById('quantity');
        const currentValue = parseInt(quantityInput.value);
        const maxValue = parseInt(quantityInput.max);
        const newValue = currentValue + delta;
        
        if (newValue >= 1 && newValue <= maxValue) {
            quantityInput.value = newValue;
        }
    }
    
    function addToCart() {
        const quantity = document.getElementById('quantity').value;
        const productId = {$product.id};
        const productName = '{$product.name}';
        
        // Gửi AJAX để thêm vào giỏ hàng
        fetch('/itc_toi-main/index.php?controller=cart&action=add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'product_id=' + productId + '&quantity=' + quantity
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Đã thêm ' + quantity + ' sản phẩm "' + productName + '" vào giỏ hàng!');
                // Cập nhật số lượng trên icon giỏ hàng
                const cartCountElements = document.querySelectorAll('.cart-count');
                cartCountElements.forEach(element => {
                    element.textContent = data.cart_count || 0;
                });
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi thêm vào giỏ hàng');
        });
    }
    
    function buyNow() {
        const quantity = document.getElementById('quantity').value;
        const productId = {$product.id};
        const productName = '{$product.name}';
        const price = {$product.price};
        const totalPrice = quantity * price;
        
        // Hiển thị thông báo
        alert('Mua ngay ' + quantity + ' sản phẩm "' + productName + '" với tổng tiền: ' + totalPrice.toLocaleString('vi-VN') + 'đ');
        
        // Ở đây có thể thêm logic chuyển đến trang thanh toán
        console.log('Mua ngay - ID: ' + productId + ', Số lượng: ' + quantity + ', Tên: ' + productName + ', Tổng tiền: ' + totalPrice);
    }
    
    // Cập nhật số lượng khi người dùng nhập trực tiếp
    document.getElementById('quantity').addEventListener('input', function() {
        const value = parseInt(this.value);
        const max = parseInt(this.max);
        
        if (value < 1) {
            this.value = 1;
        } else if (value > max) {
            this.value = max;
        }
    });
    </script>
</body>
</html> 