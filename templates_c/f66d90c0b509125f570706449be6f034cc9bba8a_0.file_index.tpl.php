<?php
/* Smarty version 5.5.1, created on 2025-08-16 04:00:41
  from 'file:templates/promotions/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_689fe649b1f5b3_74197423',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f66d90c0b509125f570706449be6f034cc9bba8a' => 
    array (
      0 => 'templates/promotions/index.tpl',
      1 => 1755309639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_689fe649b1f5b3_74197423 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\promotions';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2003467240689fe649b00963_81002586', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1406353045689fe649b08a86_61166658', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_2003467240689fe649b00963_81002586 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\promotions';
?>
Quản lý mã khuyến mãi<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_1406353045689fe649b08a86_61166658 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\promotions';
?>

<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;">
        <i class="fa-solid fa-tags"></i> Quản lý mã khuyến mãi
    </div>
    
    <form method="get" style="display:flex; gap:12px; margin-bottom:18px;">
        <input type="hidden" name="controller" value="promotions">
        <input type="hidden" name="action" value="index">
        <input type="text" name="q" value="<?php echo (($tmp = $_smarty_tpl->getValue('search') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" placeholder="Tìm kiếm mã khuyến mãi..." style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; min-width:200px;">
        <button type="submit" style="background:#2563eb; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; cursor:pointer;">
            <i class="fa-solid fa-search"></i> Tìm kiếm
        </button>
        <a href="/itc_toi-main/index.php?controller=promotions&action=add" style="background:#22c55e; color:#fff; border:none; border-radius:6px; padding:8px 18px; font-weight:500; text-decoration:none; margin-left:auto;">
            <i class="fa-solid fa-plus"></i> Thêm mã khuyến mãi
        </a>
    </form>

    <?php if ($_smarty_tpl->getValue('message')) {?>
        <div style="background:#dcfce7; color:#166534; padding:12px; border-radius:8px; margin-bottom:16px; border:1px solid #bbf7d0;">
            <i class="fa-solid fa-check-circle"></i> <?php echo $_smarty_tpl->getValue('message');?>

        </div>
    <?php }?>

    <?php if ($_smarty_tpl->getValue('error')) {?>
        <div style="background:#fef2f2; color:#dc2626; padding:12px; border-radius:8px; margin-bottom:16px; border:1px solid #fecaca;">
            <i class="fa-solid fa-exclamation-triangle"></i> Có lỗi xảy ra!
        </div>
    <?php }?>

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
                <?php if ($_smarty_tpl->getValue('promotions')) {?>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('promotions'), 'promotion');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('promotion')->value) {
$foreach0DoElse = false;
?>
                        <tr style="border-bottom:1px solid #f1f5f9;">
                            <td style="padding:12px; font-weight:600; color:#1f2937;"><?php echo $_smarty_tpl->getValue('promotion')['code'];?>
</td>
                            <td style="padding:12px;"><?php echo $_smarty_tpl->getValue('promotion')['name'];?>
</td>
                            <td style="padding:12px;">
                                <?php if ($_smarty_tpl->getValue('promotion')['discount_type'] == 'percentage') {?>
                                    <span style="background:#dbeafe; color:#1e40af; padding:4px 8px; border-radius:4px; font-size:0.85em;">Phần trăm</span>
                                <?php } else { ?>
                                    <span style="background:#fef3c7; color:#92400e; padding:4px 8px; border-radius:4px; font-size:0.85em;">Cố định</span>
                                <?php }?>
                            </td>
                            <td style="padding:12px; font-weight:600; color:#059669;">
                                <?php if ($_smarty_tpl->getValue('promotion')['discount_type'] == 'percentage') {?>
                                    <?php echo $_smarty_tpl->getValue('promotion')['discount_value'];?>
%
                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('promotion')['discount_value'],0);?>
đ
                                <?php }?>
                            </td>
                            <td style="padding:12px;"><?php echo (($tmp = $_smarty_tpl->getValue('promotion')['used_count'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</td>
                            <td style="padding:12px;">
                                <?php if ($_smarty_tpl->getValue('promotion')['is_active']) {?>
                                    <span style="background:#dcfce7; color:#166534; padding:4px 8px; border-radius:4px; font-size:0.85em;">Hoạt động</span>
                                <?php } else { ?>
                                    <span style="background:#fef2f2; color:#dc2626; padding:4px 8px; border-radius:4px; font-size:0.85em;">Tạm dừng</span>
                                <?php }?>
                            </td>
                            <td style="padding:12px;">
                                <div style="display:flex; gap:8px;">
                                    <a href="/itc_toi-main/index.php?controller=promotions&action=edit&id=<?php echo $_smarty_tpl->getValue('promotion')['id'];?>
" style="background:#3b82f6; color:#fff; padding:6px 12px; border-radius:4px; text-decoration:none; font-size:0.85em;">
                                        <i class="fa-solid fa-edit"></i> Sửa
                                    </a>
                                    <form method="post" action="/itc_toi-main/index.php?controller=promotions&action=delete" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xóa mã khuyến mãi này?')">
                                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('promotion')['id'];?>
">
                                        <button type="submit" style="background:#ef4444; color:#fff; border:none; padding:6px 12px; border-radius:4px; font-size:0.85em; cursor:pointer;">
                                            <i class="fa-solid fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7" style="padding:40px; text-align:center; color:#6b7280;">
                            <i class="fa-solid fa-tags" style="font-size:2em; margin-bottom:16px; display:block;"></i>
                            Chưa có mã khuyến mãi nào
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
