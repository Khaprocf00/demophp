<?php
include "product_function.php";
if ($_GET["slug"] != "product") {
    $products = $product->showProductOfCategory($_GET["slug"]);
    $categoryName = $product->getNameCategory($_GET["slug"]);
} else {
    $products = $product->show();
    $categoryName = "Sản Phẩm";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="<?= $config['url'] ?>">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="assets/css/product.css">
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

    <!-- nice select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div id="container">
            <div class="row bg-container">
                <div class="col-lg-12 breadcumb p-0">
                    <ol id="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="home"><span itemprop="name"><i class="fa-solid fa-house" style="color:#fff;"></i><span class="hidden"></span></span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="product"><span itemprop="name">Sản
                                    phẩm</span></a>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>
                </div>
                <div class="col-lg-12 center">
                    <h1><?php echo $categoryName; ?> </h1>
                </div>
                <div class="col-lg-12 row my-3">
                    <div class="select ml-5 col-lg-3 col-sm-4 col-12 mb-3">
                        <select>
                            <option data-display="Thể loại">Nothing</option>
                            <option value="1">Đèn leb</option>
                            <option value="2">Thiết bị điện</option>
                            <option value="3">Đèn trang trí</option>
                            <option value="4">Đèn nội thất</option>
                            <option value="4">Đèn nông nghiệp</option>
                        </select>
                    </div>
                    <div class="select ml-5 col-lg-3 col-sm-4 col-12 mb-3">
                        <select>
                            <option data-display="Sắp xếp">Nothing</option>
                            <option value="1">Giá tăng dần</option>
                            <option value="2">Giá giảm dần</option>
                            <option value="3">Sắp xếp sản phẩm mới</option>
                            <option value="4">Sắp xếp sản phẩm cũ</option>
                        </select>
                    </div>
                    <div class="select ml-5 col-lg-3 col-sm-4 col-12 mb-3">
                        <select>
                            <option data-display="Hiện thị">Nothing</option>
                            <option value="1">Hiện thị 8 sản phẩm</option>
                            <option value="2">Hiện thị 12 sản phẩm</option>
                            <option value="3">Hiện thị 16 sản phẩm</option>
                            <option value="4">Hiện thị 20 sản phẩm</option>
                        </select>
                    </div>
                </div>
                <div class="row m-0 p-0 col-lg-12">
                    <?php
                    echo product($products);
                    ?>
                </div>
                <?php if ($products != null) {
                ?>
                    <div class="center mb-3">
                        <ul class="pagination" id="pagination"></ul>
                    </div>
                <?php
                } ?>

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
            <li><a href="">Trang chủ</a></li>
            <li><a href="product">Sản phẩm</a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="blog">Tin tức</a></li>
            <li><a href="product&productDetail=xxx">Đèn thả</a></li>
            <li><a href="blog-detail.html">Đèn treo tường</a></li>
            <li><a href="">Liên hệ</a></li>
        </ul>
    </div>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/jquery.twbsPagination.min.js"></script>
    <script src="assets/js/jquery.twbsPagination.js"></script>
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
    <script>
        $("select").niceSelect()

        $(function() {
            var currentPage = <?php echo $product->page; ?>;
            var totalPage = <?php echo $product->totalPage ?>;
            window.pagObj = $("#pagination").twbsPagination({
                totalPages: totalPage,
                visiblePages: 3,
                startPage: currentPage,
                onPageClick: function(event, page) {
                    if (currentPage != page) {
                        let url = "http://localhost/demophp/<?php echo $_GET["slug"] ?>&page=" + page
                        $(location).prop("href", url)
                    }
                }
            });
        });

        //MENU
        if ($("#header .menu") != null) {
            $("#header .menu").click(() => {
                $("#menu").addClass("active");
                $(".bg-menu").addClass("active");
                $(".bg-menu").removeClass("close");
            })
        }
        if ($(".close") != null) {

            $(".close").click(() => {
                $("#menu").removeClass("active");
                $(".bg-menu").removeClass("active");
                $(".bg-menu").addClass("close");
            })
        }
        if ($("#menu") != null) {
            $("#menu").click(() => {
                $("#menu").removeClass("active");
                $(".bg-menu").removeClass("active");
            })
        }

        $("#header .find .searchButton").click(() => {
            const dot = $("#header .find.active")
            if (dot.length == 0) {
                $("#header .find").addClass("active");
            } else {
                $("#header .find").removeClass("active");
            }
        })
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