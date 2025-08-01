<?php
// session_start(); // Đã gọi ở index.php
$actionName = $_GET['action'] ?? 'index';

// Chỉ kiểm tra quyền admin cho các action quản lý (không phải detail)
if ($actionName !== 'detail' && (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin')) {
    echo 'Bạn không có quyền truy cập trang này.';
    exit();
}

include_once 'model/products.php';
include_once 'model/categories.php';
include_once 'library/smarty/libs/Smarty.class.php';
$smarty = new \Smarty\Smarty;

$products = new products();
$categories = new categories();
$message = '';

// Function xử lý upload ảnh
function handleImageUpload($file, $productName) {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }
    
    // Kiểm tra loại file
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($file['type'], $allowedTypes)) {
        return false;
    }
    
    // Kiểm tra kích thước file (max 5MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        return false;
    }
    
    // Tạo tên file an toàn
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $safeName = preg_replace('/[^a-zA-Z0-9]/', '_', $productName);
    $fileName = $safeName . '_' . time() . '.' . $extension;
    $uploadPath = 'uploads/products/' . $fileName;
    
    // Upload file
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        return $uploadPath;
    }
    
    return false;
}

$actionName = $_GET['action'] ?? 'index';

if ($actionName == 'add' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $all_categories = $categories->list_all();
    $smarty->assign('categories', $all_categories);
    $smarty->assign('mainContent', 'product/add.tpl');
} elseif ($actionName == 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xử lý ảnh upload
    $image_url = $_POST['image_url'] ?? '';
    
    // Nếu có file upload, xử lý file trước
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $uploadedImage = handleImageUpload($_FILES['product_image'], $_POST['name']);
        if ($uploadedImage) {
            $image_url = $uploadedImage;
        }
    }
    
    // Kiểm tra có ảnh không
    if (empty($image_url)) {
        $message = 'Vui lòng chọn ảnh hoặc nhập URL ảnh!';
        header('Location: /itc_toi-main/index.php?controller=product&action=add&msg='.urlencode($message));
        exit();
    }
    
    $data = array(
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity'],
        'category_id' => $_POST['category_id'],
        'image_url' => $image_url
    );
    global $db;
    $ok = $db->record_insert('products', $data);
    $message = $ok ? 'Thêm sản phẩm thành công!' : 'Thêm thất bại!';
    header('Location: /itc_toi-main/index.php?controller=product&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'edit' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = intval($_GET['id']);
    if ($id > 0) {
        $product = $products->get_detail_by_id($id);
        if ($product) {
            $all_categories = $categories->list_all();
            $smarty->assign('product', $product);
            $smarty->assign('categories', $all_categories);
            $smarty->assign('mainContent', 'product/edit.tpl');
        } else {
            header('Location: /itc_toi-main/index.php?controller=product&action=index&msg=' . urlencode('Không tìm thấy sản phẩm!'));
            exit();
        }
    } else {
        header('Location: /itc_toi-main/index.php?controller=product&action=index&msg=' . urlencode('ID không hợp lệ!'));
        exit();
    }
} elseif ($actionName == 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    
    // Xử lý ảnh upload
    $image_url = $_POST['image_url'] ?? '';
    
    // Nếu có file upload, xử lý file trước
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $uploadedImage = handleImageUpload($_FILES['product_image'], $_POST['name']);
        if ($uploadedImage) {
            $image_url = $uploadedImage;
        }
    }
    
    // Kiểm tra có ảnh không
    if (empty($image_url)) {
        $message = 'Vui lòng chọn ảnh hoặc nhập URL ảnh!';
        header('Location: /itc_toi-main/index.php?controller=product&action=edit&id='.$id.'&msg='.urlencode($message));
        exit();
    }
    
    $data = array(
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity'],
        'category_id' => $_POST['category_id'],
        'image_url' => $image_url
    );
    global $db;
    $ok = $db->record_update('products', $data, "id = $id");
    $message = $ok ? 'Cập nhật thành công!' : 'Cập nhật thất bại!';
    header('Location: /itc_toi-main/index.php?controller=product&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    global $db;
    $ok = $db->record_delete('products', "id = $id");
    $message = $ok ? 'Xóa thành công!' : 'Xóa thất bại!';
    header('Location: /itc_toi-main/index.php?controller=product&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'detail') {
    $id = intval($_GET['id']);
    if ($id > 0) {
        $product = $products->get_detail_by_id($id);
        if ($product) {
            // Lấy thông tin category
            $categories = new categories();
            $category = $categories->get_detail_by_id($product['category_id']);
            
            $smarty->assign('product', $product);
            $smarty->assign('category', $category);
            
            // Chọn template dựa trên session
            if (isset($_SESSION['username'])) {
                // Nếu đã đăng nhập, dùng template welcome
                $smarty->assign('mainContent', 'product/detail_welcome.tpl');
            } else {
                // Nếu chưa đăng nhập, dùng template index
                $smarty->assign('mainContent', 'product/detail_index.tpl');
            }
        } else {
            header('Location: /itc_toi-main/index.php?msg=' . urlencode('Không tìm thấy sản phẩm!'));
            exit();
        }
    } else {
        header('Location: /itc_toi-main/index.php?msg=' . urlencode('ID không hợp lệ!'));
        exit();
    }
} else {
    $q = isset($_GET['q']) ? trim($_GET['q']) : '';
    $price_from = isset($_GET['price_from']) ? floatval($_GET['price_from']) : '';
    $price_to = isset($_GET['price_to']) ? floatval($_GET['price_to']) : '';
    $category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : '';
    
    $where = [];
    if ($q !== '') $where[] = "name LIKE '%".addslashes($q)."%'";
    if ($price_from !== '' && $price_from > 0) $where[] = "price >= $price_from";
    if ($price_to !== '' && $price_to > 0) $where[] = "price <= $price_to";
    if ($category_id !== '' && $category_id > 0) $where[] = "category_id = $category_id";
    
    $where_sql = count($where) ? 'WHERE '.implode(' AND ', $where) : '';
    global $db;
    $sql = "SELECT * FROM products $where_sql ORDER BY id DESC";
    $list = $db->executeQuery_list($sql);
    
    // Debug: Kiểm tra kết quả
    error_log("Product search SQL: $sql");
    error_log("Product count: " . count($list));
    
    $smarty->assign('products', $list);
    $smarty->assign('message', $_GET['msg'] ?? '');
    $smarty->assign('q', $q);
    $smarty->assign('price_from', $price_from);
    $smarty->assign('price_to', $price_to);
    $smarty->assign('category_id', $category_id);
    $smarty->assign('mainContent', 'product/index.tpl');
    // KHÔNG gọi $smarty->display ở đây!
} 