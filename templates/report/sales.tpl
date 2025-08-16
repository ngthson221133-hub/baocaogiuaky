{extends file="../layout.tpl"}
{block name=title}Báo cáo bán hàng{/block}
{block name=content}
<div style="max-width:1400px; margin:0 auto; padding:0 20px;">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
        <h1 style="color:#1f2937; font-size:1.8em; font-weight:700; margin:0;"><i class="fa-solid fa-chart-line"></i> Báo cáo bán hàng</h1>
        <div style="display:flex; gap:12px;">
            <!-- Export Excel removed for optimization -->
        </div>
    </div>
<div class="stats-cards" style="display: flex; flex-wrap: wrap; gap: 24px; margin-bottom: 32px;">
    <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
        <div style="background:#dcfce7; color:#22c55e; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-dollar-sign"></i></div>
        <div>
            <div style="font-size:1.1em; color:#6b7280;">Tổng doanh thu</div>
            <div style="font-size:1.7em; font-weight:600; color:#1f2937;">{$total_revenue|number_format:0:",":"."}đ</div>
        </div>
    </div>
    <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
        <div style="background:#dbeafe; color:#2563eb; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-receipt"></i></div>
        <div>
            <div style="font-size:1.1em; color:#6b7280;">Tổng số đơn hàng</div>
            <div style="font-size:1.7em; font-weight:600; color:#1f2937;">{$total_orders|default:0}</div>
        </div>
    </div>
    <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
        <div style="background:#fef3c7; color:#f59e0b; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-calendar-day"></i></div>
        <div>
            <div style="font-size:1.1em; color:#6b7280;">Doanh thu hôm nay</div>
            <div style="font-size:1.7em; font-weight:600; color:#1f2937;">{$today_revenue|number_format:0:",":"."}đ</div>
        </div>
    </div>
    <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
        <div style="background:#fce7f3; color:#ec4899; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-shopping-cart"></i></div>
        <div>
            <div style="font-size:1.1em; color:#6b7280;">Đơn hàng hôm nay</div>
            <div style="font-size:1.7em; font-weight:600; color:#1f2937;">{$today_orders|default:0}</div>
        </div>
    </div>
</div>

<div class="chart-container" style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 24px;">
    <div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; overflow:hidden;">
        <div style="font-size:1.2em; font-weight:600; margin-bottom:20px; color:#1f2937;"><i class="fa-solid fa-chart-line"></i> Biểu đồ doanh thu 7 ngày gần đây</div>
        <div style="position:relative; height:300px; width:100%;">
            <canvas id="revenueChart" style="max-width:100%; max-height:100%;"></canvas>
        </div>
    </div>
    
    <div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px;">
        <div style="font-size:1.2em; font-weight:600; margin-bottom:20px; color:#1f2937;"><i class="fa-solid fa-trophy"></i> Top sản phẩm bán chạy</div>
        {if $top_products}
            {foreach from=$top_products item=product name=loop}
                <div style="display:flex; align-items:center; gap:12px; padding:12px 0; border-bottom:1px solid #f3f4f6;">
                    <div style="background:#f3f4f6; color:#6b7280; border-radius:50%; width:32px; height:32px; display:flex; align-items:center; justify-content:center; font-weight:600; font-size:0.9em;">{$smarty.foreach.loop.iteration}</div>
                    <div style="flex:1; min-width:0;">
                        <div style="font-weight:600; color:#1f2937; margin-bottom:4px;">{$product.product_name}</div>
                        <div style="color:#6b7280; font-size:0.9em;">Đã bán: {$product.total_quantity} kg</div>
                    </div>
                    <div style="font-weight:600; color:#22c55e;">{$product.total_revenue|number_format:0:",":"."}đ</div>
                </div>
            {/foreach}
        {else}
            <div style="text-align:center; color:#6b7280; padding:20px;">Chưa có dữ liệu bán hàng</div>
        {/if}
    </div>
</div>

<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.2em; font-weight:600; margin-bottom:20px; color:#1f2937;"><i class="fa-solid fa-table-list"></i> Đơn hàng gần đây</div>
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
                    <td style="padding:12px 8px; font-weight:600; color:#22c55e;">{$order.total_amount|number_format:0:",":"."}đ</td>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Biểu đồ doanh thu 7 ngày gần đây
const ctx = document.getElementById('revenueChart').getContext('2d');
const revenueChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [{$weekly_labels}],
        datasets: [{
            label: 'Doanh thu (VNĐ)',
            data: [{$weekly_revenue}],
            borderColor: '#22c55e',
            backgroundColor: 'rgba(34, 197, 94, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#22c55e',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 6
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: '#f3f4f6'
                },
                ticks: {
                    callback: function(value) {
                        return value.toLocaleString('vi-VN') + 'đ';
                    }
                }
            }
        }
    }
});
</script>
</div>

<style>
@media (max-width: 768px) {
    .chart-container {
        grid-template-columns: 1fr !important;
    }
    
    .stats-cards {
        flex-direction: column !important;
    }
    
    .stats-cards > div {
        min-width: auto !important;
    }
}
</style>
{/block} 