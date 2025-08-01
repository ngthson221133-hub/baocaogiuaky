<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:43:57
  from 'file:templates/bank_transfer/admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c20daccd95_91150491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9a37209f5c922b3e2866a1ac734666da4538e1d' => 
    array (
      0 => 'templates/bank_transfer/admin.tpl',
      1 => 1753789671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c20daccd95_91150491 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15823841796888c20da64640_14383860', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16002300196888c20da6dbf7_98689226', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_15823841796888c20da64640_14383860 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
?>
Quản lý chuyển khoản<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_16002300196888c20da6dbf7_98689226 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
?>

<div style="max-width:1200px; margin:0 auto; padding:20px;">
    <div style="background:#fff; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:32px;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px;">
            <div>
                <h1 style="color:#1f2937; font-size:1.8em; font-weight:700; margin:0 0 8px;">
                    <i class="fa-solid fa-university"></i> Quản lý chuyển khoản
                </h1>
                <p style="color:#6b7280; margin:0;">Danh sách các giao dịch chuyển khoản</p>
            </div>
            <div style="display:flex; gap:12px;">
                <button onclick="refreshList()" style="background:#2563eb; color:#fff; border:none; border-radius:8px; padding:12px 20px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px;">
                    <i class="fa-solid fa-refresh"></i> Làm mới
                </button>
            </div>
        </div>

        <!-- Thống kê -->
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:20px; margin-bottom:32px;">
            <div style="background:#f0f9ff; border:2px solid #bae6fd; border-radius:12px; padding:20px; text-align:center;">
                <div style="color:#0369a1; font-size:2em; font-weight:700; margin-bottom:8px;" id="pending-count"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('pending_transfers'));?>
</div>
                <div style="color:#0369a1; font-weight:600;">Chờ thanh toán</div>
            </div>
            <div style="background:#f0fdf4; border:2px solid #bbf7d0; border-radius:12px; padding:20px; text-align:center;">
                <div style="color:#16a34a; font-size:2em; font-weight:700; margin-bottom:8px;" id="paid-count"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('paid_transfers'));?>
</div>
                <div style="color:#16a34a; font-weight:600;">Đã thanh toán</div>
            </div>
            <div style="background:#fef3c7; border:2px solid #fde68a; border-radius:12px; padding:20px; text-align:center;">
                <div style="color:#d97706; font-size:2em; font-weight:700; margin-bottom:8px;" id="expired-count"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('expired_transfers'));?>
