<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:49:57
  from 'file:templates/orders_admin/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c375c073b3_44521226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '192e8a763c1c2514c4a589cf0bc87d81df2509f7' => 
    array (
      0 => 'templates/orders_admin/index.tpl',
      1 => 1753793225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c375c073b3_44521226 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\orders_admin';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8247916196888c375bdbf97_15214553', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20602097306888c375be0d65_04800975', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_8247916196888c375bdbf97_15214553 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\orders_admin';
?>
Quản lý đơn hàng<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_20602097306888c375be0d65_04800975 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\orders_admin';
?>

<div style="padding:20px;">
    <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin-bottom:30px;">
        <i class="fas fa-shopping-bag"></i> Quản lý đơn hàng
    </h1>
    
    <!-- Thống kê -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;margin-bottom:30px;">
        <div style="background:#fff;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);text-align:center;">
            <div style="font-size:2em;font-weight:700;color:#22c55e;margin-bottom:10px;"><?php echo $_smarty_tpl->getValue('stats')['total_orders'];?>
</div>
            <div style="color:#6b7280;">Tổng đơn hàng</div>
        </div>
        <div style="background:#fff;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);text-align:center;">
            <div style="font-size:2em;font-weight:700;color:#f59e0b;margin-bottom:10px;"><?php echo $_smarty_tpl->getValue('stats')['today_orders'];?>
</div>
            <div style="color:#6b7280;">Đơn hàng hôm nay</div>
        </div>
        <div style="background:#fff;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);text-align:center;">
            <div style="font-size:2em;font-weight:700;color:#3b82f6;margin-bottom:10px;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('stats')['total_revenue'],0,",",".");?>
đ</div>
            <div style="color:#6b7280;">Tổng doanh thu</div>
        </div>
    </div>
    
    <!-- Bộ lọc -->
    <div style="background:#fff;padding:20px;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin-bottom:20px;">
        <h3 style="font-size:1.2em;font-weight:600;color:#1f2937;margin-bottom:15px;">
            <i class="fas fa-filter"></i> Lọc theo trạng thái
        </h3>
        <div style="display:flex;gap:10px;flex-wrap:wrap;">
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;<?php if (!$_smarty_tpl->getValue('status_filter')) {?>background:#22c55e;color:white;<?php } else { ?>background:#f3f4f6;color:#374151;<?php }?>">
                Tất cả
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=pending" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;<?php if ($_smarty_tpl->getValue('status_filter') == 'pending') {?>background:#f59e0b;color:white;<?php } else { ?>background:#f3f4f6;color:#374151;<?php }?>">
                Chờ xử lý
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=confirmed" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;<?php if ($_smarty_tpl->getValue('status_filter') == 'confirmed') {?>background:#3b82f6;color:white;<?php } else { ?>background:#f3f4f6;color:#374151;<?php }?>">
                Đã xác nhận
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=shipped" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;<?php if ($_smarty_tpl->getValue('status_filter') == 'shipped') {?>background:#8b5cf6;color:white;<?php } else { ?>background:#f3f4f6;color:#374151;<?php }?>">
                Đang giao
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=delivered" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;<?php if ($_smarty_tpl->getValue('status_filter') == 'delivered') {?>background:#22c55e;color:white;<?php } else { ?>background:#f3f4f6;color:#374151;<?php }?>">
                Đã giao
            </a>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index&status=cancelled" style="padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:500;<?php if ($_smarty_tpl->getValue('status_filter') == 'cancelled') {?>background:#ef4444;color:white;<?php } else { ?>background:#f3f4f6;color:#374151;<?php }?>">
                Đã hủy
            </a>
        </div>
    </div>
    
    <!-- Danh sách đơn hàng -->
    <div style="background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);overflow:hidden;">
        <div style="padding:20px;border-bottom:1px solid #f3f4f6;">
            <h3 style="font-size:1.2em;font-weight:600;color:#1f2937;margin:0;">
                <i class="fas fa-list"></i> Danh sách đơn hàng
            </h3>
        </div>
        
        <?php if ($_smarty_tpl->getValue('orders')) {?>
            <div style="overflow-x:auto;">
                <table style="width:100%;border-collapse:collapse;">
                    <thead style="background:#f9fafb;">
                        <tr>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Mã đơn hàng</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Khách hàng</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Tổng tiền</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Trạng thái</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Ngày đặt</th>
                            <th style="padding:15px;text-align:center;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('orders'), 'order');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach0DoElse = false;
?>
                        <tr style="border-bottom:1px solid #f3f4f6;">
                            <td style="padding:15px;">
                                <span style="font-weight:600;color:#22c55e;">#<?php echo $_smarty_tpl->getValue('order')['id'];?>
</span>
                            </td>
                            <td style="padding:15px;">
                                <div style="font-weight:600;color:#1f2937;">
                                    <?php if ($_smarty_tpl->getValue('order')['username']) {?>
                                        <?php echo $_smarty_tpl->getValue('order')['username'];?>

                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->getValue('order')['guest_name'];?>

                                    <?php }?>
                                </div>
                                <div style="color:#6b7280;font-size:0.9em;">
                                    <?php if ($_smarty_tpl->getValue('order')['user_email']) {?>
                                        <?php echo $_smarty_tpl->getValue('order')['user_email'];?>

                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->getValue('order')['guest_email'];?>

                                    <?php }?>
                                </div>
                                <div style="color:#6b7280;font-size:0.9em;">
                                    <?php echo $_smarty_tpl->getValue('order')['guest_phone'];?>

                                </div>
                            </td>
                            <td style="padding:15px;">
                                <span style="font-weight:600;color:#22c55e;font-size:1.1em;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('order')['total_amount'],0,",",".");?>
đ</span>
                            </td>
                            <td style="padding:15px;">
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
                            </td>
                            <td style="padding:15px;color:#6b7280;">
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('order')['created_at'],'%d/%m/%Y %H:%M');?>

                            </td>
                            <td style="padding:15px;text-align:center;">
                                <a href="/itc_toi-main/index.php?controller=orders_admin&action=view&id=<?php echo $_smarty_tpl->getValue('order')['id'];?>
" style="padding:6px 12px;background:#3b82f6;color:white;text-decoration:none;border-radius:6px;font-size:0.9em;font-weight:500;" onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                                    <i class="fas fa-eye"></i> Xem
                                </a>
                            </td>
                        </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div style="text-align:center;padding:40px;color:#6b7280;">
                <i class="fas fa-shopping-bag" style="font-size:3em;margin-bottom:15px;color:#d1d5db;"></i>
                <p style="font-size:1.1em;">Không có đơn hàng nào</p>
            </div>
        <?php }?>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
