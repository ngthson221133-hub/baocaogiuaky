{extends file="../layout_home.tpl"}
{block name=title}Giỏ hàng{/block}
{block name=content}
<div style="max-width:1200px;margin:40px auto;padding:0 20px;">
    <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin-bottom:30px;text-align:center;">
        <i class="fas fa-shopping-cart"></i> Giỏ hàng của bạn
    </h1>
    
    {if $cart_items}
        <div style="background:white;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,0.1);overflow:hidden;">
            <div style="padding:30px;">
                <div style="display:grid;grid-template-columns:2fr 1fr 1fr 1fr auto;gap:20px;align-items:center;padding:20px 0;border-bottom:2px solid #f3f4f6;font-weight:600;color:#374151;">
                    <div>Sản phẩm</div>
                    <div style="text-align:center;">Giá</div>
                    <div style="text-align:center;">Số lượng</div>
                    <div style="text-align:center;">Tổng</div>
                    <div style="text-align:center;">Thao tác</div>
                </div>
                
                {foreach from=$cart_items item=item}
                <div class="cart-item" data-product-id="{$item.product_id}" style="display:grid;grid-template-columns:2fr 1fr 1fr 1fr auto;gap:20px;align-items:center;padding:20px 0;border-bottom:1px solid #f3f4f6;">
                    <div style="display:flex;align-items:center;gap:15px;">
                        <img src="/itc_toi-main/{$item.image_url}" alt="{$item.name}" style="width:80px;height:80px;object-fit:cover;border-radius:8px;" onerror="this.src='https://via.placeholder.com/80x80?text=Không+có+ảnh'">
                        <div>
                            <div style="font-weight:600;color:#1f2937;margin-bottom:5px;">{$item.name}</div>
                            <div style="color:#6b7280;font-size:0.9em;">Mã: #{$item.product_id}</div>
                        </div>
                    </div>
                    
                    <div style="text-align:center;font-weight:600;color:#22c55e;">
                        {$item.price|number_format:0:",":"."}đ
                    </div>
                    
                    <div style="text-align:center;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:10px;">
                            <button onclick="updateQuantity({$item.product_id}, -1)" class="quantity-btn" style="width:35px;height:35px;border-radius:50%;border:none;background:#f3f4f6;cursor:pointer;font-weight:600;color:#374151;transition:background 0.3s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="item-quantity" style="font-weight:600;color:#1f2937;min-width:40px;text-align:center;">{$item.quantity}</span>
                            <button onclick="updateQuantity({$item.product_id}, 1)" class="quantity-btn" style="width:35px;height:35px;border-radius:50%;border:none;background:#f3f4f6;cursor:pointer;font-weight:600;color:#374151;transition:background 0.3s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div style="text-align:center;font-weight:600;color:#1f2937;">
                        {($item.price * $item.quantity)|number_format:0:",":"."}đ
                    </div>
                    
                    <div style="text-align:center;">
                        <button onclick="removeItem({$item.product_id})" style="padding:8px 12px;border-radius:6px;border:none;background:#ef4444;color:white;cursor:pointer;font-size:0.9em;transition:background 0.3s;" onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                {/foreach}
                
                <div style="display:flex;justify-content:space-between;align-items:center;padding:30px 0;border-top:2px solid #f3f4f6;margin-top:20px;">
                    <div style="font-size:1.2em;font-weight:600;color:#1f2937;">
                        Tổng cộng: <span style="color:#22c55e;">{$cart_total|number_format:0:",":"."}đ</span>
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
    {else}
        <div style="text-align:center;padding:60px 20px;">
            <i class="fas fa-shopping-cart" style="font-size:4em;color:#d1d5db;margin-bottom:20px;"></i>
            <h2 style="font-size:1.8em;color:#6b7280;margin-bottom:15px;">Giỏ hàng trống</h2>
            <p style="color:#9ca3af;margin-bottom:30px;">Bạn chưa có sản phẩm nào trong giỏ hàng</p>
            <a href="/itc_toi-main/index.php" style="padding:12px 24px;border-radius:8px;background:#22c55e;color:white;text-decoration:none;font-weight:600;transition:background 0.3s;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
                <i class="fas fa-shopping-bag"></i> Tiếp tục mua sắm
            </a>
        </div>
    {/if}
</div>

<script>
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
</script>

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
{/block} 