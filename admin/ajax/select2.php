<?php
include '../../lib/config.php';
require "../../vendor/autoload.php";

use App\Category;
use App\PDODb;
use App\Product;

$db = new PDODb($config['database']);
$category = new Category($config['database']);
$product = new Product($config['database']);
if ($_GET['productDetailId'] != null) {
    $productDetail = $product->findById($_GET['productDetailId']);
    $cate = $category->findCategory($productDetail['category_id']);
}
if (isset($_GET['form_select_2'])) {
    $id = $_GET['form_select_2'];
    $db->where('parent_id', $id);
    $result = $db->get('category');
    $str = '<option value="-1">---- Chọn danh mục cấp 3 ----</option>';
    if (count($result) > 0) {
        if (isset($cate)) {
            foreach ($result as $row) {
                $str .= '<option ';
                if (in_array($row['id'], $cate)) {
                    $str .= ' selected ';
                }
                $str .= ' value="' . $row['id'] . '">' . $row['name'] . '</>';
            }
        } else {
            foreach ($result as $row) {
                $str .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
        }
    }
    echo $str;
}
