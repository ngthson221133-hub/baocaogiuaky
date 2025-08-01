{extends file="../layout.tpl"}
{block name=title}Quản lý sản phẩm{/block}
{block name=content}
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;"><i class="fa-solid fa-box"></i> Quản lý sản phẩm</div>
    <form method="get" style="display:flex; gap:12px; margin-bottom:18px;">
        <input type="hidden" name="controller" value="product">
        <input type="hidden" name="action" value="index">
        <input type="text" name="q" value="{$q|default:''}" placeholder="Tìm kiếm sản phẩm..." style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; min-width:180px;">
        <input type="number" name="price_from" value="{$price_from|default:''}" placeholder="Giá từ" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; width:100px;">
        <input type="number" name="price_to" value="{$price_to|default:''}" placeholder="Giá đến" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; width:100px;">
        <input type="number" name="category_id" value="{$category_id|default:''}" placeholder="ID danh mục" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; width:120px;">
        <button type="submit" style="background:#2563eb; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; cursor:pointer;"><i class="fa-solid fa-search"></i> Tìm kiếm</button>
        <a href="/itc_toi-main/index.php?controller=product&action=add" style="background:#22c55e; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; text-decoration:none; margin-left:auto;"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
    </form>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f4f6fb; color:#2563eb;">
                <th style="padding:10px 8px; text-align:left;">ID</th>
                <th style="padding:10px 8px; text-align:left;">Tên sản phẩm</th>
                <th style="padding:10px 8px; text-align:left;">Mô tả</th>
                <th style="padding:10px 8px; text-align:left;">Giá</th>
                <th style="padding:10px 8px; text-align:left;">Số lượng</th>
                <th style="padding:10px 8px; text-align:left;">Trạng thái</th>
                <th style="padding:10px 8px; text-align:left;">Danh mục</th>
                <th style="padding:10px 8px; text-align:left;">Hành động</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$products item=prod}
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px 6px;">{$prod.id}</td>
                <td style="padding:8px 6px;">{$prod.name}</td>
                <td style="padding:8px 6px;">{$prod.description}</td>
                <td style="padding:8px 6px;">{$prod.price|number_format:0:",":"."} đ</td>
                <td style="padding:8px 6px;">
                    <strong>{$prod.quantity|default:0}</strong> kg
                </td>
                <td style="padding:8px 6px;">
                    {if $prod.quantity <= 0}
                        <span style="background:#fee2e2; color:#dc2626; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Hết hàng</span>
                    {elseif $prod.quantity <= 10}
                        <span style="background:#fef3c7; color:#d97706; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Sắp hết</span>
                    {else}
                        <span style="background:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Còn hàng</span>
                    {/if}
                </td>
                <td style="padding:8px 6px;">{$prod.category_id}</td>
                <td style="padding:8px 6px;">
                    <a href="/itc_toi-main/index.php?controller=product&action=edit&id={$prod.id}" style="color:#f59e42; margin-right:8px;"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/itc_toi-main/index.php?controller=product&action=delete&id={$prod.id}" style="color:#ef4444;" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        {foreachelse}
            <tr><td colspan="8" style="text-align:center; color:#bbb; padding:18px;">Không có sản phẩm nào.</td></tr>
        {/foreach}
        </tbody>
    </table>
</div>
{/block} 