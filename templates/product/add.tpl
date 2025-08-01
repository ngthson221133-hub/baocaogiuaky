{extends file="../layout.tpl"}
{block name=title}Thêm sản phẩm mới{/block}
{block name=content}
<div class="card" style="max-width:520px;margin:0 auto;">
    <h2 style="color:#22c55e;font-weight:700;margin-bottom:18px;"><i class="fa-solid fa-plus"></i> Thêm sản phẩm mới</h2>
    {if isset($_GET.msg)}
        <div style="background:#fef2f2;color:#dc2626;padding:12px;border-radius:8px;margin-bottom:16px;border:1px solid #fecaca;">
            <i class="fa-solid fa-exclamation-triangle"></i> {$_GET.msg}
        </div>
    {/if}
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
            {foreach from=$categories item=cat}
                <option value="{$cat.id}">{$cat.name}</option>
            {/foreach}
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
        
        <script>
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
        </script>

        <div style="display:flex;gap:12px;align-items:center;margin-top:8px;">
            <button type="submit" style="background:#22c55e;color:#fff;border:none;border-radius:8px;padding:10px 28px;font-weight:600;font-size:1.1em;cursor:pointer;box-shadow:0 2px 8px #22c55e22;"><i class="fa-solid fa-plus"></i> Lưu sản phẩm</button>
            <a href="/itc_toi-main/index.php?controller=product&action=index" style="background:#f3f4f6;color:#7c3aed;border:none;border-radius:8px;padding:10px 22px;font-weight:500;text-decoration:none;">Quay lại</a>
        </div>
    </form>
</div>
{/block} 