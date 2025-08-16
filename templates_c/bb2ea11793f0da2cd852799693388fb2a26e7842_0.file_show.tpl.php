<?php
/* Smarty version 5.5.1, created on 2025-08-16 04:07:12
  from 'file:templates/bank_transfer/show.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_689fe7d0d993c5_67339718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb2ea11793f0da2cd852799693388fb2a26e7842' => 
    array (
      0 => 'templates/bank_transfer/show.tpl',
      1 => 1755309722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_689fe7d0d993c5_67339718 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1581087697689fe7d0d8d994_64006621', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2002522246689fe7d0d932b8_55034630', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout_home.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_1581087697689fe7d0d8d994_64006621 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
?>
Chuyển khoản ngân hàng<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_2002522246689fe7d0d932b8_55034630 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
?>

<div style="max-width:600px; margin:0 auto; padding:20px;">
    <div style="background:#fff; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:32px; text-align:center;">
        <div style="margin-bottom:24px;">
            <div style="background:#f59e0b; color:#fff; border-radius:50%; width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:2.5em;">
                <i class="fa-solid fa-university"></i>
            </div>
            <h1 style="color:#1f2937; font-size:1.6em; font-weight:700; margin:0 0 8px;">Thanh toán chuyển khoản</h1>
            <p style="color:#6b7280; font-size:1em; margin:0;">Vui lòng chuyển khoản theo thông tin bên dưới</p>
        </div>
        <div style="background:#f8fafc; border-radius:12px; padding:24px; margin-bottom:24px; text-align:left;">
            <h3 style="color:#1f2937; font-size:1.2em; font-weight:600; margin:0 0 16px;">
                <i class="fa-solid fa-receipt"></i> Thông tin đơn hàng
            </h3>
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
                <div>
                    <div style="color:#6b7280; font-size:0.9em; margin-bottom:4px;">Mã đơn hàng:</div>
                    <div style="color:#1f2937; font-weight:600;">#<?php echo $_smarty_tpl->getValue('order')['id'];?>
</div>
                </div>
                <div>
                    <div style="color:#6b7280; font-size:0.9em; margin-bottom:4px;">Số tiền:</div>
                    <div style="color:#22c55e; font-weight:600; font-size:1.1em;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transfer')['amount'],0);?>
đ</div>
                </div>
            </div>
        </div>
        <div style="background:#f0f9ff; border:2px solid #bae6fd; border-radius:12px; padding:24px; margin-bottom:24px; text-align:left;">
            <h3 style="color:#0369a1; font-size:1.2em; font-weight:600; margin:0 0 16px;">
                <i class="fa-solid fa-university"></i> Thông tin tài khoản
            </h3>
            <div style="display:grid; gap:12px;">
                <div style="display:flex; justify-content:space-between; align-items:center; padding:8px 0; border-bottom:1px solid #e0f2fe;">
                    <span style="color:#0369a1; font-weight:500;">Ngân hàng:</span>
                    <span style="color:#1f2937; font-weight:600;"><?php echo $_smarty_tpl->getValue('transfer')['bank_name'];?>
</span>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center; padding:8px 0; border-bottom:1px solid #e0f2fe;">
                    <span style="color:#0369a1; font-weight:500;">Số tài khoản:</span>
                    <span style="color:#1f2937; font-weight:600; font-family:monospace; font-size:1.1em;"><?php echo $_smarty_tpl->getValue('transfer')['bank_account'];?>
</span>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center; padding:8px 0;">
                    <span style="color:#0369a1; font-weight:500;">Nội dung chuyển khoản:</span>
                    <span style="color:#1f2937; font-weight:600; font-family:monospace; background:#fff; padding:4px 8px; border-radius:4px; border:1px solid #d1d5db;"><?php echo $_smarty_tpl->getValue('transfer')['transfer_content'];?>
</span>
                </div>
            </div>
        </div>
        <div style="background:#f8fafc; border-radius:12px; padding:20px; text-align:left;">
            <h4 style="color:#1f2937; font-size:1.1em; font-weight:600; margin:0 0 12px;">
                <i class="fa-solid fa-info-circle"></i> Lưu ý
            </h4>
            <ul style="color:#6b7280; margin:0; padding-left:20px;">
                <li>Chuyển khoản đúng số tiền và nội dung trên để hệ thống dễ kiểm tra.</li>
                <li>Sau khi chuyển khoản, vui lòng đợi admin xác nhận thanh toán.</li>
                <li>Bạn có thể quay lại trang chủ trong lúc chờ xác nhận.</li>
            </ul>
        </div>
        <div style="margin-top:20px;">
            <a href="/itc_toi-main/index.php?controller=user&action=welcome" style="background:#f3f4f6; color:#374151; border:none; border-radius:8px; padding:12px 24px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
                <i class="fa-solid fa-home"></i> Về trang chủ
            </a>
        </div>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
