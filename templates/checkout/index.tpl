{extends file="../layout_home.tpl"}
{block name=title}Thanh toán{/block}
{block name=content}
<div style="max-width:1200px;margin:40px auto;padding:0 20px;background:#f8f9fa;min-height:100vh;">
    <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin-bottom:30px;text-align:center;">
        <i class="fas fa-credit-card"></i> Thanh toán đơn hàng
    </h1>
    
    <div class="checkout-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:40px;margin-top:30px;max-width:1200px;margin-left:auto;margin-right:auto;">
        <!-- Form thông tin thanh toán -->
        <div class="checkout-form" style="background:#fff;padding:30px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);height:fit-content;">
            <h2 style="font-size:1.8em;font-weight:600;color:#1f2937;margin-bottom:25px;">
                <i class="fas fa-user"></i> Thông tin giao hàng
            </h2>
            
            <form id="checkoutForm" method="POST" action="/itc_toi-main/index.php?controller=checkout&action=process">
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">Họ và tên *</label>
                    <input type="text" name="name" required style="width:100%;padding:12px;border:2px solid #e5e7eb;border-radius:8px;font-size:1em;" placeholder="Nhập họ và tên">
                </div>
                
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">Email *</label>
                    <input type="email" name="email" required style="width:100%;padding:12px;border:2px solid #e5e7eb;border-radius:8px;font-size:1em;" placeholder="Nhập email">
                </div>
                
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">Số điện thoại *</label>
                    <input type="tel" name="phone" required style="width:100%;padding:12px;border:2px solid #e5e7eb;border-radius:8px;font-size:1em;" placeholder="Nhập số điện thoại">
                </div>
                
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">Địa chỉ giao hàng *</label>
                    <textarea name="address" required style="width:100%;padding:12px;border:2px solid #e5e7eb;border-radius:8px;font-size:1em;min-height:80px;resize:vertical;" placeholder="Nhập địa chỉ giao hàng chi tiết"></textarea>
                </div>
                
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">Phương thức thanh toán *</label>
                    <select name="payment_method" required style="width:100%;padding:12px;border:2px solid #e5e7eb;border-radius:8px;font-size:1em;">
                        <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                        <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                        <option value="online">Thanh toán trực tuyến</option>
                    </select>
                </div>
                
                       <div style="margin-bottom:20px;">
           <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">Mã khuyến mãi</label>
           <div style="display:flex;gap:10px;">
               <input type="text" name="promotion_code" id="promotion_code" style="flex:1;padding:12px;border:2px solid #e5e7eb;border-radius:8px;font-size:1em;" placeholder="Nhập mã khuyến mãi (nếu có)">
               <button type="button" onclick="applyPromotion()" style="padding:12px 20px;background:#3b82f6;color:white;border:none;border-radius:8px;font-size:1em;font-weight:600;cursor:pointer;white-space:nowrap;">
                   <i class="fas fa-tags"></i> Áp dụng
               </button>
               <button type="button" onclick="removePromotion()" id="remove_promotion_btn" style="padding:12px 20px;background:#ef4444;color:white;border:none;border-radius:8px;font-size:1em;font-weight:600;cursor:pointer;white-space:nowrap;display:none;">
                   <i class="fas fa-times"></i> Hủy mã
               </button>
           </div>
           <div id="promotion_message" style="margin-top:8px;font-size:0.9em;"></div>
       </div>
                
                <div style="margin-bottom:30px;">
                    <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">Ghi chú</label>
                    <textarea name="notes" style="width:100%;padding:12px;border:2px solid #e5e7eb;border-radius:8px;font-size:1em;min-height:60px;resize:vertical;" placeholder="Ghi chú thêm (không bắt buộc)"></textarea>
                </div>
                
                <button type="submit" style="width:100%;padding:16px;background:#22c55e;color:white;border:none;border-radius:8px;font-size:1.1em;font-weight:600;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
                    <i class="fas fa-check"></i> Đặt hàng ngay
                </button>
            </form>
        </div>
        
        <!-- Tóm tắt đơn hàng -->
        <div class="checkout-summary" style="background:#fff;padding:30px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);height:fit-content;position:sticky;top:20px;">
            <h2 style="font-size:1.8em;font-weight:600;color:#1f2937;margin-bottom:25px;">
                <i class="fas fa-shopping-bag"></i> Tóm tắt đơn hàng
            </h2>
            
            <div style="margin-bottom:20px;">
                {if $cart_items}
                    {foreach from=$cart_items item=item}
                    <div class="cart-item" style="display:flex;align-items:center;gap:15px;padding:15px 0;border-bottom:1px solid #f3f4f6;">
                        <div style="width:60px;height:60px;flex-shrink:0;overflow:hidden;border-radius:8px;background:#f3f4f6;display:flex;align-items:center;justify-content:center;">
                            {if $item.image_url}
                                <img src="{$item.image_url}" alt="{$item.name|default:$item.product_name}" style="width:100%;height:100%;object-fit:cover;border-radius:8px;" onerror="this.style.display='none';this.parentElement.innerHTML='<i class=\'fas fa-image\' style=\'font-size:24px;color:#9ca3af;\'></i>'">
                            {else}
                                <i class="fas fa-image" style="font-size:24px;color:#9ca3af;"></i>
                            {/if}
                        </div>
                        <div style="flex:1;min-width:0;">
                            <div style="font-weight:600;color:#1f2937;margin-bottom:4px;word-wrap:break-word;">{$item.name|default:$item.product_name}</div>
                            <div style="color:#6b7280;font-size:0.9em;">Số lượng: {$item.quantity}</div>
                        </div>
                        <div style="font-weight:600;color:#22c55e;flex-shrink:0;">{(($item.price * $item.quantity)|number_format:0:",":".")}đ</div>
                    </div>
                    {/foreach}
                {else}
                    <div style="text-align:center;padding:20px;color:#6b7280;">
                        <i class="fas fa-shopping-cart" style="font-size:2em;margin-bottom:10px;"></i>
                        <p>Không có sản phẩm nào trong giỏ hàng</p>
                    </div>
                {/if}
            </div>
            
            <div style="border-top:2px solid #f3f4f6;padding-top:20px;">
                <div style="display:flex;justify-content:space-between;align-items:center;font-size:1.2em;font-weight:600;color:#1f2937;">
                    <span>Tổng cộng:</span>
                    <span style="color:#22c55e;font-size:1.4em;">{$cart_total|number_format:0:",":"."}đ</span>
                </div>
            </div>
            
            <div style="margin-top:20px;padding:15px;background:#f0f9ff;border-radius:8px;border-left:4px solid #3b82f6;">
                <div style="font-weight:600;color:#1e40af;margin-bottom:5px;">
                    <i class="fas fa-info-circle"></i> Thông tin thanh toán
                </div>
                <div style="color:#1e40af;font-size:0.9em;">
                    • Thanh toán khi nhận hàng: Không cần thanh toán trước<br>
                    • Chuyển khoản: Chuyển khoản trước khi giao hàng<br>
                    • Trực tuyến: Thanh toán qua cổng thanh toán
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Biến toàn cục để lưu thông tin khuyến mãi
let appliedPromotion = null;

