{extends file="../layout.tpl"}
{block name=title}Chỉnh sửa người dùng{/block}
{block name=content}
<div class="card" style="max-width:480px;margin:0 auto;">
    <h2 style="color:#6366f1;font-weight:700;margin-bottom:18px;"><i class="fa-solid fa-user-pen"></i> Chỉnh sửa người dùng</h2>
    <form method="post" action="/itc_toi-main/index.php?controller=admin&action=edit&id={$user.id}" style="display:flex;flex-direction:column;gap:16px;">
        <label>Tên người dùng <span style="color:#ef4444">*</span></label>
        <input type="text" name="name" value="{$user.name}" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Email <span style="color:#ef4444">*</span></label>
        <input type="email" name="email" value="{$user.email}" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Mật khẩu mới (để trống nếu không đổi)</label>
        <input type="password" name="password" minlength="6" style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Xác nhận mật khẩu mới</label>
        <input type="password" name="confirm_password" minlength="6" style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Vai trò <span style="color:#ef4444">*</span></label>
        <select name="role" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
            <option value="user" {if $user.role=="user"}selected{/if}>Người dùng</option>
            <option value="admin" {if $user.role=="admin"}selected{/if}>Quản trị viên</option>
        </select>

        <div style="display:flex;gap:12px;align-items:center;margin-top:8px;">
            <button type="submit" style="background:#6366f1;color:#fff;border:none;border-radius:8px;padding:10px 28px;font-weight:600;font-size:1.1em;cursor:pointer;box-shadow:0 2px 8px #6366f122;"><i class="fa-solid fa-floppy-disk"></i> Lưu thay đổi</button>
            <a href="/itc_toi-main/index.php?controller=admin&action=index" style="background:#f3f4f6;color:#7c3aed;border:none;border-radius:8px;padding:10px 22px;font-weight:500;text-decoration:none;">Quay lại</a>
        </div>
    </form>
</div>
{/block} 