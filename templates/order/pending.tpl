{extends file="../layout.tpl"}
{block name=title}Đơn hàng chờ xử lý{/block}
{block name=content}
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;"><i class="fa-regular fa-clock"></i> Đơn hàng chờ xử lý</div>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f4f6fb; color:#2563eb;">
                <th style="padding:10px 8px; text-align:left;">ID</th>
                <th style="padding:10px 8px; text-align:left;">User ID</th>
                <th style="padding:10px 8px; text-align:left;">Tổng tiền</th>
                <th style="padding:10px 8px; text-align:left;">Trạng thái</th>
                <th style="padding:10px 8px; text-align:left;">Ngày tạo</th>
                <th style="padding:10px 8px; text-align:left;">Hành động</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$orders item=order}
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px 6px;">{$order.id}</td>
                <td style="padding:8px 6px;">{$order.user_id}</td>
                <td style="padding:8px 6px;">{$order.total|number_format:0:",":"."} đ</td>
                <td style="padding:8px 6px;">{$order.status}</td>
                <td style="padding:8px 6px;">{$order.created_at}</td>
                <td style="padding:8px 6px;">
                    <a href="/itc_toi-main/index.php?controller=order&action=edit&id={$order.id}" style="color:#f59e42; margin-right:8px;"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/itc_toi-main/index.php?controller=order&action=delete&id={$order.id}" style="color:#ef4444;" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        {foreachelse}
            <tr><td colspan="6" style="text-align:center; color:#bbb; padding:18px;">Không có đơn hàng chờ xử lý.</td></tr>
        {/foreach}
        </tbody>
    </table>
</div>
{/block} 