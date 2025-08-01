<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{block name=title}Admin Panel{/block}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome 6.5 CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <style>
        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            background: #f6f8fa;
            color: #23272f;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #fff;
            color: #6b7280;
            border-right: 1px solid #ececec;
            display: flex;
            flex-direction: column;
            padding-top: 24px;
            box-shadow: 2px 0 16px 0 rgba(80, 80, 120, 0.03);
            transition: width 0.2s;
        }
        .sidebar .logo {
            font-size: 1.7em;
            font-weight: bold;
            color: #7c3aed;
            text-align: center;
            margin-bottom: 32px;
            letter-spacing: 1px;
            text-shadow: 0 2px 8px #ede9fe;
        }
        .sidebar .menu-group {
            margin-bottom: 18px;
        }
        .sidebar .menu-group-title {
            font-size: 0.97em;
            color: #b5b5c3;
            font-weight: 600;
            padding: 0 28px 6px 28px;
            letter-spacing: 0.5px;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            color: #6b7280;
            text-decoration: none;
            padding: 12px 28px;
            font-size: 1em;
            border-left: 4px solid transparent;
            border-radius: 8px 0 0 8px;
            margin: 2px 0;
            transition: background 0.18s, border-color 0.18s, color 0.18s;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #ede9fe;
            color: #7c3aed;
            border-left: 4px solid #7c3aed;
            font-weight: 600;
            box-shadow: 0 2px 8px #ede9fe;
        }
        .sidebar a i {
            margin-right: 12px;
            font-size: 1.18em;
            width: 22px;
            text-align: center;
            color: #a1a1aa;
            transition: color 0.18s;
        }
        .sidebar a.active i, .sidebar a:hover i {
            color: #7c3aed;
        }
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .admin-header {
            background: #fff;
            border-bottom: 1.5px solid #ede9fe;
            padding: 0 32px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 12px 0 #ede9fe;
        }
        .admin-header .left {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .admin-header .page-title {
            font-size: 1.35em;
            font-weight: 700;
            color: #7c3aed;
            letter-spacing: 0.5px;
        }
        .admin-header .right {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .admin-header .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ede9fe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3em;
            color: #7c3aed;
            font-weight: bold;
            box-shadow: 0 2px 8px #ede9fe;
        }
        .admin-header .admin-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-right: 10px;
        }
        .admin-header .admin-info .name {
            font-weight: 600;
            color: #23272f;
        }
        .admin-header .admin-info .role {
            font-size: 0.97em;
            color: #7c3aed;
        }
        .admin-header .btn {
            padding: 7px 18px;
            border: none;
            border-radius: 20px;
            font-size: 1em;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.18s, color 0.18s;
            box-shadow: 0 1px 4px #ede9fe;
            margin-left: 2px;
            text-decoration: none;
        }
        .admin-header .btn:active,
        .admin-header .btn:focus,
        .admin-header .btn:hover {
            text-decoration: none;
        }
        .admin-header .btn.profile { background: #f3f4f6; color: #7c3aed; }
        .admin-header .btn.home { background: #6366f1; color: #fff; }
        .admin-header .btn.logout { background: #ef4444; color: #fff; }
        .admin-header .btn.profile:hover { background: #ede9fe; color: #23272f; }
        .admin-header .btn.home:hover { background: #7c3aed; color: #fff; }
        .admin-header .btn.logout:hover { background: #dc2626; }
        .main-content {
            flex: 1;
            padding: 36px 36px 28px 36px;
            background: #f6f8fa;
            min-height: 0;
        }
        /* Banner/dashboard gradient style */
        .dashboard-banner {
            background: linear-gradient(90deg, #7c3aed 0%, #6366f1 60%, #a5b4fc 100%);
            color: #fff;
            border-radius: 24px;
            padding: 32px 36px 28px 36px;
            margin-bottom: 32px;
            box-shadow: 0 4px 24px 0 #7c3aed22;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .dashboard-banner .banner-title {
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .dashboard-banner .banner-desc {
            font-size: 1.1em;
            opacity: 0.95;
        }
        .dashboard-banner .banner-time {
            font-size: 1.3em;
            font-weight: 500;
            text-align: right;
        }
        /* Card dashboard style */
        .dashboard-cards {
            display: flex;
            gap: 24px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }
        .dashboard-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 2px 16px 0 #ede9fe;
            border: none;
            padding: 28px 24px 20px 24px;
            flex: 1 1 220px;
            min-width: 200px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            position: relative;
        }
        .dashboard-card .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.7em;
            margin-bottom: 12px;
            box-shadow: 0 2px 8px #ede9fe;
        }
        /* Pastel icon backgrounds */
        .dashboard-card .card-icon.pink { background: linear-gradient(135deg, #fbc2eb 0%, #f9d1b7 100%); color: #d946ef; }
        .dashboard-card .card-icon.blue { background: linear-gradient(135deg, #a5b4fc 0%, #67e8f9 100%); color: #2563eb; }
        .dashboard-card .card-icon.green { background: linear-gradient(135deg, #bbf7d0 0%, #a7f3d0 100%); color: #059669; }
        .dashboard-card .card-icon.orange { background: linear-gradient(135deg, #fcd34d 0%, #fbbf24 100%); color: #f59e42; }
        .dashboard-card .card-icon.purple { background: linear-gradient(135deg, #ede9fe 0%, #c4b5fd 100%); color: #7c3aed; }
        .dashboard-card .card-title {
            font-size: 1.1em;
            font-weight: 600;
            margin-bottom: 4px;
        }
        .dashboard-card .card-value {
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .dashboard-card .card-desc {
            font-size: 0.98em;
            color: #6b7280;
        }
        .card, .table-container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 12px 0 #ede9fe;
            border: none;
            margin-bottom: 24px;
            padding: 24px;
        }
        .fa-solid, .fa-regular, .fa-brands {
            color: #7c3aed;
        }
        @media (max-width: 900px) {
            .sidebar { width: 60px; }
            .sidebar .logo, .sidebar .menu-group-title, .sidebar a span { display: none; }
            .sidebar a { justify-content: center; padding: 12px 0; }
            .main-content { padding: 18px 4vw; }
            .admin-header { padding: 0 10px; }
        }
    </style>
    {block name=extra_head}{/block}
</head>
<body>
<div class="admin-wrapper">
    <nav class="sidebar">
        <div class="logo"><i class="fa-solid fa-cart-shopping"></i> <span>Admin Panel</span></div>
        <div class="menu-group">
            <div class="menu-group-title">QUẢN LÝ SẢN PHẨM</div>
            <a href="/itc_toi-main/index.php?controller=product&action=index"><i class="fa-solid fa-box"></i> <span>Danh sách sản phẩm</span></a>
        </div>
        <div class="menu-group">
            <div class="menu-group-title">QUẢN LÝ ĐƠN HÀNG</div>
            <a href="/itc_toi-main/index.php?controller=orders_admin&action=index"><i class="fa-solid fa-receipt"></i> <span>Danh sách đơn hàng</span></a>
            <a href="/itc_toi-main/index.php?controller=bank_transfer&action=admin"><i class="fa-solid fa-university"></i> <span>Quản lý chuyển khoản</span></a>
        </div>
        <div class="menu-group">
            <div class="menu-group-title">QUẢN LÝ KHUYẾN MÃI</div>
            <a href="/itc_toi-main/index.php?controller=promotions&action=index"><i class="fa-solid fa-tags"></i> <span>Mã khuyến mãi</span></a>
        </div>
        <div class="menu-group">
            <div class="menu-group-title">QUẢN LÝ NGƯỜI DÙNG</div>
            <a href="/itc_toi-main/index.php?controller=admin&action=index"><i class="fa-solid fa-users"></i> <span>Danh sách người dùng</span></a>
        </div>
        <div class="menu-group">
            <div class="menu-group-title">THỐNG KÊ & BÁO CÁO</div>
            <a href="/itc_toi-main/index.php?controller=dashboard&action=index"><i class="fa-solid fa-chart-line"></i> <span>Tổng quan</span></a>
            <a href="/itc_toi-main/index.php?controller=report&action=sales"><i class="fa-solid fa-file-invoice-dollar"></i> <span>Báo cáo bán hàng</span></a>
            <a href="/itc_toi-main/index.php?controller=report&action=users"><i class="fa-solid fa-user-group"></i> <span>Thống kê người dùng</span></a>
        </div>
        <div class="menu-group">
            <div class="menu-group-title">CÀI ĐẶT</div>
            <a href="/itc_toi-main/index.php?controller=settings&action=index"><i class="fa-solid fa-gear"></i> <span>Cài đặt</span></a>
        </div>
    </nav>
    <div class="main">
        <header class="admin-header">
            <div class="left">
                <span class="page-title">{block name=title}Admin Panel{/block}</span>
            </div>
            <div class="right">
                <div class="avatar"><i class="fa-solid fa-user"></i></div>
                <div class="admin-info">
                    <span class="name">{if isset($smarty.session.email)}{$smarty.session.email}{else}Admin{/if}</span>
                    <span class="role">Quản trị viên</span>
                </div>
                <a href="#" class="btn profile"><i class="fa-regular fa-id-badge"></i> Hồ sơ</a>
                <a href="/itc_toi-main/index.php" class="btn home"><i class="fa-solid fa-house"></i> Trang chủ</a>
                <form method="post" action="/itc_toi-main/index.php?controller=user&action=logout" style="display:inline;">
                    <button class="btn logout" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</button>
                </form>
            </div>
        </header>
        <main class="main-content">
            {block name=content}{/block}
        </main>
    </div>
</div>
</body>
</html> 