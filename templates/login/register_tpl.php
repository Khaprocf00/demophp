<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V4</title>
    <meta charset="UTF-8">
    <base href="<?= $config['url'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">

    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <?php
                if (isset($message['register'])) {
                ?>
                    <div class="alert alert-<?= $message['alert'] ?>"><?= $message['register'] ?></div>
                <?php
                }
                ?>
                <form action="" method="post" class="login100-form validate-form" id="form-register">
                    <span class="login100-form-title p-b-49">
                        REGISTER
                    </span>
                    <div class="wrap-input100 validate-input form-group m-b-23">
                        <span class="label-input100">Nhập Họ Và Tên</span>
                        <input class="input100" type="text" name="fullname" id="fullname">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <div class="form-message"></div>
                    </div>
                    <div class="wrap-input100 validate-input form-group">
                        <span class="label-input100">Nhập Email</span>
                        <input class="input100" type="email" name="email" id="email">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        <div class="form-message"></div>
                    </div>
                    <div class="wrap-input100 validate-input form-group m-b-23">
                        <span class="label-input100">Nhập Tên Đăng Nhập</span>
                        <input class="input100" type="text" name="username" id="username">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <div class="form-message"></div>
                    </div>

                    <div class="wrap-input100 validate-input form-group">
                        <span class="label-input100">Nhập mật khẩu</span>
                        <input class="input100" type="password" name="password" id="password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        <div class="form-message"></div>
                    </div>
                    <div class="wrap-input100 validate-input form-group">
                        <span class="label-input100">Nhập lại mật khẩu</span>
                        <input class="input100" type="password" name="password_confirmation" id="password_confirmation">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        <div class="form-message"></div>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="register">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Register
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            Or Sign In Using
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                            Or Sign In Using
                        </span>

                        <a href="#" class="txt2">
                            Sign In
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <!-- <script src="assets/login/js/main.js"></script> -->
    <script src="assets/js/validators.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form-register',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#fullname', 'Vui lòng nhập tên đầy đủ của bạn'),
                    Validator.isRequired('#email', 'Vui lòng nhập điền thông tin'),
                    Validator.isEmail('#email'),
                    Validator.isRequired('#username', 'Vui lòng nhập tên đăng nhập'),
                    Validator.isUsername('#username'),
                    Validator.isRequired('#password', 'Vui lòng nhập mật khẩu'),
                    Validator.minLength('#password', 6, 'Vui lòng nhập mật khẩu nhiều hơn 6 kí tự '),
                    Validator.isRequired('#password_confirmation', 'Vui lòng nhập trường này'),
                    Validator.isConfirmed('#password_confirmation', function() {
                        return document.querySelector('#form-register #password').value;
                    }, 'Mật khẩu không trùng mời mật khẩu trên')
                ],
                onSubmit: "Submit"
            });
        });
    </script>
</body>

</html>

<style>
    .form-group.invalid .input {
        border-color: #f33a58;
    }

    .form-group.invalid .form-message {
        color: #f33a58;
        padding-left: 10px;
    }

    .form-message {
        margin-bottom: 10px;
    }

    .focus-input100::after {
        padding-top: 15px;
        align-items: normal !important;
    }
</style>