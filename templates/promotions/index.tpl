{extends file="../layout.tpl"}
{block name=title}Quản lý mã khuyến mãi{/block}
{block name=content}
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;">
        <i class="fa-solid fa-tags"></i> Quản lý mã khuyến mãi
    </div>
    
    <form method="get" style="display:flex; gap:12px; margin-bottom:18px;">
        <input type="hidden" name="controller" value="promotions">
        <input type="hidden" name="action" value="index">
        <input type="text" name="q" value="{$search|default:''}" placeholder="Tìm kiếm mã khuyến mãi..." style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; min-width:200px;">
        <button type="submit" style="background:#2563eb; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; cursor:pointer;">
            <i class="fa-solid fa-search"></i> Tìm kiếm
        </button>
        <a href="/itc_toi-main/index.php?controller=promotions&action=add" style="background:#22c55e; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; text-decoration:none; margin-left:auto;">
            <i class="fa-solid fa-plus"></i> Thêm mã khuyến mãi
        </a>
    </form>

    {if $message}
        <div style="background:#dcfce7; color:#166534; padding:12px; border-radius:8px; margin-bottom:16px; border:1px solid #bbf7d0;">
            <i class="fa-solid fa-check-circle"></i> {$message}
        </div>
    {/if}

    {if $error}
        <div style="background:#fef2f2; color:#dc2626; padding:12px; border-radius:8px; margin-bottom:16px; border:1px solid #fecaca;">
            <i class="fa-solid fa-exclamation-triangle"></i> Có lỗi xảy ra!
        </div>
    {/if}

    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; margin-top:16px;">
            <thead>
                <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Mã</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Tên</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Loại giảm giá</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Giá trị</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Đã dùng</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Trạng thái</th>
                    <th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                {if $promotions}
                    {foreach from=$promotions item=promotion}
                        <tr style="border-bottom:1px solid #f1f5f9;">
                            <td style="padding:12px; font-weight:600; color:#1f2937;">{$promotion.code}</td>
                            <td style="padding:12px;">{$promotion.name}</td>
                            <td style="padding:12px;">
                                {if $promotion.discount_type == 'percentage'}
                                    <span style="background:#dbeafe; color:#1e40af; padding:4px 8px; border-radius:4px; font-size:0.85em;">Phần trăm</span>
                                {else}
                                    <span style="background:#fef3c7; color:#92400e; padding:4px 8px; border-radius:4px; font-size:0.85em;">Cố định</span>
                                {/if}
                            </td>
                            <td style="padding:12px; font-weight:600; color:#059669;">
                                {if $promotion.discount_type == 'percentage'}
                                    {$promotion.discount_value}%
                                {else}
                                    {$promotion.discount_value|number_format:0}đ
                                {/if}
                            </td>
                            <td style="padding:12px;">{$promotion.used_count|default:0}</td>
                            <td style="padding:12px;">
                                {if $promotion.is_active}
                                    <span style="background:#dcfce7; color:#166534; padding:4px 8px; border-radius:4px; font-size:0.85em;">Hoạt động</span>
                                {else}
                                    <span style="background:#fef2f2; color:#dc2626; padding:4px 8px; border-radius:4px; font-size:0.85em;">Tạm dừng</span>
                                {/if}
                            </td>
                            <td style="padding:12px;">
                                <div style="display:flex; gap:8px;">
                                    <a href="/itc_toi-main/index.php?controller=promotions&action=edit&id={$promotion.id}" style="background:#3b82f6; color:#fff; padding:6px 12px; border-radius:4px; text-decoration:none; font-size:0.85em;">
                                        <i class="fa-solid fa-edit"></i> Sửa
                                    </a>
                                    <form method="post" action="/itc_toi-main/index.php?controller=promotions&action=delete" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xóa mã khuyến mãi này?')">
                                        <input type="hidden" name="id" value="{$promotion.id}">
                                        <button type="submit" style="background:#ef4444; color:#fff; border:none; padding:6px 12px; border-radius:4px; font-size:0.85em; cursor:pointer;">
                                            <i class="fa-solid fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="7" style="padding:40px; text-align:center; color:#6b7280;">
                            <i class="fa-solid fa-tags" style="font-size:2em; margin-bottom:16px; display:block;"></i>
                            Chưa có mã khuyến mãi nào
                        </td>
                    </tr>
                {/if}
            </tbody>
        </table>
    </div>
</div>
{/block} 