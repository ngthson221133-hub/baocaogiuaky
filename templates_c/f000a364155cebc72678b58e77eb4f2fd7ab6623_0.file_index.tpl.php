<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:51:06
  from 'file:templates/admin/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c3ba4544c4_61333370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f000a364155cebc72678b58e77eb4f2fd7ab6623' => 
    array (
      0 => 'templates/admin/index.tpl',
      1 => 1753166696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c3ba4544c4_61333370 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6867927926888c3ba42afc6_22206085', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13053582246888c3ba430db0_57668857', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_6867927926888c3ba42afc6_22206085 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\admin';
?>
Quản lý người dùng<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_13053582246888c3ba430db0_57668857 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\admin';
?>

<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#7c3aed; margin-bottom:18px;"><i class="fa-solid fa-users"></i> Quản lý người dùng</div>
    <form method="get" style="display:flex; gap:12px; margin-bottom:18px;">
        <input type="hidden" name="controller" value="admin">
        <input type="hidden" name="action" value="index">
        <input type="text" name="q" value="<?php echo (($tmp = $_smarty_tpl->getValue('q') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" placeholder="Tìm kiếm theo tên hoặc email..." style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; min-width:180px;">
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
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'user');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach0DoElse = false;
?>
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px 6px;"><?php echo $_smarty_tpl->getValue('user')['id'];?>
</td>
                <td style="padding:8px 6px;"><?php echo (($tmp = $_smarty_tpl->getValue('user')['username'] ?? null)===null||$tmp==='' ? "-" ?? null : $tmp);?>
</td>
                <td style="padding:8px 6px;"><?php echo $_smarty_tpl->getValue('user')['name'];?>
</td>
                <td style="padding:8px 6px;"><?php echo $_smarty_tpl->getValue('user')['email'];?>
</td>
                <td style="padding:8px 6px;">********</td>
                <td style="padding:8px 6px;"><?php if ($_smarty_tpl->getValue('user')['role'] == 'admin') {?><span style="color:#7c3aed;font-weight:600;">Quản trị viên</span><?php } else { ?>Người dùng<?php }?></td>
                <td style="padding:8px 6px;">
                    <a href="/itc_toi-main/index.php?controller=admin&action=edit&id=<?php echo $_smarty_tpl->getValue('user')['id'];?>
" title="Chỉnh sửa người dùng" style="color:#6366f1; margin-right:10px;"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form method="post" action="/itc_toi-main/index.php?controller=admin&action=delete" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('user')['id'];?>
">
                        <button type="submit" title="Xóa người dùng" style="background:none;border:none;color:#ef4444;cursor:pointer;padding:0;"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php
}
if ($foreach0DoElse) {
?>
            <tr><td colspan="6" style="text-align:center; color:#bbb; padding:18px;">Không có người dùng nào.</td></tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>
<?php
}
}
/* {/block 'content'} */
}