</div>
                <div style="color:#d97706; font-weight:600;">Hết hạn</div>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <div style="margin-bottom:24px;">
            <div style="display:flex; gap:2px; background:#e5e7eb; border-radius:8px; padding:4px;">
                <button onclick="showTab('all')" id="tab-all" class="tab-button active" style="flex:1; background:#fff; border:none; border-radius:6px; padding:12px 16px; font-weight:600; color:#374151; cursor:pointer;">
                    Tất cả (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('all_transfers'));?>
)
                </button>
                <button onclick="showTab('pending')" id="tab-pending" class="tab-button" style="flex:1; background:transparent; border:none; border-radius:6px; padding:12px 16px; font-weight:600; color:#6b7280; cursor:pointer;">
                    Chờ xử lý (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('pending_transfers'));?>
)
                </button>
                <button onclick="showTab('paid')" id="tab-paid" class="tab-button" style="flex:1; background:transparent; border:none; border-radius:6px; padding:12px 16px; font-weight:600; color:#6b7280; cursor:pointer;">
                    Đã thanh toán (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('paid_transfers'));?>
)
                </button>
            </div>
        </div>

        <!-- Tab Content - Tất cả -->
        <div id="tab-content-all" class="tab-content" style="background:#f8fafc; border-radius:12px; padding:24px;">
            <h3 style="color:#1f2937; font-size:1.3em; font-weight:600; margin:0 0 20px;">
                <i class="fa-solid fa-list"></i> Tất cả giao dịch chuyển khoản
            </h3>
            
            <?php if ($_smarty_tpl->getValue('all_transfers')) {?>
                <div style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse;">
                        <thead>
                            <tr style="background:#e2e8f0; border-bottom:2px solid #cbd5e1;">
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">ID</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Đơn hàng</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Khách hàng</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Số tiền</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Nội dung</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Trạng thái</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Hết hạn</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('all_transfers'), 'transfer');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('transfer')->value) {
$foreach0DoElse = false;
?>
                            <tr style="border-bottom:1px solid #e2e8f0;">
                                <td style="padding:12px 8px; font-weight:600; color:#1f2937;">#<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
</td>
                                <td style="padding:12px 8px; color:#374151;">
                                    <a href="/itc_toi-main/index.php?controller=orders_admin&action=detail&id=<?php echo $_smarty_tpl->getValue('transfer')['order_id'];?>
" style="color:#2563eb; text-decoration:none; font-weight:500;">
                                        #<?php echo $_smarty_tpl->getValue('transfer')['order_id'];?>

                                    </a>
                                </td>
                                <td style="padding:12px 8px; color:#374151;"><?php echo (($tmp = $_smarty_tpl->getValue('transfer')['username'] ?? null)===null||$tmp==='' ? 'Khách' ?? null : $tmp);?>
</td>
                                <td style="padding:12px 8px; font-weight:600; color:#22c55e;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transfer')['amount'],0,",",".");?>
đ</td>
                                <td style="padding:12px 8px;">
                                    <span style="background:#f3f4f6; color:#374151; padding:4px 8px; border-radius:4px; font-family:monospace; font-size:0.9em;"><?php echo $_smarty_tpl->getValue('transfer')['transfer_content'];?>
</span>
                                </td>
                                <td style="padding:12px 8px;">
                                    <?php if ($_smarty_tpl->getValue('transfer')['status'] == 'pending') {?>
                                        <span style="background:#fef3c7; color:#d97706; padding:4px 8px; border-radius:4px; font-size:0.9em; font-weight:500;">
                                            <i class="fa-solid fa-clock"></i> Chờ thanh toán
                                        </span>
                                    <?php } elseif ($_smarty_tpl->getValue('transfer')['status'] == 'paid') {?>
                                        <span style="background:#f0fdf4; color:#16a34a; padding:4px 8px; border-radius:4px; font-size:0.9em; font-weight:500;">
                                            <i class="fa-solid fa-check"></i> Đã thanh toán
                                        </span>
                                    <?php } else { ?>
                                        <span style="background:#fef2f2; color:#dc2626; padding:4px 8px; border-radius:4px; font-size:0.9em; font-weight:500;">
                                            <i class="fa-solid fa-times"></i> Hết hạn
                                        </span>
                                    <?php }?>
                                </td>
                                <td style="padding:12px 8px; color:#6b7280; font-size:0.9em;">
                                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('transfer')['expires_at'],'%d/%m/%Y %H:%M');?>

                                </td>
                                <td style="padding:12px 8px;">
                                    <div style="display:flex; gap:8px;">
                                        <?php if ($_smarty_tpl->getValue('transfer')['status'] == 'pending') {?>
                                            <button onclick="markAsPaid(<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
)" style="background:#22c55e; color:#fff; border:none; border-radius:6px; padding:8px 12px; font-weight:500; cursor:pointer; font-size:0.9em;">
                                                <i class="fa-solid fa-check"></i> Đã thanh toán
                                            </button>
                                        <?php }?>
                                        <button onclick="viewDetails(<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
)" style="background:#2563eb; color:#fff; border:none; border-radius:6px; padding:8px 12px; font-weight:500; cursor:pointer; font-size:0.9em;">
                                            <i class="fa-solid fa-eye"></i> Chi tiết
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div style="text-align:center; color:#6b7280; padding:40px;">
                    <i class="fa-solid fa-inbox" style="font-size:3em; margin-bottom:16px; color:#d1d5db;"></i>
                    <p style="font-size:1.1em;">Không có giao dịch chuyển khoản nào</p>
                </div>
            <?php }?>
        </div>

        <!-- Tab Content - Chờ xử lý -->
        <div id="tab-content-pending" class="tab-content" style="display:none; background:#f8fafc; border-radius:12px; padding:24px;">
            <h3 style="color:#1f2937; font-size:1.3em; font-weight:600; margin:0 0 20px;">
                <i class="fa-solid fa-clock"></i> Giao dịch chờ xử lý
            </h3>
            
            <?php if ($_smarty_tpl->getValue('pending_transfers')) {?>
                <div style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse;">
                        <thead>
                            <tr style="background:#e2e8f0; border-bottom:2px solid #cbd5e1;">
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">ID</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Đơn hàng</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Khách hàng</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Số tiền</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Nội dung</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Hết hạn</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('pending_transfers'), 'transfer');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('transfer')->value) {
$foreach1DoElse = false;
?>
                            <tr style="border-bottom:1px solid #e2e8f0;">
                                <td style="padding:12px 8px; font-weight:600; color:#1f2937;">#<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
</td>
                                <td style="padding:12px 8px; color:#374151;">
                                    <a href="/itc_toi-main/index.php?controller=orders_admin&action=detail&id=<?php echo $_smarty_tpl->getValue('transfer')['order_id'];?>
" style="color:#2563eb; text-decoration:none; font-weight:500;">
                                        #<?php echo $_smarty_tpl->getValue('transfer')['order_id'];?>

                                    </a>
                                </td>
                                <td style="padding:12px 8px; color:#374151;"><?php echo (($tmp = $_smarty_tpl->getValue('transfer')['username'] ?? null)===null||$tmp==='' ? 'Khách' ?? null : $tmp);?>
</td>
                                <td style="padding:12px 8px; font-weight:600; color:#22c55e;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transfer')['amount'],0,",",".");?>
đ</td>
                                <td style="padding:12px 8px;">
                                    <span style="background:#f3f4f6; color:#374151; padding:4px 8px; border-radius:4px; font-family:monospace; font-size:0.9em;"><?php echo $_smarty_tpl->getValue('transfer')['transfer_content'];?>
</span>
                                </td>
                                <td style="padding:12px 8px; color:#6b7280; font-size:0.9em;">
                                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('transfer')['expires_at'],'%d/%m/%Y %H:%M');?>

                                </td>
                                <td style="padding:12px 8px;">
                                    <div style="display:flex; gap:8px;">
                                        <button onclick="markAsPaid(<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
)" style="background:#22c55e; color:#fff; border:none; border-radius:6px; padding:8px 12px; font-weight:500; cursor:pointer; font-size:0.9em;">
                                            <i class="fa-solid fa-check"></i> Đã thanh toán
                                        </button>
                                        <button onclick="viewDetails(<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
)" style="background:#2563eb; color:#fff; border:none; border-radius:6px; padding:8px 12px; font-weight:500; cursor:pointer; font-size:0.9em;">
                                            <i class="fa-solid fa-eye"></i> Chi tiết
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div style="text-align:center; color:#6b7280; padding:40px;">
                    <i class="fa-solid fa-inbox" style="font-size:3em; margin-bottom:16px; color:#d1d5db;"></i>
                    <p style="font-size:1.1em;">Không có giao dịch chuyển khoản nào đang chờ xử lý</p>
                </div>
            <?php }?>
        </div>

        <!-- Tab Content - Đã thanh toán -->
        <div id="tab-content-paid" class="tab-content" style="display:none; background:#f8fafc; border-radius:12px; padding:24px;">
            <h3 style="color:#1f2937; font-size:1.3em; font-weight:600; margin:0 0 20px;">
                <i class="fa-solid fa-check"></i> Giao dịch đã thanh toán
            </h3>
            
            <?php if ($_smarty_tpl->getValue('paid_transfers')) {?>
                <div style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse;">
                        <thead>
                            <tr style="background:#e2e8f0; border-bottom:2px solid #cbd5e1;">
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">ID</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Đơn hàng</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Khách hàng</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Số tiền</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Nội dung</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Ngày thanh toán</th>
                                <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('paid_transfers'), 'transfer');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('transfer')->value) {
$foreach2DoElse = false;
?>
                            <tr style="border-bottom:1px solid #e2e8f0;">
                                <td style="padding:12px 8px; font-weight:600; color:#1f2937;">#<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
</td>
                                <td style="padding:12px 8px; color:#374151;">
                                    <a href="/itc_toi-main/index.php?controller=orders_admin&action=detail&id=<?php echo $_smarty_tpl->getValue('transfer')['order_id'];?>
" style="color:#2563eb; text-decoration:none; font-weight:500;">
                                        #<?php echo $_smarty_tpl->getValue('transfer')['order_id'];?>

                                    </a>
                                </td>
                                <td style="padding:12px 8px; color:#374151;"><?php echo (($tmp = $_smarty_tpl->getValue('transfer')['username'] ?? null)===null||$tmp==='' ? 'Khách' ?? null : $tmp);?>
</td>
                                <td style="padding:12px 8px; font-weight:600; color:#22c55e;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transfer')['amount'],0,",",".");?>
đ</td>
                                <td style="padding:12px 8px;">
                                    <span style="background:#f3f4f6; color:#374151; padding:4px 8px; border-radius:4px; font-family:monospace; font-size:0.9em;"><?php echo $_smarty_tpl->getValue('transfer')['transfer_content'];?>
</span>
                                </td>
                                <td style="padding:12px 8px; color:#6b7280; font-size:0.9em;">
                                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('transfer')['updated_at'],'%d/%m/%Y %H:%M');?>

                                </td>
                                <td style="padding:12px 8px;">
                                    <button onclick="viewDetails(<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
)" style="background:#2563eb; color:#fff; border:none; border-radius:6px; padding:8px 12px; font-weight:500; cursor:pointer; font-size:0.9em;">
                                        <i class="fa-solid fa-eye"></i> Chi tiết
                                    </button>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div style="text-align:center; color:#6b7280; padding:40px;">
                    <i class="fa-solid fa-inbox" style="font-size:3em; margin-bottom:16px; color:#d1d5db;"></i>
                    <p style="font-size:1.1em;">Không có giao dịch chuyển khoản nào đã thanh toán</p>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
