<?php
function getImageDetail($arr)
{
    $str = "";
    if (is_array($arr)) {
        $str = ' <div class="item">
        <img class="js-image-detail"
            src="assets/images/png/' . $arr['image_path'] . '" alt="">
        </div>';
    }
    return $str;
}
function product($arr)
{
    $str = "";
    if (is_array($arr)) {
        foreach ($arr as $item) {
            $str .= '
            <div class="col-lg-3 col-md-4 col-6 mb-3 js-set-id-product">
                <a href="' . $item["code"] . '">
                    <div class="product-item position-relative">
                        <div class="product-item-outline"> </div>
                            <div class="image">
                                <img src="assets/images/png/' . $item["image_path"] . '" alt="">
                        </div>
                        <div class="comment">
                            <div class="star">
                                <img src="assets/images/svg/Stars.svg" alt="">
                            </div>
                            <div class="evaluate">45 lượt đánh giá</div>
                        </div>
                        <div class="name">' . $item["name"] . '</div>
                        <div class="price">
                            <span>' . $item["price"] . 'đ</span>
                            <div class="discount">' . $item["discount"] . 'đ</div>
                        </div>
                        <div class="btn ">
                            <div class="image"></div>
                            <div class="btn-text">Xem chi tiết</div>
                        </div>
                    </div>
                </a>
            </div>';
        }
    } else {
        $str = "<h1>KHÔNG TÌM THẤY SẢN PHẨM</h1>";
    }
    return  $str;
}
function productOther($arr)
{
    $str = "";
    if (is_array($arr)) {
        $str = '<a href="' . $arr["code"] . '">
            <div class="container-item">
                <div class="container-item__image">
                    <img src="assets/images/png/' . $arr["image_path"] . '" alt="">
                </div>
                <div class="container-item__evalute d-flex justify-content-center">
                    <div class="image"><img src="assets/images/svg/Stars.svg" alt=""></div>
                    <div class="comment">45 lượt đánh giá</div>
                </div>
                <div class="container-item__title">' . $arr["name"] . '</div>
                <div class="container-item__price">' . $arr["discount"] . 'đ -
                    <span>' . $arr["price"] . 'đ</span>
                </div>
                <div class="container-item__btn center mx-auto">
                    <div class="image"></div>
                    <span>XEM CHI TIẾT</span>
                </div>
            </div>
        </a>';
    }
    return $str;
}
