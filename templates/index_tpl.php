<?php

$denTrangTri = $product->showOfCategory(6);
$thietBiDien = $product->showOfCategory(5);
$denNoiThat = $product->showOfCategory(4);
$denNongNghiep = $product->showOfCategory(3);
$SPBanChay = $product->showOfCategory(3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="<?= $config['url'] ?>">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reponsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Manrope:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Manrope:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Manrope:wght@200;300;400;500;600;700;800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- OwlCarousel2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>


<body>
    <div id="bg">
        <div id="header">
            <a href="cart" id="cart" class="center"><i class="fa-solid fa-cart-shopping"></i>
                <div class="totalCart">
                    <?= $cart->totalCart; ?>
                </div>
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
            <a class="content content-first  " href="blog">
                <div>TIN TỨC</div>
            </a>
            <a class="content" href="product">
                <div>SẢN PHẨM</div>
            </a>
            <ul class="content" id="account" style="margin-left: 0px;">
                <?php
                if (count($account) > 0) {
                ?>
                    <div style="margin-top: 14px;"> <img style="margin-right: 5px; width: 25px;" src="assets/images/svg/Ellipse 780.svg" alt=""><?= $account['username'] ?></div>
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
        </div>
        <div id="slider">
            <div class="image-slider">
                <img src="assets/images/png/Rectangle 8536.png" alt="">
                <div class="nav-bar">
                    <div class="bg-navbar width d-flex justify-content-between">
                        <a href="den-led">
                            <div class="nav-content js-set-id-category nav-content1">ĐÈN LED</div>

                        </a>
                        <a href="thiet-bi-dien">
                            <div class="nav-content js-set-id-category nav-content2">THIẾT BỊ ĐIỆN</div>

                        </a>
                        <a href="den-trang-tri">
                            <div class="nav-content js-set-id-category nav-content3">ĐÈN TRANG TRÍ</div>

                        </a>
                        <a href="den-noi-that">
                            <div class="nav-content js-set-id-category nav-content4">ĐÈN NỘI THẤT</div>

                        </a>
                        <a href="den-nong-nghiep">
                            <div class="nav-content js-set-id-category nav-content5">ĐÈN NÔNG NGHIỆP</div>
                        </a>
                        <a href="catalogue">
                            <div class="nav-content js-set-id-category nav-content6">CATALOGUE</div>

                        </a>
                    </div>
                </div>
            </div>
            <div class="bottom-navbar d-flex justify-content-center">
                <div class="width d-flex flex-lg-row flex-column">
                    <div class="left d-flex justify-content-center">
                        <div class="swiper">
                            <div class="slider">
                                <div class="item">
                                    <img src="assets/images/png/Rectangle 7725.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/png/Rectangle 7725.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/png/Rectangle 7725.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/png/Rectangle 7725.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/png/Rectangle 7725.png" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/png/Rectangle 7725.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="bg-dash d-flex dots">
                            <div class="dash-item dot active"></div>
                            <div class="dash-item dot"></div>
                            <div class="dash-item dot"></div>
                            <div class="dash-item dot"></div>
                            <div class="dash-item dot"></div>
                            <div class="dash-item dot"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="top-title">
                            <div class="dash">
                                <div class="dash-item dash-top"></div>
                                <div class="dash-item dash-bottom"></div>
                            </div>
                            <span>VỀ CHÚNG TÔI</span>
                        </div>
                        <div class="title">
                            cung cấp hơn <span>120+ sản phẩm</span> ĐÈN TRANG TRÍ chất lượng cao
                            <div class="dash"></div>
                        </div>
                        <div class="text">There are many variations of passages of Lorem Ipsum available, but the
                            majority
                            have suffered alteration in some form, by injected humour, or randomised words which don't
                            look
                            even slightly believable.</div>
                        <div class="bg-btn">
                            <div class="btn-item btn-access center">
                                <img src="assets/images/png/external 31.png" alt="">
                                <div>Tìm hiểu thêm</div>
                            </div>
                            <div class="btn-item btn-hotline center">Liên hệ ngay</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ensure d-flex justify-content-center">
                <div class="col-12 d-flex justify-content-center row">
                    <div class="item col-lg-auto col-md-6 col-12 item1 p-0 ">
                        <div class="left d-flex justify-content-center">
                            <img src="assets/images/png/badge 1.png" alt="">
                        </div>
                        <div class="right">
                            <div class="title">chất lượng tuyệt đối</div>
                            <div class="content">It is a long established fact that a reader will be distracted</div>
                        </div>
                    </div>
                    <div class="item col-lg-auto col-md-6 col-12 item2 p-0">
                        <div class="left">
                            <img src="assets/images/png/debit-cards 1.png" alt="">
                        </div>
                        <div class="right">
                            <div class="title">Thanh toán tiện lợi</div>
                            <div class="content">It is a long established fact that a reader will be distracted</div>
                        </div>
                    </div>
                    <div class="item col-lg-auto col-md-6 col-12 item3 p-0">
                        <div class="left">
                            <img src="assets/images/png/delivery 1.png" alt="">
                        </div>
                        <div class="right">
                            <div class="title">Giao hàng nhanh chóng</div>
                            <div class="content">It is a long established fact that a reader will be distracted</div>
                        </div>
                    </div>
                    <div class="item col-lg-auto col-md-6 col-12 item4 p-0">
                        <div class="left">
                            <img src="assets/images/png/guarantee-certificate 1.png" alt="">
                        </div>
                        <div class="right">
                            <div class="title">Bảo hành lâu dài</div>
                            <div class="content">It is a long established fact that a reader will be distracted</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="container-item container-item1 nowrap">
                <div class="width mx-auto">
                    <div class="top">
                        <div class="title">SẢN PHẨM BÁN CHẠY NHẤT</div>
                        <div class="btn">
                            <a href="product-detail.html">
                                <a href="product-detail.html">
                                    <div class="btn-item bg-gray center">Xem Tất Cả</div>
                                </a>
                            </a>
                        </div>
                    </div>
                    <div class="product nowrap owl-carousel owl-carousel1">
                        <?php
                        foreach ($SPBanChay as $item) {

                        ?>

                            <a href="<?php echo $item['code'] ?>">
                                <div class="product-item position-relative item">
                                    <div class="product-item-outline"> </div>
                                    <div class="image">
                                        <img src="assets/images/png/<?php echo $item['image_path']; ?>" alt="">
                                    </div>
                                    <div class="comment">
                                        <div class="star">
                                            <img src="assets/images/svg/Stars.svg" alt="">
                                        </div>
                                        <div class="evaluate">45 lượt đánh giá</div>
                                    </div>
                                    <div class="name split split-1"><?php echo $item['name']; ?></div>
                                    <div class="price">
                                        <span><?php echo $item['discount']; ?>đ</span>
                                        <div class="discount"><?php echo $item['price']; ?>đ</div>
                                    </div>
                                    <div class="btn ">
                                        <div class="image"></div>
                                        <div class="btn-text">Xem chi tiết</div>
                                    </div>
                                </div>
                            </a>

                        <?php
                        }
                        ?>


                    </div>
                </div>

            </div>
            <div class="container-item container-item2 nowrap bg-gray">
                <div class="width mx-auto">
                    <div class="top">
                        <div class="title">SẢN PHẨM KHUYẾN MÃI</div>
                        <div class="btn">
                            <a href="product-detail.html">

                                <div class="btn-item center">Xem Tất Cả</div>
                            </a>
                        </div>

                    </div>
                    <div class="product nowrap owl-carousel owl-carousel2">
                        <?php
                        foreach ($SPBanChay as $item) {

                        ?>

                            <a href="<?php echo $item['code'] ?>">
                                <div class="product-item position-relative item">
                                    <div class="product-item-outline"> </div>
                                    <div class="image">
                                        <img src="assets/images/png/<?php echo $item['image_path']; ?>" alt="">
                                    </div>
                                    <div class="comment">
                                        <div class="star">
                                            <img src="assets/images/svg/Stars.svg" alt="">
                                        </div>
                                        <div class="evaluate">45 lượt đánh giá</div>
                                    </div>
                                    <div class="name split split-1"><?php echo $item['name']; ?></div>
                                    <div class="price">
                                        <span><?php echo $item['discount']; ?>đ</span>
                                        <div class="discount"><?php echo $item['price']; ?>đ</div>
                                    </div>
                                    <div class="btn ">
                                        <div class="image"></div>
                                        <div class="btn-text">Xem chi tiết</div>
                                    </div>
                                </div>
                            </a>

                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="container-item container-item3 no-slide">
                <div class="width mx-auto">
                    <div class="top">
                        <div class="title">ĐÈN TRANG TRÍ</div>
                        <div class="btn">
                            <div class="btn-item bg-gray btn-hidden center">Đèn Chùm</div>
                            <div class="btn-item bg-gray btn-hidden center">Đèn Thả</div>
                            <div class="btn-item bg-gray btn-hidden center active">Đèn Treo Tường</div>
                            <a href="product-detail.html">
                                <div class="btn-item bg-gray center">Xem Tất Cả</div>
                            </a>
                        </div>

                    </div>
                    <div class="product product-wrap col-12">
                        <?php
                        foreach ($denTrangTri as $item) {
                        ?>
                            <div class="col-2-4">
                                <div class="product-item position-relative">
                                    <a href="<?php echo $item['code'] ?>">
                                        <div class="product-item-outline"> </div>
                                        <div class="product-item-outline"> </div>
                                        <div class="image">
                                            <img src="assets/images/png/<?php echo $item['image_path']; ?>" alt="">
                                        </div>
                                        <div class="comment">
                                            <div class="star">
                                                <img src="assets/images/svg/Stars.svg" alt="">
                                            </div>
                                            <div class="evaluate">45 lượt đánh giá</div>
                                        </div>
                                        <div class="name split split-1"><?php echo $item['name']; ?>
                                        </div>
                                        <div class="price">
                                            <span><?php echo $item['discount']; ?>đ</span>
                                            <div class="discount"><?php echo $item['price']; ?>đ</div>
                                        </div>
                                        <div class="btn ">
                                            <div class="image"></div>
                                            <div class="btn-text">Xem chi tiết</div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        <?php
                        }
                        ?>




                    </div>
                </div>
            </div>
            <div class="container-item container-item4 bg-gray no-slide">

                <div class="width mx-auto">
                    <div class="top">
                        <div class="title">THIẾT BỊ ĐIỆN</div>
                        <div class="btn">
                            <div class="btn-item btn-hidden center ">Đèn Chùm</div>
                            <div class="btn-item btn-hidden center">Đèn Thả</div>
                            <div class="btn-item btn-hidden center active ">Đèn Treo Tường</div>
                            <a href="product-detail.html">
                                <div class="btn-item center">Xem Tất Cả</div>
                            </a>
                        </div>

                    </div>
                    <div class="product product-wrap">

                        <?php
                        foreach ($thietBiDien as $item) {
                        ?>
                            <div class="col-2-4">
                                <div class="product-item position-relative">
                                    <a href="<?php echo $item['code'] ?>">
                                        <div class="product-item-outline"> </div>
                                        <div class="product-item-outline"> </div>
                                        <div class="image">
                                            <img src="assets/images/png/<?php echo $item['image_path']; ?>" alt="">
                                        </div>
                                        <div class="comment">
                                            <div class="star">
                                                <img src="assets/images/svg/Stars.svg" alt="">
                                            </div>
                                            <div class="evaluate">45 lượt đánh giá</div>
                                        </div>
                                        <div class="name split split-1"><?php echo $item['name']; ?>
                                        </div>
                                        <div class="price">
                                            <span><?php echo $item['discount']; ?>đ</span>
                                            <div class="discount"><?php echo $item['price']; ?>đ</div>
                                        </div>
                                        <div class="btn ">
                                            <div class="image"></div>
                                            <div class="btn-text">Xem chi tiết</div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="container-item container-item5 no-slide">
                <div class="width mx-auto">
                    <div class="top">
                        <div class="title">ĐÈN NỘI THẤT</div>
                        <div class="btn">
                            <div class="btn-item bg-gray btn-hidden center">Đèn Chùm</div>
                            <div class="btn-item bg-gray btn-hidden center">Đèn Thả</div>
                            <div class="btn-item bg-gray btn-hidden center active">Đèn Treo Tường</div>
                            <a href="product-detail.html">
                                <div class="btn-item bg-gray center">Xem Tất Cả</div>
                            </a>
                        </div>

                    </div>
                    <div class="product product-wrap">
                        <?php
                        foreach ($denNoiThat as $item) {
                        ?>
                            <div class="col-2-4">
                                <div class="product-item position-relative">
                                    <a href="<?php echo $item['code'] ?>">
                                        <div class="product-item-outline"> </div>
                                        <div class="product-item-outline"> </div>
                                        <div class="image">
                                            <img src="assets/images/png/<?php echo $item['image_path']; ?>" alt="">
                                        </div>
                                        <div class="comment">
                                            <div class="star">
                                                <img src="assets/images/svg/Stars.svg" alt="">
                                            </div>
                                            <div class="evaluate">45 lượt đánh giá</div>
                                        </div>
                                        <div class="name split split-1"><?php echo $item['name']; ?>
                                        </div>
                                        <div class="price">
                                            <span><?php echo $item['discount']; ?>đ</span>
                                            <div class="discount"><?php echo $item['price']; ?>đ</div>
                                        </div>
                                        <div class="btn ">
                                            <div class="image"></div>
                                            <div class="btn-text">Xem chi tiết</div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>

                </div>
            </div>
            <div class="container-item container-item6 bg-gray no-slide">
                <div class="width mx-auto">
                    <div class="top">
                        <div class="title">ĐÈN CÔNG NGHIỆP</div>
                        <div class="btn">
                            <div class="btn-item btn-hidden center">Đèn Chùm</div>
                            <div class="btn-item btn-hidden center">Đèn Thả</div>
                            <div class="btn-item btn-hidden center active">Đèn Treo Tường</div>
                            <a href="product-detail.html">
                                <div class="btn-item center">Xem Tất Cả</div>
                            </a>
                        </div>

                    </div>
                    <div class="product product-wrap">
                        <?php
                        foreach ($denNongNghiep as $item) {
                        ?>
                            <div class="col-2-4">
                                <div class="product-item position-relative">
                                    <a href="<?php echo $item['code'] ?>">
                                        <div class="product-item-outline"> </div>
                                        <div class="product-item-outline"> </div>
                                        <div class="image">
                                            <img src="assets/images/png/<?php echo $item['image_path']; ?>" alt="">
                                        </div>
                                        <div class="comment">
                                            <div class="star">
                                                <img src="assets/images/svg/Stars.svg" alt="">
                                            </div>
                                            <div class="evaluate">45 lượt đánh giá</div>
                                        </div>
                                        <div class="name split split-1"><?php echo $item['name']; ?>
                                        </div>
                                        <div class="price">
                                            <span><?php echo $item['discount']; ?>đ</span>
                                            <div class="discount"><?php echo $item['price']; ?>đ</div>
                                        </div>
                                        <div class="btn ">
                                            <div class="image"></div>
                                            <div class="btn-text">Xem chi tiết</div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div id="outstanding" class="d-flex justify-content-center">
            <div class="width d-flex flex-lg-row flex-column">
                <div class="left">
                    <div class="title">TIN TỨC NỔI BẬT
                        <a href="blog-detail.html">
                            <div class="btn-seen-all center">Xem Tất Cả</div>
                        </a>
                    </div>
                    <div class="left-items owl-carousel outstanding-owl-carousel">
                        <a href="blog-detail.html">
                            <div class="item d-flex">
                                <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                                <div class="content">
                                    <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế
                                        2023</div>
                                    <div class="date">
                                        <img src="assets/images/svg/calendar 1.svg" alt="">
                                        <span>02/11/2023</span>
                                    </div>
                                    <div class="description">It is a long established fact that a reader will be
                                        distracted
                                        hometown</div>
                                </div>

                            </div>
                        </a>
                        <a href="blog-detail.html">
                            <div class="item">
                                <div class="img"> <img src="assets/images/png/Rectangle 8497.png" alt=""></div>
                                <div class="content">
                                    <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế
                                        2023</div>
                                    <div class="date">
                                        <img src="assets/images/svg/calendar 1.svg" alt="">
                                        <span>02/11/2023</span>
                                    </div>
                                    <div class="description">It is a long established fact that a reader will be
                                        distracted
                                        hometown</div>
                                </div>

                            </div>
                        </a>
                        <a href="blog-detail.html">
                            <div class="item">
                                <div class="img"> <img src="assets/images/png/Rectangle 8498.png" alt=""></div>
                                <div class="content">
                                    <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế
                                        2023</div>
                                    <div class="date">
                                        <img src="assets/images/svg/calendar 1.svg" alt="">
                                        <span>02/11/2023</span>
                                    </div>
                                    <div class="description">It is a long established fact that a reader will be
                                        distracted
                                        hometown</div>
                                </div>

                            </div>
                        </a>
                        <a href="blog-detail.html">
                            <div class="item">
                                <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                                <div class="content">
                                    <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế
                                        2023</div>
                                    <div class="date">
                                        <img src="assets/images/svg/calendar 1.svg" alt="">
                                        <span>02/11/2023</span>
                                    </div>
                                    <div class="description">It is a long established fact that a reader will be
                                        distracted
                                        hometown</div>
                                </div>

                            </div>
                        </a>
                        <a href="blog-detail.html">
                            <div class="item">
                                <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                                <div class="content">
                                    <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế
                                        2023</div>
                                    <div class="date">
                                        <img src="assets/images/svg/calendar 1.svg" alt="">
                                        <span>02/11/2023</span>
                                    </div>
                                    <div class="description">It is a long established fact that a reader will be
                                        distracted
                                        hometown</div>
                                </div>

                            </div>
                        </a>
                        <a href="blog-detail.html">
                            <div class="item">
                                <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                                <div class="content">
                                    <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế
                                        2023</div>
                                    <div class="date">
                                        <img src="assets/images/svg/calendar 1.svg" alt="">
                                        <span>02/11/2023</span>
                                    </div>
                                    <div class="description">It is a long established fact that a reader will be
                                        distracted
                                        hometown</div>
                                </div>

                            </div>
                        </a>
                        <a href="blog-detail.html">
                            <div class="item">
                                <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                                <div class="content">
                                    <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế
                                        2023</div>
                                    <div class="date">
                                        <img src="assets/images/svg/calendar 1.svg" alt="">
                                        <span>02/11/2023</span>
                                    </div>
                                    <div class="description">It is a long established fact that a reader will be
                                        distracted
                                        hometown</div>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="left-items">
                        <div class="item">
                            <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                            <div class="content">
                                <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế 2023
                                </div>
                                <div class="date">
                                    <img src="assets/images/svg/calendar 1.svg" alt="">
                                    <span>02/11/2023</span>
                                </div>
                                <div class="description">It is a long established fact that a reader will be distracted
                                    hometown</div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="img"> <img src="assets/images/png/Rectangle 8497.png" alt=""></div>
                            <div class="content">
                                <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế 2023
                                </div>
                                <div class="date">
                                    <img src="assets/images/svg/calendar 1.svg" alt="">
                                    <span>02/11/2023</span>
                                </div>
                                <div class="description">It is a long established fact that a reader will be distracted
                                    hometown</div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="img"> <img src="assets/images/png/Rectangle 8498.png" alt=""></div>
                            <div class="content">
                                <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế 2023
                                </div>
                                <div class="date">
                                    <img src="assets/images/svg/calendar 1.svg" alt="">
                                    <span>02/11/2023</span>
                                </div>
                                <div class="description">It is a long established fact that a reader will be distracted
                                    hometown</div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                            <div class="content">
                                <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế 2023
                                </div>
                                <div class="date">
                                    <img src="assets/images/svg/calendar 1.svg" alt="">
                                    <span>02/11/2023</span>
                                </div>
                                <div class="description">It is a long established fact that a reader will be distracted
                                    hometown</div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                            <div class="content">
                                <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế 2023
                                </div>
                                <div class="date">
                                    <img src="assets/images/svg/calendar 1.svg" alt="">
                                    <span>02/11/2023</span>
                                </div>
                                <div class="description">It is a long established fact that a reader will be distracted
                                    hometown</div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                            <div class="content">
                                <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế 2023
                                </div>
                                <div class="date">
                                    <img src="assets/images/svg/calendar 1.svg" alt="">
                                    <span>02/11/2023</span>
                                </div>
                                <div class="description">It is a long established fact that a reader will be distracted
                                    hometown</div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="img"> <img src="assets/images/png/Rectangle 8496.png" alt=""></div>
                            <div class="content">
                                <div class="name split split-2">trang trí đèn theo phong cách hiện đại và tinh tế 2023
                                </div>
                                <div class="date">
                                    <img src="assets/images/svg/calendar 1.svg" alt="">
                                    <span>02/11/2023</span>
                                </div>
                                <div class="description">It is a long established fact that a reader will be distracted
                                    hometown</div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="title">VIDEO NỔI BẬT
                        <a href="blog-detail.html">
                            <div class="btn-seen-all center">Xem Tất Cả</div>
                        </a>
                    </div>
                    <div class="main-video">
                        <img src="assets/images/png/Rectangle 8502.png" alt="Video đèn điện">
                        <div class="btn">
                            <div class="btn-play btn-play-1"><img src="assets/images/svg/Ellipse 1046.svg" alt="">
                            </div>
                            <div class="btn-play btn-play-2"><img src="assets/images/svg/Ellipse 1044.svg" alt="">
                            </div>
                            <div class="btn-play btn-play-3"><img src="assets/images/svg/Ellipse 1045.svg" alt="">
                            </div>
                            <div class="btn-play btn-play-4"><img src="assets/images/svg/icons8_play 4.svg" alt="">
                            </div>
                        </div>
                        <!-- <div class="bg-video">
                            <iframe width="100%" height="100%"
                                src="https://www.youtube.com/embed/V-YejkveBfY?si=MmJzOcR2CD1rLiYX"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div> -->
                    </div>
                    <div class="video-details">
                        <div class="item"><img src="assets/images/png/Rectangle 8503.png" alt="Video đèn điện">
                            <div class="btn">
                                <img class="btn-play" src="assets/images/svg/Ellipse 1046 (1).svg" alt="">
                                <img class="btn-play" src="assets/images/svg/Ellipse 1044 (1).svg" alt="">
                                <img class="btn-play" src="assets/images/svg/Ellipse 1045 (1).svg" alt="">
                                <img class="btn-play" src="assets/images/svg/icons8_play 4 (2).svg" alt="">
                            </div>
                        </div>
                        <div class="item"><img src="assets/images/png/Rectangle 8504.png" alt="Video đèn điện">
                            <div class="btn">
                                <img class="btn-play" src="assets/images/svg/Ellipse 1046 (1).svg" alt="">
                                <img class="btn-play" src="assets/images/svg/Ellipse 1044 (1).svg" alt="">
                                <img class="btn-play" src="assets/images/svg/Ellipse 1045 (1).svg" alt="">
                                <img class="btn-play" src="assets/images/svg/icons8_play 4 (2).svg" alt="">
                            </div>
                        </div>
                        <div class="item"><img src="assets/images/png/Rectangle 8505.png" alt="Video đèn điện">
                            <div class="btn">
                                <img class="btn-play" src="assets/images/svg/Ellipse 1046 (1).svg" alt="">
                                <img class="btn-play" src="assets/images/svg/Ellipse 1044 (1).svg" alt="">
                                <img class="btn-play" src="assets/images/svg/Ellipse 1045 (1).svg" alt="">
                                <img class="btn-play" src="assets/images/svg/icons8_play 4 (2).svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="comment">
            <div class="width mx-auto">
                <div class="title">Khách hàng nói gì về chúng tôi</div>
                <div class="comment-items owl-carousel comment-carousel">
                    <div class="item">
                        <div class="item-1">
                            <div class="name split split-1">PHAN VĂN KHÁNH</div>
                            <div class="evaluate"><img src="assets/images/svg/Stars.svg" alt=""></div>
                        </div>
                        <div class="item-2">( Kiến Trúc Sư )</div>
                        <div class="item-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
                        <div class="image"><img src="assets/images/svg/Ellipse 780.svg" alt=""></div>

                    </div>
                    <div class="item">
                        <div class="item-1">
                            <div class="name split split-1">PHAN VĂN KHÁNH</div>
                            <div class="evaluate"><img src="assets/images/svg/Stars.svg" alt=""></div>
                        </div>
                        <div class="item-2">( Kiến Trúc Sư )</div>
                        <div class="item-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
                        <div class="image"><img src="assets/images/svg/Ellipse 780.svg" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="item-1">
                            <div class="name split split-1">PHAN VĂN KHÁNH</div>
                            <div class="evaluate"><img src="assets/images/svg/Stars.svg" alt=""></div>
                        </div>
                        <div class="item-2">( Kiến Trúc Sư )</div>
                        <div class="item-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
                        <div class="image"><img src="assets/images/svg/Ellipse 780.svg" alt=""></div>

                    </div>
                    <div class="item">
                        <div class="item-1">
                            <div class="name split split-1">PHAN VĂN KHÁNH</div>
                            <div class="evaluate"><img src="assets/images/svg/Stars.svg" alt=""></div>
                        </div>
                        <div class="item-2">( Kiến Trúc Sư )</div>
                        <div class="item-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
                        <div class="image"><img src="assets/images/svg/Ellipse 780.svg" alt=""></div>

                    </div>
                    <div class="item">
                        <div class="item-1">
                            <div class="name split split-1">PHAN VĂN KHÁNH</div>
                            <div class="evaluate"><img src="assets/images/svg/Stars.svg" alt=""></div>
                        </div>
                        <div class="item-2">( Kiến Trúc Sư )</div>
                        <div class="item-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
                        <div class="image"><img src="assets/images/svg/Ellipse 780.svg" alt=""></div>

                    </div>
                    <div class="item">
                        <div class="item-1">
                            <div class="name split split-1">PHAN VĂN KHÁNH</div>
                            <div class="evaluate"><img src="assets/images/svg/Stars.svg" alt=""></div>
                        </div>
                        <div class="item-2">( Kiến Trúc Sư )</div>
                        <div class="item-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
                        <div class="image"><img src="assets/images/svg/Ellipse 780.svg" alt=""></div>

                    </div>
                    <div class="item">
                        <div class="item-1">
                            <div class="name split split-1">PHAN VĂN KHÁNH</div>
                            <div class="evaluate"><img src="assets/images/svg/Stars.svg" alt=""></div>
                        </div>
                        <div class="item-2">( Kiến Trúc Sư )</div>
                        <div class="item-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </div>
                        <div class="image"><img src="assets/images/svg/Ellipse 780.svg" alt=""></div>

                    </div>
                </div>
            </div>
        </div>

        <div id="brand">
            <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4898.png" alt="brand i-web 'Đồng hành cùng bạn'"></a></div>
            <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4901.png" alt="brand điện lạnh Bách Khoa"></a>
            </div>
            <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4899.png" alt="brand rekey điện tử - điện lạnh"></a></div>
            <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4902.png" alt="brand HOA PHAT ĐIỆN LẠNH"></a>
            </div>
            <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4900.png" alt="brand ĐIỆN NƯỢC ĐIỆN LẠNH AN TÂM"></a></div>
            <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4903.png" alt="brand VINACO"></a>
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
                                    <input class="input" id="fullname" name="fullname" type="text" placeholder="Nhập Họ Và Tên Của Bạn">
                                    <span class="form-message"></span>
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <input class="input" id="email" type="text" name="email" placeholder="Nhập Email Của Bạn">
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
                                            <div class="icon"><img src="assets/images/svg/icons8_facebook_f 8.svg" alt=""></div>
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
                                            <div class="icon"><img src="assets/images/svg/gmail 1.svg" alt=""></div>
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
            <li><a href="/blog">Tin tức</a></li>
            <li><a href="product-detail.html">Đèn thả</a></li>
            <li><a href="/blog-detail.html">Đèn treo tường</a></li>
            <li><a href="">Liên hệ</a></li>
        </ul>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/validator.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form-1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#fullname', 'Vui lòng nhập tên đầy đủ của bạn'),
                    Validator.isRequired('#email', 'Vui lòng nhập điền thông tin'),
                    Validator.isEmail('#email'),
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
        box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.3);
    }
</style>