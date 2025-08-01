{extends file="../layout.tpl"}
{block name=title}Quản lý người dùng{/block}
{block name=content}
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#7c3aed; margin-bottom:18px;"><i class="fa-solid fa-users"></i> Quản lý người dùng</div>
    <form method="get" style="display:flex; gap:12px; margin-bottom:18px;">
        <input type="hidden" name="controller" value="admin">
        <input type="hidden" name="action" value="index">
        <input type="text" name="q" value="{$q|default:''}" placeholder="Tìm kiếm theo tên hoặc email..." style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; min-width:180px;">
        <button type="submit" style="background:#7c3aed; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; cursor:pointer;"><i class="fa-solid fa-search"></i> Tìm kiếm</button>
        <button type="button" onclick="window.location.reload();" style="background:#38bdf8; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; margin-left:8px; cursor:pointer;"><i class="fa-solid fa-rotate"></i> Làm mới</button>
        <a href="/itc_toi-main/index.php?controller=admin&action=add" style="background:#22c55e; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; text-decoration:none; margin-left:auto;"><i class="fa-solid fa-user-plus"></i> Thêm người dùng</a>
    </form>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f4f6fb; color:#7c3aed;">
                <th style="padding:10px 8px; text-align:left;">ID</th>
                <th style="padding:10px 8px; text-align:left;">Tên người dùng</th>
                <th style="padding:10px 8px; text-align:left;">Tên</th>
                <th style="padding:10px 8px; text-align:left;">Email</th>
                <th style="padding:10px 8px; text-align:left;">Mật khẩu</th>
                <th style="padding:10px 8px; text-align:left;">Vai trò</th>
                <th style="padding:10px 8px; text-align:left;">Hành động</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$users item=user}
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px 6px;">{$user.id}</td>
                <td style="padding:8px 6px;">{$user.username|default:"-"}</td>
                <td style="padding:8px 6px;">{$user.name}</td>
                <td style="padding:8px 6px;">{$user.email}</td>
                <td style="padding:8px 6px;">********</td>
                <td style="padding:8px 6px;">{if $user.role == 'admin'}<span style="color:#7c3aed;font-weight:600;">Quản trị viên</span>{else}Người dùng{/if}</td>
                <td style="padding:8px 6px;">
                    <a href="/itc_toi-main/index.php?controller=admin&action=edit&id={$user.id}" title="Chỉnh sửa người dùng" style="color:#6366f1; margin-right:10px;"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form method="post" action="/itc_toi-main/index.php?controller=admin&action=delete" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
                        <input type="hidden" name="id" value="{$user.id}">
                        <button type="submit" title="Xóa người dùng" style="background:none;border:none;color:#ef4444;cursor:pointer;padding:0;"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        {foreachelse}
            <tr><td colspan="6" style="text-align:center; color:#bbb; padding:18px;">Không có người dùng nào.</td></tr>
        {/foreach}
        </tbody>
    </table>
</div>
{/block} 