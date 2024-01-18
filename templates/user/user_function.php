<?php

function purchaseShowAll($purchase, $account, $product)
{
    $str = "";
    $showAll = $purchase->findAllByUser($account['id']);
    foreach ($showAll as $item) {
        $p = $product->findById($item['product_id']);
        $str .= '<li>
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <img style="width: 100px;"
                    src="assets/images/png/' . $p["image_path"] . '" alt="">
                <div class="d-flex flex-column justify-content-between py-2">
                    <div class="name split split-2">' . $p["name"] . '</div>
                    <div class="qty">Số lượng x1</div>
                </div>
            </div>
            <div class="">
                ' . $p["price"] . '
            </div>
        </div>
        <div class="float-right">
            <a href="' . $p["code"] . '"><button>
            Mua lại
        </button></a>
            <button>
                Liên hệ người bán
            </button>
        </div>
    </li>';
    }
    return $str;
}
function purchaseShowByStatus($purchase, $account, $product, $statusId)
{
    $str = "";
    $showAll = $purchase->findAllByUser($account['id']);
    foreach ($showAll as $item) {
        if ($item['status_id'] == $statusId) {
            $p = $product->findById($item['product_id']);
            $str .= '<li>
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <img style="width: 100px;"
                        src="assets/images/png/' . $p["image_path"] . '" alt="">
                    <div class="d-flex flex-column justify-content-between py-2">
                        <div class="name split split-2">' . $p["name"] . '</div>
                        <div class="qty">Số lượng x1</div>
                    </div>
                </div>
                <div class="">
                    ' . $p["price"] . '
                </div>
            </div>
            <div class="float-right">
                <button>
                    Mua lại
                </button>
                <button>
                    Liên hệ người bán
                </button>
            </div>
        </li>';
        }
    }
    return $str;
}
