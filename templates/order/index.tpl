{extends file="../layout.tpl"}
{block name=title}Quản lý đơn hàng{/block}
{block name=content}
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;"><i class="fa-solid fa-receipt"></i> Quản lý đơn hàng</div>
    <form method="get" style="display:flex; gap:12px; margin-bottom:18px;">
        <input type="hidden" name="controller" value="order">
        <input type="hidden" name="action" value="index">
        <input type="text" name="status" value="{$status|default:''}" placeholder="Trạng thái..." style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; min-width:120px;">
        <input type="date" name="date_from" value="{$date_from|default:''}" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd;">
        <input type="date" name="date_to" value="{$date_to|default:''}" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd;">
        <input type="number" name="user_id" value="{$user_id|default:''}" placeholder="User ID" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; width:120px;">
        <button type="submit" style="background:#2563eb; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; cursor:pointer;"><i class="fa-solid fa-search"></i> Tìm kiếm</button>
    </form>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f4f6fb; color:#2563eb;">
                <th style="padding:10px 8px; text-align:left;">ID</th>
                <th style="padding:10px 8px; text-align:left;">Khách hàng</th>
                <th style="padding:10px 8px; text-align:left;">Ngày đặt</th>
                <th style="padding:10px 8px; text-align:left;">Tổng tiền</th>
                <th style="padding:10px 8px; text-align:left;">Trạng thái</th>
                <th style="padding:10px 8px; text-align:left;">Hành động</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$orders item=order}
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px 6px;">{$order.id}</td>
                <td style="padding:8px 6px;">{$order.customer_name}</td>
                <td style="padding:8px 6px;">{$order.order_date}</td>
                <td style="padding:8px 6px;">{$order.total|number_format:0:",":"."} đ</td>
                <td style="padding:8px 6px;">{$order.status}</td>
                <td style="padding:8px 6px;">
                    <a href="/itc_toi-main/index.php?controller=order&action=detail&id={$order.id}" style="color:#6366f1; margin-right:10px;" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>
                    <a href="/itc_toi-main/index.php?controller=order&action=delete&id={$order.id}" style="color:#ef4444;" onclick="return confirm('Bạn chắc chắn muốn xóa?');" title="Xóa đơn hàng"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        {foreachelse}
            <tr><td colspan="6" style="text-align:center; color:#bbb; padding:18px;">Không có đơn hàng nào.</td></tr>
        {/foreach}
        </tbody>
    </table>
</div>
{/block} 