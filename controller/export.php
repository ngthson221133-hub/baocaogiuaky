<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class exportController {
    
    public function salesReportAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        include_once 'model/orders.php';
        include_once 'model/order_items.php';
        include_once 'model/products.php';
        include_once 'vendor/autoload.php';
        
        $orders = new orders();
        $order_items = new order_items();
        $products = new products();
        
        $all_orders = $orders->get_all_orders();
        
        // Tạo file Excel mới
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Thiết lập tiêu đề
        $sheet->setTitle('Báo cáo bán hàng');
        
        // Header style
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '2563EB'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ];
        
        // Tiêu đề báo cáo
        $sheet->mergeCells('A1:H1');
        $sheet->setCellValue('A1', 'BÁO CÁO BÁN HÀNG - ' . date('d/m/Y H:i:s'));
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        
        // Thống kê tổng quan
        $total_revenue = 0;
        $total_orders = count($all_orders);
        $today_revenue = 0;
        $today_orders = 0;
        $today = date('Y-m-d');
        
        foreach ($all_orders as $order) {
            $order_amount = floatval($order['total_amount']);
            $total_revenue += $order_amount;
            
            if (isset($order['created_at'])) {
                $order_date = date('Y-m-d', strtotime($order['created_at']));
                if ($order_date === $today) {
                    $today_revenue += $order_amount;
                    $today_orders++;
                }
            }
        }
        
        // Thống kê tổng quan
        $sheet->setCellValue('A3', 'THỐNG KÊ TỔNG QUAN');
        $sheet->getStyle('A3')->getFont()->setBold(true)->setSize(14);
        
        $sheet->setCellValue('A4', 'Tổng doanh thu:');
        $sheet->setCellValue('B4', number_format($total_revenue, 0, ',', '.') . ' VNĐ');
        $sheet->setCellValue('A5', 'Tổng đơn hàng:');
        $sheet->setCellValue('B5', $total_orders);
        $sheet->setCellValue('A6', 'Doanh thu hôm nay:');
        $sheet->setCellValue('B6', number_format($today_revenue, 0, ',', '.') . ' VNĐ');
        $sheet->setCellValue('A7', 'Đơn hàng hôm nay:');
        $sheet->setCellValue('B7', $today_orders);
        
        // Header cho bảng đơn hàng
        $sheet->setCellValue('A9', 'STT');
        $sheet->setCellValue('B9', 'Mã đơn hàng');
        $sheet->setCellValue('C9', 'Khách hàng');
        $sheet->setCellValue('D9', 'Tổng tiền');
        $sheet->setCellValue('E9', 'Trạng thái');
        $sheet->setCellValue('F9', 'Ngày tạo');
        $sheet->setCellValue('G9', 'Sản phẩm');
        $sheet->setCellValue('H9', 'Số lượng');
        
        $sheet->getStyle('A9:H9')->applyFromArray($headerStyle);
        
        // Dữ liệu đơn hàng
        $row = 10;
        $stt = 1;
        
        foreach ($all_orders as $order) {
            $order_items_list = $order_items->get_order_items($order['id']);
            
            if (empty($order_items_list)) {
                // Nếu không có sản phẩm, vẫn hiển thị đơn hàng
                $sheet->setCellValue('A' . $row, $stt);
                $sheet->setCellValue('B' . $row, '#' . $order['id']);
                $sheet->setCellValue('C' . $row, $order['username'] ?? 'Khách');
                $sheet->setCellValue('D' . $row, number_format($order['total_amount'], 0, ',', '.') . ' VNĐ');
                $sheet->setCellValue('E' . $row, $this->getStatusText($order['status']));
                $sheet->setCellValue('F' . $row, date('d/m/Y H:i', strtotime($order['created_at'])));
                $sheet->setCellValue('G' . $row, 'N/A');
                $sheet->setCellValue('H' . $row, 'N/A');
                $row++;
                $stt++;
            } else {
                // Hiển thị từng sản phẩm trong đơn hàng
                foreach ($order_items_list as $item) {
                    $sheet->setCellValue('A' . $row, $stt);
                    $sheet->setCellValue('B' . $row, '#' . $order['id']);
                    $sheet->setCellValue('C' . $row, $order['username'] ?? 'Khách');
                    $sheet->setCellValue('D' . $row, number_format($order['total_amount'], 0, ',', '.') . ' VNĐ');
                    $sheet->setCellValue('E' . $row, $this->getStatusText($order['status']));
                    $sheet->setCellValue('F' . $row, date('d/m/Y H:i', strtotime($order['created_at'])));
                    $sheet->setCellValue('G' . $row, $item['product_name']);
                    $sheet->setCellValue('H' . $row, $item['quantity'] . ' kg');
                    $row++;
                    $stt++;
                }
            }
        }
        
        // Tự động điều chỉnh độ rộng cột
        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        
        // Border cho toàn bộ dữ liệu
        $lastRow = $row - 1;
        $sheet->getStyle('A9:H' . $lastRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        
        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $filename = 'bao_cao_ban_hang_' . date('Y-m-d_H-i-s') . '.xlsx';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit();
    }
    
    public function dashboardAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        include_once 'model/orders.php';
        include_once 'model/users.php';
        include_once 'model/products.php';
        include_once 'vendor/autoload.php';
        
        global $db;
        
        // Lấy dữ liệu tổng quan
        $total_revenue = $db->executeQuery_list('SELECT SUM(total_amount) as revenue FROM orders');
        $total_revenue = isset($total_revenue[0]['revenue']) ? $total_revenue[0]['revenue'] : 0;
        
        $total_orders = $db->executeQuery_list('SELECT COUNT(*) as cnt FROM orders');
        $total_orders = isset($total_orders[0]['cnt']) ? $total_orders[0]['cnt'] : 0;
        
        $total_products = $db->executeQuery_list('SELECT COUNT(*) as cnt FROM products');
        $total_products = isset($total_products[0]['cnt']) ? $total_products[0]['cnt'] : 0;
        
        $total_users = $db->executeQuery_list('SELECT COUNT(*) as cnt FROM users');
        $total_users = isset($total_users[0]['cnt']) ? $total_users[0]['cnt'] : 0;
        
        // Top sản phẩm bán chạy
        $top_products = $db->executeQuery_list('
            SELECT oi.product_name, SUM(oi.quantity) as total_sold, SUM(oi.quantity * oi.product_price) as total_revenue
            FROM order_items oi
            GROUP BY oi.product_id, oi.product_name
            ORDER BY total_sold DESC
            LIMIT 10
        ');
        
        // Đơn hàng gần đây
        $recent_orders = $db->executeQuery_list('SELECT o.*, u.username FROM orders o LEFT JOIN users u ON o.user_id = u.id ORDER BY o.created_at DESC LIMIT 20');
        
        // Tạo file Excel mới
        $spreadsheet = new Spreadsheet();
        
        // Sheet 1: Tổng quan
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('Tổng quan');
        
        // Header style
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '2563EB'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ];
        
        // Tiêu đề
        $sheet1->mergeCells('A1:D1');
        $sheet1->setCellValue('A1', 'BÁO CÁO TỔNG QUAN HỆ THỐNG - ' . date('d/m/Y H:i:s'));
        $sheet1->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet1->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        
        // Thống kê tổng quan
        $sheet1->setCellValue('A3', 'THỐNG KÊ TỔNG QUAN');
        $sheet1->getStyle('A3')->getFont()->setBold(true)->setSize(14);
        
        $sheet1->setCellValue('A4', 'Tổng doanh thu:');
        $sheet1->setCellValue('B4', number_format($total_revenue, 0, ',', '.') . ' VNĐ');
        $sheet1->setCellValue('A5', 'Tổng đơn hàng:');
        $sheet1->setCellValue('B5', $total_orders);
        $sheet1->setCellValue('A6', 'Tổng sản phẩm:');
        $sheet1->setCellValue('B6', $total_products);
        $sheet1->setCellValue('A7', 'Tổng người dùng:');
        $sheet1->setCellValue('B7', $total_users);
        
        // Sheet 2: Top sản phẩm bán chạy
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Top sản phẩm bán chạy');
        
        $sheet2->mergeCells('A1:C1');
        $sheet2->setCellValue('A1', 'TOP SẢN PHẨM BÁN CHẠY');
        $sheet2->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet2->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        
        $sheet2->setCellValue('A3', 'STT');
        $sheet2->setCellValue('B3', 'Tên sản phẩm');
        $sheet2->setCellValue('C3', 'Số lượng đã bán (kg)');
        $sheet2->setCellValue('D3', 'Doanh thu (VNĐ)');
        
        $sheet2->getStyle('A3:D3')->applyFromArray($headerStyle);
        
        $row = 4;
        $stt = 1;
        foreach ($top_products as $product) {
            $sheet2->setCellValue('A' . $row, $stt);
            $sheet2->setCellValue('B' . $row, $product['product_name']);
            $sheet2->setCellValue('C' . $row, $product['total_sold']);
            $sheet2->setCellValue('D' . $row, number_format($product['total_revenue'], 0, ',', '.'));
            $row++;
            $stt++;
        }
        
        // Sheet 3: Đơn hàng gần đây
        $sheet3 = $spreadsheet->createSheet();
        $sheet3->setTitle('Đơn hàng gần đây');
        
        $sheet3->mergeCells('A1:F1');
        $sheet3->setCellValue('A1', 'ĐƠN HÀNG GẦN ĐÂY');
        $sheet3->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet3->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        
        $sheet3->setCellValue('A3', 'STT');
        $sheet3->setCellValue('B3', 'Mã đơn hàng');
        $sheet3->setCellValue('C3', 'Khách hàng');
        $sheet3->setCellValue('D3', 'Tổng tiền');
        $sheet3->setCellValue('E3', 'Trạng thái');
        $sheet3->setCellValue('F3', 'Ngày tạo');
        
        $sheet3->getStyle('A3:F3')->applyFromArray($headerStyle);
        
        $row = 4;
        $stt = 1;
        foreach ($recent_orders as $order) {
            $sheet3->setCellValue('A' . $row, $stt);
            $sheet3->setCellValue('B' . $row, '#' . $order['id']);
            $sheet3->setCellValue('C' . $row, $order['username'] ?? 'Khách');
            $sheet3->setCellValue('D' . $row, number_format($order['total_amount'], 0, ',', '.') . ' VNĐ');
            $sheet3->setCellValue('E' . $row, $this->getStatusText($order['status']));
            $sheet3->setCellValue('F' . $row, date('d/m/Y H:i', strtotime($order['created_at'])));
            $row++;
            $stt++;
        }
        
        // Tự động điều chỉnh độ rộng cột cho tất cả sheet
        foreach ([$sheet1, $sheet2, $sheet3] as $sheet) {
            foreach (range('A', 'F') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }
        }
        
        // Border cho dữ liệu
        $sheet2->getStyle('A3:D' . ($row - 1))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet3->getStyle('A3:F' . ($row - 1))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        
        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $filename = 'bao_cao_tong_quan_' . date('Y-m-d_H-i-s') . '.xlsx';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit();
    }
    
    private function getStatusText($status) {
        switch ($status) {
            case 'pending':
                return 'Chờ xử lý';
            case 'confirmed':
                return 'Đã xác nhận';
            case 'shipping':
                return 'Đang giao';
            case 'delivered':
                return 'Đã giao';
            case 'cancelled':
                return 'Đã hủy';
            default:
                return $status;
        }
    }
}
?> 