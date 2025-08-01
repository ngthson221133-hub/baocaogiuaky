<?php
// session_start(); // Đã gọi ở index.php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo '<div style="display:flex;flex-direction:column;align-items:center;justify-content:center;height:100vh;background:#fff;">';
    echo '<div style="font-size:1.3em;color:#e53e3e;font-weight:600;margin-bottom:18px;">Bạn không có quyền truy cập trang này.</div>';
    echo '<button onclick="window.location.href=\'/itc_toi-main/index.php\'" style="background:#7c3aed;color:#fff;padding:10px 22px;border-radius:6px;text-decoration:none;font-weight:500;font-size:1em;cursor:pointer;">Đăng nhập lại</button>';
    echo '</div>';
    exit();
}

include_once 'model/users.php';
include_once 'model/categories.php'; // Added this include
include_once 'library/smarty/libs/Smarty.class.php';
$smarty = new \Smarty\Smarty;

$users = new users();
$message = '';

$actionName = $_GET['action'] ?? 'index';

if ($actionName == 'add' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $categories = new categories();
    $all_categories = $categories->list_all();
    $smarty->assign('categories', $all_categories);
    $smarty->assign('mainContent', 'admin/add.tpl');
} elseif ($actionName == 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    );
    global $db;
    $ok = $db->record_insert('users', $data);
    $message = $ok ? 'Thêm người dùng thành công!' : 'Thêm thất bại!';
    header('Location: /itc_toi-main/index.php?controller=admin&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'edit' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id > 0) {
        $user = $users->get_detail_by_id($id);
        if ($user) {
            $smarty->assign('user', $user);
            $smarty->assign('mainContent', 'admin/edit.tpl');
        } else {
            header('Location: /itc_toi-main/index.php?controller=admin&action=index&msg=' . urlencode('Không tìm thấy người dùng!'));
            exit();
        }
    } else {
        header('Location: /itc_toi-main/index.php?controller=admin&action=index&msg=' . urlencode('ID không hợp lệ!'));
        exit();
    }
} elseif ($actionName == 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    if ($id == 1 || $_POST['email'] === 'admin') {
        $message = 'Không thể sửa tài khoản admin gốc!';
        header('Location: /itc_toi-main/index.php?controller=admin&action=index&msg='.urlencode($message));
        exit();
    }
    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    );
    global $db;
    $ok = $db->record_update('users', $data, "id = $id");
    $message = $ok ? 'Cập nhật thành công!' : 'Cập nhật thất bại!';
    header('Location: /itc_toi-main/index.php?controller=admin&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $user = $users->get_detail_by_id($id);
    if ($id == 1 || (isset($user['email']) && $user['email'] === 'admin')) {
        $message = 'Không thể xóa tài khoản admin gốc!';
        header('Location: /itc_toi-main/index.php?controller=admin&action=index&msg='.urlencode($message));
        exit();
    }
    global $db;
    $ok = $db->record_delete('users', "id = $id");
    $message = $ok ? 'Xóa thành công!' : 'Xóa thất bại!';
    header('Location: /itc_toi-main/index.php?controller=admin&action=index&msg='.urlencode($message));
    exit();
} else {
    $q = isset($_GET['q']) ? trim($_GET['q']) : '';
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $where = '';
    if ($q !== '') {
        global $db;
        $link = $db->getLink();
        if (!$link) { $db->connect(); $link = $db->getLink(); }
        $q_esc = mysqli_real_escape_string($link, $q);
        $where = "WHERE name LIKE '%$q_esc%' OR email LIKE '%$q_esc%'";
    }
    global $db;
    $sql = "SELECT * FROM users $where ORDER BY id DESC LIMIT $offset, $limit";
    $list = $db->executeQuery_list($sql);
    $sql_count = "SELECT COUNT(*) as total FROM users $where";
    $total = $db->executeQuery_list($sql_count);
    $total_users = isset($total[0]['total']) ? intval($total[0]['total']) : 0;
    $total_pages = ceil($total_users / $limit);
    $smarty->assign('users', $list);
    $smarty->assign('message', $_GET['msg'] ?? '');
    $smarty->assign('q', $q);
    $smarty->assign('page', $page);
    $smarty->assign('total_pages', $total_pages);
    // KHÔNG gọi $smarty->display ở đây!
} 