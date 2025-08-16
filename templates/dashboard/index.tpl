{extends file="../layout.tpl"}
{block name=title}Dashboard{/block}
{block name=content}
<div style="max-width:1400px; margin:0 auto; padding:0 20px;">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
        <h1 style="color:#1f2937; font-size:1.8em; font-weight:700; margin:0;"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</h1>
        <div style="display:flex; gap:12px;">
            <!-- Export removed -->
        </div>
    </div>
    <div style="display: flex; flex-wrap: wrap; gap: 24px; margin-bottom: 32px;">
        <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
            <div style="background:#dbeafe; color:#2563eb; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-receipt"></i></div>
            <div>
                <div style="font-size:1.1em; color:#6b7280;">Tổng đơn hàng</div>
                <div style="font-size:1.7em; font-weight:600; color:#1f2937;">{$total_orders|default:0}</div>
            </div>
        </div>
        <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
            <div style="background:#dcfce7; color:#22c55e; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-dollar-sign"></i></div>
            <div>
                <div style="font-size:1.1em; color:#6b7280;">Doanh thu (VNĐ)</div>
                <div style="font-size:1.7em; font-weight:600; color:#1f2937;">{$total_revenue|number_format:0}đ</div>
            </div>
        </div>
        <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
            <div style="background:#cffafe; color:#06b6d4; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-box"></i></div>
            <div>
                <div style="font-size:1.1em; color:#6b7280;">Sản phẩm</div>
                <div style="font-size:1.7em; font-weight:600; color:#1f2937;">{$total_products|default:0}</div>
            </div>
        </div>
        <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
            <div style="background:#fef3c7; color:#f59e0b; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-users"></i></div>
            <div>
                <div style="font-size:1.1em; color:#6b7280;">Người dùng</div>
                <div style="font-size:1.7em; font-weight:600; color:#1f2937;">{$total_users|default:0}</div>
            </div>
        </div>
    </div>

    <div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
        <div style="font-size:1.2em; font-weight:600; margin-bottom:20px; color:#1f2937;"><i class="fa-solid fa-clock-rotate-left"></i> Đơn hàng gần đây</div>
        {if $recent_orders}
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">ID</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Khách hàng</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Tổng tiền</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Trạng thái</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                {foreach from=$recent_orders item=order}
                    <tr style="border-bottom:1px solid #f3f4f6;">
                        <td style="padding:12px 8px; font-weight:600; color:#1f2937;">#{$order.id}</td>
                        <td style="padding:12px 8px; color:#374151;">{$order.username|default:'Khách'}</td>
                                                    <td style="padding:12px 8px; font-weight:600; color:#22c55e;">{$order.total_amount|number_format:0}đ</td>
                        <td style="padding:12px 8px;">
                            {if $order.status == 'pending'}
                                <span style="background:#fef3c7; color:#d97706; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Chờ xử lý</span>
                            {elseif $order.status == 'confirmed'}
                                <span style="background:#dbeafe; color:#2563eb; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Đã xác nhận</span>
                            {elseif $order.status == 'shipping'}
                                <span style="background:#fce7f3; color:#ec4899; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Đang giao</span>
                            {elseif $order.status == 'delivered'}
                                <span style="background:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Đã giao</span>
                            {elseif $order.status == 'cancelled'}
                                <span style="background:#fee2e2; color:#dc2626; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Đã hủy</span>
                            {else}
                                <span style="background:#f3f4f6; color:#6b7280; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">{$order.status}</span>
                            {/if}
                        </td>
                        <td style="padding:12px 8px; color:#6b7280; font-size:0.9em;">{$order.created_at|date_format:'%d/%m/%Y %H:%M'}</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        {else}
            <div style="text-align:center; color:#6b7280; padding:40px;">
                <i class="fa-solid fa-shopping-cart" style="font-size:3em; margin-bottom:16px; color:#d1d5db;"></i>
                <p style="font-size:1.1em;">Chưa có đơn hàng nào</p>
            </div>
        {/if}
    </div>

    <div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
        <div style="font-size:1.2em; font-weight:600; margin-bottom:20px; color:#1f2937;"><i class="fa-solid fa-trophy"></i> Top sản phẩm bán chạy</div>
        {if $top_products}
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Tên sản phẩm</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Số lượng bán</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                {foreach from=$top_products item=prod name=loop}
                    <tr style="border-bottom:1px solid #f3f4f6;">
                        <td style="padding:12px 8px; color:#374151;">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <div style="background:#f3f4f6; color:#6b7280; border-radius:50%; width:24px; height:24px; display:flex; align-items:center; justify-content:center; font-weight:600; font-size:0.8em;">{$smarty.foreach.loop.iteration}</div>
                                {$prod.product_name}
                            </div>
                        </td>
                        <td style="padding:12px 8px; color:#374151;">{$prod.total_sold} kg</td>
                                                    <td style="padding:12px 8px; font-weight:600; color:#22c55e;">{$prod.total_revenue|number_format:0}đ</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        {else}
            <div style="text-align:center; color:#6b7280; padding:40px;">
                <i class="fa-solid fa-box" style="font-size:3em; margin-bottom:16px; color:#d1d5db;"></i>
                <p style="font-size:1.1em;">Chưa có dữ liệu bán hàng</p>
            </div>
        {/if}
    </div>
</div>
{/block} 