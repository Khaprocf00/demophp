<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "delete") {
        $cart->deleteCart($_GET['id']);
    } else if ($_GET['action'] == "update") {
        $cart->updateCart($_GET['id'], $_GET['qty']);
    } else if ($_GET['action'] == "insert") {
        if (count($account) > 0) {
            $cart->saveBill($account, 1);
            unset($_SESSION['cart']);
            header("Location: ../cart");
        } else {
            header("Location: ../login");
        }
    }
}
$listCart = [];
if (isset($_SESSION['cart'])) {
    $listCart =  $_SESSION['cart'];
}
$totalBill = 0;
$totalItem = 0;
foreach ($listCart as $item) {
    $db->where('id', $item['id']);
    $productDetail = $db->getOne('product');
    $totalBill += $productDetail['price'] * $item['qty'];
    $totalItem += $item['qty'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="<?= $config['url'] ?>">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/carts.css">
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
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>


<body>
    <div id="bg">
        <div id="header">
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
        </div>
        <div class="card my-5">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h4><b>Shopping Cart</b></h4>
                            </div>
                            <div class="col center">3 items</div>
                        </div>
                    </div>
                    <?php
                    foreach ($listCart as $item) {
                        $db->where('id', $item['id']);
                        $productDetail = $db->getOne('product')
                    ?>
                        <div class="row border-top border-bottom">
                            <div class="row main align-items-center">
                                <div class="col-2"><img class="img-fluid" src="assets/images/png/<?= $productDetail['image_path'] ?>"></div>
                                <div class="col">
                                    <div class="row text-muted">Shirt</div>
                                    <div class="row split split-1"><?= $productDetail['name'] ?></div>
                                </div>
                                <div class="col">
                                    <div class="product__qty d-flex ">
                                        <div class="product__qty-item ">
                                            <button type="button" class="center js-qty-minus-<?= $productDetail['id'] ?>">-</button>
                                        </div>
                                        <div class="product__qty-item">
                                            <input class="text-center js-qty-<?= $productDetail['id'] ?>" type="number" value="<?= $item['qty'] ?>">
                                        </div>
                                        <div class="product__qty-item">
                                            <button type="button" class="center js-qty-plus-<?= $productDetail['id'] ?>">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-between align-item-center">&euro;
                                    <?= $productDetail['price'] * $item['qty'] ?> <a id="<?= $item['id'] ?>" onclick="warningBeforeDelete(this.id)"><span class="close">&#10005;</span></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span>
                    </div>
                </div>
                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">ITEMS <?= $totalItem ?></div>
                        <div class="col text-right">&euro; <?= $totalBill ?></div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                        <select>
                            <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                        </select>
                        <p>GIVE CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">&euro; <?= $totalBill + 5 ?></div>
                    </div>
                    <button onclick="checkout()" class="btn">CHECKOUT</button>
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

        function checkout() {

            <?php
            if (count($account) > 0) { ?>
                <?php
                if (count($listCart) == 0) {
                ?>
                    swal({
                        title: "Chưa có giỏ hàng",
                        text: "VUI LÒNG THÊM SẢN PHẨM VÀO GIỎ HÀNG",
                        icon: "warning",
                        buttons: {
                            cancel: "Hk nha",
                            confirm: "Đến trang sản phẩm"
                        },
                        showCancelButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.href = "product";
                        }
                    });
                <?php
                } else {
                ?>
                    swal({
                        title: "Xác nhận để đặt hàng",
                        text: "Vui lòng xác nhận để đặt hàng",
                        icon: "warning",
                        buttons: {
                            cancel: "Hk nha",
                            confirm: "Lụm"
                        },
                        showCancelButton: true,
                        confirmButtonText: "Lụm",
                        cancelButtonText: "Hk nha",
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            swal({
                                text: "Đặt hàng thành công",
                                icon: "success",
                            }).then(function() {
                                window.location.href = "cart/insert";
                            })
                        }
                    });

                <?php
                }
            } else { ?>
                swal({
                    title: "Bạn chưa đăng nhập",
                    text: "Bạn có muốn đăng nhập để tiếp tục mua đặt hàng không?",
                    icon: "warning",
                    buttons: {
                        cancel: "Hk nha",
                        confirm: "Lụm"
                    },
                    showCancelButton: true,
                    confirmButtonText: "Lụm",
                    cancelButtonText: "Hk nha",
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = "login";
                    }
                });
            <?php  } ?>

        }

        function warningBeforeDelete(click_id) {
            swal({
                title: "Xác nhận xóa",
                text: "Bạn có chắc chắn muốn xóa hay không",
                icon: "warning",
                buttons: {
                    cancel: "Hk nha",
                    confirm: "Lụm"
                },
                showCancelButton: true,
                confirmButtonText: "Lụm",
                cancelButtonText: "Hk nha",
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        text: "Đã xóa thành công",
                        icon: "success",
                    }).then(function() {
                        window.location.href = "cart/delete/" + click_id;
                    })

                }
            });
        }

        <?php
        foreach ($listCart as $item) {
            $db->where('id', $item['id']);
            $productDetail = $db->getOne('product')
        ?>
            $('.js-qty-<?= $productDetail['id'] ?>').on("input", function(event) {
                let qty = $('.js-qty-<?= $productDetail['id'] ?>').val();
                if (parseInt(qty) > <?= $productDetail['qty'] ?>) {
                    $('.js-qty-<?= $productDetail['id'] ?>').val(<?= $productDetail['qty'] ?>);
                }
            });
            $('.js-qty-plus-<?= $productDetail['id'] ?>').click(() => {
                clickPlus(<?= $productDetail['id'] ?>, <?= $item['id'] ?>,
                    <?= $productDetail['qty'] ?>)
            })
            $('.js-qty-minus-<?= $productDetail['id'] ?>').click(() => {
                clickMinus(<?= $productDetail['id'] ?>, <?= $item['id'] ?>,
                    <?= $productDetail['qty'] ?>)
            })
            $('.js-qty-<?= $productDetail['id'] ?>').change(function() {
                window.location.href = "cart/update/<?= $item['id'] ?>/" + $('.js-qty-<?= $item['id'] ?>').val();
            });
            $('.js-qty-<?= $productDetail['id'] ?>').blur(function() {
                window.location.href = "cart/update/<?= $item['id'] ?>/" + $('.js-qty-<?= $item['id'] ?>').val();

            });
        <?php
        }
        ?>

        function clickPlus(x1, x2, x3) {
            $('.js-qty-' + x1).val(parseInt($('.js-qty-' + x1).val()) +
                1)
            console.log($('.js-qty-' + x2).val());
            if ($('.js-qty-' + x2).val() > x3) {
                $('.js-qty-' + x1).val(x3);
            } else {
                window.location.href = "cart/update/" + x2 + "/" + $('.js-qty-' + x2).val();
            }
        }

        function clickMinus(x1, x2, x3) {
            $('.js-qty-' + x1).val(parseInt($('.js-qty-' + x1).val()) - 1)
            console.log($('.js-qty-' + x2).val());
            if ($('.js-qty-' + x2).val() > x3) {
                $('.js-qty-' + x1).val(x3);
            } else {
                window.location.href = "cart/update/" + x2 + "/" + $('.js-qty-' + x2).val();
            }
        }
        //MENU
        if ($('#header .menu') != null) {
            $('#header .menu').click(() => {
                $('#menu').addClass("active");
                $('.bg-menu').addClass("active");
                $('.bg-menu').removeClass("close");
            })
        }
        if ($('.close') != null) {

            $('.close').click(() => {
                $('#menu').removeClass("active");
                $('.bg-menu').removeClass("active");
                $('.bg-menu').addClass("close");
            })
        }
        if ($('#menu') != null) {
            $('#menu').click(() => {
                $('#menu').removeClass("active");
                $('.bg-menu').removeClass("active");
            })
        }

        $('#header .find .searchButton').click(() => {
            const dot = $('#header .find.active')
            if (dot.length == 0) {
                $('#header .find').addClass("active");
            } else {
                $('#header .find').removeClass("active");
            }
        })
    </script>

</body>

</html>

<style>
    #header .icon-search img {
        width: 20px;
    }
</style>



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
        height: 200px;
        background-color: #fff;
        z-index: 9999999;
        right: 0;
        box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, .3)
    }
</style>