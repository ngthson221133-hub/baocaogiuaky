{extends file="../layout_home.tpl"}
{block name=title}Chi tiết đơn hàng #{$order.id}{/block}
{block name=content}
<div style="max-width:1000px;margin:40px auto;padding:0 20px;">
    <div style="display:flex;align-items:center;gap:15px;margin-bottom:30px;">
        <a href="/itc_toi-main/index.php?controller=user_orders&action=index" style="padding:8px 16px;background:#6b7280;color:white;text-decoration:none;border-radius:6px;font-weight:500;" onmouseover="this.style.background='#4b5563'" onmouseout="this.style.background='#6b7280'">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
        <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin:0;">
            <i class="fas fa-receipt"></i> Đơn hàng #{$order.id}
        </h1>
    </div>
    
    <div style="background:#fff;padding:30px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:30px;">
        <h2 style="font-size:1.8em;font-weight:600;color:#1f2937;margin-bottom:25px;">
            <i class="fas fa-info-circle"></i> Thông tin đơn hàng
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
                    <span>
                        {if $order.status == 'pending'}
                            <span style="padding:4px 8px;background:#fef3c7;color:#92400e;border-radius:4px;font-size:0.9em;font-weight:500;">Chờ xử lý</span>
                        {elseif $order.status == 'confirmed'}
                            <span style="padding:4px 8px;background:#dbeafe;color:#1e40af;border-radius:4px;font-size:0.9em;font-weight:500;">Đã xác nhận</span>
                        {elseif $order.status == 'shipped'}
                            <span style="padding:4px 8px;background:#e9d5ff;color:#7c3aed;border-radius:4px;font-size:0.9em;font-weight:500;">Đang giao</span>
                        {elseif $order.status == 'delivered'}
                            <span style="padding:4px 8px;background:#dcfce7;color:#166534;border-radius:4px;font-size:0.9em;font-weight:500;">Đã giao</span>
                        {elseif $order.status == 'cancelled'}
                            <span style="padding:4px 8px;background:#fee2e2;color:#991b1b;border-radius:4px;font-size:0.9em;font-weight:500;">Đã hủy</span>
                        {/if}
                    </span>
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
                    <span style="font-weight:600;color:#374151;">Cập nhật lần cuối:</span>
                    <span>{$order.updated_at|date_format:'%d/%m/%Y %H:%M'}</span>
                </div>
                {if $order.notes}
                <div style="margin-bottom:15px;">
                    <span style="font-weight:600;color:#374151;">Ghi chú:</span>
                    <div style="color:#6b7280;margin-top:5px;">{$order.notes}</div>
                </div>
                {/if}
            </div>
        </div>
        
        <!-- Thông tin giao hàng -->
        <h3 style="font-size:1.4em;font-weight:600;color:#1f2937;margin-bottom:20px;">
            <i class="fas fa-truck"></i> Thông tin giao hàng
        </h3>
        <div style="background:#f9fafb;padding:20px;border-radius:8px;margin-bottom:30px;">
            <div style="margin-bottom:10px;">
                <span style="font-weight:600;color:#374151;">Địa chỉ giao hàng:</span>
                <div style="color:#6b7280;margin-top:5px;">{$order.shipping_address}</div>
            </div>
        </div>
        
        <!-- Chi tiết sản phẩm -->
        <h3 style="font-size:1.4em;font-weight:600;color:#1f2937;margin-bottom:20px;">
            <i class="fas fa-shopping-bag"></i> Chi tiết sản phẩm
        </h3>
        {if $items}
            <div style="border:1px solid #e5e7eb;border-radius:8px;overflow:hidden;">
                <table style="width:100%;border-collapse:collapse;">
                    <thead style="background:#f9fafb;">
                        <tr>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Sản phẩm</th>
                            <th style="padding:15px;text-align:center;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Số lượng</th>
                            <th style="padding:15px;text-align:right;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Đơn giá</th>
                            <th style="padding:15px;text-align:right;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$items item=item}
                        <tr style="border-bottom:1px solid #f3f4f6;">
                            <td style="padding:15px;">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div style="width:40px;height:40px;overflow:hidden;border-radius:6px;background:#f3f4f6;display:flex;align-items:center;justify-content:center;">
                                        {if $item.image_url}
                                            <img src="{$item.image_url}" alt="{$item.product_name}" style="width:100%;height:100%;object-fit:cover;" onerror="this.style.display='none';this.parentElement.innerHTML='<i class=\'fas fa-image\' style=\'font-size:16px;color:#9ca3af;\'></i>'">
                                        {else}
                                            <i class="fas fa-image" style="font-size:16px;color:#9ca3af;"></i>
                                        {/if}
                                    </div>
                                    <div>
                                        <div style="font-weight:600;color:#1f2937;">{$item.product_name}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:15px;text-align:center;">{$item.quantity}</td>
                            <td style="padding:15px;text-align:right;">{$item.product_price|number_format:0:",":"."}đ</td>
                            <td style="padding:15px;text-align:right;font-weight:600;color:#22c55e;">{$item.subtotal|number_format:0:",":"."}đ</td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        {else}
            <div style="text-align:center;padding:20px;color:#6b7280;">
                <i class="fas fa-shopping-bag" style="font-size:2em;margin-bottom:10px;color:#d1d5db;"></i>
                <p>Không có sản phẩm nào</p>
            </div>
        {/if}
    </div>
    
    <div style="text-align:center;">
        <a href="/itc_toi-main/index.php?controller=user_orders&action=index" style="padding:10px 20px;background:#6b7280;color:white;text-decoration:none;border-radius:6px;font-weight:500;margin-right:10px;" onmouseover="this.style.background='#4b5563'" onmouseout="this.style.background='#6b7280'">
            <i class="fas fa-list"></i> Danh sách đơn hàng
        </a>
        <a href="/itc_toi-main/index.php?controller=user&action=welcome" style="padding:10px 20px;background:#22c55e;color:white;text-decoration:none;border-radius:6px;font-weight:500;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
            <i class="fas fa-home"></i> Về trang chủ
        </a>
    </div>
</div>
{/block} 