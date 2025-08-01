<?php
/* Smarty version 5.5.1, created on 2025-07-29 15:16:06
  from 'file:templates/product/detail_index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c996ae5837_22904938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d6b60e69a50d6108a588338469a10bf80dcc7ee' => 
    array (
      0 => 'templates/product/detail_index.tpl',
      1 => 1753776626,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c996ae5837_22904938 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6371807326888c996aba760_73373340', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6062366766888c996ac34b0_20559975', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout_home.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_6371807326888c996aba760_73373340 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
?>
Chi tiết sản phẩm - <?php echo $_smarty_tpl->getValue('product')['name'];
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_6062366766888c996ac34b0_20559975 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
?>

<div style="max-width:1200px;margin:40px auto;padding:0 20px;">
    <a href="javascript:history.back()" style="display:inline-flex;align-items:center;gap:8px;color:#6b7280;text-decoration:none;margin-bottom:20px;font-weight:500;transition:color 0.3s;">
        <i class="fas fa-arrow-left"></i>
        Quay lại
    </a>
    
    <div style="background:white;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,0.1);overflow:hidden;display:flex;min-height:500px;">
        <div style="flex:1;background:#f8fafc;display:flex;align-items:center;justify-content:center;padding:40px;">
            <img src="/itc_toi-main/<?php echo $_smarty_tpl->getValue('product')['image_url'];?>
" alt="<?php echo $_smarty_tpl->getValue('product')['name'];?>
" style="max-width:100%;max-height:400px;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,0.1);" onerror="this.src='https://via.placeholder.com/400x300?text=Không+có+ảnh'">
        </div>
        <div style="flex:1;padding:40px;display:flex;flex-direction:column;justify-content:center;">
            <div style="color:#22c55e;font-weight:600;font-size:0.9em;margin-bottom:8px;">
                <i class="fas fa-tag"></i>
                <?php if ($_smarty_tpl->getValue('category')) {?>
                    <?php echo $_smarty_tpl->getValue('category')['name'];?>

                <?php } else { ?>
                    Danh mục #<?php echo $_smarty_tpl->getValue('product')['category_id'];?>

                <?php }?>
            </div>
            <h1 style="font-size:2.2em;font-weight:700;color:#1f2937;margin-bottom:16px;line-height:1.2;"><?php echo $_smarty_tpl->getValue('product')['name'];?>
</h1>
            <div style="font-size:2em;font-weight:700;color:#22c55e;margin-bottom:20px;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('product')['price'],0,",",".");?>
 đ</div>
            <p style="color:#6b7280;line-height:1.6;margin-bottom:30px;font-size:1.1em;"><?php echo $_smarty_tpl->getValue('product')['description'];?>
</p>
            
            <div style="display:flex;gap:20px;margin-bottom:30px;padding:20px;background:#f8fafc;border-radius:12px;">
                <div style="text-align:center;">
                    <div style="font-size:0.9em;color:#6b7280;margin-bottom:4px;">Mã sản phẩm</div>
                    <div style="font-weight:600;color:#1f2937;">#<?php echo $_smarty_tpl->getValue('product')['id'];?>
</div>
                </div>
                <div style="text-align:center;">
                    <div style="font-size:0.9em;color:#6b7280;margin-bottom:4px;">Số lượng</div>
                    <div style="font-weight:600;color:#1f2937;"><?php echo (($tmp = $_smarty_tpl->getValue('product')['quantity'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</div>
                </div>
                <div style="text-align:center;">
                    <div style="font-size:0.9em;color:#6b7280;margin-bottom:4px;">Ngày tạo</div>
                    <div style="font-weight:600;color:#1f2937;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('product')['created_at'],'%d/%m/%Y');?>
</div>
                </div>
            </div>
            
            <div style="margin-bottom:30px;">
                <div style="display:flex;align-items:center;gap:15px;margin-bottom:20px;">
                    <label style="font-weight:600;color:#374151;min-width:80px;">Số lượng:</label>
                    <div style="display:flex;align-items:center;border:2px solid #e5e7eb;border-radius:8px;overflow:hidden;">
                        <button type="button" onclick="changeQuantity(-1)" style="padding:12px 16px;background:#f3f4f6;border:none;cursor:pointer;font-weight:600;color:#374151;transition:background 0.3s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" id="quantity" value="1" min="1" max="<?php echo $_smarty_tpl->getValue('product')['quantity'];?>
" style="width:80px;padding:12px;text-align:center;border:none;outline:none;font-weight:600;font-size:1em;">
                        <button type="button" onclick="changeQuantity(1)" style="padding:12px 16px;background:#f3f4f6;border:none;cursor:pointer;font-weight:600;color:#374151;transition:background 0.3s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <span style="color:#6b7280;font-size:0.9em;">Còn lại: <span style="color:#22c55e;font-weight:600;"><?php echo $_smarty_tpl->getValue('product')['quantity'];?>
</span> sản phẩm</span>
                </div>
                
                <div style="display:flex;gap:15px;margin-top:auto;">
                    <?php if ($_smarty_tpl->getValue('product')['quantity'] > 0) {?>
                        <button onclick="addToCart()" style="padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;transition:all 0.3s;border:none;cursor:pointer;font-size:1em;background:#22c55e;color:white;" onmouseover="this.style.background='#16a34a';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#22c55e';this.style.transform='translateY(0)'">
                            <i class="fas fa-shopping-cart"></i>
                            Thêm vào giỏ hàng
                        </button>
                        <button onclick="buyNow()" style="padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;transition:all 0.3s;border:none;cursor:pointer;font-size:1em;background:#ef4444;color:white;" onmouseover="this.style.background='#dc2626';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#ef4444';this.style.transform='translateY(0)'">
                            <i class="fas fa-bolt"></i>
                            Mua ngay
                        </button>
                    <?php } else { ?>
                        <button disabled style="padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;transition:all 0.3s;border:none;cursor:not-allowed;font-size:1em;background:#6b7280;color:white;">
                            <i class="fas fa-times"></i>
                            Hết hàng
                        </button>
                    <?php }?>
                    <a href="/itc_toi-main/index.php" style="padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;transition:all 0.3s;border:none;cursor:pointer;font-size:1em;background:#f3f4f6;color:#374151;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                        <i class="fas fa-arrow-left"></i>
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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
    }
    </style>
    
    <?php echo '<script'; ?>
>
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
        const productId = <?php echo $_smarty_tpl->getValue('product')['id'];?>
;
        const productName = '<?php echo $_smarty_tpl->getValue('product')['name'];?>
';
        
        // Gửi AJAX để thêm vào giỏ hàng guest
        fetch('/itc_toi-main/index.php?controller=cart_guest&action=add', {
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
        const productId = <?php echo $_smarty_tpl->getValue('product')['id'];?>
;
        const productName = '<?php echo $_smarty_tpl->getValue('product')['name'];?>
';
        const price = <?php echo $_smarty_tpl->getValue('product')['price'];?>
;
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
    <?php echo '</script'; ?>
>
    <?php
}
}
/* {/block 'content'} */
}
