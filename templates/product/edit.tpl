{extends file="../layout.tpl"}
{block name=title}Chỉnh sửa sản phẩm{/block}
{block name=content}
<div class="card" style="max-width:520px;margin:0 auto;">
    <h2 style="color:#22c55e;font-weight:700;margin-bottom:18px;"><i class="fa-solid fa-edit"></i> Chỉnh sửa sản phẩm</h2>
    {if isset($_GET.msg)}
        <div style="background:#fef2f2;color:#dc2626;padding:12px;border-radius:8px;margin-bottom:16px;border:1px solid #fecaca;">
            <i class="fa-solid fa-exclamation-triangle"></i> {$_GET.msg}
        </div>
    {/if}
    <form method="post" action="/itc_toi-main/index.php?controller=product&action=edit" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:16px;">
        <input type="hidden" name="id" value="{$product.id}">
        
        <label>Tên sản phẩm <span style="color:#ef4444">*</span></label>
        <input type="text" name="name" value="{$product.name}" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Mô tả</label>
        <textarea name="description" rows="3" style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">{$product.description}</textarea>

        <label>Giá <span style="color:#ef4444">*</span></label>
        <input type="number" name="price" value="{$product.price}" min="0" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">

        <label>Số lượng <span style="color:#ef4444">*</span></label>
        <input type="number" name="quantity" value="{$product.quantity|default:0}" min="0" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
        <div style="font-size:0.85em;color:#666;margin-top:-8px;">
            <i class="fa-solid fa-info-circle"></i> 
            Số lượng hiện tại: <strong>{$product.quantity|default:0}</strong> kg
            {if $product.quantity <= 0}
                <span style="color:#dc2626;">(Hết hàng)</span>
            {elseif $product.quantity <= 10}
                <span style="color:#f59e0b;">(Sắp hết hàng)</span>
            {else}
                <span style="color:#22c55e;">(Còn hàng)</span>
            {/if}
        </div>

        <label>Danh mục <span style="color:#ef4444">*</span></label>
        <select name="category_id" required style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
            {foreach from=$categories item=cat}
                <option value="{$cat.id}" {if $cat.id == $product.category_id}selected{/if}>{$cat.name}</option>
            {/foreach}
        </select>

        <label>Ảnh sản phẩm <span style="color:#ef4444">*</span></label>
        <div style="display:flex;flex-direction:column;gap:8px;">
            <div style="display:flex;gap:12px;align-items:center;">
                <input type="file" name="product_image" accept="image/*" id="product_image" style="flex:1;padding:8px;border:1px solid #ddd;border-radius:6px;background:#fff;">
                <span style="color:#666;font-size:0.9em;">hoặc</span>
                <input type="url" name="image_url" id="image_url" value="{$product.image_url}" placeholder="Nhập URL ảnh..." style="flex:1;padding:10px 12px;border-radius:8px;border:1px solid #ddd;">
            </div>
            <div style="font-size:0.85em;color:#666;">
                <i class="fa-solid fa-info-circle"></i> 
                Có thể tải ảnh từ máy tính hoặc nhập URL ảnh. Nếu tải ảnh, URL sẽ được tạo tự động.
            </div>
            <div id="image_preview" style="margin-top:8px;">
                <label style="font-size:0.9em;color:#666;">Xem trước ảnh:</label>
                <img id="preview_img" src="{$product.image_url}" alt="{$product.name}" style="max-width:200px;max-height:150px;border-radius:6px;border:1px solid #ddd;margin-top:4px;">
            </div>
        </div>
        
        <script>
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
        </script>

        <div style="display:flex;gap:12px;align-items:center;margin-top:8px;">
            <button type="submit" style="background:#22c55e;color:#fff;border:none;border-radius:8px;padding:10px 28px;font-weight:600;font-size:1.1em;cursor:pointer;box-shadow:0 2px 8px #22c55e22;"><i class="fa-solid fa-save"></i> Lưu thay đổi</button>
            <a href="/itc_toi-main/index.php?controller=product&action=index" style="background:#f3f4f6;color:#7c3aed;border:none;border-radius:8px;padding:10px 22px;font-weight:500;text-decoration:none;">Quay lại</a>
        </div>
    </form>
</div>
{/block} 