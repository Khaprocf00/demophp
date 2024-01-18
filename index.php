<?php
ini_set('session.gc_maxlifetime', 10800);
session_start();
define('template', "templates/");
require "lib/config.php";
require "vendor/autoload.php";

use App\PDODb;
use App\Blog;
use App\Product;
use App\Functions;
use App\Login;
use App\Cart;
use App\Category;
use App\Purchase;

$db = new PDODb($config['database']);
$product = new Product($config['database']);
$blog = new Blog($config['database']);
$category = new Category($config['database']);
$func = new Functions($config['database']);
$cart = new Cart($config['database']);
$login = new Login($config['database']);
$purchase = new Purchase($config['database']);

require "lib/controller.php";
