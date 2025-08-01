<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:46:40
  from 'file:templates/user/profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c2b04b52b9_31366960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e93689b7672fb1665b531edf1526b4895e7464bb' => 
    array (
      0 => 'templates/user/profile.tpl',
      1 => 1753792905,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c2b04b52b9_31366960 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\user';
?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hồ sơ cá nhân - Trái Cây Tươi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f8f8f8;
            min-height: 100vh;
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
        .menu-items a:hover {
            background: #3e6b3a;
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
        .welcome-user {
            color: #fff;
            font-weight: 600;
        }
        .logout-menu-btn {
            background: #dc2626;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            transition: background 0.2s;
        }
        .logout-menu-btn:hover {
            background: #b91c1c;
        }
    </style>
</head>
<body>
    <div class="marquee">
        <div class="marquee-text">🎁 ĐẦU TƯ NHIỀU NƯỚC TRÊN THẾ GIỚI ... GIỎ/HỘP QUÀ TẶNG TRÁI CÂY ĐẸP MẮT - SANG TRỌNG - TINH TẾ.</div>
    </div>
    
    <div class="menu">
        <div class="logo">Trái Cây Tươi</div>
        <div class="menu-items">
            <a href="/itc_toi-main/index.php?controller=user&action=welcome">Trang chủ</a>
            <a href="/itc_toi-main/index.php?controller=user_orders&action=index">Đơn hàng của tôi</a>
            <a href="/itc_toi-main/index.php?controller=user_profile&action=profile">Hồ sơ</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="menu-icons">
            <a href="/itc_toi-main/index.php?controller=cart&action=view" style="color:inherit;text-decoration:none;position:relative;">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count" style="position:absolute;top:-8px;right:-8px;background:#ef4444;color:white;border-radius:50%;width:18px;height:18px;font-size:0.7em;display:flex;align-items:center;justify-content:center;font-weight:600;">0</span>
            </a>
            <span class="welcome-user">Xin chào, <?php echo $_SESSION['username'];?>
</span>
            <a href="/itc_toi-main/index.php?controller=user&action=logout" title="Đăng xuất" class="logout-menu-btn">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
            </a>
        </div>
    </div>

    <div style="max-width:800px; margin:0 auto; padding:20px;">
        <div style="background:#fff; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:32px;">
            
            <!-- Header -->
            <div style="text-align:center; margin-bottom:32px;">
                <div style="background:#7c3aed; color:#fff; border-radius:50%; width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:2.5em;">
                    <i class="fa-solid fa-user"></i>
                </div>
                <h1 style="color:#1f2937; font-size:1.8em; font-weight:700; margin:0 0 8px;">Hồ sơ cá nhân</h1>
                <p style="color:#6b7280; font-size:1.1em; margin:0;">Quản lý thông tin tài khoản của bạn</p>
            </div>

            <!-- Messages -->
            <?php if ((true && ($_smarty_tpl->hasVariable('success_message') && null !== ($_smarty_tpl->getValue('success_message') ?? null)))) {?>
                <div style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:8px; padding:16px; margin-bottom:24px;">
                    <div style="display:flex; align-items:center; gap:8px; color:#16a34a; font-weight:600;">
                        <i class="fa-solid fa-check-circle"></i>
                        <span><?php echo $_smarty_tpl->getValue('success_message');?>
</span>
                    </div>
                </div>
            <?php }?>
            
            <?php if ((true && ($_smarty_tpl->hasVariable('error_message') && null !== ($_smarty_tpl->getValue('error_message') ?? null)))) {?>
                <div style="background:#fef2f2; border:1px solid #fecaca; border-radius:8px; padding:16px; margin-bottom:24px;">
                    <div style="display:flex; align-items:center; gap:8px; color:#dc2626; font-weight:600;">
                        <i class="fa-solid fa-exclamation-circle"></i>
                        <span><?php echo $_smarty_tpl->getValue('error_message');?>
</span>
                    </div>
                </div>
            <?php }?>

            <!-- Thông tin hiện tại -->
            <div style="background:#f8fafc; border-radius:12px; padding:24px; margin-bottom:32px;">
                <h3 style="color:#1f2937; font-size:1.3em; font-weight:600; margin:0 0 20px;">
                    <i class="fa-solid fa-info-circle"></i> Thông tin hiện tại
                </h3>
                
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:20px;">
                    <div>
                        <label style="display:block; color:#6b7280; font-size:0.9em; font-weight:500; margin-bottom:4px;">Tên người dùng</label>
                        <div style="color:#1f2937; font-weight:600; padding:8px 0;"><?php echo $_smarty_tpl->getValue('user')['username'];?>
</div>
                    </div>
                    <div>
                        <label style="display:block; color:#6b7280; font-size:0.9em; font-weight:500; margin-bottom:4px;">Email</label>
                        <div style="color:#1f2937; font-weight:600; padding:8px 0;"><?php echo $_smarty_tpl->getValue('user')['email'];?>
</div>
                    </div>
                    <div>
                        <label style="display:block; color:#6b7280; font-size:0.9em; font-weight:500; margin-bottom:4px;">Ngày tham gia</label>
                        <div style="color:#1f2937; font-weight:600; padding:8px 0;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('user')['created_at'],'%d/%m/%Y');?>
</div>
                    </div>
                    <div>
                        <label style="display:block; color:#6b7280; font-size:0.9em; font-weight:500; margin-bottom:4px;">Vai trò</label>
                        <div style="color:#1f2937; font-weight:600; padding:8px 0;">
                            <?php if ($_smarty_tpl->getValue('user')['role'] == 'admin') {?>
                                <span style="background:#fef3c7; color:#d97706; padding:4px 8px; border-radius:4px; font-size:0.9em;">Quản trị viên</span>
                            <?php } else { ?>
                                <span style="background:#f0fdf4; color:#16a34a; padding:4px 8px; border-radius:4px; font-size:0.9em;">Người dùng</span>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cập nhật thông tin -->
            <div style="background:#f8fafc; border-radius:12px; padding:24px; margin-bottom:32px;">
                <h3 style="color:#1f2937; font-size:1.3em; font-weight:600; margin:0 0 20px;">
                    <i class="fa-solid fa-edit"></i> Cập nhật thông tin
                </h3>
                
                <form method="POST" action="/itc_toi-main/index.php?controller=user_profile&action=profile" style="display:grid; gap:20px;">
                    <input type="hidden" name="action" value="update_profile">
                    
                    <div>
                        <label for="username" style="display:block; color:#374151; font-weight:600; margin-bottom:8px;">Tên người dùng</label>
                        <input type="text" id="username" name="username" value="<?php echo $_smarty_tpl->getValue('user')['username'];?>
" required
                               style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:1em; transition:border-color 0.2s;"
                               placeholder="Nhập tên người dùng">
                    </div>
                    
                    <div>
                        <label for="email" style="display:block; color:#374151; font-weight:600; margin-bottom:8px;">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $_smarty_tpl->getValue('user')['email'];?>
" required
                               style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:1em; transition:border-color 0.2s;"
                               placeholder="Nhập email">
                    </div>
                    
                    <div style="text-align:right;">
                        <button type="submit" style="background:#7c3aed; color:#fff; border:none; border-radius:8px; padding:12px 24px; font-weight:600; cursor:pointer; font-size:1em; transition:background 0.2s;">
                            <i class="fa-solid fa-save"></i> Cập nhật thông tin
                        </button>
                    </div>
                </form>
            </div>

            <!-- Đổi mật khẩu -->
            <div style="background:#f8fafc; border-radius:12px; padding:24px;">
                <h3 style="color:#1f2937; font-size:1.3em; font-weight:600; margin:0 0 20px;">
                    <i class="fa-solid fa-lock"></i> Đổi mật khẩu
                </h3>
                
                <form method="POST" action="/itc_toi-main/index.php?controller=user_profile&action=profile" style="display:grid; gap:20px;">
                    <input type="hidden" name="action" value="change_password">
                    
                    <div>
                        <label for="current_password" style="display:block; color:#374151; font-weight:600; margin-bottom:8px;">Mật khẩu hiện tại</label>
                        <input type="password" id="current_password" name="current_password" required
                               style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:1em; transition:border-color 0.2s;"
                               placeholder="Nhập mật khẩu hiện tại">
                    </div>
                    
                    <div>
                        <label for="new_password" style="display:block; color:#374151; font-weight:600; margin-bottom:8px;">Mật khẩu mới</label>
                        <input type="password" id="new_password" name="new_password" required
                               style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:1em; transition:border-color 0.2s;"
                               placeholder="Nhập mật khẩu mới (ít nhất 6 ký tự)">
                    </div>
                    
                    <div>
                        <label for="confirm_password" style="display:block; color:#374151; font-weight:600; margin-bottom:8px;">Xác nhận mật khẩu mới</label>
                        <input type="password" id="confirm_password" name="confirm_password" required
                               style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:1em; transition:border-color 0.2s;"
                               placeholder="Nhập lại mật khẩu mới">
                    </div>
                    
                    <div style="text-align:right;">
                        <button type="submit" style="background:#dc2626; color:#fff; border:none; border-radius:8px; padding:12px 24px; font-weight:600; cursor:pointer; font-size:1em; transition:background 0.2s;">
                            <i class="fa-solid fa-key"></i> Đổi mật khẩu
                        </button>
                    </div>
                </form>
            </div>

            <!-- Nút quay lại -->
            <div style="text-align:center; margin-top:32px;">
                <a href="/itc_toi-main/index.php?controller=user&action=welcome" style="background:#6b7280; color:#fff; border:none; border-radius:8px; padding:12px 24px; font-weight:600; text-decoration:none; font-size:1em; transition:background 0.2s; display:inline-block;">
                    <i class="fa-solid fa-arrow-left"></i> Quay lại trang chủ
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background:#29532a;color:#fff;padding:40px 0 0 0;margin-top:40px;">
        <div style="max-width:1200px;margin:0 auto;padding:0 20px;">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:40px;margin-bottom:30px;">
                <!-- TRAI CAY SHOP -->
                <div>
                    <h3 style="color:#fff;font-size:1.3em;font-weight:700;margin-bottom:20px;">TRAI CAY SHOP</h3>
                    <p style="margin:8px 0;color:#e5e7eb;">Địa chỉ : 123 Đường Võ Văn Kiệt, Phường 16, Quận 8, TP.HCM, Việt Nam</p>
                    <p style="margin:8px 0;color:#e5e7eb;">Điện thoại : 0123 456 789</p>
                    <p style="margin:8px 0;color:#e5e7eb;">Email : ayshop@email.com</p>
                    <p style="margin:8px 0;color:#e5e7eb;">HKD AY SHOP | MST : 0123456789</p>
                    <p style="margin:8px 0;color:#e5e7eb;">Giấy chứng nhận ĐKKD số : 123456789 | Ngày cấp : 01/01/2020</p>
                </div>
                
                <!-- QUY ĐỊNH - CHÍNH SÁCH -->
                <div>
                    <h3 style="color:#fff;font-size:1.3em;font-weight:700;margin-bottom:20px;">QUY ĐỊNH - CHÍNH SÁCH</h3>
                    <p style="margin:8px 0;color:#e5e7eb;">» HƯỚNG DẪN ĐẶT HÀNG VÀ THANH TOÁN</p>
                    <p style="margin:8px 0;color:#e5e7eb;">» CHÍNH SÁCH GIAO HÀNG VÀ ĐỔI TRẢ</p>
                    <p style="margin:8px 0;color:#e5e7eb;">» CHÍNH SÁCH BẢO MẬT THÔNG TIN</p>
                </div>
                
                <!-- FANPAGE - FACEBOOK -->
                <div>
                    <h3 style="color:#fff;font-size:1.3em;font-weight:700;margin-bottom:20px;">FANPAGE - FACEBOOK</h3>
                    <div style="background:#fff;border-radius:8px;padding:10px;width:fit-content;">
                        <img src="https://via.placeholder.com/200x150/4ade80/ffffff?text=Cherry+VÀO+MÙA" alt="Fanpage" style="width:200px;height:150px;border-radius:4px;">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Copyright -->
        <div style="background:#1f3e1f;padding:20px 0;text-align:center;">
            <p style="margin:0;color:#e5e7eb;font-size:0.9em;">© 2025 TRAI CAY SHOP. All rights reserved.</p>
        </div>
    </footer>

    <?php echo '<script'; ?>
>
    // Form validation
    document.addEventListener('DOMContentLoaded', function() {
        // Password confirmation validation
        const newPassword = document.getElementById('new_password');
        const confirmPassword = document.getElementById('confirm_password');
        
        function validatePassword() {
            if (newPassword.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity('Mật khẩu xác nhận không khớp');
            } else {
                confirmPassword.setCustomValidity('');
            }
        }
        
        newPassword.addEventListener('change', validatePassword);
        confirmPassword.addEventListener('keyup', validatePassword);
        
        // Email validation
        const emailInput = document.getElementById('email');
        emailInput.addEventListener('blur', function() {
            const email = this.value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (email && !emailRegex.test(email)) {
                this.setCustomValidity('Email không hợp lệ');
            } else {
                this.setCustomValidity('');
            }
        });
    });
    <?php echo '</script'; ?>
>
</body>
</html> <?php }
}
