<?php
require_once "product_function.php";

$productDetail = $product->showProductDetail();
if ($productDetail == null) {
    echo "<h1>PAGE NOT FOUND</h1>";
} else {
    $products = $product->show();
    $imageDetail = $product->productImageOfProduct($productDetail["id"]);
?>
<?php
    $cart_item = [];
    if (isset($_POST['id'])) {
        $cart_item['id'] = $_POST['id'];
        $cart_item['qty'] = $_POST['qty'];
    }
    $cart->addCart($cart_item);
    if (isset($_SESSION['cart'])) {
        $cart->totalCart = count($_SESSION['cart']);
    }
    $db->where('product_id', $productDetail['id']);
    $colors = $db->get("product_detail");
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="<?=$config['url']?>">
    <link rel="stylesheet" href="assets/css/product-detail.css">

    <!-- font -->

    <link rel="stylesheet" href="assets/css/reponsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Roboto:ital,wght@1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Manrope:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Manrope:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Manrope:wght@200;300;400;500;600;700;800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- OwlCarousel2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"
        integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>


<body>
    <div id="bg">
        <div id="header">
            <a href="cart" id="cart" class="center"><i class="fa-solid fa-cart-shopping"></i>
                <div class="totalCart"><?= $cart->totalCart; ?></div>
            </a>
            <a href="home">
                <div class="image">
                    <img src="assets/images/png/image 257.png" alt="">
                </div>
            </a>
            <div class="bg-input">
                <form action="">
                    <div class="input">
                        <input type="text" name="search" placeholder="Nhập tên sản phẩm cần tìm...">
                        <button style="border: none; background-color: transparent;" type="submit">
                            <div class="icon-search center">
                                <img src="assets/images/svg/Vector.svg" alt="">
                            </div>
                        </button>
                    </div>
                </form>
            </div>
            <a href="">
                <div class="hotline">
                    <div class="image">
                        <img src="assets/images/png/hotline.gif" alt="">
                    </div>
                    <div class="content">
                        <div class="text">HOTLINE TƯ VẤN 24/7</div>
                        <div class="phone">0896 343 134</div>
                    </div>
                </div>
            </a>
            <a class="content content-first " href="blog">
                <div>TIN TỨC</div>
            </a>
            <a class="content" href="product">
                <div>SẢN PHẨM</div>
            </a>
            <div class="menu">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="find ">
                <form action="" class="center">
                    <input class="searchInput" type="text" name="" placeholder="Search">
                    <button type="button" class="searchButton" href="#">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <ul class="content" id="account" style="margin-left: 0px;">
                <?php
                    if (count($account) > 0) {
                    ?>
                <div style="margin-top: 14px;"> <img style="margin-right: 5px; width: 25px;"
                        src="assets/images/svg/Ellipse 780.svg" alt=""><?= $account['username'] ?></div>
                <li>
                    <ul>
                        <li class="my-3">Thông tin cá nhân</li>
                        <li class="my-3"><a href="logout">Đăng xuất</a></li>
                        <li class="my-3"><a href="cart">Giỏ hàng</a></li>
                        <li class="my-3"><a href="purchase">Đơn hàng</a></li>
                    </ul>
                </li>
                <?php
                    } else {
                    ?>
                <a href="login">Đăng nhập</a>
                <?php
                    }
                    ?>
            </ul>
        </div>
        <div id="container">
            <div class="row bg-container">
                <div class="col-lg-12 p-0 breadcumb">
                    <ol id="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                itemprop="item" href="home"><span itemprop="name"><i class="fa-solid fa-house"
                                        style="color:#fff;"></i><span class="hidden"></span></span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                itemprop="item" href="product"><span itemprop="name">Sản
                                    phẩm</span></a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                itemprop="item" href="product-detail.html"><span itemprop="name">Đèn trang
                                    trí</span></a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                itemprop="item" href="product-detail.html"><span itemprop="name">Đèn siêu cấp</span></a>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>
                </div>
                <div class="row m-0 p-0 col-lg-12 mt-3">
                    <div class="container__left col-lg-9">
                        <div class="product col-12 p-3 row mx-auto">
                            <div class="product-image col-xl-5  p-0 col-sm-6 col-12 ">
                                <div class="col-12">
                                    <div class="col-md-12 mx-auto">
                                        <img class="js-image-main"
                                            src="assets/images/png/<?= $productDetail["image_path"] ?>" alt="">
                                    </div>
                                    <div class="col-md-12 mx-auto mt-3">
                                        <div class="image-detail-carousel owl-carousel">
                                            <?php
                                                foreach ($imageDetail as $item) {
                                                    echo getImageDetail($item);
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail col-xl-7 col-sm-6 col-12 ">
                                <form action="<?= $productDetail["code"] ?>" method="POST">

                                    <div class="product-detail__title"><?= $productDetail["name"] ?></div>
                                    <div class="col-12 d-flex flex-lg-row flex-column-reverse ">
                                        <div class="product-detail__sku">Mã sản phẩm:
                                            <span><?php echo $productDetail["sku"]; ?></span>
                                        </div>
                                        <div class="d-flex flex-nowrap mb-lg-0 mb-2">
                                            <div class="product-detail__star d-flex align-items-center">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="product-detail__evalute">
                                                75 lượt đánh giá <a href="">(Xem ngay)</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flash-sale d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flash-sale__image">
                                                <img src="assets/images/svg/bolt 1.svg" alt="">
                                            </div>
                                            <div class="flash-sale__name">FLASH SALE</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span>Kết thúc</span>
                                            <div class="flash-sale__time d-flex align-items-center">
                                                <div class="flash-sale__time-box center" id="hour">03</div>
                                                <span>:</span>
                                                <div class="flash-sale__time-box center" id="minus">00</div>
                                                <span>:</span>
                                                <div class="flash-sale__time-box center" id="second">05</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="price">
                                            <div class="product-detail__price d-flex align-items-center">
                                                <div class="product-detail__price--red">
                                                    <?= $productDetail["discount"] ?>đ</div>( Đã bao gồm
                                                VAT )
                                            </div>
                                            <div class="product-detail__discount d-flex flex-lg-row flex-column">giá thị
                                                trường: <?= $productDetail["price"] ?>đ -
                                                <span>tiết
                                                    kiệm 1.081.000đ</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category col-12">
                                        <div class="category__name">chọn loại đèn:</div>
                                        <div class="category__choose d-flex flex-wrap">
                                            <?php
                                                foreach ($colors as $color) {
                                                    $db->where('id', $color['color_id']);
                                                    $item = $db->getOne("color");
                                                ?>
                                            <label for="category__choose-item-<?= $item['id'] ?>"
                                                class="category__choose-item"
                                                data-qty="<?= $color['qty'] ?>"><?= $item['name'] ?>
                                                <input type="radio" style="visibility: hidden;"
                                                    id="category__choose-item-<?= $item['id'] ?>" name="choose-category"
                                                    value="<?= $item['id'] ?>">

                                            </label>
                                            <?php
                                                }
                                                ?>

                                        </div>
                                    </div>
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="product__qty d-flex ">
                                            <div class="product__qty-item ">
                                                <button type="button" class="center js-qty-minus">-</button>
                                            </div>
                                            <div class="product__qty-item">
                                                <input class="text-center js-qty" name="qty" type="text" value="1">
                                            </div>
                                            <div class="product__qty-item">
                                                <button type="button" class="center js-qty-plus">+</button>
                                            </div>
                                        </div>
                                        <div class=" d-flex showQty">
                                            <?php
                                                if ($productDetail["qty"] == 0) {
                                                ?>
                                            <button class="btn btn-danger">HẾT HÀNG</button>
                                            <?php
                                                } else {
                                                    echo 'Còn ' . $productDetail["qty"] . ' sản phẩm';
                                                }
                                                ?>
                                        </div>
                                    </div>
                                    <div class="product__buy col-12">
                                        <div class="bg-btn row ">
                                            <div class="col-12 col-lg-6 mb-lg-0 mb-2">
                                                <button <?php if ($productDetail['qty'] == 0) echo "disabled" ?>
                                                    type="submit" class="col-12 btn-item add-cart center"><i
                                                        class="fa-solid fa-cart-shopping"></i>
                                                    Thêm
                                                    vào giỏ hàng</button>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <button <?php if ($productDetail['qty'] == 0) echo "disabled" ?>
                                                    type="submit" class="btn-item buy-now center"><i
                                                        class="fa-solid fa-cart-shopping"></i>
                                                    Mua ngay
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex align-items-center share justify-content-between">
                                        <div>Share:</div>
                                        <div class="">
                                            <i class="mx-2 fa-brands fa-facebook"></i>
                                            <i class="mx-2 fa-brands fa-twitter"></i>
                                            <i class="mx-2 fa-brands fa-instagram"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $productDetail["id"] ?>">
                                </form>
                            </div>
                            <div class="bonus col-12 p-0 position-relative">
                                <div class="bonus__title d-flex align-items-center">
                                    <div class="bonus__title-image"><img src="assets/images/svg/giftbox 1.svg" alt="">
                                    </div>
                                    <div class="bonus__title-content">ƯU ĐÃI THÊM</div>
                                </div>
                                <div class="bonus__container position-absolute">
                                    <div class="bonus-item d-flex">
                                        <div class="bonus-item__image"><img src="assets/images/svg/icons8_ok 7.svg"
                                                alt="">
                                        </div>
                                        <div class="bonus-item__content">Tặng voucher trị giá 500.000 VNĐ khi
                                            thanh
                                            toán hóa đơn trên 3.000.000 VNĐ</div>
                                    </div>
                                    <div class="bonus-item d-flex">
                                        <div class="bonus-item__image"><img src="assets/images/svg/icons8_ok 7.svg"
                                                alt="">
                                        </div>
                                        <div class="bonus-item__content">Miễn phí giao hàng cho đơn hàng trên
                                            1.500.000 VNĐ</div>
                                    </div>
                                    <div class="bonus-item d-flex">
                                        <div class="bonus-item__image"><img src="assets/images/svg/icons8_ok 7.svg"
                                                alt="">
                                        </div>
                                        <div class="bonus-item__content">Và còn nhiều phần quà hấp dẫn khác đang
                                            đón
                                            chờ bạn khám phá</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="product-info">
                            <div class="product-info__nav col-12">
                                <div class="position-relative">
                                    <div class="product-info__tab d-flex">
                                        <div class="product-info__tab-link center col-4 col-lg-3 active "
                                            data-tab="all">Thông
                                            tin sản
                                            phẩm</div>
                                        <div class="product-info__tab-link center col-4 col-lg-3 " data-tab="1">Thành
                                            phần
                                            sản phẩm
                                        </div>
                                        <div class="product-info__tab-link center col-4 col-lg-3" data-tab="2">Hướng dẫn
                                            sử dụng
                                        </div>
                                        <div class="product-info__tab-link center col-4 col-lg-3" data-tab="3">Đánh giá
                                            sản phẩm
                                        </div>
                                    </div>

                                    <div class="content-wrapper">
                                        <div id="tab-all" class="tab-content active">
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour, or
                                                randomised words which don"t look even slightly believable. If you are
                                                going to use a passage of Lorem Ipsum, you need to be sure there isn"t
                                                anything embarrassing hidden.</p>
                                            <div class="image">
                                                <img src="assets/images/png/Rectangle 6103.png" alt="">
                                            </div>
                                            <div class="tab-content__title mt-3">
                                                Thành phần sản phẩm
                                            </div>
                                            <div class="tab-content__table">
                                                <table class="col-12">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-content__title mt-3">
                                                Hướng đẫn sử dụng
                                            </div>
                                            <div class="tab-content__content">
                                                <div class="tab-content__content-step">Bước 1 Lắp đặt đèn LED</div>
                                                <div class="tab-content__content-title">Vị trí lắp đặt</div>
                                                <ul>
                                                    <li>Trước khi lắp đặt cần tính toán kỹ về số lượng đèn, vị trí lắp
                                                        đặt và loại đèn lắp đặt.</li>
                                                    <li>Tránh lắp đặt đèn LED ở những nơi có độ ẩm cao, điều này làm
                                                        giảm tuổi thọ của đèn.</li>
                                                    <li>Trong quá trình lắp đặt cần phải lắp đặt chắc chắn, tránh để hở
                                                        điện nhằm đảm bảo sự an toàn trong quá trình sử dụng.</li>
                                                    <li>Không được lắp đặt đèn ở những vị trí gần hóa chất, có ánh sáng
                                                        mặt trời hoặc nơi có nhiệt độ cao, dễ gây cháy nổ.</li>
                                                    <li>Ngoài ra, lắp đèn ở những vị trí kín gió có thể gây giảm tuổi
                                                        thọ của đèn, mất nhiều công sức cho việc thay thế đèn.</li>
                                                </ul>
                                                <div class="tab-content__content-title">Độ cao treo đèn và khoảng cách
                                                    lắp đặt</div>
                                                <table class="col-8">
                                                    <tr>
                                                        <th class="text-center">Độ cao treo đèn</th>
                                                        <th class="text-center">Công suất đèn</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">3m – 4m</th>
                                                        <td class="text-center">50w</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">3m – 4m</th>
                                                        <td class="text-center">50w</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">3m – 4m</th>
                                                        <td class="text-center">50w</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">3m – 4m</th>
                                                        <td class="text-center">50w</td>
                                                    </tr>
                                                </table>
                                                <ul>
                                                    <li>Tùy vào không gian lắp đặt, có thể điều chỉnh độ cao lắp đèn
                                                        bằng móc treo đèn nhà xưởng, xích treo đèn,…</li>
                                                    <li>Khoảng cách lắp đặt tùy vào công suất đèn, số lượng đèn định lắp
                                                        và mức độ yêu cầu ánh sáng của từng khu vực.</li>
                                                    <li>Tuy nhiên, khi treo đèn khoảng cách tối thiểu phải >1,5m.</li>
                                                </ul>
                                                <div class="tab-content__content-step">Bước 2 Bảo quản và bảo dưỡng đèn
                                                    LED</div>
                                                <ul>
                                                    <li>Thường xuyên bảo quản bảo dưỡng, vệ sinh đèn đúng kỹ thuật. Dùng
                                                        vải khô sạch hoặc bình xịt khí để vệ sinh đèn.</li>
                                                    <li>Thường xuyên bảo quản bảo dưỡng, vệ sinh đèn đúng kỹ thuật. Dùng
                                                        vải khô sạch hoặc bình xịt khí để vệ sinh đèn.</li>
                                                    <li>Thường xuyên bảo quản bảo dưỡng, vệ sinh đèn đúng kỹ thuật. Dùng
                                                        vải khô sạch hoặc bình xịt khí để vệ sinh đèn.</li>
                                                </ul>
                                                <div class="tab-content__content-step">Sửa chữa, thay thế bóng đèn LED
                                                    khi hỏng</div>
                                                <ul>
                                                    <li>Cần đảm bảo rằng đã ngắt nguồn điện trước khi sửa chữa, thay thế
                                                        đèn.</li>
                                                    <li>Sử dụng những linh kiện chính hãng để sửa chữa hoặc thay thế khi
                                                        đèn bị hỏng. Tránh sử dụng những linh kiện không rõ nguồn gốc,
                                                        xuất xứ gây ảnh hưởng đến chất lượng của đèn.</li>
                                                    <li>Không nên tự tháo lắp, sửa chữa đèn. Việc sửa chữa nên được thực
                                                        hiện bởi đơn vị có uy tín.</li>
                                                    <li>Khi phát hiện có lỗi hỏng, cần tiến hành mang đèn đi bảo hành,
                                                        sửa chữa kịp thời. Tránh làm hỏng cả hệ thống đèn LED xung
                                                        quanh. </li>

                                                </ul>
                                            </div>
                                            <div class="tab-content__title">
                                                Đánh giá về sản phẩm này
                                            </div>
                                            <div
                                                class="col-12 d-flex justify-content-between align-items-center mb-3 flex-lg-row flex-column">
                                                <div class="content-left center flex-column">
                                                    4.8/5
                                                    <span>90 lượt đánh giá</span>
                                                </div>
                                                <div class="table-star ">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">5</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:70%;"></div>
                                                        </div>
                                                        <div class=" vote">73 Vote</div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">4</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:50%;"></div>
                                                        </div>
                                                        <div class="vote">73 Vote</div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">3</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:30%;"></div>
                                                        </div>
                                                        <div class="vote">73 Vote</div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">2</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:10%;"></div>
                                                        </div>
                                                        <div class="vote">73 Vote</div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">1</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:0%;"></div>
                                                        </div>
                                                        <div class="vote">73 Vote</div>
                                                    </div>

                                                </div>
                                                <div class="content-right center flex-column">
                                                    <p>Chia sẻ nhận xét của bạn về sản phẩm này</p>
                                                    <div class="btn-comment center">đánh giá ngay</div>
                                                </div>
                                            </div>
                                            <div class="col-12 product-comment mt-3">
                                                <div class="d-flex mb-3">
                                                    <div class="product-comment__avatar">
                                                        <img src="assets/images/svg/Ellipse 780.svg" alt="">
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-comment__name">@nguyenvannam</div>
                                                            <div class="product-comment__date">03/11/2023</div>
                                                        </div>
                                                        <div class="product-comment__star">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                        <div class="product-comment__content">Giao hàng nhanh nhân viên
                                                            cũng nhiệt tình. Hộp đc tặng kèm thìa vàng trông rất xịn xò.
                                                            K ngờ với giá tiền thế mà lại được cái hộp trong sang trọng
                                                            thế. Sau sẽ ủng hộ sản phẩm này tiếp</div>
                                                        <div class="product-comment__image d-flex">
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <div class="product-comment__avatar">
                                                        <img src="assets/images/svg/Ellipse 780.svg" alt="">
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-comment__name">@nguyenvannam</div>
                                                            <div class="product-comment__date">03/11/2023</div>
                                                        </div>
                                                        <div class="product-comment__star">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                        <div class="product-comment__content">Giao hàng nhanh nhân viên
                                                            cũng nhiệt tình. Hộp đc tặng kèm thìa vàng trông rất xịn xò.
                                                            K ngờ với giá tiền thế mà lại được cái hộp trong sang trọng
                                                            thế. Sau sẽ ủng hộ sản phẩm này tiếp</div>
                                                        <div class="product-comment__image d-flex">
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <div class="product-comment__avatar">
                                                        <img src="assets/images/svg/Ellipse 780.svg" alt="">
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-comment__name">@nguyenvannam</div>
                                                            <div class="product-comment__date">03/11/2023</div>
                                                        </div>
                                                        <div class="product-comment__star">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                        <div class="product-comment__content">Giao hàng nhanh nhân viên
                                                            cũng nhiệt tình. Hộp đc tặng kèm thìa vàng trông rất xịn xò.
                                                            K ngờ với giá tiền thế mà lại được cái hộp trong sang trọng
                                                            thế. Sau sẽ ủng hộ sản phẩm này tiếp</div>
                                                        <div class="product-comment__image d-flex">
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="tab-1" class="tab-content ">
                                            <div class="tab-content__title">
                                                Thành phần sản phẩm
                                            </div>
                                            <div class="tab-content__table">
                                                <table class="col-12">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-content">
                                            <div class="tab-content__title">
                                                Hướng đẫn sử dụng
                                            </div>
                                            <div class="tab-content__content">
                                                <div class="tab-content__content-step">Bước 1 Lắp đặt đèn LED</div>
                                                <div class="tab-content__content-title">Vị trí lắp đặt</div>
                                                <ul>
                                                    <li>Trước khi lắp đặt cần tính toán kỹ về số lượng đèn, vị trí lắp
                                                        đặt và loại đèn lắp đặt.</li>
                                                    <li>Tránh lắp đặt đèn LED ở những nơi có độ ẩm cao, điều này làm
                                                        giảm tuổi thọ của đèn.</li>
                                                    <li>Trong quá trình lắp đặt cần phải lắp đặt chắc chắn, tránh để hở
                                                        điện nhằm đảm bảo sự an toàn trong quá trình sử dụng.</li>
                                                    <li>Không được lắp đặt đèn ở những vị trí gần hóa chất, có ánh sáng
                                                        mặt trời hoặc nơi có nhiệt độ cao, dễ gây cháy nổ.</li>
                                                    <li>Ngoài ra, lắp đèn ở những vị trí kín gió có thể gây giảm tuổi
                                                        thọ của đèn, mất nhiều công sức cho việc thay thế đèn.</li>
                                                </ul>
                                                <div class="tab-content__content-title">Độ cao treo đèn và khoảng cách
                                                    lắp đặt</div>
                                                <table class="col-8">
                                                    <tr>
                                                        <th class="text-center">Độ cao treo đèn</th>
                                                        <th class="text-center">Công suất đèn</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">3m – 4m</th>
                                                        <td class="text-center">50w</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">3m – 4m</th>
                                                        <td class="text-center">50w</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">3m – 4m</th>
                                                        <td class="text-center">50w</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">3m – 4m</th>
                                                        <td class="text-center">50w</td>
                                                    </tr>
                                                </table>
                                                <ul>
                                                    <li>Tùy vào không gian lắp đặt, có thể điều chỉnh độ cao lắp đèn
                                                        bằng móc treo đèn nhà xưởng, xích treo đèn,…</li>
                                                    <li>Khoảng cách lắp đặt tùy vào công suất đèn, số lượng đèn định lắp
                                                        và mức độ yêu cầu ánh sáng của từng khu vực.</li>
                                                    <li>Tuy nhiên, khi treo đèn khoảng cách tối thiểu phải >1,5m.</li>
                                                </ul>
                                                <div class="tab-content__content-step">Bước 2 Bảo quản và bảo dưỡng đèn
                                                    LED</div>
                                                <ul>
                                                    <li>Thường xuyên bảo quản bảo dưỡng, vệ sinh đèn đúng kỹ thuật. Dùng
                                                        vải khô sạch hoặc bình xịt khí để vệ sinh đèn.</li>
                                                    <li>Thường xuyên bảo quản bảo dưỡng, vệ sinh đèn đúng kỹ thuật. Dùng
                                                        vải khô sạch hoặc bình xịt khí để vệ sinh đèn.</li>
                                                    <li>Thường xuyên bảo quản bảo dưỡng, vệ sinh đèn đúng kỹ thuật. Dùng
                                                        vải khô sạch hoặc bình xịt khí để vệ sinh đèn.</li>
                                                </ul>
                                                <div class="tab-content__content-step">Sửa chữa, thay thế bóng đèn LED
                                                    khi hỏng</div>
                                                <ul>
                                                    <li>Cần đảm bảo rằng đã ngắt nguồn điện trước khi sửa chữa, thay thế
                                                        đèn.</li>
                                                    <li>Sử dụng những linh kiện chính hãng để sửa chữa hoặc thay thế khi
                                                        đèn bị hỏng. Tránh sử dụng những linh kiện không rõ nguồn gốc,
                                                        xuất xứ gây ảnh hưởng đến chất lượng của đèn.</li>
                                                    <li>Không nên tự tháo lắp, sửa chữa đèn. Việc sửa chữa nên được thực
                                                        hiện bởi đơn vị có uy tín.</li>
                                                    <li>Khi phát hiện có lỗi hỏng, cần tiến hành mang đèn đi bảo hành,
                                                        sửa chữa kịp thời. Tránh làm hỏng cả hệ thống đèn LED xung
                                                        quanh. </li>

                                                </ul>
                                            </div>
                                        </div>

                                        <div id="tab-3" class="tab-content">
                                            <div class="tab-content__title">
                                                Đánh giá về sản phẩm này
                                            </div>
                                            <div
                                                class="col-12 d-flex justify-content-between align-items-center mb-3 flex-lg-row flex-column">
                                                <div class="content-left center flex-column">
                                                    4.8/5
                                                    <span>90 lượt đánh giá</span>
                                                </div>
                                                <div class="table-star ">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">5</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:70%;"></div>
                                                        </div>
                                                        <div class=" vote">73 Vote</div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">4</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:50%;"></div>
                                                        </div>
                                                        <div class="vote">73 Vote</div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">3</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:30%;"></div>
                                                        </div>
                                                        <div class="vote">73 Vote</div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">2</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:10%;"></div>
                                                        </div>
                                                        <div class="vote">73 Vote</div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="number-star">1</div>
                                                        <i class="fa-solid fa-star"></i>
                                                        <div class="toolbar">
                                                            <div class="percent" style=" width:0%;"></div>
                                                        </div>
                                                        <div class="vote">73 Vote</div>
                                                    </div>

                                                </div>
                                                <div class="content-right center flex-column">
                                                    <p>Chia sẻ nhận xét của bạn về sản phẩm này</p>
                                                    <div class="btn-comment center">đánh giá ngay</div>
                                                </div>
                                            </div>
                                            <div class="col-12 product-comment">
                                                <div class="d-flex mb-3">
                                                    <div class="product-comment__avatar">
                                                        <img src="assets/images/svg/Ellipse 780.svg" alt="">
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-comment__name">@nguyenvannam</div>
                                                            <div class="product-comment__date">03/11/2023</div>
                                                        </div>
                                                        <div class="product-comment__star">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                        <div class="product-comment__content">Giao hàng nhanh nhân viên
                                                            cũng nhiệt tình. Hộp đc tặng kèm thìa vàng trông rất xịn xò.
                                                            K ngờ với giá tiền thế mà lại được cái hộp trong sang trọng
                                                            thế. Sau sẽ ủng hộ sản phẩm này tiếp</div>
                                                        <div class="product-comment__image d-flex">
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <div class="product-comment__avatar">
                                                        <img src="assets/images/svg/Ellipse 780.svg" alt="">
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-comment__name">@nguyenvannam</div>
                                                            <div class="product-comment__date">03/11/2023</div>
                                                        </div>
                                                        <div class="product-comment__star">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                        <div class="product-comment__content">Giao hàng nhanh nhân viên
                                                            cũng nhiệt tình. Hộp đc tặng kèm thìa vàng trông rất xịn xò.
                                                            K ngờ với giá tiền thế mà lại được cái hộp trong sang trọng
                                                            thế. Sau sẽ ủng hộ sản phẩm này tiếp</div>
                                                        <div class="product-comment__image d-flex">
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <div class="product-comment__avatar">
                                                        <img src="assets/images/svg/Ellipse 780.svg" alt="">
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-comment__name">@nguyenvannam</div>
                                                            <div class="product-comment__date">03/11/2023</div>
                                                        </div>
                                                        <div class="product-comment__star">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                        <div class="product-comment__content">Giao hàng nhanh nhân viên
                                                            cũng nhiệt tình. Hộp đc tặng kèm thìa vàng trông rất xịn xò.
                                                            K ngờ với giá tiền thế mà lại được cái hộp trong sang trọng
                                                            thế. Sau sẽ ủng hộ sản phẩm này tiếp</div>
                                                        <div class="product-comment__image d-flex">
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                            <div class="product-comment__image-item"><img
                                                                    src="assets/images/png/Rectangle 8503.png" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-evalute" style="background-color: #fff;">
                            <div class="tab-content active product-evalute-more">
                                <div class="tab-content__title">
                                    Đánh giá về sản phẩm này
                                </div>
                                <div
                                    class="col-12 d-flex justify-content-between align-items-center mb-3 flex-lg-row flex-column">
                                    <div class="content-left center flex-column">
                                        4.8/5
                                        <span>90 lượt đánh giá</span>
                                    </div>
                                    <div class="table-star ">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="number-star">5</div>
                                            <i class="fa-solid fa-star"></i>
                                            <div class="toolbar">
                                                <div class="percent" style=" width:70%;"></div>
                                            </div>
                                            <div class=" vote">73 Vote</div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="number-star">4</div>
                                            <i class="fa-solid fa-star"></i>
                                            <div class="toolbar">
                                                <div class="percent" style=" width:50%;"></div>
                                            </div>
                                            <div class="vote">73 Vote</div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="number-star">3</div>
                                            <i class="fa-solid fa-star"></i>
                                            <div class="toolbar">
                                                <div class="percent" style=" width:30%;"></div>
                                            </div>
                                            <div class="vote">73 Vote</div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="number-star">2</div>
                                            <i class="fa-solid fa-star"></i>
                                            <div class="toolbar">
                                                <div class="percent" style=" width:10%;"></div>
                                            </div>
                                            <div class="vote">73 Vote</div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="number-star">1</div>
                                            <i class="fa-solid fa-star"></i>
                                            <div class="toolbar">
                                                <div class="percent" style=" width:0%;"></div>
                                            </div>
                                            <div class="vote">73 Vote</div>
                                        </div>

                                    </div>
                                    <div class="content-right center flex-column">
                                        <p>Chia sẻ nhận xét của bạn về sản phẩm này</p>
                                        <div class="btn-comment center">đánh giá ngay</div>
                                    </div>
                                </div>
                                <div class="col-12 product-comment">
                                    <div class="d-flex mb-3">
                                        <div class="product-comment__avatar">
                                            <img src="assets/images/svg/Ellipse 780.svg" alt="">
                                        </div>
                                        <div class="">
                                            <div class="d-flex align-items-center">
                                                <div class="product-comment__name">@nguyenvannam</div>
                                                <div class="product-comment__date">03/11/2023</div>
                                            </div>
                                            <div class="product-comment__star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="product-comment__content">Giao hàng nhanh nhân viên
                                                cũng nhiệt tình. Hộp đc tặng kèm thìa vàng trông rất xịn xò.
                                                K ngờ với giá tiền thế mà lại được cái hộp trong sang trọng
                                                thế. Sau sẽ ủng hộ sản phẩm này tiếp</div>
                                            <div class="product-comment__image d-flex">
                                                <div class="product-comment__image-item"><img
                                                        src="assets/images/png/Rectangle 8503.png" alt=""></div>
                                                <div class="product-comment__image-item"><img
                                                        src="assets/images/png/Rectangle 8503.png" alt=""></div>
                                                <div class="product-comment__image-item"><img
                                                        src="assets/images/png/Rectangle 8503.png" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="product-comment__avatar">
                                            <img src="assets/images/svg/Ellipse 780.svg" alt="">
                                        </div>
                                        <div class="">
                                            <div class="d-flex align-items-center">
                                                <div class="product-comment__name">@nguyenvannam</div>
                                                <div class="product-comment__date">03/11/2023</div>
                                            </div>
                                            <div class="product-comment__star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="product-comment__content">Giao hàng nhanh nhân viên
                                                cũng nhiệt tình. Hộp đc tặng kèm thìa vàng trông rất xịn xò.
                                                K ngờ với giá tiền thế mà lại được cái hộp trong sang trọng
                                                thế. Sau sẽ ủng hộ sản phẩm này tiếp</div>
                                            <div class="product-comment__image d-flex">
                                                <div class="product-comment__image-item"><img
                                                        src="assets/images/png/Rectangle 8503.png" alt=""></div>
                                                <div class="product-comment__image-item"><img
                                                        src="assets/images/png/Rectangle 8503.png" alt=""></div>
                                                <div class="product-comment__image-item"><img
                                                        src="assets/images/png/Rectangle 8503.png" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="product-comment__avatar">
                                            <img src="assets/images/svg/Ellipse 780.svg" alt="">
                                        </div>
                                        <div class="">
                                            <div class="d-flex align-items-center">
                                                <div class="product-comment__name">@nguyenvannam</div>
                                                <div class="product-comment__date">03/11/2023</div>
                                            </div>
                                            <div class="product-comment__star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="product-comment__content">Giao hàng nhanh nhân viên
                                                cũng nhiệt tình. Hộp đc tặng kèm thìa vàng trông rất xịn xò.
                                                K ngờ với giá tiền thế mà lại được cái hộp trong sang trọng
                                                thế. Sau sẽ ủng hộ sản phẩm này tiếp</div>
                                            <div class="product-comment__image d-flex">
                                                <div class="product-comment__image-item"><img
                                                        src="assets/images/png/Rectangle 8503.png" alt=""></div>
                                                <div class="product-comment__image-item"><img
                                                        src="assets/images/png/Rectangle 8503.png" alt=""></div>
                                                <div class="product-comment__image-item"><img
                                                        src="assets/images/png/Rectangle 8503.png" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="container__right col-lg-3">
                        <div class="policy col-12">
                            <div class="policy__name">Chính sách giao hàng đổi trả</div>
                            <div class="">
                                <div class="policy-item active d-flex align-items-center">
                                    <div class="policy-item__image"><img src="assets/images/png/debit-cards 1.png"
                                            alt=""></div>
                                    <div>
                                        <div class="policy-item__title">HÀNG CHÍNH HÃNG</div>
                                        <div class="policy-item__content">There are many variations of passages of
                                        </div>
                                    </div>
                                </div>
                                <div class="policy-item d-flex align-items-center">
                                    <div class="policy-item__image"><img src="assets/images/png/debit-cards 1.png"
                                            alt=""></div>
                                    <div>
                                        <div class="policy-item__title">HÀNG CHÍNH HÃNG</div>
                                        <div class="policy-item__content">There are many variations of passages of
                                        </div>
                                    </div>
                                </div>
                                <div class="policy-item d-flex align-items-center">
                                    <div class="policy-item__image"><img src="assets/images/png/debit-cards 1.png"
                                            alt=""></div>
                                    <div>
                                        <div class="policy-item__title">HÀNG CHÍNH HÃNG</div>
                                        <div class="policy-item__content">There are many variations of passages of
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-accompanying">
                            <div class="product-accompanying__name">SẢN PHẨM XEM CÙNG</div>
                            <div
                                class="product-accompanying__container d-flex flex-lg-column flex-row align-items-center flex-wrap">
                                <div class="item col-3 col-lg-12">
                                    <div class="item__image">
                                        <img src="assets/images/png/Rectangle 8377 (1).png" alt="">
                                    </div>
                                    <div class="item__evalute d-flex justify-content-center">
                                        <div class="image"><img src="assets/images/svg/Stars.svg" alt=""></div>
                                        <div class="comment">45 lượt đánh giá</div>
                                    </div>
                                    <div class="item__title">ĐÈN CHÙM L8101/120</div>
                                    <div class="item__price">2.290.000đ - <span>3.150.000đ</span></div>
                                    <div class="item__btn center mx-auto">
                                        <div class="image"></div>
                                        <span>XEM CHI TIẾT</span>
                                    </div>
                                </div>
                                <div class="item col-3 col-lg-12">
                                    <div class="item__image">
                                        <img src="assets/images/png/Rectangle 8377 (1).png" alt="">
                                    </div>
                                    <div class="item__evalute d-flex justify-content-center">
                                        <div class="image"><img src="assets/images/svg/Stars.svg" alt=""></div>
                                        <div class="comment">45 lượt đánh giá</div>
                                    </div>
                                    <div class="item__title">ĐÈN CHÙM L8101/120</div>
                                    <div class="item__price">2.290.000đ - <span>3.150.000đ</span></div>
                                    <div class="item__btn center mx-auto">
                                        <div class="image"></div>
                                        <span>XEM CHI TIẾT</span>
                                    </div>
                                </div>
                                <div class="item col-3 col-lg-12">
                                    <div class="item__image">
                                        <img src="assets/images/png/Rectangle 8377 (1).png" alt="">
                                    </div>
                                    <div class="item__evalute d-flex justify-content-center">
                                        <div class="image"><img src="assets/images/svg/Stars.svg" alt=""></div>
                                        <div class="comment">45 lượt đánh giá</div>
                                    </div>
                                    <div class="item__title">ĐÈN CHÙM L8101/120</div>
                                    <div class="item__price">2.290.000đ - <span>3.150.000đ</span></div>
                                    <div class="item__btn center mx-auto">
                                        <div class="image"></div>
                                        <span>XEM CHI TIẾT</span>
                                    </div>
                                </div>
                                <div class="item col-3 col-lg-12">
                                    <div class="item__image">
                                        <img src="assets/images/png/Rectangle 8377 (1).png" alt="">
                                    </div>
                                    <div class="item__evalute d-flex justify-content-center">
                                        <div class="image"><img src="assets/images/svg/Stars.svg" alt=""></div>
                                        <div class="comment">45 lượt đánh giá</div>
                                    </div>
                                    <div class="item__title">ĐÈN CHÙM L8101/120</div>
                                    <div class="item__price">2.290.000đ - <span>3.150.000đ</span></div>
                                    <div class="item__btn center mx-auto">
                                        <div class="image"></div>
                                        <span>XEM CHI TIẾT</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="other-product">
                        <div class="top">
                            <div class="other-product__title">CÁC SẢN PHẨM KHÁC</div>
                            <div class="other-product__btn"></div>
                        </div>

                        <div class="containerr other-product-owl-carousel owl-carousel d-flex justify-content-between">

                            <?php
                                foreach ($products as $item) {
                                    echo productOther($item);
                                }
                                ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="ensure d-flex justify-content-center">
            <div class="ensure-bg  d-flex justify-content-center flex-wrap align-items-center">
                <div class="item col-lg-auto col-lg-3 col-md-6 col-12 item1 p-0 ">
                    <div class="left d-flex justify-content-center">
                        <img src="assets/images/png/badge 1.png" alt="">
                    </div>
                    <div class="right">
                        <div class="title">chất lượng tuyệt đối</div>
                        <div class="content">It is a long established fact that a reader will be distracted
                        </div>
                    </div>
                </div>
                <div class="item col-lg-auto col-lg-3 col-md-6 col-12 item2 p-0">
                    <div class="left">
                        <img src="assets/images/png/debit-cards 1.png" alt="">
                    </div>
                    <div class="right">
                        <div class="title">Thanh toán tiện lợi</div>
                        <div class="content">It is a long established fact that a reader will be distracted
                        </div>
                    </div>
                </div>
                <div class="item col-lg-auto col-lg-3 col-md-6 col-12 item3 p-0">
                    <div class="left">
                        <img src="assets/images/png/delivery 1.png" alt="">
                    </div>
                    <div class="right">
                        <div class="title">Giao hàng nhanh chóng</div>
                        <div class="content">It is a long established fact that a reader will be distracted
                        </div>
                    </div>
                </div>
                <div class="item col-lg-auto col-lg-3 col-md-6 col-12 item4 p-0">
                    <div class="left">
                        <img src="assets/images/png/guarantee-certificate 1.png" alt="">
                    </div>
                    <div class="right">
                        <div class="title">Bảo hành lâu dài</div>
                        <div class="content">It is a long established fact that a reader will be distracted
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <img src="assets/images/png/Rectangle 6103.png" alt="">
            <div class="img"></div>
            <div class="bg"></div>
            <div class="container">
                <div class="width mx-auto">
                    <div class="header-footer">
                        <div class="left">
                            <div class="title">ĐĂNG KÝ NGAY ĐỂ NHẬN TIN</div>
                            <div class="content-title">Hãy Để Lại Số Điện Thoại Để Được Tư Vấn </div>
                        </div>
                        <form action="" method="POST" class="form" id="form-1">
                            <div class="right">
                                <div class="form-group d-flex flex-column">
                                    <input class="input" id="fullname" name="fullname" type="text"
                                        placeholder="Nhập Họ Và Tên Của Bạn">
                                    <span class="form-message"></span>
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <input class="input" id="email" type="text" name="email"
                                        placeholder="Nhập Email Của Bạn">
                                    <div class="form-message"></div>
                                </div>
                                <button type="submit" class="btn-register center">ĐĂNG KÝ</button>
                            </div>
                        </form>
                    </div>
                    <div class="body-footer">
                        <div class="item item1">
                            <div class="title">Thông Tin Liên Hệ</div>
                            <div class="content" style="width: 310px;">
                                <span>
                                    Địa Chỉ : 48 Đường 40, HBC, Quận Thủ Đức, Tp. Hồ Chí Minh
                                </span>
                                <span>
                                    Số Điện Thoại: 0896 343 134
                                </span>
                                <span>Email: nhutle7789@gmail.com</span>
                                <span>Website: dentrangtricaocap.com</span>
                            </div>
                        </div>
                        <div class="item item2">
                            <div class="title">Danh Mục Sản Phẩm</div>
                            <div class="content">
                                <span>Đèn Công Nghiệp</span>
                                <span class="span-1">Đèn Nội Thất</span>
                                <span>Thiết Bị Điện</span>
                                <span class="span-2">Đèn Ngoại Thất</span>
                                <span>Đèn Chùm</span>
                            </div>
                        </div>
                        <div class="item item3">
                            <div class="title">Chính Sách</div>
                            <div class="content">
                                <span>Quy định đăng tin</span>
                                <span class="span-1">Điều khoản thỏa thuận</span>
                                <span>Chính sách bảo mật</span>
                                <span class="span-2">Góp ý báo lỗi </span>
                            </div>
                        </div>
                        <div class="item item4">
                            <div class="title">Kết Nối Với Chúng Tôi</div>
                            <div class="btn">
                                <div class="btn-left">
                                    </a> <a href="">
                                        <div class="btn-item  center active">
                                            <div class="icon"><img src="assets/images/svg/icons8_facebook_f 8.svg"
                                                    alt=""></div>
                                            <div class="text">Fanpage</div>
                                        </div>
                                    </a>
                                    </a> <a href="">
                                        <div class="btn-item center">
                                            <div class="icon"><img src="assets/images/svg/pin (1) 1.svg" alt="">
                                            </div>
                                            <div class="text">Map</div>
                                        </div>
                                    </a>
                                    </a> <a href="">
                                        <div class="btn-item center">
                                            <div class="icon"><img src="assets/images/svg/gmail 1.svg" alt="">
                                            </div>
                                            <div class="text">Gmail</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="btn-right">
                                    </a> <a href="">
                                        <div class="btn-item center">
                                            <div class="icon"><img src="assets/images/svg/tik-tok (5) 1.svg" alt="">
                                            </div>
                                            <div class="text">TikTok</div>
                                        </div>
                                    </a>
                                    </a> <a href="">
                                        <div class="btn-item center">
                                            <div class="icon"><img src="assets/images/svg/youtube (2) 1.svg" alt="">
                                            </div>
                                            <div class="text">Youtube</div>
                                        </div>
                                    </a>
                                    </a> <a href="">
                                        <div class="btn-item center">
                                            <div class="icon"><img src="assets/images/svg/instagram (2) 1.svg" alt="">
                                            </div>
                                            <div class="text">Instargram</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-footer">
                        <div class="text">Copyright © 2023 ĐÈN TRANG TRÍ. All rights reserved. Design by i-web.vn</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="menu">
    </div>
    <div class="bg-menu ">
        <div class="close center"><i class="fa-solid fa-xmark"></i></div>
        <div class="">
            <div class="input d-flex align-items-center justify-content-between mx-auto">
                <input type="text" placeholder="Tìm kiếm...">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <ul>
            <li><a href="home">Trang chủ</a></li>
            <li><a href="product">Sản phẩm</a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="blog">Tin tức</a></li>
            <li><a href="product-detail.html">Đèn thả</a></li>
            <li><a href="blog-detail.html">Đèn treo tường</a></li>
            <li><a href="">Liên hệ</a></li>
        </ul>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/jquery.twbsPagination.min.js"></script>
    <script src="assets/js/jquery.twbsPagination.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- read more -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.0.2/readmore.min.js"
        integrity="sha512-llWtDR3k09pa9nOBfutQnrS2kIEG7M6Zm7RIjVVLNab1wRs8NUmA0OjAE38jKzKeCg+A3rdq8AVW41ZTsfhu5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/product-details.js"></script>
    <!-- <script src="main.js"></script> -->
    <!-- validate -->
    <script src="assets/js/validator.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        Validator({
            form: "#form-1",
            formGroupSelector: ".form-group",
            errorSelector: ".form-message",
            rules: [
                Validator.isRequired("#fullname", "Vui lòng nhập tên đầy đủ của bạn"),
                Validator.isRequired("#email", "Vui lòng nhập điền thông tin"),
                Validator.isEmail("#email"),
            ],
            onSubmit: function(data) {
                console.log(data)
            }
        });
    });
    </script>

</body>

</html>

<style>
#account {
    position: relative;
}

#account:hover>li {
    display: block;
}

#account>li {
    display: none;
    position: absolute;
    width: 200px;
    height: 300px;
    background-color: #fff;
    z-index: 9999999;
    right: 0;
    box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, .3)
}
</style>
<?php


}