// Tab functionality
function showTab(tabName) {
    // Hide all tab contents
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.style.display = 'none';
    });
    
    // Remove active class from all tab buttons
    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(button => {
        button.classList.remove('active');
        button.style.background = 'transparent';
        button.style.color = '#6b7280';
    });
    
    // Show selected tab content
    document.getElementById('tab-content-' + tabName).style.display = 'block';
    
    // Add active class to selected tab button
    document.getElementById('tab-' + tabName).classList.add('active');
    document.getElementById('tab-' + tabName).style.background = '#fff';
    document.getElementById('tab-' + tabName).style.color = '#374151';
}

// Đánh dấu đã thanh toán
function markAsPaid(transferId) {
    if (confirm('Xác nhận rằng khách hàng đã thanh toán thành công?')) {
        fetch('/itc_toi-main/index.php?controller=bank_transfer&action=markPaid', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'transfer_id=' + transferId
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi xác nhận thanh toán.');
        });
    }
}

// Xem chi tiết
function viewDetails(transferId) {
    // Có thể mở modal hoặc chuyển trang để xem chi tiết
    window.open('/itc_toi-main/index.php?controller=bank_transfer&action=show&id=' + transferId, '_blank');
}

// Làm mới danh sách
function refreshList() {
    location.reload();
}

// Auto refresh every 30 seconds
setInterval(refreshList, 30000);
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
}
