{extends file="../layout.tpl"}
{block name=title}Quản lý danh mục{/block}
{block name=content}
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;"><i class="fa-solid fa-list"></i> Quản lý danh mục</div>
    <form method="post" action="/itc_toi-main/index.php?controller=category&action=add" style="display:flex; gap:12px; margin-bottom:18px;">
        <input type="text" name="name" placeholder="Tên danh mục" required style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; min-width:180px;">
        <input type="text" name="description" placeholder="Mô tả" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; min-width:180px;">
        <button type="submit" style="background:#22c55e; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; cursor:pointer;"><i class="fa-solid fa-plus"></i> Thêm danh mục</button>
    </form>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f4f6fb; color:#2563eb;">
                <th style="padding:10px 8px; text-align:left;">ID</th>
                <th style="padding:10px 8px; text-align:left;">Tên danh mục</th>
                <th style="padding:10px 8px; text-align:left;">Mô tả</th>
                <th style="padding:10px 8px; text-align:left;">Hành động</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$categories item=cat}
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px 6px;">{$cat.id}</td>
                <td style="padding:8px 6px;">{$cat.name}</td>
                <td style="padding:8px 6px;">{$cat.description}</td>
                <td style="padding:8px 6px;">
                    <a href="/itc_toi-main/index.php?controller=category&action=edit&id={$cat.id}" style="color:#f59e42; margin-right:8px;"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/itc_toi-main/index.php?controller=category&action=delete&id={$cat.id}" style="color:#ef4444;" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        {foreachelse}
            <tr><td colspan="4" style="text-align:center; color:#bbb; padding:18px;">Không có danh mục nào.</td></tr>
        {/foreach}
        </tbody>
    </table>
</div>
{/block} 