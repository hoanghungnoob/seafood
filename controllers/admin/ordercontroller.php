<?php
require_once "../../models/admin/ordermodel.php";

$heading = "Post Page";

require_once '../../views/admin/orderview.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action']; // Thêm dòng này để lấy hành động từ form

    switch ($action) {
        case 'create':
            break;
        case 'edit':
            break;
        case 'delete':
            break;
        default:
            echo "Invalid action";
    }
}