function applyPromotion() {
    const code = document.getElementById('promotion_code').value.trim();
    if (!code) {
        showPromotionMessage('Vui lòng nhập mã khuyến mãi', 'error');
        return;
    }
    
    // Gửi AJAX để kiểm tra mã khuyến mãi
    fetch('/itc_toi-main/index.php?controller=checkout&action=validatePromotion', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'promotion_code=' + encodeURIComponent(code) + '&order_amount=' + {$cart_total}
    })
    .then(response => response.json())
               .then(data => {
               if (data.success) {
                   appliedPromotion = data.promotion;
                   showPromotionMessage('Áp dụng mã khuyến mãi thành công! Giảm ' + data.discount_amount.toLocaleString('vi-VN') + 'đ', 'success');
                   updateOrderSummary(data.discount_amount);
                   
                   // Hiển thị nút hủy mã
                   document.getElementById('remove_promotion_btn').style.display = 'inline-block';
               } else {
                   showPromotionMessage(data.message, 'error');
               }
           })
    .catch(error => {
        console.error('Error:', error);
        showPromotionMessage('Có lỗi xảy ra khi kiểm tra mã khuyến mãi', 'error');
    });
}

       function showPromotionMessage(message, type) {
           const messageDiv = document.getElementById('promotion_message');
           messageDiv.textContent = message;
           messageDiv.style.color = type === 'success' ? '#059669' : '#dc2626';
           messageDiv.style.fontWeight = '600';
       }

       function removePromotion() {
           appliedPromotion = null;
           document.getElementById('promotion_code').value = '';
           showPromotionMessage('Đã hủy mã khuyến mãi', 'success');
           
           // Ẩn nút hủy mã
           document.getElementById('remove_promotion_btn').style.display = 'none';
           
           // Khôi phục cấu trúc tổng tiền ban đầu
           const totalContainer = document.querySelector('.checkout-summary div[style*="border-top:2px solid #f3f4f6"]');
           if (totalContainer) {
               totalContainer.innerHTML = '<div style="display:flex;justify-content:space-between;align-items:center;font-size:1.2em;font-weight:600;color:#1f2937;"><span>Tổng cộng:</span><span style="color:#22c55e;font-size:1.4em;">{$cart_total|number_format:0:",":"."}đ</span></div>';
           }
       }

