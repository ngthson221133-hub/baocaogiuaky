<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chào mừng - Trái Cây Tươi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
/* Menu styles */
.menu {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #29532a;
  color: #fff;
  padding: 0 32px;
  height: 60px;
  font-family: 'Segoe UI', Arial, sans-serif;
  font-size: 1.1em;
}
.logo {
  font-size: 1.6em;
  font-weight: bold;
  letter-spacing: 1px;
}
.menu-items {
  display: flex;
  align-items: center;
  gap: 24px;
}
.menu-items a {
  color: #fff;
  text-decoration: none;
  padding: 8px 12px;
  border-radius: 4px;
  transition: background 0.2s;
}
.menu-items a:hover, .menu-items .dropdown-label:hover {
  background: #3e6b3a;
}
.dropdown {
  position: relative;
}
.dropdown-label {
  cursor: pointer;
  padding: 8px 12px;
  border-radius: 4px;
}
.dropdown-content {
  display: none;
  position: absolute;
  top: 38px;
  left: 0;
  background: #fff;
  color: #29532a;
  min-width: 180px;
  box-shadow: 0 2px 8px #e5e7eb;
  border-radius: 6px;
  z-index: 10;
  flex-direction: column;
}
.dropdown:hover .dropdown-content {
  display: flex;
}
.dropdown-content a {
  color: #29532a;
  padding: 10px 18px;
  border-radius: 0;
  background: none;
  font-size: 1em;
}
.dropdown-content a:hover {
  background: #e5e7eb;
  color: #1a3a1a;
}
.menu-icons {
  display: flex;
  align-items: center;
  gap: 18px;
  font-size: 1.2em;
}
.menu-icons a, .menu-icons i {
  color: #fff;
  text-decoration: none;
  margin-left: 8px;
  cursor: pointer;
}
.marquee {
  background: #406c3a;
  color: #fff;
  padding: 8px 0;
  font-size: 1.1em;
  font-weight: 600;
  text-align: center;
  letter-spacing: 1px;
}

/* Banner styles */
.banner {
  width: 100%;
  overflow: hidden;
  position: relative;
}
.slides {
  display: flex;
  width: 300vw;
  animation: slideShow 15s infinite;
}
.slides img {
  width: 100vw;
  flex-shrink: 0;
  height: 400px;
  object-fit: contain;
  transition: transform 1s ease-in-out;
  background-color: #fff;
}
.slides img:hover {
  transform: scale(1.03);
}
@keyframes slideShow {
  0%, 33% { transform: translateX(0); }
  36%, 66% { transform: translateX(-100vw); }
  69%, 100% { transform: translateX(-200vw); }
}

/* Category section styles */
.category-section {
  padding: 40px 20px;
  text-align: center;
}
.category-section h2 {
  font-size: 28px;
  color: #4caf50;
  margin-bottom: 30px;
  text-transform: uppercase;
}
.category-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 25px;
  padding: 0 15px;
}
.category-item {
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 15px;
  width: 260px;
  text-align: center;
  transition: transform 0.3s;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.category-item:hover {
  transform: translateY(-5px);
}
.category-item img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 8px;
}
.category-item h3 {
  font-size: 16px;
  margin: 10px 0 5px;
  color: #333;
}
.category-item p {
  font-weight: bold;
  color: #e53935;
  margin-bottom: 10px;
}
.buttons {
  display: flex;
  justify-content: center;
  gap: 10px;
}
.buttons a {
  background: #29532a;
  color: white;
  padding: 8px 12px;
  border-radius: 6px;
  text-decoration: none;
  transition: background 0.3s;
  font-size: 14px;
}
.buttons a.detail {
  background: #5e97f6;
}
.buttons a:hover {
  opacity: 0.9;
}

/* Toast animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Responsive styles */
@media (max-width: 768px) {
  .menu {
    flex-direction: column;
    gap: 10px;
    padding: 12px 20px;
    height: auto;
  }
  .menu-items {
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
    margin-top: 10px;
  }
  .slides img {
    height: 220px;
  }
  .category-item {
    width: 100%;
    max-width: 320px;
  }
}

/* Back to top button */
.back-to-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  background: #29532a;
  color: #fff;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  transition: all 0.3s ease;
  z-index: 1000;
  opacity: 0;
  visibility: hidden;
}

.back-to-top:hover {
  background: #3e6b3a;
  transform: translateY(-2px);
}

.back-to-top.show {
  opacity: 1;
  visibility: visible;
}

