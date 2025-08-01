<?php
/* Smarty version 5.5.1, created on 2025-07-29 15:02:46
  from 'file:templates/report/users.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6888c676706d45_30910277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0efcb89a5585eda9b499ebf32d8bc4626bbe589d' => 
    array (
      0 => 'templates/report/users.tpl',
      1 => 1753738665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6888c676706d45_30910277 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\report';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9042025116888c6766c0ab8_89138347', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3587592026888c6766c7151_73407306', 'content');
?>
 <?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../layout.tpl", $_smarty_current_dir);
}
/* {block 'title'} */
class Block_9042025116888c6766c0ab8_89138347 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\report';
?>
Thống kê người dùng<?php
}
}
/* {/block 'title'} */
/* {block 'content'} */
class Block_3587592026888c6766c7151_73407306 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\itc_toi-main\\templates\\report';
?>

<div style="display: flex; flex-wrap: wrap; gap: 24px; margin-bottom: 32px;">
    <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
        <div style="background:#e0e7ff; color:#2563eb; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-users"></i></div>
        <div>
            <div style="font-size:1.1em; color:#888;">Tổng người dùng</div>
            <div style="font-size:1.7em; font-weight:600; color:#222;"><?php echo (($tmp = $_smarty_tpl->getValue('total_users') ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</div>
        </div>
    </div>
    <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
        <div style="background:#fef3c7; color:#d97706; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-user-plus"></i></div>
        <div>
            <div style="font-size:1.1em; color:#888;">Mới hôm nay</div>
            <div style="font-size:1.7em; font-weight:600; color:#222;"><?php echo (($tmp = $_smarty_tpl->getValue('new_users_today') ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</div>
        </div>
    </div>
    <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
        <div style="background:#dcfce7; color:#16a34a; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-user-shield"></i></div>
        <div>
            <div style="font-size:1.1em; color:#888;">Người dùng thường</div>
            <div style="font-size:1.7em; font-weight:600; color:#222;"><?php echo (($tmp = $_smarty_tpl->getValue('regular_users') ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</div>
        </div>
    </div>
    <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
        <div style="background:#fef2f2; color:#dc2626; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-user-tie"></i></div>
        <div>
            <div style="font-size:1.1em; color:#888;">Quản trị viên</div>
            <div style="font-size:1.7em; font-weight:600; color:#222;"><?php echo (($tmp = $_smarty_tpl->getValue('admin_users') ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</div>
        </div>
    </div>
    <div style="flex:1; min-width:220px; background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; display:flex; align-items:center; gap:18px;">
        <div style="background:#f0f9ff; color:#0284c7; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center; font-size:1.6em;"><i class="fa-solid fa-calendar-week"></i></div>
        <div>
            <div style="font-size:1.1em; color:#888;">Tuần này</div>
            <div style="font-size:1.7em; font-weight:600; color:#222;"><?php echo (($tmp = $_smarty_tpl->getValue('weekly_total') ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
</div>
        </div>
    </div>
</div>
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px; max-width:100%; overflow:hidden;">
    <div style="font-size:1.2em; font-weight:600; margin-bottom:12px; color:#2563eb;"><i class="fa-solid fa-chart-pie"></i> Biểu đồ thống kê người dùng</div>
    <div style="display:flex; gap:24px; flex-wrap:wrap; margin-bottom:24px;">
        <div style="flex:1; min-width:300px; max-width:500px;">
            <h3 style="margin-bottom:16px; color:#374151; font-size:1.1em;">Phân bố vai trò</h3>
            <div class="chart-wrapper">
                <canvas id="roleChart"></canvas>
            </div>
        </div>
        <div style="flex:1; min-width:300px; max-width:500px;">
            <h3 style="margin-bottom:16px; color:#374151; font-size:1.1em;">Đăng ký theo tháng</h3>
            <div class="chart-wrapper">
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>
    </div>
    <div style="margin-top:24px;">
        <h3 style="margin-bottom:16px; color:#374151; font-size:1.1em;">Xu hướng đăng ký 7 ngày gần đây</h3>
        <div class="chart-wrapper" style="height:250px;">
            <canvas id="weeklyChart"></canvas>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>
<style>
.chart-container {
    position: relative;
    height: 200px;
    margin-bottom: 20px;
    max-width: 100%;
    overflow: hidden;
}
.chart-title {
    font-size: 1.1em;
    font-weight: 600;
    color: #374151;
    margin-bottom: 16px;
    text-align: center;
}
.chart-wrapper {
    position: relative;
    width: 100%;
    height: 200px;
    max-width: 100%;
    overflow: hidden;
}
</style>
<?php echo '<script'; ?>
>
// Biểu đồ phân bố vai trò
const roleCtx = document.getElementById('roleChart').getContext('2d');
const roleChart = new Chart(roleCtx, {
    type: 'doughnut',
    data: {
        labels: ['Người dùng thường', 'Quản trị viên'],
        datasets: [{
            data: [<?php echo $_smarty_tpl->getValue('regular_users');?>
, <?php echo $_smarty_tpl->getValue('admin_users');?>
],
            backgroundColor: [
                '#16a34a',
                '#dc2626'
            ],
            borderColor: [
                '#15803d',
                '#b91c1c'
            ],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                top: 10,
                bottom: 10
            }
        },
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 15,
                    usePointStyle: true,
                    font: {
                        size: 11
                    }
                }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = ((context.parsed / total) * 100).toFixed(1);
                        return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                    }
                }
            }
        }
    }
});

// Biểu đồ đăng ký theo tháng
const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
const monthlyChart = new Chart(monthlyCtx, {
    type: 'bar',
    data: {
        labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
        datasets: [{
            label: 'Người dùng mới',
            data: [<?php echo $_smarty_tpl->getValue('monthly_data');?>
],
            backgroundColor: '#3b82f6',
            borderColor: '#2563eb',
            borderWidth: 1,
            borderRadius: 4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                top: 10,
                bottom: 10
            }
        },
        scales: {
            x: {
                ticks: {
                    font: {
                        size: 10
                    }
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    font: {
                        size: 10
                    }
                }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

// Biểu đồ xu hướng 7 ngày gần đây
const weeklyCtx = document.getElementById('weeklyChart').getContext('2d');
const weeklyChart = new Chart(weeklyCtx, {
    type: 'line',
    data: {
        labels: [<?php echo $_smarty_tpl->getValue('weekly_labels');?>
],
        datasets: [{
            label: 'Người dùng đăng ký',
            data: [<?php echo $_smarty_tpl->getValue('weekly_data');?>
],
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            borderColor: '#3b82f6',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#3b82f6',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                top: 10,
                bottom: 10
            }
        },
        scales: {
            x: {
                ticks: {
                    font: {
                        size: 11
                    }
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    font: {
                        size: 10
                    }
                }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});
<?php echo '</script'; ?>
>
<div style="background:#fff; border-radius:12px; box-shadow:0 2px 8px #e5e7eb; padding:24px; margin-bottom:24px;">
    <div style="font-size:1.2em; font-weight:600; margin-bottom:12px; color:#2563eb;"><i class="fa-solid fa-table-list"></i> Danh sách người dùng</div>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f4f6fb; color:#2563eb;">
                <th style="padding:10px 8px; text-align:left;">ID</th>
                <th style="padding:10px 8px; text-align:left;">Tên</th>
                <th style="padding:10px 8px; text-align:left;">Email</th>
                <th style="padding:10px 8px; text-align:left;">Vai trò</th>
                <th style="padding:10px 8px; text-align:left;">Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'user');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach0DoElse = false;
?>
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px 6px;"><?php echo $_smarty_tpl->getValue('user')['id'];?>
</td>
                <td style="padding:8px 6px;">
                    <div style="font-weight:500;"><?php echo (($tmp = $_smarty_tpl->getValue('user')['name'] ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</div>
                    <?php if ($_smarty_tpl->getValue('user')['username']) {?>
                        <div style="font-size:0.85em;color:#666;">@<?php echo $_smarty_tpl->getValue('user')['username'];?>
</div>
                    <?php }?>
                </td>
                <td style="padding:8px 6px;">
                    <div><?php echo $_smarty_tpl->getValue('user')['email'];?>
</div>
                    <?php if ($_smarty_tpl->getValue('user')['phone']) {?>
                        <div style="font-size:0.85em;color:#666;"><?php echo $_smarty_tpl->getValue('user')['phone'];?>
</div>
                    <?php }?>
                </td>
                <td style="padding:8px 6px;">
                    <?php if ($_smarty_tpl->getValue('user')['role']) {?>
                        <?php if ($_smarty_tpl->getValue('user')['role'] == 'admin') {?>
                            <span style="background:#fef2f2; color:#dc2626; padding:4px 8px; border-radius:4px; font-size:0.85em; font-weight:500;">Quản trị viên</span>
                        <?php } else { ?>
                            <span style="background:#dcfce7; color:#16a34a; padding:4px 8px; border-radius:4px; font-size:0.85em; font-weight:500;">Người dùng</span>
                        <?php }?>
                    <?php } else { ?>
                        <span style="background:#f3f4f6; color:#6b7280; padding:4px 8px; border-radius:4px; font-size:0.85em; font-weight:500;">Chưa xác định</span>
                    <?php }?>
                </td>
                <td style="padding:8px 6px;">
                    <?php if ($_smarty_tpl->getValue('user')['created_at']) {?>
                        <div><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('user')['created_at'],'%d/%m/%Y');?>
</div>
                        <div style="font-size:0.85em;color:#666;"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('user')['created_at'],'%H:%M');?>
</div>
                    <?php } else { ?>
                        <span style="color:#bbb;">N/A</span>
                    <?php }?>
                </td>
            </tr>
        <?php
}
if ($foreach0DoElse) {
?>
            <tr><td colspan="5" style="text-align:center; color:#bbb; padding:18px;">Không có người dùng nào.</td></tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>
<?php
}
}
/* {/block 'content'} */
}
