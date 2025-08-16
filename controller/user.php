<?php

if( (isset($_GET['controller']) && $_GET['controller'] == 'user' && isset($_GET['action']) && $_GET['action'] == 'login') ) {
    // Hiển thị form login hoặc xử lý login POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['email']; // Trường này có thể là email hoặc username
        $password = $_POST['password'];
        $users = new users();
        // Tìm user theo email hoặc username
        $user = $users->user($login);
        if(empty($user)) {
            // Thử tìm theo username nếu chưa có
            $user = $users->user_by_username($login);
        }
        if(empty($user)) {
            if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                echo "Tên đăng nhập hoặc email không tồn tại.";
                return;
            } else {
                echo "Tên đăng nhập hoặc email không tồn tại.";
                exit();
            }
        } elseif( $user[0]['password'] != $password ) {
            if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                echo "Mật khẩu không đúng.";
                return;
            } else {
                echo "Mật khẩu không đúng.";
                exit();
            }
        } else {
            // Đúng mới set session
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['role'] = $user[0]['role'];
            setcookie("email", $_SESSION['email'], time() + (86400 * 30)); // Cookie expires in 30 days
            if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'role' => $_SESSION['role']
                ]);
                exit();
            }
            // Không còn đồng bộ giỏ hàng guest
            
            if ($_SESSION['role'] === 'admin') {
                header("Location: /itc_toi-main/index.php?controller=admin&action=index");
            } else {
                header("Location: /itc_toi-main/index.php?controller=user&action=welcome&login_success=1");
            }
            exit();
        }
    } else {
        // Hiển thị form login (nếu cần)
        // ... existing code ...
    }
} elseif( isset($_GET['controller']) && $_GET['controller'] == 'user' && isset($_GET['action']) && $_GET['action'] == 'welcome' ) {
    if( !isset($_SESSION['email']) || empty($_SESSION['email']) ) {
        echo "Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.";
        header("Location: /itc_toi-main/index.php?controller=user&action=login");
        exit();
    }
    include_once 'model/products.php';
    include_once 'model/categories.php';
    $products = new products();
    $categories = new categories();
    $all_products = $products->list_all();
    $all_categories = $categories->list_all();
    $smarty->assign('products', $all_products);
    $smarty->assign('categories', $all_categories);
    $smarty->assign('email', $_SESSION['email']);
    // ... existing code ...
} elseif( isset($_GET['controller']) && $_GET['controller'] == 'user' && isset($_GET['action']) && $_GET['action'] == 'logout' ) {
    session_start();
    session_unset();
    session_destroy();
    setcookie("email", '', -1); // Xóa cookie
    header("Location: /itc_toi-main/index.php"); // Về trang chủ
    exit();
} elseif( isset($_GET['controller']) && $_GET['controller'] == 'user' && isset($_GET['action']) && $_GET['action'] == 'register' ) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $name = $_POST['fullName'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $role = 'user'; // Mặc định user, có thể bổ sung chọn role nếu muốn
        if ($username && $name && $email && $password) {
            $users = new users();
            // Kiểm tra email hoặc username đã tồn tại chưa
            $check_email = $users->user($email);
            $check_username = $users->user_by_username($username);
            if (!empty($check_email)) {
                echo "Email đã tồn tại.";
                exit();
            }
            if (!empty($check_username)) {
                echo "Tên người dùng đã tồn tại.";
                exit();
            }
            global $db;
            $data = [
                'username' => $username,
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $ok = $db->record_insert('users', $data);
            if ($ok) {
                // Đăng ký thành công: show thông báo và chuyển về form đăng nhập sau 5s
                echo '<div style="display:flex;flex-direction:column;align-items:center;justify-content:center;height:100vh;background:#fff;">';
                echo '<div style="font-size:1.3em;color:#22c55e;font-weight:600;margin-bottom:18px;">Đăng ký thành công!</div>';
                echo '<div style="font-size:1.1em;margin-bottom:18px;">Bạn sẽ được chuyển về trang đăng nhập sau <span id="countdown">5</span> giây...</div>';
                echo '<a href="/itc_toi-main/index.php?controller=user&action=login" style="background:#7c3aed;color:#fff;padding:10px 22px;border-radius:6px;text-decoration:none;font-weight:500;font-size:1em;">Về trang đăng nhập</a>';
                echo '<script>let c=5;setInterval(()=>{c--;if(c>0){document.getElementById("countdown").innerText=c;}else{window.location.href="/itc_toi-main/index.php?controller=user&action=login";}},1000);</script>';
                echo '</div>';
                exit();
            } else {
                echo "Đăng ký thất bại.";
                exit();
            }
        } else {
            echo "Vui lòng nhập đầy đủ thông tin.";
            exit();
        }
    } else {
        // Hiển thị form đăng ký (nếu cần)
        // ... existing code ...
    }
} else {
    echo "Invalid action.";
}