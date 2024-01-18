<?php
include "blog_function.php";
$blogDetail = $blog->showBlogDetail();
if ($blogDetail == null) {
    echo "<h1>PAGE NOT FOUND</h1>";
} else {
    $showBlogNew = $blog->showBlogNew();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost/demophp/">
    <link rel="stylesheet" href="assets/css/blog-detail.css">
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
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

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
            <div class="bg-container">
                <div class="col-lg-12 breadcumb">
                    <ol id="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                itemprop="item" href="home"><span itemprop="name"><i class="fa-solid fa-house"
                                        style="color:#fff;"></i><span class="hidden"></span></span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                itemprop="item" href="blog"><span itemprop="name">Tin tức</span></a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                itemprop="item" href="blog-detail.html"><span itemprop="name">Xu hướng lựa chọn đèn
                                    trang trí năm 2023
                                    vừa chiếu sáng , vừa làm đẹp cho ngôi nhà</span></a>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>
                </div>
                <div class="col-lg-12 d-flex flex-lg-row flex-column px-lg-0 px-3">
                    <div class="col-12 col-lg-9 container-left">
                        <div class="blog-detail">
                            <div class="center"><a href="" class="category">Đền trang trí</a></div>
                            <h1><?= $blogDetail['title'] ?></h1>
                            <div class="posted-on center">POSTED ON <a href="">01/12/2023</a> BY <a href="">THANH
                                    HAI</a></div>
                            <div class="image-main">
                                <img src="assets/images/png/<?= $blogDetail['image_path'] ?>" alt="">
                                <div class="date center position-absolute flex-column">
                                    <div class="day"><?= date("d", strtotime($blogDetail['created_on'])) ?></div>
                                    <div class="month">Th<?= date("m", strtotime($blogDetail['created_on'])) ?></div>
                                </div>
                            </div>
                            <p>Bên cạnh việc cập nhật những phong cách thiết kế chủ đạo của năm 2023 thì xu hướng lựa
                                chọn phụ kiện cũng được các gia đình để tâm đến . Trong đó không thể không kể đến đèn
                                trang trí</p>
                            <p>Ánh sáng có ảnh hưởng quyết định đến diện mạo căn phòng , tạo cảm giác về không gian cũng
                                như mang đến sự ấm cúng , thoải mái trong quá trình sử dụng . Bởi vậy mà những xu hướng
                                mới lựa chọn <a href="">đèn trang trí</a> được Nhatidecor bật mí là điều các bạn không
                                thể bỏ qua .</p>
                            <div class="container-direction">
                                <div class=""><span>Table of Contents</span></div>
                                <ol>
                                    <li><a href="#1">1. Sử dụng đèn trang trí làm tâm điểm của căn phòng</a></li>
                                    <li><a href="#2">2. Thiết kế cá biệt </a></li>
                                    <li><a href="#3">3. Cải thiện tâm trạng</a></li>
                                    <li><a href="#4">4. Đa dạng , nhiều màu sắc</a></li>
                                    <li><a href="#5">5. Chất liệu độc đáo </a></li>
                                </ol>
                            </div>
                            <strong id="1">1.Sử dụng đèn trang trí làm tâm điểm của căn phòng</strong>
                            <p>Năm 2023 được coi là một năm bùng nổ của những mẫu <a href="">đèn trang trí</a> sở hữu
                                kiểu dáng độc đáo
                                , chất liệu sáng tạo . Mỗi mẫu đèn được xem như một tác phẩm nghệ thuật , trở thành tâm
                                điểm chú ý bên trong các căn phòng</p>
                            <div class="image d-flex justify-content-center"><img
                                    src="assets/images/png/Rectangle 8377 (1).png" alt=""></div>
                            <strong id="2">2.Thiết kế cá biệt </strong>
                            <p>Không còn sử dụng mẫu đèn đại trà nữa , các gia đình có xu hướng lựa chọn và đặt riêng
                                mẫu <a href="">đèn trang trí</a> phù hợp với phong cách nội thất của nhà mình .Từ những
                                mẫu đèn mộc mạc
                                hợp với phong cách nội thất tối giản đến kiểu đèn cầu kỳ với hoa văn bắt mắt , màu sắc
                                sặc sỡ đều sẽ được các gia đình cân nhắc kỹ lưỡng trước khi lựa chọn cho không gian sống
                                .</p>
                            <div class="image d-flex justify-content-center"><img
                                    src="assets/images/png/Rectangle 8377 (2).png" alt=""></div>
                            <strong id="3">3.Cải thiện tâm trạng</strong>
                            <p>Sử dụng ánh sáng nhiều lớp với màu sắc ấm làm cho không gian sống của bạn trở nên thư
                                giãn và yên tĩnh hơn . Đây cũng là xu hướng lựa chọn <a href="">đèn trang trí</a> đáng
                                được quan tâm
                                trong năm 2023 . Sử dụng hệ thống đèn giúp cải thiện tâm trạng , làm người dùng dễ chịu
                                thoải mái sẽ được áp dụng linh hoạt cho nhiều không gian sống khác nhau , đặc biệt là
                                tại khách và phòng ngủ</p>
                            <div class="image d-flex justify-content-center"><img
                                    src="assets/images/png/Rectangle 8377 (3).png" alt=""></div>
                            <strong id="4">4.Đa dạng , nhiều màu sắc</strong>
                            <p>Cũng giống với xu hướng thiết kế nội thất của năm 2023 , mọi người muốn sử dụng nhiều màu
                                sắc hơn trong năm tới . Màu sắc và các thiết kế đèn trang trí đa dạng được đánh giá sẽ
                                tô điểm cho không gian sống trở nên sinh động hơn</p>
                            <div class="image d-flex justify-content-center"><img
                                    src="assets/images/png/Rectangle 8377 (4).png" alt=""></div>
                            <strong id="5">5.Chất liệu độc đáo </strong>
                            <p>Đèn trang trí được làm từ các vật liệu càng độc đáo càng được ưu chuộng trong năm 2023 .
                                Từ những vật liệu tự nhiên như mây , tre đan đến các vật liệu công nghiệp như kim loại ,
                                bê tông đều tạo ra được sự độc đáo co các mẫu đèn trang trí</p>
                            <p>Đặc biệt , các mẫu đèn được làm từ chất liệu đồng thau tráng gương rất thích hợp cho
                                những không gian sống hiện đại . Kiểu đèn này vừa ấn tượng , đồng thời có khả năng phản
                                chiếu ánh sáng ra khắp phòng rất tốt . Bởi vậy đây là một lựa chọn mà bạn không nên bỏ
                                qua</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 container-right">
                        <div class="search">
                            <h4>Tìm kiếm</h4>
                            <form action="" class="d-flex align-items-center">
                                <input type="text" placeholder="Nhập thông tin tìm kiếm">
                                <button class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="blog-new d-flex flex-column">
                            <h3 class="title">Bài viết mới nhất</h3>
                            <?php
                                echo showBlogNew($showBlogNew);
                                ?>
                        </div>
                        <div class="feedback">
                            <h3 class="title">Đánh giá gần đây</h3>
                            <?php
                                echo showFeedback($showBlogNew);
                                ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 d-flex flex-wrap mt-5 px-lg-0 px-3">
                    <div class="col-12 blog-relate">
                        Bài viết liên quan
                    </div>
                    <?php
                        echo showBlogRelate($showBlogNew);
                        ?>
                </div>
            </div>
        </div>

        <div id="brand">
            <div class="bg-brand d-flex justify-content-between mx-auto flex-md-nowrap flex-wrap">
                <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4898.png"
                            alt="brand i-web 'Đồng hành cùng bạn'"></a></div>
                <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4901.png"
                            alt="brand điện lạnh Bách Khoa"></a>
                </div>
                <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4899.png"
                            alt="brand rekey điện tử - điện lạnh"></a></div>
                <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4902.png"
                            alt="brand HOA PHAT ĐIỆN LẠNH"></a>
                </div>
                <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4900.png"
                            alt="brand ĐIỆN NƯỢC ĐIỆN LẠNH AN TÂM"></a></div>
                <div class="brand-item"><a href=""><img src="assets/images/png/Rectangle 4903.png"
                            alt="brand VINACO"></a></div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="assets/js/jquery.twbsPagination.min.js"></script>
    <script src="assets/js/jquery.twbsPagination.js"></script>
    <!-- validate -->
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

    <script>
    $(function() {
        window.pagObj = $('#pagination').twbsPagination({
            totalPages: 10,
            visiblePages: 3,
            startPage: 1,
            onPageClick: function(event, page) {}
        });
    });

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