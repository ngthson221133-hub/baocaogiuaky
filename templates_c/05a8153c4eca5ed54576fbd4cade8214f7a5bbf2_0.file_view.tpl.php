<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:50:06
  from 'file:templates/orders_admin/view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c37e0be2d4_93956882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05a8153c4eca5ed54576fbd4cade8214f7a5bbf2' => 
    array (
      0 => 'templates/orders_admin/view.tpl',
      1 => 1753774787,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c37e0be2d4_93956882 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\orders_admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11545863136888c37e089780_29063018', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17420065436888c37e08e081_66588238', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_11545863136888c37e089780_29063018 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\orders_admin';
?>
Chi tiết đơn hàng #<?php echo $_smarty_tpl->getValue('order')['id'];
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_17420065436888c37e08e081_66588238 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\orders_admin';
?>

<div style="padding:20px;">
    <div style="display:flex;align-items:center;gap:15px;margin-bottom:30px;">
        <a href="/itc_toi-main/index.php?controller=orders_admin&action=index" style="padding:8px 16px;background:#6b7280;color:white;text-decoration:none;border-radius:6px;font-weight:500;" onmouseover="this.style.background='#4b5563'" onmouseout="this.style.background='#6b7280'">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
        <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin:0;">
            <i class="fas fa-receipt"></i> Đơn hàng #<?php echo $_smarty_tpl->getValue('order')['id'];?>

        </h1>
    </div>
    
    <div style="display:grid;grid-template-columns:2fr 1fr;gap:30px;">
        <!-- Thông tin đơn hàng -->
        <div style="background:#fff;padding:30px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
            <h2 style="font-size:1.8em;font-weight:600;color:#1f2937;margin-bottom:25px;">
                <i class="fas fa-info-circle"></i> Thông tin đơn hàng
            </h2>
            
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:30px;">
                <div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Mã đơn hàng:</span>
                        <span style="color:#22c55e;font-weight:600;font-size:1.1em;">#<?php echo $_smarty_tpl->getValue('order')['id'];?>
</span>
                    </div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Ngày đặt:</span>
                        <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('order')['created_at'],'%d/%m/%Y %H:%M');?>
</span>
                    </div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Trạng thái:</span>
                        <span id="orderStatus">
                            <?php if ($_smarty_tpl->getValue('order')['status'] == 'pending') {?>
                                <span style="padding:4px 8px;background:#fef3c7;color:#92400e;border-radius:4px;font-size:0.9em;font-weight:500;">Chờ xử lý</span>
                            <?php } elseif ($_smarty_tpl->getValue('order')['status'] == 'confirmed') {?>
                                <span style="padding:4px 8px;background:#dbeafe;color:#1e40af;border-radius:4px;font-size:0.9em;font-weight:500;">Đã xác nhận</span>
                            <?php } elseif ($_smarty_tpl->getValue('order')['status'] == 'shipped') {?>
                                <span style="padding:4px 8px;background:#e9d5ff;color:#7c3aed;border-radius:4px;font-size:0.9em;font-weight:500;">Đang giao</span>
                            <?php } elseif ($_smarty_tpl->getValue('order')['status'] == 'delivered') {?>
                                <span style="padding:4px 8px;background:#dcfce7;color:#166534;border-radius:4px;font-size:0.9em;font-weight:500;">Đã giao</span>
                            <?php } elseif ($_smarty_tpl->getValue('order')['status'] == 'cancelled') {?>
                                <span style="padding:4px 8px;background:#fee2e2;color:#991b1b;border-radius:4px;font-size:0.9em;font-weight:500;">Đã hủy</span>
                            <?php }?>
                        </span>
                    </div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Phương thức thanh toán:</span>
                        <span>
                            <?php if ($_smarty_tpl->getValue('order')['payment_method'] == 'cod') {?>
                                Thanh toán khi nhận hàng
                            <?php } elseif ($_smarty_tpl->getValue('order')['payment_method'] == 'bank_transfer') {?>
                                Chuyển khoản ngân hàng
                            <?php } else { ?>
                                Thanh toán trực tuyến
                            <?php }?>
                        </span>
                    </div>
                </div>
                <div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Tổng tiền:</span>
                        <span style="color:#22c55e;font-weight:600;font-size:1.2em;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('order')['total_amount'],0,",",".");?>
