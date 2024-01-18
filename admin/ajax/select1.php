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
if (isset($_GET['form_select_1'])) {
    $id = $_GET['form_select_1'];
    $db->where('parent_id', $id);
    $result = $db->get('category');
    $tmp = 0;
    $str = '<option value="-1">---- Chọn danh mục cấp 2 ----</option>';
    if (count($result) > 0) {
        if (isset($cate)) {
            foreach ($result as $row) {
                $str .= '<option ';
                if (in_array($row['id'], $cate)) {
                    $str .= ' selected ';
                }
                $str .= ' value="' . $row['id'] . '">' . $row['name'] . '</>';
                if (count($cate) > 2 && in_array($row['id'], $cate)) {
                    $tmp = $row['id'];
                }
            }
            if ($tmp != 0) { ?>
                <script>
                    $.ajax({
                        type: "GET",
                        url: "admin/ajax/select2.php",
                        data: {
                            form_select_2: <?= $tmp ?>,
                            productDetailId: <?= $_GET["productDetailId"] ?>,
                        },
                        success: function(data) {
                            $("#form-select-3").html(data);
                        },

                    });
                </script>
<?php
            }
        } else {
            foreach ($result as $row) {
                $str .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
        }
    }
    echo $str;
}
