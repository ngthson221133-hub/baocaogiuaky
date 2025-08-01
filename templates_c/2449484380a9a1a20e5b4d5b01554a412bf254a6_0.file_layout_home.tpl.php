<?php
/* Smarty version 5.5.1, created on 2025-07-29 15:01:46
  from 'file:C:\xampp\htdocs\itc_toi-main\templates\cart_guest\../layout_home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c63a2d28c9_80550177',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2449484380a9a1a20e5b4d5b01554a412bf254a6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\cart_guest\\../layout_home.tpl',
      1 => 1753775836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c63a2d28c9_80550177 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17190315476888c63a2ba725_71758743', 'title');
?>
</title>
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
    </style>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_673206896888c63a2bfa72_84730723', 'extra_head');
?>

</head>
<body style="background:#f8f8f8;min-height:100vh;">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2376603456888c63a2c07e1_25154854', 'menu');
?>

    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19261305226888c63a2cc363_85748802', 'content');
?>

    
    <!-- Back to top button -->
    <div class="back-to-top" id="backToTop" onclick="scrollToTop()">
      <i class="fas fa-chevron-up"></i>
    </div>
    
<div id="loginPopup" class="popup" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;align-items:center;justify-content:center;background:rgba(0,0,0,0.3);">
  <div class="popup-content login-container" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.1);width:100%;max-width:400px;position:relative;">
    <span class="close-popup" style="position:absolute;top:10px;right:16px;font-size:1.5em;cursor:pointer;">&times;</span>
    <h2>Đăng Nhập</h2>
    <form id="loginForm" action="/itc_toi-main/index.php?controller=user&action=login" method="POST">
      <div class="form-group">
        <label for="login_email">Email hoặc tên người dùng:</label>
        <input type="text" id="login_email" name="email" required>
      </div>
      <div class="form-group">
        <label for="login_password">Mật khẩu:</label>
        <input type="password" id="login_password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit">Đăng Nhập</button>
      </div>
    </form>
    <div id="login-message" class="message" style="display:none;color:red;margin-top:10px;"></div>
    <div class="forgot-password" style="display:flex;align-items:center;justify-content:space-between;margin-top:8px;">
      <a href="#">Quên mật khẩu?</a>
      <a href="#" id="quickRegisterBtn" style="margin-left:18px;">Đăng ký</a>
    </div>
    <div style="margin-top:12px;text-align:center;">
      <a href="#" id="showRegisterPopup">Chưa có tài khoản? Đăng ký</a>
    </div>
  </div>
</div>
<div id="registerPopup" class="popup" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;align-items:center;justify-content:center;background:rgba(0,0,0,0.3);">
  <div class="popup-content container" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.1);width:100%;max-width:400px;position:relative;">
    <span class="close-popup" style="position:absolute;top:10px;right:16px;font-size:1.5em;cursor:pointer;">&times;</span>
    <h2>Đăng Ký Tài Khoản</h2>
    <form id="registrationForm" method="post" action="/itc_toi-main/index.php?controller=user&action=register">
      <div class="form-group">
        <label for="register_username">Tên người dùng:</label>
        <input type="text" id="register_username" name="username" required>
      </div>
      <div class="form-group">
        <label for="fullName">Họ và Tên:</label>
        <input type="text" id="fullName" name="fullName" required>
      </div>
      <div class="form-group">
        <label for="register_email">Email:</label>
        <input type="email" id="register_email" name="email" required>
      </div>
      <div class="form-group">
        <label for="register_password">Mật khẩu:</label>
        <input type="password" id="register_password" name="password" minlength="6" required>
      </div>
      <div class="form-group">
        <button type="submit">Đăng Ký</button>
      </div>
    </form>
    <div id="register-message" class="message" style="display:none;color:red;margin-top:10px;"></div>
    <div style="margin-top:12px;text-align:center;">
      <a href="#" id="showLoginPopup">Đã có tài khoản? Đăng nhập</a>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
  // Load số lượng giỏ hàng
  loadCartCount();
  
  var userIcon = document.getElementById('userIcon');
  var userDropdown = document.getElementById('userDropdownMenu');
  var loginBtn = document.getElementById('loginBtn');
  var registerBtn = document.getElementById('registerBtn');
  var loginPopup = document.getElementById('loginPopup');
  var registerPopup = document.getElementById('registerPopup');
  var closePopups = document.querySelectorAll('.close-popup');
  // Hiện dropdown khi bấm icon user
  if(userIcon && userDropdown) {
    userIcon.addEventListener('click', function(e) {
      e.stopPropagation();
      userDropdown.style.display = (userDropdown.style.display === 'block') ? 'none' : 'block';
    });
    document.addEventListener('click', function(e) {
      if(userDropdown.style.display === 'block' && !userDropdown.contains(e.target) && e.target !== userIcon) {
        userDropdown.style.display = 'none';
      }
    });
  }
  // Mở popup đăng nhập
  if(loginBtn && loginPopup) {
    loginBtn.addEventListener('click', function(e) {
      e.preventDefault();
      userDropdown.style.display = 'none';
      loginPopup.style.display = 'flex';
    });
  }
  // Mở popup đăng ký
  if(registerBtn && registerPopup) {
    registerBtn.addEventListener('click', function(e) {
      e.preventDefault();
      userDropdown.style.display = 'none';
      registerPopup.style.display = 'flex';
    });
  }
  if(closePopups) {
    closePopups.forEach(function(btn) {
      btn.addEventListener('click', function() {
        if(loginPopup) loginPopup.style.display = 'none';
        if(registerPopup) registerPopup.style.display = 'none';
      });
    });
  }

  // AJAX login
  var loginForm = document.getElementById('loginForm');
  if(loginForm) {
    loginForm.addEventListener('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(loginForm);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', loginForm.action, true);
      xhr.onreadystatechange = function() {
        if(xhr.readyState === 4) {
          if(xhr.status === 200) {
            try {
              var res = JSON.parse(xhr.responseText);
              if(res.success) {
                if(res.role === 'admin') {
                  window.location.href = '/itc_toi-main/index.php?controller=admin&action=index';
                } else {
                  window.location.href = '/itc_toi-main/index.php?controller=user&action=welcome&login_success=1';
                }
              } else {
                document.getElementById('login-message').style.display = 'block';
                document.getElementById('login-message').innerText = res.message || 'Có lỗi xảy ra. Vui lòng thử lại.';
              }
            } catch(e) {
              // Nếu không phải JSON (tức là HTML), thì chuyển hướng sang admin (nếu là admin) hoặc sang welcome cho user
              var email = document.getElementById('login_email').value;
              if(email === 'admin') {
                window.location.href = '/itc_toi-main/index.php?controller=admin&action=index';
              } else {
                window.location.href = '/itc_toi-main/index.php?controller=user&action=welcome&login_success=1';
              }
            }
          } else {
            document.getElementById('login-message').style.display = 'block';
            document.getElementById('login-message').innerText = 'Có lỗi xảy ra. Vui lòng thử lại.';
          }
        }
      };
      xhr.send(formData);
    });
  }

  // AJAX register
  var registerForm = document.getElementById('registrationForm');
  if(registerForm) {
    registerForm.addEventListener('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(registerForm);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', registerForm.action, true);
      xhr.onreadystatechange = function() {
        if(xhr.readyState === 4) {
          if(xhr.status === 200) {
            if(xhr.responseText.includes('Đăng ký thành công')) {
              window.location.reload();
            } else {
              document.getElementById('register-message').style.display = 'block';
              document.getElementById('register-message').innerText = xhr.responseText;
            }
          } else {
            document.getElementById('register-message').style.display = 'block';
            document.getElementById('register-message').innerText = 'Có lỗi xảy ra. Vui lòng thử lại.';
          }
        }
      };
      xhr.send(formData);
    });
  }
  });
  
  // Function load số lượng giỏ hàng
  function loadCartCount() {
    fetch('/itc_toi-main/index.php?controller=cart_guest&action=getCount')
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
<?php echo '</script'; ?>
>
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
<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
  // Load số lượng giỏ hàng
  loadCartCount();
  
  var userIcon = document.getElementById('userIcon');
  var userDropdown = document.getElementById('userDropdownMenu');
  if(userIcon && userDropdown) {
    userIcon.onclick = function(e) {
      e.stopPropagation();
      userDropdown.style.display = (userDropdown.style.display === 'block') ? 'none' : 'block';
    };
    document.addEventListener('click', function(e) {
      if(userDropdown.style.display === 'block' && !userDropdown.contains(e.target) && e.target !== userIcon) {
        userDropdown.style.display = 'none';
      }
    });
  }
});

// Function load số lượng giỏ hàng
function loadCartCount() {
  // Kiểm tra xem user đã đăng nhập chưa
  const isLoggedIn = document.querySelector('.welcome-user') !== null;
  
  if (isLoggedIn) {
    // User đã đăng nhập - gọi cart controller
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
  } else {
    // Guest user - gọi cart_guest controller
    fetch('/itc_toi-main/index.php?controller=cart_guest&action=getCount')
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
}

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
<?php echo '</script'; ?>
>
</body>
</html> <?php }
/* {block 'title'} */
class Block_17190315476888c63a2ba725_71758743 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates';
?>
Trang chủ - Trái Cây Tươi<?php
}
}
/* {/block 'title'} */
/* {block 'extra_head'} */
class Block_673206896888c63a2bfa72_84730723 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates';
}
}
/* {/block 'extra_head'} */
/* {block 'menu'} */
class Block_2376603456888c63a2c07e1_25154854 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates';
?>

    <div class="marquee">
      <div class="marquee-text">🎁 ĐẦU TƯ NHIỀU NƯỚC TRÊN THẾ GIỚI ... GIỎ/HỘP QUÀ TẶNG TRÁI CÂY ĐẸP MẮT - SANG TRỌNG - TINH TẾ.</div>
    </div>
    <div class="menu">
      <div class="logo">Trái Cây Tươi</div>
      <div class="menu-items">
        <?php if ((true && (true && null !== ($_SESSION['username'] ?? null)))) {?>
          <a href="/itc_toi-main/index.php?controller=user&action=welcome">Trang chủ</a>
          <a href="/itc_toi-main/index.php?controller=user_orders&action=index">Đơn hàng của tôi</a>
        <?php } else { ?>
          <a href="/itc_toi-main/index.php">Trang chủ</a>
        <?php }?>
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
        <i class="fas fa-search"></i>
        <?php if ((true && (true && null !== ($_SESSION['username'] ?? null)))) {?>
          <a href="/itc_toi-main/index.php?controller=cart&action=view" style="color:inherit;text-decoration:none;position:relative;">
              <i class="fas fa-shopping-cart"></i>
              <span class="cart-count" style="position:absolute;top:-8px;right:-8px;background:#ef4444;color:white;border-radius:50%;width:18px;height:18px;font-size:0.7em;display:flex;align-items:center;justify-content:center;font-weight:600;">0</span>
          </a>
        <?php } else { ?>
          <a href="/itc_toi-main/index.php?controller=cart_guest&action=view" style="color:inherit;text-decoration:none;position:relative;">
              <i class="fas fa-shopping-cart"></i>
              <span class="cart-count" style="position:absolute;top:-8px;right:-8px;background:#ef4444;color:white;border-radius:50%;width:18px;height:18px;font-size:0.7em;display:flex;align-items:center;justify-content:center;font-weight:600;">0</span>
          </a>
        <?php }?>
        <?php if ((true && (true && null !== ($_SESSION['username'] ?? null)))) {?>
          <span style="color:#fff;font-weight:500;margin-right:12px;">Xin chào, <?php echo $_SESSION['username'];?>
</span>
          <a href="/itc_toi-main/index.php?controller=user&action=logout" title="Đăng xuất" class="logout-menu-btn"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        <?php } else { ?>
          <div class="user-dropdown" style="display:inline-block;position:relative;">
            <i class="fas fa-user" id="userIcon" style="margin-left:10px;cursor:pointer;"></i>
            <div id="userDropdownMenu" style="display:none;position:absolute;right:0;top:36px;background:#fff;color:#29532a;box-shadow:0 2px 8px #e5e7eb;border-radius:8px;min-width:160px;z-index:100;">
              <a href="#" id="loginBtn" style="display:block;padding:12px 20px;text-decoration:none;color:#29532a;font-weight:500;border-bottom:1px solid #eee;">Đăng nhập</a>
              <a href="#" id="registerBtn" style="display:block;padding:12px 20px;text-decoration:none;color:#29532a;font-weight:500;">Đăng ký</a>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
    <?php
}
}
/* {/block 'menu'} */
/* {block 'content'} */
class Block_19261305226888c63a2cc363_85748802 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates';
}
}
/* {/block 'content'} */
}
