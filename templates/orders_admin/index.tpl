{extends file="../layout.tpl"}
{block name=title}Quản lý đơn hàng{/block}
{block name=content}
<div style="padding:20px;">
    <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin-bottom:30px;">
        <i class="fas fa-shopping-bag"></i> Quản lý đơn hàng
    </h1>
    
    <!-- Thống kê -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;margin-bottom:30px;">
        <div style="background:#fff;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);text-align:center;">
            <div style="font-size:2em;font-weight:700;color:#22c55e;margin-bottom:10px;">{$stats.total_orders}</div>
            <div style="color:#6b7280;">Tổng đơn hàng</div>
        </div>
        <div style="background:#fff;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);text-align:center;">
            <div style="font-size:2em;font-weight:700;color:#f59e0b;margin-bottom:10px;">{$stats.today_orders}</div>
            <div style="color:#6b7280;">Đơn hàng hôm nay</div>
        </div>
        <div style="background:#fff;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);text-align:center;">
            <div style="font-size:2em;font-weight:700;color:#3b82f6;margin-bottom:10px;">{$stats.total_revenue|number_format:0:",":"."}đ</div>
            <div style="color:#6b7280;">Tổng doanh thu</div>
        </div>
    </div>
    
    <!-- Bộ lọc -->
    <div style="background:#fff;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="font-size:1.2em;font-weight:600;color:#1f2937;margin-bottom:15px;">
            <i class="fas fa-filter"></i> Lọc theo trạng thái
        </h3>
        <div style="display:flex;gap:10px;flex-wrap:wrap;">
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;{if !$status_filter}background:#22c55e;color:white;{else}background:#f3f4f6;color:#374151;{/if}">
                Tất cả
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=pending" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;{if $status_filter == 'pending'}background:#f59e0b;color:white;{else}background:#f3f4f6;color:#374151;{/if}">
                Chờ xử lý
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=confirmed" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;{if $status_filter == 'confirmed'}background:#3b82f6;color:white;{else}background:#f3f4f6;color:#374151;{/if}">
                Đã xác nhận
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=shipped" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;{if $status_filter == 'shipped'}background:#8b5cf6;color:white;{else}background:#f3f4f6;color:#374151;{/if}">
                Đang giao
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=delivered" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;{if $status_filter == 'delivered'}background:#22c55e;color:white;{else}background:#f3f4f6;color:#374151;{/if}">
                Đã giao
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=cancelled" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;{if $status_filter == 'cancelled'}background:#ef4444;color:white;{else}background:#f3f4f6;color:#374151;{/if}">
                Đã hủy
            </a>
        </div>
    </div>
    
    <!-- Danh sách đơn hàng -->
    <div style="background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);overflow:hidden;">
        <div style="padding:20px;border-bottom:1px solid #f3f4f6;">
            <h3 style="font-size:1.2em;font-weight:600;color:#1f2937;margin:0;">
                <i class="fas fa-list"></i> Danh sách đơn hàng
            </h3>
        </div>
        
        {if $orders}
            <div style="overflow-x:auto;">
                <table style="width:100%;border-collapse:collapse;">
                    <thead style="background:#f9fafb;">
                        <tr>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Mã đơn hàng</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Khách hàng</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Tổng tiền</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Trạng thái</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Ngày đặt</th>
                            <th style="padding:15px;text-align:center;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$orders item=order}
                        <tr style="border-bottom:1px solid #f3f4f6;">
                            <td style="padding:15px;">
                                <span style="font-weight:600;color:#22c55e;">#{$order.id}</span>
                            </td>
                            <td style="padding:15px;">
                                <div style="font-weight:600;color:#1f2937;">
                                    {if $order.username}
                                        {$order.username}
                                    {else}
                                        {$order.guest_name}
                                    {/if}
                                </div>
                                <div style="color:#6b7280;font-size:0.9em;">
                                    {if $order.user_email}
                                        {$order.user_email}
                                    {else}
                                        {$order.guest_email}
                                    {/if}
                                </div>
                                <div style="color:#6b7280;font-size:0.9em;">
                                    {$order.guest_phone}
                                </div>
                            </td>
                            <td style="padding:15px;">
                                <span style="font-weight:600;color:#22c55e;font-size:1.1em;">{$order.total_amount|number_format:0:",":"."}đ</span>
                            </td>
                            <td style="padding:15px;">
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
                            </td>
                            <td style="padding:15px;color:#6b7280;">
                                {$order.created_at|date_format:'%d/%m/%Y %H:%M'}
                            </td>
                            <td style="padding:15px;text-align:center;">
                                <a href="/itc_toi-main/index.php?controller=orders_admin&action=view&id={$order.id}" style="padding:6px 12px;background:#3b82f6;color:white;text-decoration:none;border-radius:6px;font-size:0.9em;font-weight:500;" onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                                    <i class="fas fa-eye"></i> Xem
                                </a>
                            </td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        {else}
            <div style="text-align:center;padding:40px;color:#6b7280;">
                <i class="fas fa-shopping-bag" style="font-size:3em;margin-bottom:15px;color:#d1d5db;"></i>
                <p style="font-size:1.1em;">Không có đơn hàng nào</p>
            </div>
        {/if}
    </div>
</div>
{/block} 