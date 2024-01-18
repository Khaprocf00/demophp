<?php
$path = "";
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    switch ($slug) {
        case "product":
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                switch ($action) {
                    case "add":
                        $path = $slug . "s/" . "product_add";
                        break;
                    case "edit":
                        if (isset($_GET['productId'])) {
                            $path = $slug . "s/" . "product_add";
                        } else {
                            $path = "404";
                        }
                        break;
                    default:
                        $path = "404";
                        break;
                }
            } else {
                $path = $slug . "s/" . $slug;
                break;
            }
        // case "category":
        //     if (isset($_GET['action'])) {
        //         $action = $_GET['action'];
        //         switch ($action) {
        //             case "add":
        //                 $path = $slug . "s/" . "/category_add";
        //                 break;
        //             case "edit":
        //                 if (isset($_GET['categoryId'])) {
        //                     $path = $slug . "s/" . "/category_add";
        //                 } else {
        //                     $path = "404";
        //                 }
        //                 break;
        //             default:
        //                 $path = "404";
        //                 break;
        //         }
        //     } else {
        //         $path = $slug . "s/" . $slug;
        //         break;
        //     }
        default:
            break;
    }
}


if ($path == "") {
    $path = "index";
}

include($func->includeAdmin($path));