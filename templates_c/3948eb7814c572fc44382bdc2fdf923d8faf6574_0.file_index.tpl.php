<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:50:21
  from 'file:templates/product/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c38da245a7_72832432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3948eb7814c572fc44382bdc2fdf923d8faf6574' => 
    array (
      0 => 'templates/product/index.tpl',
      1 => 1753783116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c38da245a7_72832432 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7431259746888c38d9fcd12_46670842', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15592123516888c38da00615_15983177', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_7431259746888c38d9fcd12_46670842 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
?>
Quản lý sản phẩm<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_15592123516888c38da00615_15983177 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
?>

<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;"><i class="fa-solid fa-box"></i> Quản lý sản phẩm</div>
    <form method="get" style="display:flex; gap:12px; margin-bottom:18px;">
        <input type="hidden" name="controller" value="product">
        <input type="hidden" name="action" value="index">
        <input type="text" name="q" value="<?php echo (($tmp = $_smarty_tpl->getValue('q') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" placeholder="Tìm kiếm sản phẩm..." style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; min-width:180px;">
        <input type="number" name="price_from" value="<?php echo (($tmp = $_smarty_tpl->getValue('price_from') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" placeholder="Giá từ" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; width:100px;">
        <input type="number" name="price_to" value="<?php echo (($tmp = $_smarty_tpl->getValue('price_to') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" placeholder="Giá đến" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; width:100px;">
        <input type="number" name="category_id" value="<?php echo (($tmp = $_smarty_tpl->getValue('category_id') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" placeholder="ID danh mục" style="padding:8px 12px; border-radius:6px; border:1px solid #ddd; width:120px;">
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
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'prod');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prod')->value) {
$foreach0DoElse = false;
?>
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px 6px;"><?php echo $_smarty_tpl->getValue('prod')['id'];?>
</td>
                <td style="padding:8px 6px;"><?php echo $_smarty_tpl->getValue('prod')['name'];?>
</td>
                <td style="padding:8px 6px;"><?php echo $_smarty_tpl->getValue('prod')['description'];?>
</td>
                <td style="padding:8px 6px;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('prod')['price'],0,",",".");?>
 đ</td>
                <td style="padding:8px 6px;">
                    <strong><?php echo (($tmp = $_smarty_tpl->getValue('prod')['quantity'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</strong> kg
                </td>
                <td style="padding:8px 6px;">
                    <?php if ($_smarty_tpl->getValue('prod')['quantity'] <= 0) {?>
                        <span style="background:#fee2e2; color:#dc2626; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Hết hàng</span>
                    <?php } elseif ($_smarty_tpl->getValue('prod')['quantity'] <= 10) {?>
                        <span style="background:#fef3c7; color:#d97706; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Sắp hết</span>
                    <?php } else { ?>
                        <span style="background:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Còn hàng</span>
                    <?php }?>
                </td>
                <td style="padding:8px 6px;"><?php echo $_smarty_tpl->getValue('prod')['category_id'];?>
</td>
                <td style="padding:8px 6px;">
                    <a href="/itc_toi-main/index.php?controller=product&action=edit&id=<?php echo $_smarty_tpl->getValue('prod')['id'];?>
" style="color:#f59e42; margin-right:8px;"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/itc_toi-main/index.php?controller=product&action=delete&id=<?php echo $_smarty_tpl->getValue('prod')['id'];?>
" style="color:#ef4444;" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        <?php
}
if ($foreach0DoElse) {
?>
            <tr><td colspan="8" style="text-align:center; color:#bbb; padding:18px;">Không có sản phẩm nào.</td></tr>
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
