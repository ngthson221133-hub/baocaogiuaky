{extends file="../layout_home.tpl"}
{block name=title}Đặt hàng thành công{/block}
{block name=content}
<div style="max-width:800px;margin:40px auto;padding:0 20px;">
    <div style="text-align:center;margin-bottom:40px;">
        <div style="width:80px;height:80px;background:#22c55e;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
            <i class="fas fa-check" style="color:white;font-size:2em;"></i>
        </div>
        <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin-bottom:10px;">Đặt hàng thành công!</h1>
        <p style="font-size:1.2em;color:#6b7280;">Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ liên hệ sớm nhất!</p>
    </div>
    
    {if $order}
    <div style="background:#fff;padding:30px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:30px;">
        <h2 style="font-size:1.8em;font-weight:600;color:#1f2937;margin-bottom:25px;">
            <i class="fas fa-receipt"></i> Thông tin đơn hàng
        </h2>
        
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:30px;margin-bottom:30px;">
            <div>
                <div style="margin-bottom:15px;">
                    <span style="font-weight:600;color:#374151;">Mã đơn hàng:</span>
                    <span style="color:#22c55e;font-weight:600;font-size:1.1em;">#{$order.id}</span>
                </div>
                <div style="margin-bottom:15px;">
                    <span style="font-weight:600;color:#374151;">Ngày đặt:</span>
                    <span>{$order.created_at|date_format:'%d/%m/%Y %H:%M'}</span>
                </div>
                <div style="margin-bottom:15px;">
                    <span style="font-weight:600;color:#374151;">Trạng thái:</span>
                    <span style="color:#f59e0b;font-weight:600;">Đang xử lý</span>
                </div>
                <div style="margin-bottom:15px;">
                    <span style="font-weight:600;color:#374151;">Phương thức thanh toán:</span>
                    <span>
                        {if $order.payment_method == 'cod'}
                            Thanh toán khi nhận hàng
                        {elseif $order.payment_method == 'bank_transfer'}
                            Chuyển khoản ngân hàng
                        {else}
                            Thanh toán trực tuyến
                        {/if}
                    </span>
                </div>
            </div>
            
            <div>
                <div style="margin-bottom:15px;">
                    <span style="font-weight:600;color:#374151;">Tổng tiền:</span>
                    <span style="color:#22c55e;font-weight:600;font-size:1.2em;">{$order.total_amount|number_format:0:",":"."}đ</span>
                </div>
                <div style="margin-bottom:15px;">
                    <span style="font-weight:600;color:#374151;">Địa chỉ giao hàng:</span>
                    <div style="color:#6b7280;margin-top:5px;">{$order.shipping_address}</div>
                </div>
                {if $order.notes}
                <div style="margin-bottom:15px;">
                    <span style="font-weight:600;color:#374151;">Ghi chú:</span>
                    <div style="color:#6b7280;margin-top:5px;">{$order.notes}</div>
                </div>
                {/if}
            </div>
        </div>
        
        {if $items}
        <div style="border-top:2px solid #f3f4f6;padding-top:20px;">
            <h3 style="font-size:1.4em;font-weight:600;color:#1f2937;margin-bottom:20px;">
                <i class="fas fa-shopping-bag"></i> Chi tiết sản phẩm
            </h3>
            
            {foreach from=$items item=item}
            <div style="display:flex;align-items:center;gap:15px;padding:15px 0;border-bottom:1px solid #f3f4f6;">
                <img src="{$item.image_url|default:'img/no-image.png'}" alt="{$item.product_name}" style="width:60px;height:60px;object-fit:cover;border-radius:8px;">
                <div style="flex:1;">
                    <div style="font-weight:600;color:#1f2937;margin-bottom:4px;">{$item.product_name}</div>
                    <div style="color:#6b7280;font-size:0.9em;">Số lượng: {$item.quantity}</div>
                </div>
                <div style="font-weight:600;color:#22c55e;">{$item.subtotal|number_format:0:",":"."}đ</div>
            </div>
            {/foreach}
        </div>
        {/if}
    </div>
    {/if}
    
    <div style="text-align:center;">
        <a href="{if isset($smarty.session.username)}/itc_toi-main/index.php?controller=user&action=welcome{else}/itc_toi-main/index.php{/if}" style="display:inline-block;padding:12px 24px;background:#22c55e;color:white;text-decoration:none;border-radius:8px;font-weight:600;margin-right:15px;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
            <i class="fas fa-home"></i> Về trang chủ
        </a>
        <a href="/itc_toi-main/index.php?controller=orders&action=view&id={$order.id}" style="display:inline-block;padding:12px 24px;background:#3b82f6;color:white;text-decoration:none;border-radius:8px;font-weight:600;" onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
            <i class="fas fa-eye"></i> Xem đơn hàng
        </a>
    </div>
    
    <div style="margin-top:40px;padding:20px;background:#f0f9ff;border-radius:12px;border-left:4px solid #3b82f6;">
        <h3 style="color:#1e40af;margin-bottom:15px;">
            <i class="fas fa-info-circle"></i> Thông tin bổ sung
        </h3>
        <div style="color:#1e40af;line-height:1.6;">
            <p><strong>• Thời gian giao hàng:</strong> 1-3 ngày làm việc</p>
            <p><strong>• Liên hệ:</strong> Chúng tôi sẽ gọi điện xác nhận đơn hàng trong vòng 30 phút</p>
            <p><strong>• Theo dõi đơn hàng:</strong> Bạn có thể theo dõi trạng thái đơn hàng qua email hoặc số điện thoại</p>
        </div>
    </div>
</div>
{/block} 