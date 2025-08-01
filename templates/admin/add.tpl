{extends file="../layout.tpl"}
{block name=title}Thêm người dùng mới{/block}
{block name=content}
<div class="card" style="max-width:480px;margin:0 auto;">
    <h2 style="color:#7c3aed;font-weight:700;margin-bottom:18px;"><i class="fa-solid fa-user-plus"></i> Thêm người dùng mới</h2>
    <form method="post" action="/itc_toi-main/index.php?controller=admin&action=add" style="display:flex;flex-direction:column;gap:16px;">
        <label>Tên người dùng <span style="color:#ef4444">*</span></label>
        <input type="text" name="name" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Email <span style="color:#ef4444">*</span></label>
        <input type="email" name="email" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Mật khẩu <span style="color:#ef4444">*</span></label>
        <input type="password" name="password" required minlength="6" style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Xác nhận mật khẩu <span style="color:#ef4444">*</span></label>
        <input type="password" name="confirm_password" required minlength="6" style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Vai trò <span style="color:#ef4444">*</span></label>
        <select name="role" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
            <option value="user">Người dùng</option>
            <option value="admin">Quản trị viên</option>
        </select>

        <div style="display:flex;gap:12px;align-items:center;margin-top:8px;">
            <button type="submit" style="background:#7c3aed;color:#fff;border:none;border-radius:8px;padding:10px 28px;font-weight:600;font-size:1.1em;cursor:pointer;box-shadow:0 2px 8px #7c3aed22;"><i class="fa-solid fa-user-plus"></i> Lưu người dùng</button>
            <a href="/itc_toi-main/index.php?controller=admin&action=index" style="background:#f3f4f6;color:#7c3aed;border:none;border-radius:8px;padding:10px 22px;font-weight:500;text-decoration:none;">Quay lại</a>
        </div>
    </form>
</div>
{/block} 