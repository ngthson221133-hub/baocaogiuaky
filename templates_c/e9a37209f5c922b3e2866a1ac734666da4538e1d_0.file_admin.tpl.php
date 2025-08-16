<?php
/* Smarty version 5.5.1, created on 2025-08-16 04:03:30
  from 'file:templates/bank_transfer/admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_689fe6f243f426_02942158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9a37209f5c922b3e2866a1ac734666da4538e1d' => 
    array (
      0 => 'templates/bank_transfer/admin.tpl',
      1 => 1755309722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_689fe6f243f426_02942158 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1927800974689fe6f2420ca9_11691532', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_472333005689fe6f2424ac3_49659372', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_1927800974689fe6f2420ca9_11691532 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
?>
Quản lý chuyển khoản<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_472333005689fe6f2424ac3_49659372 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
?>

<div style="max-width:1200px; margin:0 auto; padding:20px;">
    <div style="background:#fff; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:32px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="color:#1f2937; font-size:1.8em; font-weight:700; margin:0 0 8px;">
                    <i class="fa-solid fa-university"></i> Quản lý chuyển khoản
                </h1>
                <p style="color:#6b7280; margin:0;">Danh sách giao dịch chuyển khoản</p>
            </div>
            <div>
                <a href="/itc_toi-main/index.php?controller=bank_transfer&action=admin" style="background:#2563eb; color:#fff; border:none; border-radius:8px; padding:12px 20px; font-weight:600; cursor:pointer; text-decoration:none; display:flex; align-items:center; gap:8px;">
                    <i class="fa-solid fa-refresh"></i> Làm mới
                </a>
            </div>
        </div>

        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:20px; margin-bottom:24px;">
            <div style="background:#f0f9ff; border:2px solid #bae6fd; border-radius:12px; padding:20px; text-align:center;">
                <div style="color:#0369a1; font-size:2em; font-weight:700; margin-bottom:8px;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('pending_transfers'));?>
</div>
                <div style="color:#0369a1; font-weight:600;">Chờ thanh toán</div>
            </div>
            <div style="background:#f0fdf4; border:2px solid #bbf7d0; border-radius:12px; padding:20px; text-align:center;">
                <div style="color:#16a34a; font-size:2em; font-weight:700; margin-bottom:8px;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('paid_transfers'));?>
</div>
                <div style="color:#16a34a; font-weight:600;">Đã thanh toán</div>
            </div>
        </div>

        <h3 style="color:#1f2937; font-size:1.3em; font-weight:600; margin:0 0 16px;">
            <i class="fa-solid fa-clock"></i> Giao dịch chờ xử lý
        </h3>
        <?php if ($_smarty_tpl->getValue('pending_transfers')) {?>
            <div style="overflow-x:auto; margin-bottom:32px;">
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#e2e8f0; border-bottom:2px solid #cbd5e1;">
                            <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">ID</th>
                            <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Đơn hàng</th>
                            <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Khách hàng</th>
                            <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Số tiền</th>
                            <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Nội dung</th>
                            <th style="padding:12px 8px; text-align:left; font-weight:600; color:#374151;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('pending_transfers'), 'transfer');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('transfer')->value) {
$foreach0DoElse = false;
?>
                        <tr style="border-bottom:1px solid #e2e8f0;">
                            <td style="padding:12px 8px; font-weight:600; color:#1f2937;">#<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
</td>
                            <td style="padding:12px 8px; color:#374151;">#<?php echo $_smarty_tpl->getValue('transfer')['order_id'];?>
</td>
                            <td style="padding:12px 8px; color:#374151;"><?php echo (($tmp = $_smarty_tpl->getValue('transfer')['username'] ?? null)===null||$tmp==='' ? 'Khách' ?? null : $tmp);?>
</td>
                            <td style="padding:12px 8px; font-weight:600; color:#22c55e;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transfer')['amount'],0);?>
đ</td>
                            <td style="padding:12px 8px;"><span style="background:#f3f4f6; color:#374151; padding:4px 8px; border-radius:4px; font-family:monospace; font-size:0.9em;"><?php echo $_smarty_tpl->getValue('transfer')['transfer_content'];?>
</span></td>
                            <td style="padding:12px 8px;">
                                <form method="post" action="/itc_toi-main/index.php?controller=bank_transfer&action=markPaid" onsubmit="return confirm('Xác nhận đã thanh toán?')" style="display:inline;">
                                    <input type="hidden" name="transfer_id" value="<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
">
                                    <button type="submit" style="background:#22c55e; color:#fff; border:none; border-radius:6px; padding:8px 12px; font-weight:500; cursor:pointer; font-size:0.9em;">
                                        <i class="fa-solid fa-check"></i> Đã thanh toán
                                    </button>
                                </form>
                                <a href="/itc_toi-main/index.php?controller=bank_transfer&action=show&id=<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
" target="_blank" style="background:#2563eb; color:#fff; border:none; border-radius:6px; padding:8px 12px; font-weight:500; cursor:pointer; font-size:0.9em; text-decoration:none; margin-left:8px;">
                                    <i class="fa-solid fa-eye"></i> Chi tiết
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
            <div style="text-align:center; color:#6b7280; padding:20px;">Không có giao dịch chờ xử lý</div>
        <?php }?>

        <h3 style="color:#1f2937; font-size:1.3em; font-weight:600; margin:0 0 16px;">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('paid_transfers'), 'transfer');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('transfer')->value) {
$foreach1DoElse = false;
?>
                        <tr style="border-bottom:1px solid #e2e8f0;">
                            <td style="padding:12px 8px; font-weight:600; color:#1f2937;">#<?php echo $_smarty_tpl->getValue('transfer')['id'];?>
</td>
                            <td style="padding:12px 8px; color:#374151;">#<?php echo $_smarty_tpl->getValue('transfer')['order_id'];?>
</td>
                            <td style="padding:12px 8px; color:#374151;"><?php echo (($tmp = $_smarty_tpl->getValue('transfer')['username'] ?? null)===null||$tmp==='' ? 'Khách' ?? null : $tmp);?>
</td>
                            <td style="padding:12px 8px; font-weight:600; color:#22c55e;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transfer')['amount'],0);?>
đ</td>
                            <td style="padding:12px 8px;"><span style="background:#f3f4f6; color:#374151; padding:4px 8px; border-radius:4px; font-size:0.9em;"><?php echo $_smarty_tpl->getValue('transfer')['transfer_content'];?>
</span></td>
                            <td style="padding:12px 8px; color:#6b7280; font-size:0.9em;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('transfer')['updated_at'],'%d/%m/%Y %H:%M');?>
</td>
                        </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div style="text-align:center; color:#6b7280; padding:20px;">Không có giao dịch đã thanh toán</div>
        <?php }?>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