/* Welcome specific styles */
.welcome-user {
  color: #fff;
  font-weight: 500;
  margin-right: 12px;
  font-size: 1em;
}
.logout-menu-btn {
  color: #fff;
  border: 1.5px solid #fff;
  background: transparent;
  padding: 6px 14px;
  border-radius: 5px;
  font-size: 15px;
  font-weight: 500;
  margin-left: 0;
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: background 0.2s, color 0.2s;
}
.logout-menu-btn:hover {
  background: #fff;
  color: #e53935;
  border-color: #e53935;
}
    </style>
</head>
<body style="background:#f8f8f8;min-height:100vh;">
    <div class="marquee">
      <div class="marquee-text">🎁 ĐẦU TƯ NHIỀU NƯỚC TRÊN THẾ GIỚI ... GIỎ/HỘP QUÀ TẶNG TRÁI CÂY ĐẸP MẮT - SANG TRỌNG - TINH TẾ.</div>
    </div>
    <div class="menu">
      <div class="logo">Trái Cây Tươi</div>
      <div class="menu-items">
        <a href="/itc_toi-main/index.php?controller=user&action=welcome">Trang chủ</a>
        <a href="/itc_toi-main/index.php?controller=user_orders&action=index">Đơn hàng của tôi</a>
        <div class="dropdown">
          <div class="dropdown-label">Danh mục</div>
          <div class="dropdown-content">
            <a href="#" onclick="scrollToCategory('trai-cay-noi-dia')">Trái cây nội địa</a>
            <a href="#" onclick="scrollToCategory('trai-cay-nhap-khau')">Trái cây nhập khẩu</a>
            <a href="#" onclick="scrollToCategory('hop-qua-tang')">Hộp quà tặng</a>
          </div>
        </div>
        <a href="#">Liên hệ</a>
      </div>
      <div class="menu-icons">
        <a href="/itc_toi-main/index.php?controller=cart&action=view" style="color:inherit;text-decoration:none;position:relative;">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count" style="position:absolute;top:-8px;right:-8px;background:#ef4444;color:white;border-radius:50%;width:18px;height:18px;font-size:0.7em;display:flex;align-items:center;justify-content:center;font-weight:600;">0</span>
        </a>
        <span class="welcome-user">Xin chào, {$smarty.session.username}</span>
        <a href="/itc_toi-main/index.php?controller=user&action=logout" title="Đăng xuất" class="logout-menu-btn">
          <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
      </div>
    </div>

{if isset($_GET.login_success) && $_GET.login_success == 1}
  <div id="login-success-toast" style="position:fixed;top:30px;right:30px;z-index:9999;background:#22c55e;color:#fff;padding:16px 32px;border-radius:8px;box-shadow:0 2px 8px #b2f5ea;font-size:1.1em;font-weight:600;animation:fadeIn 0.5s;">
    <i class="fas fa-check-circle" style="margin-right:8px;"></i> Đăng nhập thành công!
  </div>
  <script>
    setTimeout(function(){
      var toast = document.getElementById('login-success-toast');
      if(toast) toast.style.display = 'none';
    }, 3000);
  </script>
{/if}

<div class="banner">
  <div class="slides">
    <img src="img/bn2.jpg" alt="Banner 1">
    <img src="img/bn3.jpg" alt="Banner 2">
    <img src="img/bn4.jpg" alt="Banner 3">
  </div>
</div>

<!-- Nút Đơn hàng của tôi nổi bật -->
<div style="text-align:center;padding:20px;background:linear-gradient(135deg, #22c55e 0%, #16a34a 100%);margin:20px auto;max-width:1200px;border-radius:12px;box-shadow:0 4px 12px rgba(34,197,94,0.3);">
  <h3 style="color:#fff;font-size:1.5em;font-weight:600;margin-bottom:15px;">
    <i class="fas fa-receipt"></i> Theo dõi đơn hàng của bạn
  </h3>
  <p style="color:#dcfce7;margin-bottom:20px;font-size:1.1em;">Kiểm tra trạng thái đơn hàng và theo dõi quá trình giao hàng</p>
  <a href="/itc_toi-main/index.php?controller=user_orders&action=index" style="display:inline-block;padding:12px 30px;background:#fff;color:#22c55e;text-decoration:none;border-radius:8px;font-weight:600;font-size:1.1em;transition:all 0.3s;box-shadow:0 2px 8px rgba(0,0,0,0.1);" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 4px 16px rgba(0,0,0,0.2)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'">
    <i class="fas fa-eye"></i> Xem đơn hàng của tôi
  </a>
</div>

