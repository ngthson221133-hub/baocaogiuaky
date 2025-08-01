<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:50:26
  from 'file:templates/product/edit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c3922d08c0_41772232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53afb864ff586703e3ba484911e8cdbf295559c4' => 
    array (
      0 => 'templates/product/edit.tpl',
      1 => 1753783028,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c3922d08c0_41772232 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7992911966888c3922995f0_88065925', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16833170856888c39229f162_93985418', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_7992911966888c3922995f0_88065925 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
?>
Chỉnh sửa sản phẩm<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_16833170856888c39229f162_93985418 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
?>

<div class="card" style="max-width:520px;margin:0 auto;">
    <h2 style="color:#22c55e;font-weight:700;margin-bottom:18px;"><i class="fa-solid fa-edit"></i> Chỉnh sửa sản phẩm</h2>
    <?php if ((true && (true && null !== ($_smarty_tpl->getValue('_GET')['msg'] ?? null)))) {?>
        <div style="background:#fef2f2;color:#dc2626;padding:12px;border-radius:8px;margin-bottom:16px;border:1px solid #fecaca;">
            <i class="fa-solid fa-exclamation-triangle"></i> <?php echo $_smarty_tpl->getValue('_GET')['msg'];?>

        </div>
    <?php }?>
    <form method="post" action="/itc_toi-main/index.php?controller=product&action=edit" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:16px;">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('product')['id'];?>
">
        
        <label>Tên sản phẩm <span style="color:#ef4444">*</span></label>
        <input type="text" name="name" value="<?php echo $_smarty_tpl->getValue('product')['name'];?>
" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Mô tả</label>
        <textarea name="description" rows="3" style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;"><?php echo $_smarty_tpl->getValue('product')['description'];?>
</textarea>

        <label>Giá <span style="color:#ef4444">*</span></label>
        <input type="number" name="price" value="<?php echo $_smarty_tpl->getValue('product')['price'];?>
" min="0" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Số lượng <span style="color:#ef4444">*</span></label>
        <input type="number" name="quantity" value="<?php echo (($tmp = $_smarty_tpl->getValue('product')['quantity'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
" min="0" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
        <div style="font-size:0.85em;color:#666;margin-top:-8px;">
            <i class="fa-solid fa-info-circle"></i> 
            Số lượng hiện tại: <strong><?php echo (($tmp = $_smarty_tpl->getValue('product')['quantity'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</strong> kg
            <?php if ($_smarty_tpl->getValue('product')['quantity'] <= 0) {?>
                <span style="color:#dc2626;">(Hết hàng)</span>
            <?php } elseif ($_smarty_tpl->getValue('product')['quantity'] <= 10) {?>
                <span style="color:#f59e0b;">(Sắp hết hàng)</span>
            <?php } else { ?>
                <span style="color:#22c55e;">(Còn hàng)</span>
            <?php }?>
        </div>

        <label>Danh mục <span style="color:#ef4444">*</span></label>
        <select name="category_id" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('cat')['id'];?>
" <?php if ($_smarty_tpl->getValue('cat')['id'] == $_smarty_tpl->getValue('product')['category_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('cat')['name'];?>
</option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>

        <label>Ảnh sản phẩm <span style="color:#ef4444">*</span></label>
        <div style="display:flex;flex-direction:column;gap:8px;">
            <div style="display:flex;gap:12px;align-items:center;">
                <input type="file" name="product_image" accept="image/*" id="product_image" style="flex:1;padding:8px;border:1px solid #ddd;border-radius:6px;background:#fff;">
                <span style="color:#666;font-size:0.9em;">hoặc</span>
                <input type="url" name="image_url" id="image_url" value="<?php echo $_smarty_tpl->getValue('product')['image_url'];?>
" placeholder="Nhập URL ảnh..." style="flex:1;padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
            </div>
            <div style="font-size:0.85em;color:#666;">
                <i class="fa-solid fa-info-circle"></i> 
                Có thể tải ảnh từ máy tính hoặc nhập URL ảnh. Nếu tải ảnh, URL sẽ được tạo tự động.
            </div>
            <div id="image_preview" style="margin-top:8px;">
                <label style="font-size:0.9em;color:#666;">Xem trước ảnh:</label>
                <img id="preview_img" src="<?php echo $_smarty_tpl->getValue('product')['image_url'];?>
" alt="<?php echo $_smarty_tpl->getValue('product')['name'];?>
" style="max-width:200px;max-height:150px;border-radius:6px;border:1px solid #ddd;margin-top:4px;">
            </div>
        </div>
        
        <?php echo '<script'; ?>
>
        document.getElementById('product_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_img').src = e.target.result;
                    document.getElementById('image_url').value = '';
                };
                reader.readAsDataURL(file);
            }
        });
        
        document.getElementById('image_url').addEventListener('input', function(e) {
            if (e.target.value) {
                document.getElementById('preview_img').src = e.target.value;
                document.getElementById('product_image').value = '';
            }
        });
        <?php echo '</script'; ?>
>

        <div style="display:flex;gap:12px;align-items:center;margin-top:8px;">
            <button type="submit" style="background:#22c55e;color:#fff;border:none;border-radius:8px;padding:10px 28px;font-weight:600;font-size:1.1em;cursor:pointer;box-shadow:0 2px 8px #22c55e22;"><i class="fa-solid fa-save"></i> Lưu thay đổi</button>
            <a href="/itc_toi-main/index.php?controller=product&action=index" style="background:#f3f4f6;color:#7c3aed;border:none;border-radius:8px;padding:10px 22px;font-weight:500;text-decoration:none;">Quay lại</a>
        </div>
    </form>
</div>
<?php
}
}
/* {/block 'content'} */
}
