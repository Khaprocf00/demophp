<?php

namespace App;

class Cart
{
    private $model;
    public $totalCart = 0;
    public function __construct($config)
    {
        $this->model = new PDODb($config);
        if (isset($_SESSION['cart'])) {
            $this->totalCart = count($_SESSION['cart']);
        }
    }

    public static function checkCart($id)
    {
        $carts = [];
        if (isset($_SESSION['cart'])) {
            $carts =  $_SESSION['cart'];
        }
        if (count($carts) > 0) {
            foreach ($carts as $item) {
                if (isset($item['id']) && $item['id'] == $id) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function posCart($id)
    {
        $carts = [];
        if (isset($_SESSION['cart'])) {
            $carts =  $_SESSION['cart'];
        }
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                if (isset($item['id']) && $item['id'] == $id) {
                    return $pos;
                }
            }
        }
        return -1;
    }

    public static function addCart($cart_item)
    {
        $carts = [];
        if (isset($_SESSION['cart'])) {
            $carts =  $_SESSION['cart'];
        }
        if (isset($cart_item['id'])) {
            if (count($carts) > 0) {
                if (self::checkCart($cart_item['id']) == true) {
                    $pos = self::posCart($cart_item['id']);
                    $carts[$pos]['qty'] += $cart_item['qty'];
                } else {
                    $carts[] = $cart_item;
                }
            } else {
                $carts[] = $cart_item;
            }
            $_SESSION['cart'] = $carts;
        } else {
        }
    }
    public static function cartContent()
    {
        $carts = [];
        if (isset($_SESSION['cart'])) {
            $carts =  $_SESSION['cart'];
        }
        return $carts;
    }
    public static function cartTotal()
    {
        $total = 0;
        $carts = [];
        if (isset($_SESSION['cart'])) {
            $carts =  $_SESSION['cart'];
        }
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                if (isset($item['price']) && isset($item['qty'])) {
                    $total += $item['qty'] * $item['price'];
                }
            }
        }
        return $total;
    }
    public static function updateCart($id, $qty)
    {
        $carts = [];
        if (isset($_SESSION['cart'])) {
            $carts =  $_SESSION['cart'];
        }
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                if ($item['id'] == $id) {
                    if ($qty == 0) {
                        unset($carts[$pos]);
                    } else {
                        $carts[$pos]['qty'] = $qty;
                    }
                }
            }
        }
        $_SESSION['cart'] = $carts;
        header("Location: ../../../cart");
    }
    public static function deleteCart($id)
    {
        $carts = [];
        if (isset($_SESSION['cart'])) {
            $carts =  $_SESSION['cart'];
        }
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                if ($item['id'] == $id) {
                    unset($carts[$pos]);
                }
            }
        }
        $_SESSION['cart'] = $carts;
        header("Location: ../../cart");
    }
    public function saveBill($account, $statusId)
    {
        $carts = [];
        if (isset($_SESSION['cart'])) {
            $carts =  $_SESSION['cart'];
        }

        if (count($carts) > 0) {
            var_dump($_SESSION['account']);
            foreach ($carts as $item) {
                $productDetail = $this->model->rawQueryOne("select * from table_product where id = " . $item['id']);
                $data = [
                    "user_id" => $account['id'],
                    "product_id" => $item['id'],
                    "status_id" => $statusId,
                ];
                $insert = $this->model->insert("order", $data);
                if ($insert) {
                    $dataUpdateProduct = [
                        "qty" => $productDetail['qty'] -  $item['qty']
                    ];
                    $this->model->where('id', $productDetail['id']);
                    $this->model->update("product",  $dataUpdateProduct);
                }
            }
        }
    }
}