đ</span>
                    </div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Cập nhật lần cuối:</span>
                        <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('order')['updated_at'],'%d/%m/%Y %H:%M');?>
</span>
                    </div>
                    <?php if ($_smarty_tpl->getValue('order')['notes']) {?>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Ghi chú:</span>
                        <div style="color:#6b7280;margin-top:5px;"><?php echo $_smarty_tpl->getValue('order')['notes'];?>
</div>
                    </div>
                    <?php }?>
                </div>
            </div>
            
            <!-- Thông tin khách hàng -->
            <h3 style="font-size:1.4em;font-weight:600;color:#1f2937;margin-bottom:20px;">
                <i class="fas fa-user"></i> Thông tin khách hàng
            </h3>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:30px;">
                <div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Họ và tên:</span>
                        <span><?php if ($_smarty_tpl->getValue('order')['username']) {
echo $_smarty_tpl->getValue('order')['username'];
} else {
echo $_smarty_tpl->getValue('order')['guest_name'];
}?></span>
                    </div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Email:</span>
                        <span><?php if ($_smarty_tpl->getValue('order')['user_email']) {
echo $_smarty_tpl->getValue('order')['user_email'];
} else {
echo $_smarty_tpl->getValue('order')['guest_email'];
}?></span>
                    </div>
                </div>
                <div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Số điện thoại:</span>
                        <span><?php echo $_smarty_tpl->getValue('order')['guest_phone'];?>
</span>
                    </div>
                    <div style="margin-bottom:15px;">
                        <span style="font-weight:600;color:#374151;">Địa chỉ giao hàng:</span>
                        <div style="color:#6b7280;margin-top:5px;"><?php echo $_smarty_tpl->getValue('order')['shipping_address'];?>
