<?php

$path = "";
$com = "";
$message = [];
$dataRegsiter = [];
$arr = [
    [
        "feild" => "idC",
        "com" => "danh-muc",
        "table" => "category",
        "type" => "danh-muc"
    ], [
        "feild" => "idP",
        "com" => "san-pham",
        "table" => "product",
        "type" => "san-pham"
    ], [
        "feild" => "idB",
        "com" => "tin-tuc",
        "table" => "blog",
        "type" => "tin-tuc"
    ]
];
if (isset($_POST['email'])) {
    $email = strip_tags($_POST['email']);
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $fullname = strip_tags($_POST['fullname']);
    $db->where('username', $username);
    $user = $db->getOne('user');
    if ($user != false) {
        $message['register'] = "Tài khoản này đã được sử dụng vui lòng điền tài khoản khác";
        $message['alert'] = "danger";
    } else {
        $data = [
            "username" => $username,
            "password" => password_hash($password, PASSWORD_BCRYPT),
            "fullname" => $fullname,
            "email" => $email,
        ];
        $db->insert('user', $data);
        $message['register'] = "Đăng ký thành công";
        $message['alert'] = "success";
    }
} else if (isset($_POST['username'])) {
    $db->where('username', strip_tags($_POST['username']));
    $user = $db->getOne('user');
    if ($user != false) {
        if (password_verify(strip_tags($_POST['password']), $user['password'])) {
            $user['password'] = strip_tags($_POST['password']);
            if (isset($_SESSION['account'])) {
                unset($_SESSION['account']);
            }
            $_SESSION['account'] = $user;

            header("Location: home");
        }
    }
}
$account = [];
if (isset($_SESSION['account'])) {
    $account = $login->checkLogin() ? $_SESSION['account'] : [];
}
if (isset($_GET['slug'])) {
    if ($_GET['slug'] == "logout") {
        unset($_SESSION['account']);
    }
}
if (isset($_GET['slug'])) {
    if ($_GET['slug'] == "logout") {
        $slug = "login";
    } else {
        $slug = $_GET['slug'];
    }
    $com = $slug;
    foreach ($arr as $item) {
        $db->where("code", $slug);
        $row = $db->getOne($item['table']);
        if ($row != false) {
            $_GET[$item['feild']] = $row['id'];
            $com = $item['com'];
            break;
        }
    }
    switch ($com) {
        case "danh-muc":
            $path = "products/product";
            break;
        case "san-pham":
            $path = "products/product_detail";
            break;
        case "tin-tuc":
            $path = "blog/blog_detail";
            break;
        default:
            if ($com == "product") {
                $path = "products/product";
            } else if ($com == "blog") {
                $path = "blog/blog";
            } else if ($com == "home") {
                $path = "index";
            } else if ($com == "login") {
                $path = "login/login";
            } else if ($com == "register") {
                $path = "login/register";
            } else if ($com == "cart") {
                $path = "cart/cart";
            } else if ($com == "purchase") {
                $path = "user/purchase";
            } else {
                $path = "404";
            }
            break;
    }
}
if ($path == "") {
    $path = "index";
}

include($func->includeMain($path));
