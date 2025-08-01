<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:49:18
  from 'file:templates/user_orders/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c34eb94921_87916190',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '921aae1ab8fee1db934ce77f679bbe5d29b19943' => 
    array (
      0 => 'templates/user_orders/index.tpl',
      1 => 1753775547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c34eb94921_87916190 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\user_orders';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2914144846888c34eb71665_08004454', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11640779606888c34eb76b53_77317685', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout_home.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_2914144846888c34eb71665_08004454 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\user_orders';
?>
Đơn hàng của tôi<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_11640779606888c34eb76b53_77317685 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\user_orders';
?>

<div style="max-width:1200px;margin:40px auto;padding:0 20px;">
    <h1 style="font-size:2.5em;font-weight:700;color:#1f2937;margin-bottom:30px;text-align:center;">
        <i class="fas fa-receipt"></i> Đơn hàng của tôi
    </h1>
    
    <?php if ($_smarty_tpl->getValue('orders')) {?>
        <div style="background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);overflow:hidden;">
            <div style="padding:20px;border-bottom:1px solid #f3f4f6;">
                <h3 style="font-size:1.2em;font-weight:600;color:#1f2937;margin:0;">
                    <i class="fas fa-list"></i> Danh sách đơn hàng
                </h3>
            </div>
            
            <div style="overflow-x:auto;">
                <table style="width:100%;border-collapse:collapse;">
                    <thead style="background:#f9fafb;">
                        <tr>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Mã đơn hàng</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Ngày đặt</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Tổng tiền</th>
                            <th style="padding:15px;text-align:left;font-weight:600;color:#374151;border-bottom:1px solid #e5e7eb;">Trạng thái</th>
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
                            <td style="padding:15px;color:#6b7280;">
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('order')['created_at'],'%d/%m/%Y %H:%M');?>

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
                            <td style="padding:15px;text-align:center;">
                                <a href="/itc_toi-main/index.php?controller=user_orders&action=view&id=<?php echo $_smarty_tpl->getValue('order')['id'];?>
" style="padding:6px 12px;background:#3b82f6;color:white;text-decoration:none;border-radius:6px;font-size:0.9em;font-weight:500;" onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                                    <i class="fas fa-eye"></i> Xem chi tiết
                                </a>
                            </td>
                        </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } else { ?>
        <div style="text-align:center;padding:60px 20px;background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
            <i class="fas fa-shopping-bag" style="font-size:4em;color:#d1d5db;margin-bottom:20px;"></i>
            <h3 style="font-size:1.5em;font-weight:600;color:#374151;margin-bottom:10px;">Bạn chưa có đơn hàng nào</h3>
            <p style="color:#6b7280;margin-bottom:30px;">Hãy mua sắm để tạo đơn hàng đầu tiên của bạn!</p>
            <a href="/itc_toi-main/index.php?controller=user&action=welcome" style="padding:12px 24px;background:#22c55e;color:white;text-decoration:none;border-radius:8px;font-weight:600;display:inline-block;" onmouseover="this.style.background='#16a34a'" onmouseout="this.style.background='#22c55e'">
                <i class="fas fa-shopping-cart"></i> Mua sắm ngay
            </a>
        </div>
    <?php }?>
    
    <div style="text-align:center;margin-top:30px;">
        <a href="/itc_toi-main/index.php?controller=user&action=welcome" style="padding:10px 20px;background:#6b7280;color:white;text-decoration:none;border-radius:6px;font-weight:500;" onmouseover="this.style.background='#4b5563'" onmouseout="this.style.background='#6b7280'">
            <i class="fas fa-arrow-left"></i> Quay lại trang chủ
        </a>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
