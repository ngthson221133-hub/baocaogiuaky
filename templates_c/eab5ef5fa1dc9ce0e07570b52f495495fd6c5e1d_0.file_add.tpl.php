<?php
/* Smarty version 5.5.1, created on 2025-07-29 15:19:40
  from 'file:templates/product/add.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888ca6c981172_99980159',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eab5ef5fa1dc9ce0e07570b52f495495fd6c5e1d' => 
    array (
      0 => 'templates/product/add.tpl',
      1 => 1753735850,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888ca6c981172_99980159 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12056618216888ca6c9676e5_12495568', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15714528686888ca6c96fdd7_52805945', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_12056618216888ca6c9676e5_12495568 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
?>
Thêm sản phẩm mới<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_15714528686888ca6c96fdd7_52805945 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\product';
?>

<div class="card" style="max-width:520px;margin:0 auto;">
    <h2 style="color:#22c55e;font-weight:700;margin-bottom:18px;"><i class="fa-solid fa-plus"></i> Thêm sản phẩm mới</h2>
    <?php if ((true && (true && null !== ($_smarty_tpl->getValue('_GET')['msg'] ?? null)))) {?>
        <div style="background:#fef2f2;color:#dc2626;padding:12px;border-radius:8px;margin-bottom:16px;border:1px solid #fecaca;">
            <i class="fa-solid fa-exclamation-triangle"></i> <?php echo $_smarty_tpl->getValue('_GET')['msg'];?>

        </div>
    <?php }?>
    <form method="post" action="/itc_toi-main/index.php?controller=product&action=add" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:16px;">
        <label>Tên sản phẩm <span style="color:#ef4444">*</span></label>
        <input type="text" name="name" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Mô tả</label>
        <textarea name="description" rows="3" style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;"></textarea>

        <label>Giá <span style="color:#ef4444">*</span></label>
        <input type="number" name="price" min="0" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Số lượng <span style="color:#ef4444">*</span></label>
        <input type="number" name="quantity" min="0" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Danh mục <span style="color:#ef4444">*</span></label>
        <select name="category_id" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('cat')['id'];?>
"><?php echo $_smarty_tpl->getValue('cat')['name'];?>
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
                <input type="url" name="image_url" id="image_url" placeholder="Nhập URL ảnh..." style="flex:1;padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
            </div>
            <div style="font-size:0.85em;color:#666;">
                <i class="fa-solid fa-info-circle"></i> 
                Có thể tải ảnh từ máy tính hoặc nhập URL ảnh. Nếu tải ảnh, URL sẽ được tạo tự động.
            </div>
            <div id="image_preview" style="display:none;margin-top:8px;">
                <label style="font-size:0.9em;color:#666;">Xem trước ảnh:</label>
                <img id="preview_img" src="" alt="Preview" style="max-width:200px;max-height:150px;border-radius:6px;border:1px solid #ddd;margin-top:4px;">
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
                    document.getElementById('image_preview').style.display = 'block';
                    document.getElementById('image_url').value = '';
                };
                reader.readAsDataURL(file);
            }
        });
        
        document.getElementById('image_url').addEventListener('input', function(e) {
            if (e.target.value) {
                document.getElementById('preview_img').src = e.target.value;
                document.getElementById('image_preview').style.display = 'block';
                document.getElementById('product_image').value = '';
            } else {
                document.getElementById('image_preview').style.display = 'none';
            }
        });
        <?php echo '</script'; ?>
>

        <div style="display:flex;gap:12px;align-items:center;margin-top:8px;">
            <button type="submit" style="background:#22c55e;color:#fff;border:none;border-radius:8px;padding:10px 28px;font-weight:600;font-size:1.1em;cursor:pointer;box-shadow:0 2px 8px #22c55e22;"><i class="fa-solid fa-plus"></i> Lưu sản phẩm</button>
            <a href="/itc_toi-main/index.php?controller=product&action=index" style="background:#f3f4f6;color:#7c3aed;border:none;border-radius:8px;padding:10px 22px;font-weight:500;text-decoration:none;">Quay lại</a>
        </div>
    </form>
</div>
<?php
}
}
/* {/block 'content'} */
}