</div>
                    </div>
                </div>
            </div>
            
            <!-- Chi tiết sản phẩm -->
            <h3 style="font-size:1.4em;font-weight:600;color:#1f2937;margin-bottom:20px;">
                <i class="fas fa-shopping-bag"></i> Chi tiết sản phẩm
            </h3>
            <?php if ($_smarty_tpl->getValue('items')) {?>
                <div style="border:1px solid #e5e7eb;border-radius:8px;overflow:hidden;">
                    <table style="width:100%;border-collapse:collapse;">
                        <thead style="background:#f9fafb;">
                            <tr>
                                <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Sản phẩm</th>
                                <th style="padding:15px;text-align:center;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Số lượng</th>
                                <th style="padding:15px;text-align:right;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Đơn giá</th>
                                <th style="padding:15px;text-align:right;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('items'), 'item');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
                            <tr style="border-bottom:1px solid #f3f4f6;">
                                <td style="padding:15px;">
                                    <div style="display:flex;align-items:center;gap:10px;">
                                        <div style="width:40px;height:40px;overflow:hidden;border-radius:6px;background:#f3f4f6;display:flex;align-items:center;justify-content:center;">
                                            <?php if ($_smarty_tpl->getValue('item')['image_url']) {?>
                                                <img src="<?php echo $_smarty_tpl->getValue('item')['image_url'];?>
" alt="<?php echo $_smarty_tpl->getValue('item')['product_name'];?>
" style="width:100%;height:100%;object-fit:cover;" onerror="this.style.display='none';this.parentElement.innerHTML='<i class=\'fas fa-image\' style=\'font-size:16px;color:#9ca3af;\'></i>'">
                                            <?php } else { ?>
                                                <i class="fas fa-image" style="font-size:16px;color:#9ca3af;"></i>
                                            <?php }?>
                                        </div>
                                        <div>
                                            <div style="font-weight:600;color:#1f2937;"><?php echo $_smarty_tpl->getValue('item')['product_name'];?>
</div>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding:15px;text-align:center;"><?php echo $_smarty_tpl->getValue('item')['quantity'];?>
</td>
                                <td style="padding:15px;text-align:right;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('item')['product_price'],0,",",".");?>
đ</td>
                                <td style="padding:15px;text-align:right;font-weight:600;color:#22c55e;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('item')['subtotal'],0,",",".");?>
đ</td>
                            </tr>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div style="text-align:center;padding:20px;color:#6b7280;">
                    <i class="fas fa-shopping-bag" style="font-size:2em;margin-bottom:10px;color:#d1d5db;"></i>
                    <p>Không có sản phẩm nào</p>
                </div>
            <?php }?>
        </div>
        
        <!-- Cập nhật trạng thái -->
        <div style="background:#fff;padding:30px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);height:fit-content;">
            <h3 style="font-size:1.4em;font-weight:600;color:#1f2937;margin-bottom:20px;">
                <i class="fas fa-edit"></i> Cập nhật trạng thái
            </h3>
            
            <div style="margin-bottom:20px;">
                <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">Trạng thái hiện tại:</label>
                <select id="orderStatusSelect" style="width:100%;padding:12px;border:2px solid #e5e7eb;border-radius:8px;font-size:1em;">
                    <option value="pending" <?php if ($_smarty_tpl->getValue('order')['status'] == 'pending') {?>selected<?php }?>>Chờ xử lý</option>
                    <option value="confirmed" <?php if ($_smarty_tpl->getValue('order')['status'] == 'confirmed') {?>selected<?php }?>>Đã xác nhận</option>
                    <option value="shipped" <?php if ($_smarty_tpl->getValue('order')['status'] == 'shipped') {?>selected<?php }?>>Đang giao</option>
                    <option value="delivered" <?php if ($_smarty_tpl->getValue('order')['status'] == 'delivered') {?>selected<?php }?>>Đã giao</option>
                    <option value="cancelled" <?php if ($_smarty_tpl->getValue('order')['status'] == 'cancelled') {?>selected<?php }?>>Đã hủy</option>
                </select>
            </div>
            
            <button onclick="updateOrderStatus()" style="width:100%;padding:12px;background:#22c55e;color:white;border:none;border-radius:8px;font-size:1em;font-weight:600;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
                <i class="fas fa-save"></i> Cập nhật trạng thái
            </button>
            
            <div style="margin-top:20px;padding:15px;background:#f0f9ff;border-radius:8px;border-left:4px solid #3b82f6;">
                <div style="font-weight:600;color:#1e40af;margin-bottom:5px;">
                    <i class="fas fa-info-circle"></i> Hướng dẫn
                </div>
                <div style="color:#1e40af;font-size:0.9em;">
                    • <strong>Chờ xử lý:</strong> Đơn hàng mới được đặt<br>
                    • <strong>Đã xác nhận:</strong> Đã xác nhận và chuẩn bị giao<br>
                    • <strong>Đang giao:</strong> Đang vận chuyển đến khách<br>
                    • <strong>Đã giao:</strong> Khách đã nhận hàng<br>
                    • <strong>Đã hủy:</strong> Đơn hàng bị hủy
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
function updateOrderStatus() {
    const status = document.getElementById('orderStatusSelect').value;
    
    if (!confirm('Bạn có chắc muốn cập nhật trạng thái đơn hàng này?')) {
        return;
    }
    
    fetch('/itc_toi-main/index.php?controller=orders_admin&action=updateStatus', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'order_id=<?php echo $_smarty_tpl->getValue('order')['id'];?>
&status=' + status
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            
            // Cập nhật hiển thị trạng thái
            const statusElement = document.getElementById('orderStatus');
            let statusText = '';
            let statusClass = '';
            
            switch(status) {
                case 'pending':
                    statusText = 'Chờ xử lý';
                    statusClass = 'padding:4px 8px;background:#fef3c7;color:#92400e;border-radius:4px;font-size:0.9em;font-weight:500;';
                    break;
                case 'confirmed':
                    statusText = 'Đã xác nhận';
                    statusClass = 'padding:4px 8px;background:#dbeafe;color:#1e40af;border-radius:4px;font-size:0.9em;font-weight:500;';
                    break;
                case 'shipped':
                    statusText = 'Đang giao';
                    statusClass = 'padding:4px 8px;background:#e9d5ff;color:#7c3aed;border-radius:4px;font-size:0.9em;font-weight:500;';
                    break;
                case 'delivered':
                    statusText = 'Đã giao';
                    statusClass = 'padding:4px 8px;background:#dcfce7;color:#166534;border-radius:4px;font-size:0.9em;font-weight:500;';
                    break;
                case 'cancelled':
                    statusText = 'Đã hủy';
                    statusClass = 'padding:4px 8px;background:#fee2e2;color:#991b1b;border-radius:4px;font-size:0.9em;font-weight:500;';
                    break;
            }
            
            statusElement.innerHTML = '<span style="' + statusClass + '">' + statusText + '</span>';
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi cập nhật trạng thái');
    });
}
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
}
