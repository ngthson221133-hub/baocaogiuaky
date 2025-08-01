{extends file="../layout.tpl"}
{block name=title}Quản lý đánh giá{/block}
{block name=content}
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;"><i class="fa-solid fa-star"></i> Quản lý đánh giá</div>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f4f6fb; color:#2563eb;">
                <th style="padding:10px 8px; text-align:left;">ID</th>
                <th style="padding:10px 8px; text-align:left;">User</th>
                <th style="padding:10px 8px; text-align:left;">Sản phẩm</th>
                <th style="padding:10px 8px; text-align:left;">Nội dung</th>
                <th style="padding:10px 8px; text-align:left;">Số sao</th>
                <th style="padding:10px 8px; text-align:left;">Trả lời</th>
                <th style="padding:10px 8px; text-align:left;">Hành động</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$reviews item=review}
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px 6px;">{$review.id}</td>
                <td style="padding:8px 6px;">{$review.user_id}</td>
                <td style="padding:8px 6px;">{$review.product_id}</td>
                <td style="padding:8px 6px;">{$review.content}</td>
                <td style="padding:8px 6px;">{$review.rating}</td>
                <td style="padding:8px 6px;">{$review.reply|default:'---'}</td>
                <td style="padding:8px 6px;">
                    <a href="/itc_toi-main/index.php?controller=review&action=reply&id={$review.id}" style="color:#2563eb; margin-right:8px;"><i class="fa-solid fa-reply"></i></a>
                    <a href="/itc_toi-main/index.php?controller=review&action=delete&id={$review.id}" style="color:#ef4444;" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        {foreachelse}
            <tr><td colspan="7" style="text-align:center; color:#bbb; padding:18px;">Không có đánh giá nào.</td></tr>
        {/foreach}
        </tbody>
    </table>
</div>
{/block} 