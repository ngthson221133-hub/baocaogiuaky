<?php
/* Smarty version 5.5.1, created on 2025-08-11 19:35:38
  from 'file:templates/home/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_689a29ea12ad14_60774636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcd7e936213679bc90397619bb7e155e38f668da' => 
    array (
      0 => 'templates/home/index.tpl',
      1 => 1754933721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_689a29ea12ad14_60774636 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\home';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_67160450689a29ea0e83b1_08016312', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1407037700689a29ea0eefa9_26415003', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout_home.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_67160450689a29ea0e83b1_08016312 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\home';
?>
Trang chủ - Trái Cây Tươi<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_1407037700689a29ea0eefa9_26415003 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\home';
?>

<?php if ((true && (true && null !== ($_smarty_tpl->getValue('_GET')['login_success'] ?? null))) && $_smarty_tpl->getValue('_GET')['login_success'] == 1) {?>
  <div id="login-success-toast" style="position:fixed;top:30px;right:30px;z-index:9999;background:#22c55e;color:#fff;padding:16px 32px;border-radius:8px;box-shadow:0 2px 8px #b2f5ea;font-size:1.1em;font-weight:600;animation:fadeIn 0.5s;">
    <i class="fas fa-check-circle" style="margin-right:8px;"></i> Đăng nhập thành công!
  </div>
  <?php echo '<script'; ?>
>
    setTimeout(function(){
      var toast = document.getElementById('login-success-toast');
      if(toast) toast.style.display = 'none';
    }, 3000);
  <?php echo '</script'; ?>
>
<?php }?>
<div class="banner">
  <div class="slides">
    <img src="img/bn2.jpg" alt="Banner 1">
    <img src="img/bn3.jpg" alt="Banner 2">
    <img src="img/bn4.jpg" alt="Banner 3">
  </div>
</div>
<!-- HIỂN THỊ SẢN PHẨM ĐỘNG THEO DANH MỤC -->
<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
  <div class="category-section">
    <h2><?php echo $_smarty_tpl->getValue('cat')['name'];?>
</h2>
    <div class="category-list">
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'product');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product')->value) {
$foreach1DoElse = false;
?>
        <?php if ($_smarty_tpl->getValue('product')['category_id'] == $_smarty_tpl->getValue('cat')['id']) {?>
        <div class="category-item">
          <img src="<?php echo (($tmp = $_smarty_tpl->getValue('product')['image_url'] ?? null)===null||$tmp==='' ? 'img/no-image.png' ?? null : $tmp);?>
" alt="<?php echo $_smarty_tpl->getValue('product')['name'];?>
">
          <h3><?php echo $_smarty_tpl->getValue('product')['name'];?>
</h3>
          <p><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('product')['price'],0,",",".");?>
đ/kg</p>
          <?php if ($_smarty_tpl->getValue('product')['quantity'] > 0) {?>
            <p style="color:#22c55e;font-size:0.9em;margin:5px 0;">Còn lại: <?php echo $_smarty_tpl->getValue('product')['quantity'];?>
 kg</p>
            <div class="buttons">
              <a href="#" onclick="buyNow(<?php echo $_smarty_tpl->getValue('product')['id'];?>
, '<?php echo $_smarty_tpl->getValue('product')['name'];?>
', <?php echo $_smarty_tpl->getValue('product')['price'];?>
)">Mua ngay</a>
              <a href="/itc_toi-main/index.php?controller=product&action=detail&id=<?php echo $_smarty_tpl->getValue('product')['id'];?>
" class="detail">Chi tiết</a>
            </div>
          <?php } else { ?>
            <p style="color:#ef4444;font-size:0.9em;margin:5px 0;font-weight:600;">Hết hàng</p>
            <div class="buttons">
              <a href="/itc_toi-main/index.php?controller=product&action=detail&id=<?php echo $_smarty_tpl->getValue('product')['id'];?>
" class="detail" style="background:#6b7280;">Chi tiết</a>
            </div>
          <?php }?>
        </div>
        <?php }?>
      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
  </div>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
<div id="loginPopup" class="popup" style="display:none;">
  <div class="popup-content login-container">
    <span class="close-popup">&times;</span>
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
    <div id="login-message" class="message" style="display:none;"></div>
    <div class="forgot-password">
      <a href="#">Quên mật khẩu?</a>
    </div>
  </div>
</div>

<?php echo '<script'; ?>
>
function buyNow(productId, productName, price) {
    const quantity = prompt('Nhập số lượng muốn mua:', '1');
    if (quantity === null || quantity <= 0) return;
    
    // Gửi AJAX để thêm vào giỏ hàng khách
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
<?php echo '</script'; ?>
>
<div id="registerPopup" class="popup" style="display:none;">
  <div class="popup-content container">
    <span class="close-popup">&times;</span>
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
        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone"  title="Số điện thoại phải có 10 hoặc 11 chữ số" required>
      </div>
      <div class="form-group">
        <label for="register_password">Mật khẩu:</label>
        <input type="password" id="register_password" name="password" minlength="6" required>
      </div>
      <input type="submit" value="Đăng Ký">
    </form>
    <div id="message" class="message" style="display: none;"></div>
  </div>
</div>
<style>
body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  background-color: #f8f8f8;
}
.marquee {
  background-color: #2f5b33;
  color: white;
  padding: 10px 0;
  text-align: center;
  font-size: 15px;
  font-weight: 600;
  letter-spacing: 0.5px;
}
.marquee-text {
  display: inline-block;
  white-space: nowrap;
  animation: marquee 20s linear infinite;
}
@keyframes marquee {
  from { transform: translateX(100%); }
  to { transform: translateX(-100%); }
}
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
  background: #77b255;
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
.popup {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.4);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}
.popup-content {
  background: #fff;
  padding: 30px 25px;
  border-radius: 8px;
  min-width: 320px;
  position: relative;
}
.close-popup {
  position: absolute;
  top: 10px; right: 15px;
  font-size: 22px;
  cursor: pointer;
}
.login-container {
  background-color: #fff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
}
.login-container h2 {
  text-align: center;
  margin-bottom: 25px;
  color: #333;
}
.form-group {
  margin-bottom: 15px;
}
.form-group label {
  display: block;
  margin-bottom: 8px;
  color: #555;
  font-weight: bold;
}
.form-group input[type="text"],
.form-group input[type="password"],
.form-group input[type="email"],
.form-group input[type="tel"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 16px;
  box-sizing: border-box;
}
.form-group input[type="text"]:focus,
.form-group input[type="password"]:focus,
.form-group input[type="email"]:focus,
.form-group input[type="tel"]:focus {
  border-color: #007bff;
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
.form-group button, .container input[type="submit"] {
  width: 100%;
  padding: 12px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  font-size: 18px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
.form-group button:hover, .container input[type="submit"]:hover {
  background-color: #0056b3;
}
.forgot-password {
  text-align: center;
  margin-top: 15px;
}
.forgot-password a {
  color: #007bff;
  text-decoration: none;
}
.forgot-password a:hover {
  text-decoration: underline;
}
.container {
  background-color: #fff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
}
.container h2 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}
.message {
  text-align: center;
  margin-top: 20px;
  color: green;
}
@media (max-width: 768px) {
  .slides img {
    height: 220px;
  }
  .category-item {
    width: 100%;
    max-width: 320px;
  }
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
  // Đăng ký AJAX (giữ nguyên)
  var regForm = document.getElementById('registrationForm');
  if (regForm) {
    regForm.onsubmit = function(e) {
      e.preventDefault();
      var formData = new FormData(regForm);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '/itc_toi-main/index.php?controller=user&action=register', true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          var msgDiv = document.getElementById('message');
          if (xhr.status === 200) {
            var resp = xhr.responseText.trim();
            if (resp.includes('Đăng ký thành công')) {
              regForm.style.display = 'none';
              msgDiv.style.display = 'block';
              msgDiv.style.color = 'green';
              msgDiv.innerHTML = '<div style="font-size:1.2em;font-weight:600;margin-bottom:10px;">Đăng ký thành công!</div>' +
                '<div>Bạn sẽ được chuyển sang đăng nhập sau <span id="countdown">5</span> giây...</div>';
              let c = 5;
              var interval = setInterval(function() {
                c--;
                document.getElementById('countdown').innerText = c;
                if (c === 0) {
                  clearInterval(interval);
                  msgDiv.style.display = 'none';
                  regForm.style.display = '';
                  document.getElementById('registerPopup').style.display = 'none';
                  document.getElementById('loginPopup').style.display = 'flex';
                }
              }, 1000);
            } else if (resp.includes('Email đã tồn tại') || resp.includes('Tên người dùng đã tồn tại')) {
              msgDiv.style.display = 'block';
              msgDiv.style.color = 'red';
              msgDiv.innerText = resp;
            } else if (resp.includes('Vui lòng nhập đầy đủ thông tin.') || resp.includes('Đăng ký thất bại.')) {
              msgDiv.style.display = 'block';
              msgDiv.style.color = 'red';
              msgDiv.innerText = resp;
            } else {
              msgDiv.style.display = 'block';
              msgDiv.style.color = 'red';
              msgDiv.innerText = 'Có lỗi xảy ra. Vui lòng thử lại.';
            }
          } else {
            msgDiv.style.display = 'block';
            msgDiv.style.color = 'red';
            msgDiv.innerText = 'Lỗi kết nối máy chủ.';
          }
        }
      };
      xhr.send(formData);
    };
  }

  // Đăng nhập AJAX
  var loginForm = document.getElementById('loginForm');
  if (loginForm) {
    loginForm.onsubmit = function(e) {
      e.preventDefault();
      var formData = new FormData(loginForm);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '/itc_toi-main/index.php?controller=user&action=login', true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          var msgDiv = document.getElementById('login-message');
          if (xhr.status === 200) {
            var resp = xhr.responseText.trim();
            if (resp === '' || resp.includes('Location:')) {
              // Nếu backend redirect, reload lại trang (sẽ vào welcome hoặc admin)
              window.location.reload();
            } else if (resp.includes('Tên đăng nhập') || resp.includes('Mật khẩu không đúng')) {
              msgDiv.style.display = 'block';
              msgDiv.style.color = 'red';
              msgDiv.innerText = resp;
            } else {
              msgDiv.style.display = 'block';
              msgDiv.style.color = 'red';
              msgDiv.innerText = 'Có lỗi xảy ra. Vui lòng thử lại.';
            }
          } else {
            msgDiv.style.display = 'block';
            msgDiv.style.color = 'red';
            msgDiv.innerText = 'Lỗi kết nối máy chủ.';
          }
        }
      };
      xhr.send(formData);
    };
  }

  // --- ICON USER DROPDOWN & POPUP ---
  var userIcon = document.getElementById('userIcon');
  var userDropdown = document.getElementById('userDropdownMenu');
  var loginPopup = document.getElementById('loginPopup');
  var registerPopup = document.getElementById('registerPopup');
  var loginBtn = document.getElementById('loginBtn');
  var registerBtn = document.getElementById('registerBtn');
  var closePopups = document.querySelectorAll('.close-popup');

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
  if(loginBtn && loginPopup) {
    loginBtn.addEventListener('click', function(e) {
      e.preventDefault();
      userDropdown.style.display = 'none';
      loginPopup.style.display = 'flex';
    });
  }
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
});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
}
