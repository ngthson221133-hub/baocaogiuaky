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
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
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
            color: #22c55e;
            text-decoration: none;
        }
        
        .nav-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        
        .nav-menu a {
            color: #374151;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-menu a:hover {
            color: #22c55e;
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-label {
            cursor: pointer;
            color: #374151;
            font-weight: 500;
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
            color: #22c55e;
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
            color: #22c55e;
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
            background: #1f2937;
            color: #f9fafb;
            padding: 40px 0 20px;
            margin-top: 60px;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            text-align: center;
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
                {if isset($smarty.session.username)}
                    <div class="welcome-message">Xin chào, {$smarty.session.username}</div>
                    <a href="/itc_toi-main/index.php?controller=user&action=logout" class="logout-btn">Đăng xuất</a>
                {else}
                    <a href="/itc_toi-main/index.php?controller=user&action=login" style="color: #22c55e; text-decoration: none; font-weight: 600;">Đăng nhập</a>
                {/if}
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <a href="javascript:history.back()" class="back-link">
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
                
                <div class="action-buttons">
                    <button class="btn btn-primary">
                        <i class="fas fa-shopping-cart"></i>
                        Thêm vào giỏ hàng
                    </button>
                    <a href="javascript:history.back()" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <h3><i class="fas fa-leaf"></i> TRAI CAY SHOP</h3>
            <p>Chúng tôi cung cấp những loại trái cây tươi ngon nhất với chất lượng cao và giá cả hợp lý.</p>
            <p>Địa chỉ: 123 Đường ABC, Quận XYZ, TP.HCM</p>
            <p>Điện thoại: 0123 456 789 | Email: info@traicayshop.com</p>
            <div class="footer-bottom">
                <div style="text-align:center;color:#b2f5ea;font-size:14px;padding:12px 0 8px 0;">© 2025 TRAI CAY SHOP. All rights reserved.</div>
            </div>
        </div>
    </footer>

    <script>
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
    </script>
</body>
</html> 