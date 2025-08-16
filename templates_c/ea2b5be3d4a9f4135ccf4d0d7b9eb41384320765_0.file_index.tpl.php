<?php
/* Smarty version 5.5.1, created on 2025-08-16 04:02:56
  from 'file:templates/dashboard/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_689fe6d0347133_94272079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea2b5be3d4a9f4135ccf4d0d7b9eb41384320765' => 
    array (
      0 => 'templates/dashboard/index.tpl',
      1 => 1755309760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_689fe6d0347133_94272079 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\dashboard';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1389948154689fe6d03124d9_20986336', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1172065979689fe6d031edc2_03746149', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_1389948154689fe6d03124d9_20986336 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\dashboard';
?>
Dashboard<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_1172065979689fe6d031edc2_03746149 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\dashboard';
?>

<div style="max-width:1400px; margin:0 auto; padding:0 20px;">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
        <h1 style="color:#1f2937; font-size:1.8em; font-weight:700; margin:0;"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</h1>
        <div style="display:flex; gap:12px;">
            <!-- Export removed -->
        </div>
    </div>
    <div style="display: flex; flex-wrap: wrap; gap: 24px; margin-bottom: 32px;">
        <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
            <div style="background:#dbeafe; color:#2563eb; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-receipt"></i></div>
            <div>
                <div style="font-size:1.1em; color:#6b7280;">Tổng đơn hàng</div>
                <div style="font-size:1.7em; font-weight:600; color:#1f2937;"><?php echo (($tmp = $_smarty_tpl->getValue('total_orders') ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</div>
            </div>
        </div>
        <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
            <div style="background:#dcfce7; color:#22c55e; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-dollar-sign"></i></div>
            <div>
                <div style="font-size:1.1em; color:#6b7280;">Doanh thu (VNĐ)</div>
                <div style="font-size:1.7em; font-weight:600; color:#1f2937;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('total_revenue'),0);?>
đ</div>
            </div>
        </div>
        <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
            <div style="background:#cffafe; color:#06b6d4; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-box"></i></div>
            <div>
                <div style="font-size:1.1em; color:#6b7280;">Sản phẩm</div>
                <div style="font-size:1.7em; font-weight:600; color:#1f2937;"><?php echo (($tmp = $_smarty_tpl->getValue('total_products') ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</div>
            </div>
        </div>
        <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
            <div style="background:#fef3c7; color:#f59e0b; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-users"></i></div>
            <div>
                <div style="font-size:1.1em; color:#6b7280;">Người dùng</div>
                <div style="font-size:1.7em; font-weight:600; color:#1f2937;"><?php echo (($tmp = $_smarty_tpl->getValue('total_users') ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</div>
            </div>
        </div>
    </div>

    <div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
        <div style="font-size:1.2em; font-weight:600; margin-bottom:20px; color:#1f2937;"><i class="fa-solid fa-clock-rotate-left"></i> Đơn hàng gần đây</div>
        <?php if ($_smarty_tpl->getValue('recent_orders')) {?>
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">ID</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Khách hàng</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Tổng tiền</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Trạng thái</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recent_orders'), 'order');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach0DoElse = false;
?>
                    <tr style="border-bottom:1px solid #f3f4f6;">
                        <td style="padding:12px 8px; font-weight:600; color:#1f2937;">#<?php echo $_smarty_tpl->getValue('order')['id'];?>
</td>
                        <td style="padding:12px 8px; color:#374151;"><?php echo (($tmp = $_smarty_tpl->getValue('order')['username'] ?? null)===null||$tmp==='' ? 'Khách' ?? null : $tmp);?>
</td>
                                                    <td style="padding:12px 8px; font-weight:600; color:#22c55e;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('order')['total_amount'],0);?>
đ</td>
                        <td style="padding:12px 8px;">
                            <?php if ($_smarty_tpl->getValue('order')['status'] == 'pending') {?>
                                <span style="background:#fef3c7; color:#d97706; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Chờ xử lý</span>
                            <?php } elseif ($_smarty_tpl->getValue('order')['status'] == 'confirmed') {?>
                                <span style="background:#dbeafe; color:#2563eb; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Đã xác nhận</span>
                            <?php } elseif ($_smarty_tpl->getValue('order')['status'] == 'shipping') {?>
                                <span style="background:#fce7f3; color:#ec4899; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Đang giao</span>
                            <?php } elseif ($_smarty_tpl->getValue('order')['status'] == 'delivered') {?>
                                <span style="background:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Đã giao</span>
                            <?php } elseif ($_smarty_tpl->getValue('order')['status'] == 'cancelled') {?>
                                <span style="background:#fee2e2; color:#dc2626; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;">Đã hủy</span>
                            <?php } else { ?>
                                <span style="background:#f3f4f6; color:#6b7280; padding:4px 8px; border-radius:6px; font-size:0.9em; font-weight:500;"><?php echo $_smarty_tpl->getValue('order')['status'];?>
</span>
                            <?php }?>
                        </td>
                        <td style="padding:12px 8px; color:#6b7280; font-size:0.9em;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('order')['created_at'],'%d/%m/%Y %H:%M');?>
</td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        <?php } else { ?>
            <div style="text-align:center; color:#6b7280; padding:40px;">
                <i class="fa-solid fa-shopping-cart" style="font-size:3em; margin-bottom:16px; color:#d1d5db;"></i>
                <p style="font-size:1.1em;">Chưa có đơn hàng nào</p>
            </div>
        <?php }?>
    </div>

    <div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
        <div style="font-size:1.2em; font-weight:600; margin-bottom:20px; color:#1f2937;"><i class="fa-solid fa-trophy"></i> Top sản phẩm bán chạy</div>
        <?php if ($_smarty_tpl->getValue('top_products')) {?>
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Tên sản phẩm</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Số lượng bán</th>
                        <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('top_products'), 'prod', false, NULL, 'loop', array (
  'iteration' => true,
));
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('prod')->value) {
$foreach1DoElse = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['iteration']++;
?>
                    <tr style="border-bottom:1px solid #f3f4f6;">
                        <td style="padding:12px 8px; color:#374151;">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <div style="background:#f3f4f6; color:#6b7280; border-radius:50%; width:24px; height:24px; display:flex; align-items:center; justify-content:center; font-weight:600; font-size:0.8em;"><?php echo ($_smarty_tpl->getValue('__smarty_foreach_loop')['iteration'] ?? null);?>
</div>
                                <?php echo $_smarty_tpl->getValue('prod')['product_name'];?>

                            </div>
                        </td>
                        <td style="padding:12px 8px; color:#374151;"><?php echo $_smarty_tpl->getValue('prod')['total_sold'];?>
 kg</td>
                                                    <td style="padding:12px 8px; font-weight:600; color:#22c55e;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('prod')['total_revenue'],0);?>
đ</td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        <?php } else { ?>
            <div style="text-align:center; color:#6b7280; padding:40px;">
                <i class="fa-solid fa-box" style="font-size:3em; margin-bottom:16px; color:#d1d5db;"></i>
                <p style="font-size:1.1em;">Chưa có dữ liệu bán hàng</p>
            </div>
        <?php }?>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
