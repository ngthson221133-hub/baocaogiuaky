{extends file="../admin/layout.tpl"}
{block name=title}Chi tiết đơn hàng #{$order_id}{/block}
{block name=content}
<a class="back-link" href="/?c=order&v=index">&larr; Quay lại danh sách đơn hàng</a>
{if $message}
    <div class="message">{$message}</div>
{/if}
<button class="btn btn-add" onclick="showAddForm()">+ Thêm sản phẩm vào đơn</button>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Sản phẩm (ID)</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Số lượng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$order_items item=item}
        <tr>
            <td>{$item.id}</td>
            <td>{$item.product_id}</td>
            <td>{$item.name}</td>
            <td>{$item.description}</td>
            <td>{$item.quantity}</td>
            <td class="actions">
                <button class="btn btn-edit" onclick="showEditForm({$item.id}, '{$item.product_id}', '{$item.name}', '{$item.description}', '{$item.quantity}')">Sửa</button>
                <form method="post" action="/?c=order_items&v=delete&order_id={$order_id}" style="display:inline;">
                    <input type="hidden" name="id" value="{$item.id}">
                    <button class="btn btn-delete" type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>
<!-- Popup Form Thêm -->
<div class="form-popup" id="addForm">
    <div class="form-content">
        <h3>Thêm sản phẩm vào đơn</h3>
        <form method="post" action="/?c=order_items&v=add&order_id={$order_id}">
            <label>Sản phẩm</label>
            <select name="product_id" required>
                <option value="">-- Chọn sản phẩm --</option>
                {foreach from=$products item=prod}
                    <option value="{$prod.id}">[{$prod.id}] {$prod.name}</option>
                {/foreach}
            </select>
            <label>Tên</label>
            <input type="text" name="name" required>
            <label>Mô tả</label>
            <input type="text" name="description">
            <label>Số lượng</label>
            <input type="number" name="quantity" required>
            <button class="btn btn-add" type="submit">Thêm</button>
            <button class="btn" type="button" onclick="closeAddForm()">Hủy</button>
        </form>
    </div>
</div>
<!-- Popup Form Sửa -->
<div class="form-popup" id="editForm">
    <div class="form-content">
        <h3>Sửa sản phẩm trong đơn</h3>
        <form method="post" action="/?c=order_items&v=edit&order_id={$order_id}">
            <input type="hidden" name="id" id="edit_id">
            <label>Sản phẩm</label>
            <select name="product_id" id="edit_product_id" required>
                <option value="">-- Chọn sản phẩm --</option>
                {foreach from=$products item=prod}
                    <option value="{$prod.id}">[{$prod.id}] {$prod.name}</option>
                {/foreach}
            </select>
            <label>Tên</label>
            <input type="text" name="name" id="edit_name" required>
            <label>Mô tả</label>
            <input type="text" name="description" id="edit_description">
            <label>Số lượng</label>
            <input type="number" name="quantity" id="edit_quantity" required>
            <button class="btn btn-edit" type="submit">Lưu</button>
            <button class="btn" type="button" onclick="closeEditForm()">Hủy</button>
        </form>
    </div>
</div>
<script>
function showAddForm() {
    document.getElementById('addForm').style.display = 'flex';
}
function closeAddForm() {
    document.getElementById('addForm').style.display = 'none';
}
function showEditForm(id, product_id, name, description, quantity) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_product_id').value = product_id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_quantity').value = quantity;
    document.getElementById('editForm').style.display = 'flex';
}
function closeEditForm() {
    document.getElementById('editForm').style.display = 'none';
}
</script>
{/block} 