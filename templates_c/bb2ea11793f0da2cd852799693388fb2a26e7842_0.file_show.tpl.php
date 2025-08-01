<?php
/* Smarty version 5.5.1, created on 2025-07-29 14:49:49
  from 'file:templates/bank_transfer/show.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c36d83e089_42647238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb2ea11793f0da2cd852799693388fb2a26e7842' => 
    array (
      0 => 'templates/bank_transfer/show.tpl',
      1 => 1753786737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c36d83e089_42647238 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7633681386888c36d8294a9_38915306', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19486651716888c36d82d521_90254797', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout_home.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_7633681386888c36d8294a9_38915306 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
?>
Chuyển khoản ngân hàng<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_19486651716888c36d82d521_90254797 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\bank_transfer';
?>

<div style="max-width:600px; margin:0 auto; padding:20px;">
    <div style="background:#fff; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.1); padding:32px; text-align:center;">
        
        <!-- Header -->
        <div style="margin-bottom:32px;">
            <div style="background:#f59e0b; color:#fff; border-radius:50%; width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:2.5em;">
                <i class="fa-solid fa-clock"></i>
            </div>
            <h1 style="color:#1f2937; font-size:1.8em; font-weight:700; margin:0 0 8px;">Chờ thanh toán</h1>
            <p style="color:#6b7280; font-size:1.1em; margin:0;">Đơn hàng đang chờ thanh toán qua chuyển khoản</p>
        </div>

        <!-- Thông tin đơn hàng -->
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
                    <div style="color:#22c55e; font-weight:600; font-size:1.1em;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transfer')['amount'],0,",",".");?>
đ</div>
                </div>
            </div>
            <div style="margin-top:16px; padding:12px; background:#fef3c7; border:1px solid #fde68a; border-radius:8px;">
                <div style="display:flex; align-items:center; gap:8px; color:#d97706; font-weight:600;">
                    <i class="fa-solid fa-info-circle"></i>
                    <span>Trạng thái: Chờ thanh toán</span>
                </div>
                <p style="color:#92400e; margin:8px 0 0 0; font-size:0.9em;">
                    Đơn hàng sẽ được xác nhận sau khi admin kiểm tra thanh toán thành công.
                </p>
            </div>
        </div>

        <!-- QR Code -->
        <div style="margin-bottom:32px;">
            <?php if ($_smarty_tpl->getValue('is_expired')) {?>
                <div style="background:#fee2e2; border:2px solid #fecaca; border-radius:12px; padding:32px; margin-bottom:16px;">
                    <div style="color:#dc2626; font-size:1.2em; font-weight:600; margin-bottom:8px;">
                        <i class="fa-solid fa-exclamation-triangle"></i> Mã QR đã hết hạn
                    </div>
                    <p style="color:#dc2626; margin:0;">Mã chuyển khoản này đã hết hạn. Vui lòng tạo mã mới.</p>
                </div>
                <a href="/itc_toi-main/index.php?controller=bank_transfer&action=create&order_id=<?php echo $_smarty_tpl->getValue('order')['id'];?>
&amount=<?php echo $_smarty_tpl->getValue('transfer')['amount'];?>
" style="background:#dc2626; color:#fff; border:none; border-radius:8px; padding:12px 24px; font-weight:600; text-decoration:none; display:inline-block;">
                    <i class="fa-solid fa-refresh"></i> Tạo mã mới
                </a>
            <?php } else { ?>
                <div style="background:#f8fafc; border:2px solid #e5e7eb; border-radius:12px; padding:32px; margin-bottom:16px;">
                    <img src="<?php echo $_smarty_tpl->getValue('transfer')['qr_code'];?>
" alt="QR Code" style="max-width:250px; max-height:250px; border-radius:8px; margin-bottom:16px;">
                    <div style="color:#1f2937; font-weight:600; margin-bottom:8px;">Quét mã QR bằng ứng dụng ngân hàng</div>
                    <p style="color:#6b7280; margin:0; font-size:0.9em;">Hoặc chụp màn hình để thanh toán sau</p>
                </div>
            <?php }?>
        </div>

        <!-- Thông tin chuyển khoản -->
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
                <div style="display:flex; justify-content:space-between; align-items:center; padding:8px 0; border-bottom:1px solid #e0f2fe;">
                    <span style="color:#0369a1; font-weight:500;">Số tiền:</span>
                    <span style="color:#22c55e; font-weight:600; font-size:1.1em;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transfer')['amount'],0,",",".");?>
đ</span>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center; padding:8px 0;">
                    <span style="color:#0369a1; font-weight:500;">Nội dung:</span>
                    <span style="color:#1f2937; font-weight:600; font-family:monospace; background:#fff; padding:4px 8px; border-radius:4px; border:1px solid #d1d5db;"><?php echo $_smarty_tpl->getValue('transfer')['transfer_content'];?>
</span>
                </div>
            </div>
        </div>

        <!-- Thời gian hết hạn -->
        <div style="background:#fef3c7; border:2px solid #fde68a; border-radius:12px; padding:20px; margin-bottom:24px;">
            <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                <i class="fa-solid fa-clock" style="color:#d97706;"></i>
                <span style="color:#d97706; font-weight:600;">Thời gian hết hạn</span>
            </div>
            <div style="color:#92400e; font-size:1.1em; font-weight:600;" id="countdown">
                <span id="minutes">30</span>:<span id="seconds">00</span>
            </div>
        </div>

        <!-- Nút kiểm tra thanh toán -->
        <div style="display:flex; gap:12px; justify-content:center; margin-bottom:24px;">
            <button onclick="checkPayment()" style="background:#f59e0b; color:#fff; border:none; border-radius:8px; padding:12px 24px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px;">
                <i class="fa-solid fa-sync-alt"></i> Kiểm tra thanh toán
            </button>
            <a href="/itc_toi-main/index.php?controller=user&action=welcome" style="background:#f3f4f6; color:#374151; border:none; border-radius:8px; padding:12px 24px; font-weight:600; text-decoration:none; display:flex; align-items:center; gap:8px;">
                <i class="fa-solid fa-home"></i> Về trang chủ
            </a>
        </div>

        <!-- Hướng dẫn -->
        <div style="background:#f8fafc; border-radius:12px; padding:20px; text-align:left;">
            <h4 style="color:#1f2937; font-size:1.1em; font-weight:600; margin:0 0 12px;">
                <i class="fa-solid fa-info-circle"></i> Hướng dẫn thanh toán
            </h4>
            <ol style="color:#6b7280; margin:0; padding-left:20px;">
                <li>Mở ứng dụng ngân hàng trên điện thoại</li>
                <li>Chọn chức năng "Quét mã QR"</li>
                <li>Quét mã QR bên trên</li>
                <li>Kiểm tra thông tin và xác nhận thanh toán</li>
                <li>Nhấn "Kiểm tra thanh toán" sau khi hoàn tất</li>
            </ol>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
let transferId = <?php echo $_smarty_tpl->getValue('transfer')['id'];?>
;
// Parse thời gian với timezone Việt Nam
let expiresAt = new Date('<?php echo $_smarty_tpl->getValue('transfer')['expires_at'];?>
 +07:00').getTime();

// Countdown timer
function updateCountdown() {
    let now = new Date().getTime();
    let distance = expiresAt - now;
    
    if (distance < 0) {
        document.getElementById('countdown').innerHTML = '<span style="color:#dc2626;">Đã hết hạn</span>';
        // Không reload tự động, chỉ hiển thị thông báo
        return;
    }
    
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
    document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
}

setInterval(updateCountdown, 1000);
updateCountdown();

// Kiểm tra thanh toán
function checkPayment() {
    fetch('/itc_toi-main/index.php?controller=bank_transfer&action=check', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'transfer_id=' + transferId
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (data.status === 'paid') {
                alert('🎉 Thanh toán thành công! Đơn hàng của bạn đã được xác nhận và sẽ được xử lý sớm nhất.');
                window.location.href = '/itc_toi-main/index.php?controller=user&action=welcome';
            } else {
                alert('⏳ Chưa nhận được thanh toán. Vui lòng đảm bảo đã chuyển khoản đúng thông tin và thử lại sau.');
            }
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi kiểm tra thanh toán.');
    });
}

// Tắt auto check để tránh gọi API liên tục
// setInterval(checkPayment, 30000);
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
}