<!-- HIỂN THỊ SẢN PHẨM ĐỘNG THEO DANH MỤC -->
{foreach from=$categories item=cat}
  <div class="category-section">
    <h2>{$cat.name}</h2>
    <div class="category-list">
              {foreach from=$products item=product}
          {if $product.category_id == $cat.id}
          <div class="category-item">
            <img src="{$product.image_url|default:'img/no-image.png'}" alt="{$product.name}">
            <h3>{$product.name}</h3>
            <p>{$product.price|number_format:0:",":"."}đ/kg</p>
            {if $product.quantity > 0}
              <p style="color:#22c55e;font-size:0.9em;margin:5px 0;">Còn lại: {$product.quantity} kg</p>
              <div class="buttons">
                <a href="#" onclick="buyNow({$product.id}, '{$product.name}', {$product.price})">Mua ngay</a>
                <a href="/itc_toi-main/index.php?controller=product&action=detail&id={$product.id}" class="detail">Chi tiết</a>
              </div>
            {else}
              <p style="color:#ef4444;font-size:0.9em;margin:5px 0;font-weight:600;">Hết hàng</p>
              <div class="buttons">
                <a href="/itc_toi-main/index.php?controller=product&action=detail&id={$product.id}" class="detail" style="background:#6b7280;">Chi tiết</a>
              </div>
            {/if}
          </div>
          {/if}
        {/foreach}
    </div>
  </div>
{/foreach}

<!-- Back to top button -->
<div class="back-to-top" id="backToTop" onclick="scrollToTop()">
  <i class="fas fa-chevron-up"></i>
</div>

<footer style="background:#29532a;color:#fff;padding:40px 0 0 0;margin-top:40px;">
  <div style="max-width:1200px;margin:auto;display:flex;flex-wrap:wrap;gap:40px 0;justify-content:space-between;align-items:flex-start;padding:0 30px 30px 30px;">
    <div style="flex:1;min-width:260px;">
      <div style="font-size:2em;font-weight:700;margin-bottom:18px;">TRAI CAY SHOP</div>
      <div style="margin-bottom:8px;">Địa chỉ : 123 Đường Võ Văn Kiệt, Phường 16, Quận 8, TP.HCM, Việt Nam</div>
      <div style="margin-bottom:8px;">Điện thoại : <a href="tel:0123456789" style="color:#7ec6f7;text-decoration:none;">0123 456 789</a></div>
      <div style="margin-bottom:8px;">Email : <a href="mailto:ayshop@email.com" style="color:#7ec6f7;text-decoration:none;">ayshop@email.com</a></div>
      <div style="margin-bottom:8px;">HKD AY SHOP | MST : 0123456789</div>
      <div style="margin-bottom:8px;">Giấy chứng nhận ĐKKD số : 123456789 | Ngày cấp : 01/01/2020</div>
    </div>
    <div style="flex:1;min-width:220px;">
      <div style="font-size:1.2em;font-weight:600;margin-bottom:18px;">QUY ĐỊNH - CHÍNH SÁCH</div>
      <div style="margin-bottom:10px;"><a href="#" style="color:#fff;text-decoration:none;">» HƯỚNG DẪN ĐẶT HÀNG VÀ THANH TOÁN</a></div>
      <div style="margin-bottom:10px;"><a href="#" style="color:#fff;text-decoration:none;">» CHÍNH SÁCH GIAO HÀNG VÀ ĐỔI TRẢ</a></div>
      <div style="margin-bottom:10px;"><a href="#" style="color:#fff;text-decoration:none;">» CHÍNH SÁCH BẢO MẬT THÔNG TIN</a></div>
    </div>
    <div style="flex:1;min-width:260px;">
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

// Function mua ngay
function buyNow(productId, productName, price) {
    const quantity = prompt('Nhập số lượng muốn mua:', '1');
    if (quantity === null || quantity <= 0) return;
    
    // Gửi AJAX để thêm vào giỏ hàng user (đã đăng nhập)
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
            const totalPrice = quantity * price;
            alert('Đã thêm ' + quantity + ' sản phẩm "' + productName + '" vào giỏ hàng!\nTổng tiền: ' + totalPrice.toLocaleString('vi-VN') + 'đ');
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

// Load số lượng giỏ hàng
loadCartCount();

// Function load số lượng giỏ hàng
function loadCartCount() {
    fetch('/itc_toi-main/index.php?controller=cart&action=getCount')
    .then(response => response.json())
    .then(data => {
        const cartCountElements = document.querySelectorAll('.cart-count');
        cartCountElements.forEach(element => {
            element.textContent = data.count || 0;
        });
    })
    .catch(error => {
        console.error('Error loading cart count:', error);
    });
}
</script>
</body>
</html>