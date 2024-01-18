<?php
include '../../lib/config.php';
require "../../vendor/autoload.php";

use App\Brand;
use App\PDODb;
use App\Product;

$db = new PDODb($config['database']);
if (isset($_POST['ids'])) {
    $ids = $_POST['ids'];
    foreach ($ids as $item) {
        if ($item != 'on') {
            $db->where('product_id', $item);
            $db->delete('product_brand');
            $db->where('product_id', $item);
            $db->delete('blog');
            $db->where('product_id', $item);
            $db->delete('image_detail');
            $db->where('product_id', $item);
            $db->delete('order');
            $db->where('product_id', $item);
            $db->delete('product_detail');
            $db->where('id', $item);
            $db->delete('product');
        }
    }
}
