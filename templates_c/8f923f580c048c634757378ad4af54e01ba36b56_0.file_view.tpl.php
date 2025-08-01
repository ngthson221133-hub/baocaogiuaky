<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:49:27
  from 'file:templates/cart/view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c357853756_54911406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f923f580c048c634757378ad4af54e01ba36b56' => 
    array (
      0 => 'templates/cart/view.tpl',
      1 => 1753772703,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c357853756_54911406 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\cart';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18881217956888c357837ec0_88884533', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3489738406888c35783bdd3_04012536', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout_home.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_18881217956888c357837ec0_88884533 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\cart';
?>
Giỏ hàng<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_3489738406888c35783bdd3_04012536 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\cart';
?>

<div style="max-width:1200px;margin:40px auto;padding:0 20px;">
    <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin-bottom:30px;text-align:center;">
        <i class="fas fa-shopping-cart"></i> Giỏ hàng của bạn
    </h1>
    
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
                <div class="cart-item" data-product-id="<?php echo $_smarty_tpl->getValue('item')['product_id'];?>
" style="display:grid;grid-template-columns:2fr 1fr 1fr 1fr auto;gap:20px;align-items:center;padding:20px 0;border-bottom:1px solid #f3f4f6;">
                    <div style="display:flex;align-items:center;gap:15px;">
                        <img src="/itc_toi-main/<?php echo $_smarty_tpl->getValue('item')['image_url'];?>
" alt="<?php echo $_smarty_tpl->getValue('item')['name'];?>
" style="width:80px;height:80px;object-fit:cover;border-radius:8px;" onerror="this.src='https://via.placeholder.com/80x80?text=Không+có+ảnh'">
                        <div>
                            <div style="font-weight:600;color:#1f2937;margin-bottom:5px;"><?php echo $_smarty_tpl->getValue('item')['name'];?>
</div>
                            <div style="color:#6b7280;font-size:0.9em;">Mã: #<?php echo $_smarty_tpl->getValue('item')['product_id'];?>
</div>
                        </div>
                    </div>
                    
                    <div style="text-align:center;font-weight:600;color:#22c55e;">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('item')['price'],0,",",".");?>
đ
                    </div>
                    
                    <div style="text-align:center;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:10px;">
                            <button onclick="updateQuantity(<?php echo $_smarty_tpl->getValue('item')['product_id'];?>
, -1)" class="quantity-btn" style="width:35px;height:35px;border-radius:50%;border:none;background:#f3f4f6;cursor:pointer;font-weight:600;color:#374151;transition:background 0.3s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="item-quantity" style="font-weight:600;color:#1f2937;min-width:40px;text-align:center;"><?php echo $_smarty_tpl->getValue('item')['quantity'];?>
</span>
                            <button onclick="updateQuantity(<?php echo $_smarty_tpl->getValue('item')['product_id'];?>
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
                        <button onclick="removeItem(<?php echo $_smarty_tpl->getValue('item')['product_id'];?>
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
                        <a href="/itc_toi-main/index.php?controller=user&action=welcome" style="padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;transition:all 0.3s;background:#6b7280;color:white;" onmouseover="this.style.background='#4b5563'" onmouseout="this.style.background='#6b7280'">
                            <i class="fas fa-arrow-left"></i> Quay lại mua hàng tiếp
                        </a>
                        <button onclick="clearCart()" style="padding:12px 24px;border-radius:8px;border:none;background:#ef4444;color:white;cursor:pointer;font-weight:600;transition:background 0.3s;" onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">
                            <i class="fas fa-trash"></i> Xóa giỏ hàng
                        </button>
                                               <a href="/itc_toi-main/index.php?controller=checkout&action=index" style="padding:12px 24px;border-radius:8px;border:none;background:#22c55e;color:white;cursor:pointer;font-weight:600;transition:background 0.3s;text-decoration:none;display:inline-block;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
                           <i class="fas fa-credit-card"></i> Thanh toán
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
    
    fetch('/itc_toi-main/index.php?controller=cart&action=update', {
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
    
    fetch('/itc_toi-main/index.php?controller=cart&action=remove', {
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

function clearCart() {
    if (!confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng?')) {
        return;
    }
    
    fetch('/itc_toi-main/index.php?controller=cart&action=clear', {
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
            
            // Chuyển về trang welcome thay vì reload
            window.location.href = '/itc_toi-main/index.php?controller=user&action=welcome';
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi xóa giỏ hàng');
    });
}

function checkout() {
    alert('Chức năng thanh toán đang được phát triển');
}

function updateCartDisplay(data) {
    // Cập nhật số lượng trên icon giỏ hàng
    const cartCountElements = document.querySelectorAll('.cart-count');
    cartCountElements.forEach(element => {
        element.textContent = data.cart_count || 0;
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
