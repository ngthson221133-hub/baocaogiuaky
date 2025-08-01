<?php
/* Smarty version 5.5.1, created on 2025-07-29 15:01:45
  from 'file:templates/cart_guest/view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c639c9dd76_01070015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c6265c681916566b8810681a599e83286b2f063' => 
    array (
      0 => 'templates/cart_guest/view.tpl',
      1 => 1753771942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c639c9dd76_01070015 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\cart_guest';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9211093146888c639c81896_34042839', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9267105756888c639c863a4_91716842', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout_home.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_9211093146888c639c81896_34042839 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\cart_guest';
?>
Giỏ hàng tạm thời<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_9267105756888c639c863a4_91716842 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\cart_guest';
?>

<div style="max-width:1200px;margin:40px auto;padding:0 20px;">
    <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin-bottom:30px;text-align:center;">
        <i class="fas fa-shopping-cart"></i> Giỏ hàng tạm thời
    </h1>
    
    <div style="background:#fef3c7;border:1px solid #f59e0b;border-radius:12px;padding:20px;margin-bottom:30px;">
        <div style="display:flex;align-items:center;gap:15px;">
            <i class="fas fa-info-circle" style="color:#f59e0b;font-size:1.5em;"></i>
            <div>
                <h3 style="color:#92400e;margin:0 0 8px 0;">Bạn chưa đăng nhập</h3>
                <p style="color:#92400e;margin:0;">Để thanh toán và lưu giỏ hàng, vui lòng <a href="/itc_toi-main/index.php?controller=user&action=login" style="color:#dc2626;font-weight:600;">đăng nhập</a> hoặc <a href="/itc_toi-main/index.php?controller=user&action=register" style="color:#dc2626;font-weight:600;">đăng ký</a> tài khoản.</p>
            </div>
        </div>
    </div>
    
    <?php if ($_smarty_tpl->getValue('cart_items')) {?>
        <div style="background:white;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,0.1);overflow:hidden;">
            <div style="padding:30px;">
                <div style="display:grid;grid-template-columns:2fr 1fr 1fr 1fr auto;gap:20px;align-items:center;padding:20px 0;border-bottom:2px solid #f3f4f6;font-weight:600;color:#374151;">
                    <div>Sản phẩm</div>
                    <div style="text-align:center;">Giá</div>
                    <div style="text-align:center;">Số lượng</div>
                    <div style="text-align:center;">Tổng</div>
                    <div style="text-align:center;">Thao tác</div>
                </div>
                
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cart_items'), 'item');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
                <div class="cart-item" data-product-id="<?php echo $_smarty_tpl->getValue('item')['id'];?>
" style="display:grid;grid-template-columns:2fr 1fr 1fr 1fr auto;gap:20px;align-items:center;padding:20px 0;border-bottom:1px solid #f3f4f6;">
                    <div style="display:flex;align-items:center;gap:15px;">
                        <img src="/itc_toi-main/<?php echo $_smarty_tpl->getValue('item')['image_url'];?>
" alt="<?php echo $_smarty_tpl->getValue('item')['name'];?>
" style="width:80px;height:80px;object-fit:cover;border-radius:8px;" onerror="this.src='https://via.placeholder.com/80x80?text=Không+có+ảnh'">
                        <div>
                            <div style="font-weight:600;color:#1f2937;margin-bottom:5px;"><?php echo $_smarty_tpl->getValue('item')['name'];?>
</div>
                            <div style="color:#6b7280;font-size:0.9em;">Mã: #<?php echo $_smarty_tpl->getValue('item')['id'];?>
</div>
                        </div>
                    </div>
                    
                    <div style="text-align:center;font-weight:600;color:#22c55e;">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('item')['price'],0,",",".");?>
đ
                    </div>
                    
                    <div style="text-align:center;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:10px;">
                            <button onclick="updateQuantity(<?php echo $_smarty_tpl->getValue('item')['id'];?>
, -1)" class="quantity-btn" style="width:35px;height:35px;border-radius:50%;border:none;background:#f3f4f6;cursor:pointer;font-weight:600;color:#374151;transition:background 0.3s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="item-quantity" style="font-weight:600;color:#1f2937;min-width:40px;text-align:center;"><?php echo $_smarty_tpl->getValue('item')['quantity'];?>
</span>
                            <button onclick="updateQuantity(<?php echo $_smarty_tpl->getValue('item')['id'];?>
, 1)" class="quantity-btn" style="width:35px;height:35px;border-radius:50%;border:none;background:#f3f4f6;cursor:pointer;font-weight:600;color:#374151;transition:background 0.3s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div style="text-align:center;font-weight:600;color:#1f2937;">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')(($_smarty_tpl->getValue('item')['price']*$_smarty_tpl->getValue('item')['quantity']),0,",",".");?>
đ
                    </div>
                    
                    <div style="text-align:center;">
                        <button onclick="removeItem(<?php echo $_smarty_tpl->getValue('item')['id'];?>
)" style="padding:8px 12px;border-radius:6px;border:none;background:#ef4444;color:white;cursor:pointer;font-size:0.9em;transition:background 0.3s;" onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                
                <div style="display:flex;justify-content:space-between;align-items:center;padding:30px 0;border-top:2px solid #f3f4f6;margin-top:20px;">
                    <div style="font-size:1.2em;font-weight:600;color:#1f2937;">
                        Tổng cộng: <span style="color:#22c55e;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('cart_total'),0,",",".");?>
đ</span>
                    </div>
                                    <div style="display:flex;gap:15px;">
                    <a href="/itc_toi-main/index.php" style="padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;transition:all 0.3s;background:#6b7280;color:white;" onmouseover="this.style.background='#4b5563'" onmouseout="this.style.background='#6b7280'">
                        <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm
                    </a>
                    <button onclick="clearCart()" style="padding:12px 24px;border-radius:8px;border:none;background:#ef4444;color:white;cursor:pointer;font-weight:600;transition:background 0.3s;" onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">
                        <i class="fas fa-trash"></i> Xóa giỏ hàng
                    </button>
                    <a href="/itc_toi-main/index.php?controller=cart_guest&action=checkout" style="padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;transition:all 0.3s;background:#22c55e;color:white;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
                        <i class="fas fa-credit-card"></i> Đăng nhập để thanh toán
                    </a>
                </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div style="text-align:center;padding:60px 20px;">
            <i class="fas fa-shopping-cart" style="font-size:4em;color:#d1d5db;margin-bottom:20px;"></i>
            <h2 style="font-size:1.8em;color:#6b7280;margin-bottom:15px;">Giỏ hàng trống</h2>
            <p style="color:#9ca3af;margin-bottom:30px;">Bạn chưa có sản phẩm nào trong giỏ hàng</p>
            <a href="/itc_toi-main/index.php" style="padding:12px 24px;border-radius:8px;background:#22c55e;color:white;text-decoration:none;font-weight:600;transition:background 0.3s;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
                <i class="fas fa-shopping-bag"></i> Tiếp tục mua sắm
            </a>
        </div>
    <?php }?>
</div>

<?php echo '<script'; ?>
>
function updateQuantity(productId, delta) {
    const quantityElement = document.querySelector('[data-product-id="' + productId + '"] .item-quantity');
    const currentQuantity = parseInt(quantityElement.textContent);
    const newQuantity = currentQuantity + delta;
    
    if (newQuantity <= 0) {
        removeItem(productId);
        return;
    }
    
    fetch('/itc_toi-main/index.php?controller=cart_guest&action=update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'product_id=' + productId + '&quantity=' + newQuantity
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            quantityElement.textContent = newQuantity;
            updateCartDisplay(data);
            location.reload(); // Reload để cập nhật tổng tiền
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra');
    });
}

function removeItem(productId) {
    if (!confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
        return;
    }
    
    fetch('/itc_toi-main/index.php?controller=cart_guest&action=remove', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'product_id=' + productId
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const itemElement = document.querySelector('[data-product-id="' + productId + '"]');
            itemElement.remove();
            updateCartDisplay(data);
            
            // Kiểm tra nếu giỏ hàng trống
            const remainingItems = document.querySelectorAll('.cart-item');
            if (remainingItems.length === 0) {
                location.reload();
            }
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra');
    });
}

function updateCartDisplay(data) {
    // Cập nhật số lượng trên icon giỏ hàng
    const cartCountElements = document.querySelectorAll('.cart-count');
    cartCountElements.forEach(element => {
        element.textContent = data.cart_count || 0;
    });
}

function clearCart() {
    if (!confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng?')) {
        return;
    }
    
    fetch('/itc_toi-main/index.php?controller=cart_guest&action=clear', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            // Xóa tất cả items trong giỏ hàng
            const cartItems = document.querySelectorAll('.cart-item');
            cartItems.forEach(item => item.remove());
            
            // Cập nhật hiển thị
            updateCartDisplay(data);
            
            // Chuyển về trang index cho guest
            window.location.href = '/itc_toi-main/index.php';
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi xóa giỏ hàng');
    });
}
<?php echo '</script'; ?>
>

<style>
@media (max-width: 768px) {
    .cart-item {
        grid-template-columns: 1fr !important;
        gap: 15px !important;
        text-align: center;
    }
    
    .cart-item > div:first-child {
        justify-content: center;
    }
    
    .cart-item > div:nth-child(2),
    .cart-item > div:nth-child(3),
    .cart-item > div:nth-child(4) {
        text-align: center;
    }
}
</style>
<?php
}
}
/* {/block 'content'} */
}
