<?php
/* Smarty version 5.5.1, created on 2025-07-29 15:10:45
  from 'file:templates/promotions/edit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c8556dea81_16446827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c89b008de8724ad7eaee8dfc868bdc8b97ade93' => 
    array (
      0 => 'templates/promotions/edit.tpl',
      1 => 1753777151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c8556dea81_16446827 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\promotions';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13092484476888c8556c5e60_20972577', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2172188016888c8556cc7a4_92115016', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_13092484476888c8556c5e60_20972577 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\promotions';
?>
Sửa mã khuyến mãi<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_2172188016888c8556cc7a4_92115016 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\promotions';
?>

<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;">
        <i class="fa-solid fa-edit"></i> Sửa mã khuyến mãi
    </div>
    
    <form method="post" action="/itc_toi-main/index.php?controller=promotions&action=edit" style="display:grid; gap:16px; max-width:600px;">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('promotion')['id'];?>
">
        
        <div>
            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Mã khuyến mãi <span style="color:#ef4444;">*</span></label>
            <input type="text" name="code" value="<?php echo $_smarty_tpl->getValue('promotion')['code'];?>
" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: SALE20, GIAM50K">
        </div>
        
        <div>
            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Tên khuyến mãi <span style="color:#ef4444;">*</span></label>
            <input type="text" name="name" value="<?php echo $_smarty_tpl->getValue('promotion')['name'];?>
" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: Giảm giá 20% cho đơn hàng đầu tiên">
        </div>
        
        <div>
            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Mô tả</label>
            <textarea name="description" rows="3" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em; resize:vertical;" placeholder="Mô tả chi tiết về khuyến mãi..."><?php echo $_smarty_tpl->getValue('promotion')['description'];?>
</textarea>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Loại giảm giá <span style="color:#ef4444;">*</span></label>
                <select name="discount_type" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;">
                    <option value="percentage" <?php if ($_smarty_tpl->getValue('promotion')['discount_type'] == 'percentage') {?>selected<?php }?>>Phần trăm (%)</option>
                    <option value="fixed" <?php if ($_smarty_tpl->getValue('promotion')['discount_type'] == 'fixed') {?>selected<?php }?>>Số tiền cố định (đ)</option>
                </select>
            </div>
            
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Giá trị giảm <span style="color:#ef4444;">*</span></label>
                <input type="number" name="discount_value" value="<?php echo $_smarty_tpl->getValue('promotion')['discount_value'];?>
" required min="0" step="0.01" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: 20 hoặc 50000">
            </div>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Giá trị đơn hàng tối thiểu</label>
                <input type="number" name="min_order_amount" value="<?php echo $_smarty_tpl->getValue('promotion')['min_order_amount'];?>
" min="0" step="1000" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: 100000">
            </div>
            
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Giảm giá tối đa (cho %)</label>
                <input type="number" name="max_discount" value="<?php echo $_smarty_tpl->getValue('promotion')['max_discount'];?>
" min="0" step="1000" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: 100000">
            </div>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Giới hạn sử dụng</label>
                <input type="number" name="usage_limit" value="<?php echo $_smarty_tpl->getValue('promotion')['usage_limit'];?>
" min="1" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: 100">
            </div>
            
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Trạng thái</label>
                <div style="display:flex; align-items:center; gap:8px; padding:10px 12px; border-radius:8px; border:1px solid #ddd;">
                    <input type="checkbox" name="is_active" value="1" <?php if ($_smarty_tpl->getValue('promotion')['is_active']) {?>checked<?php }?> style="width:18px; height:18px;">
                    <span>Hoạt động</span>
                </div>
            </div>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Ngày bắt đầu <span style="color:#ef4444;">*</span></label>
                <input type="date" name="start_date" value="<?php echo $_smarty_tpl->getValue('promotion')['start_date'];?>
" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;">
            </div>
            
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Ngày kết thúc <span style="color:#ef4444;">*</span></label>
                <input type="date" name="end_date" value="<?php echo $_smarty_tpl->getValue('promotion')['end_date'];?>
" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;">
            </div>
        </div>
        
        <div style="display:flex; gap:12px; margin-top:16px;">
            <button type="submit" style="background:#22c55e; color:#fff; border:none; border-radius:8px; padding:12px 24px; font-weight:600; font-size:1em; cursor:pointer;">
                <i class="fa-solid fa-save"></i> Cập nhật mã khuyến mãi
            </button>
            <a href="/itc_toi-main/index.php?controller=promotions&action=index" style="background:#6b7280; color:#fff; border:none; border-radius:8px; padding:12px 24px; font-weight:600; font-size:1em; text-decoration:none; display:flex; align-items:center;">
                <i class="fa-solid fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </form>
</div>
<?php
}
}
/* {/block 'content'} */
}