function updateOrderSummary(discountAmount) {
    // Tìm phần tử tổng tiền
    const totalContainer = document.querySelector('.checkout-summary div[style*="border-top:2px solid #f3f4f6"]');
    if (!totalContainer) {
        console.error('Không tìm thấy container tổng tiền');
        return;
    }
    
    const currentTotal = {$cart_total};
    const newTotal = currentTotal - discountAmount;
    
    // Xóa nội dung cũ
    totalContainer.innerHTML = '';
    
    // Thêm giá gốc
    const originalDiv = document.createElement('div');
    originalDiv.id = 'original-price';
    originalDiv.style.display = 'flex';
    originalDiv.style.justifyContent = 'space-between';
    originalDiv.style.alignItems = 'center';
    originalDiv.style.fontSize = '1em';
    originalDiv.style.color = '#6b7280';
    originalDiv.style.textDecoration = 'line-through';
    originalDiv.style.marginBottom = '5px';
    originalDiv.innerHTML = '<span>Giá gốc:</span><span>' + currentTotal.toLocaleString('vi-VN') + 'đ</span>';
    totalContainer.appendChild(originalDiv);
    
    // Thêm giảm giá
    const discountDiv = document.createElement('div');
    discountDiv.id = 'discount-amount';
    discountDiv.style.display = 'flex';
    discountDiv.style.justifyContent = 'space-between';
    discountDiv.style.alignItems = 'center';
    discountDiv.style.fontSize = '1em';
    discountDiv.style.color = '#059669';
    discountDiv.style.marginBottom = '10px';
    discountDiv.innerHTML = '<span>Giảm giá:</span><span>-' + discountAmount.toLocaleString('vi-VN') + 'đ</span>';
    totalContainer.appendChild(discountDiv);
    
    // Thêm tổng cuối
    const totalDiv = document.createElement('div');
    totalDiv.style.display = 'flex';
    totalDiv.style.justifyContent = 'space-between';
    totalDiv.style.alignItems = 'center';
    totalDiv.style.fontSize = '1.2em';
    totalDiv.style.fontWeight = '600';
    totalDiv.style.color = '#1f2937';
    totalDiv.style.borderTop = '2px solid #f3f4f6';
    totalDiv.style.paddingTop = '10px';
    totalDiv.style.marginTop = '10px';
    totalDiv.innerHTML = '<span>Tổng cộng:</span><span style="color:#059669;font-size:1.4em;">' + newTotal.toLocaleString('vi-VN') + 'đ</span>';
    totalContainer.appendChild(totalDiv);
}

document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Hiển thị loading
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...';
    submitBtn.disabled = true;
    
    // Gửi form
    const formData = new FormData(this);
    formData.append('ajax', '1');
    
    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            if (data.redirect_url) {
                // Chuyển khoản - chuyển đến trang chuyển khoản
                window.location.href = data.redirect_url;
            } else {
                // COD - chuyển đến trang success
                window.location.href = '/itc_toi-main/index.php?controller=checkout&action=success&order_id=' + data.order_id;
            }
        } else {
            alert(data.message);
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi đặt hàng');
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});
</script>

<style>
.checkout-grid {
    max-width: 1200px !important;
    margin: 0 auto !important;
}

.checkout-form, .checkout-summary {
    overflow: hidden;
}

.checkout-summary img {
    max-width: 100% !important;
    height: auto !important;
}

@media (max-width: 768px) {
    .checkout-container {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
    }
    
    .checkout-grid {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
        padding: 0 10px !important;
    }
    
    .checkout-form, .checkout-summary {
        padding: 20px !important;
    }
    
    .checkout-summary {
        position: static !important;
    }
    
    .checkout-summary .cart-item {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 10px !important;
    }
    
    .checkout-summary .cart-item img {
        width: 80px !important;
        height: 80px !important;
    }
}
</style>
{/block} 