{extends file="../layout.tpl"}
{block name=title}Thêm mã khuyến mãi{/block}
{block name=content}
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.3em; font-weight:600; color:#2563eb; margin-bottom:18px;">
        <i class="fa-solid fa-plus"></i> Thêm mã khuyến mãi mới
    </div>
    
    <form method="post" action="/itc_toi-main/index.php?controller=promotions&action=add" style="display:grid; gap:16px; max-width:600px;">
        <div>
            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Mã khuyến mãi <span style="color:#ef4444;">*</span></label>
            <input type="text" name="code" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: SALE20, GIAM50K">
        </div>
        
        <div>
            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Tên khuyến mãi <span style="color:#ef4444;">*</span></label>
            <input type="text" name="name" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: Giảm giá 20% cho đơn hàng đầu tiên">
        </div>
        
        <div>
            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Mô tả</label>
            <textarea name="description" rows="3" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em; resize:vertical;" placeholder="Mô tả chi tiết về khuyến mãi..."></textarea>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Loại giảm giá <span style="color:#ef4444;">*</span></label>
                <select name="discount_type" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;">
                    <option value="percentage">Phần trăm (%)</option>
                    <option value="fixed">Số tiền cố định (đ)</option>
                </select>
            </div>
            
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Giá trị giảm <span style="color:#ef4444;">*</span></label>
                <input type="number" name="discount_value" required min="0" step="0.01" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: 20 hoặc 50000">
            </div>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Giá trị đơn hàng tối thiểu</label>
                <input type="number" name="min_order_amount" min="0" step="1000" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: 100000">
            </div>
            
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Giảm giá tối đa (cho %)</label>
                <input type="number" name="max_discount" min="0" step="1000" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: 100000">
            </div>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Giới hạn sử dụng</label>
                <input type="number" name="usage_limit" min="1" style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;" placeholder="VD: 100">
            </div>
            
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Trạng thái</label>
                <div style="display:flex; align-items:center; gap:8px; padding:10px 12px; border-radius:8px; border:1px solid #ddd;">
                    <input type="checkbox" name="is_active" value="1" checked style="width:18px; height:18px;">
                    <span>Hoạt động</span>
                </div>
            </div>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Ngày bắt đầu <span style="color:#ef4444;">*</span></label>
                <input type="date" name="start_date" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;">
            </div>
            
            <div>
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151;">Ngày kết thúc <span style="color:#ef4444;">*</span></label>
                <input type="date" name="end_date" required style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ddd; font-size:1em;">
            </div>
        </div>
        
        <div style="display:flex; gap:12px; margin-top:16px;">
            <button type="submit" style="background:#22c55e; color:#fff; border:none; border-radius:8px; padding:12px 24px; font-weight:600; font-size:1em; cursor:pointer;">
                <i class="fa-solid fa-save"></i> Lưu mã khuyến mãi
            </button>
            <a href="/itc_toi-main/index.php?controller=promotions&action=index" style="background:#6b7280; color:#fff; border:none; border-radius:8px; padding:12px 24px; font-weight:600; font-size:1em; text-decoration:none; display:flex; align-items:center;">
                <i class="fa-solid fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </form>
</div>

<script>
// Tự động set ngày bắt đầu là hôm nay
document.querySelector('input[name="start_date"]').value = new Date().toISOString().split('T')[0];

// Tự động set ngày kết thúc là 30 ngày sau
const endDate = new Date();
endDate.setDate(endDate.getDate() + 30);
document.querySelector('input[name="end_date"]').value = endDate.toISOString().split('T')[0];
</script>
{/block} 