<?php
 
 use Illuminate\Support\Facades\Session;
 ?>

<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>Đặt lại mật khẩu</title>
    <link rel="shortcut icon" href="./../../QlBanGiay/resources/assets/distimages/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="./../../QlBanGiay/resources/assets/distvendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../QlBanGiay/resources/assets/distvendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="./../../QlBanGiay/resources/assets/distvendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet"
        href="./../../QlBanGiay/resources/assets/distvendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./../../QlBanGiay/resources/assets/distvendors/flags-icon/css/flag-icon.min.css">
    <link rel="stylesheet" href="./../../QlBanGiay/resources/assets/distvendors/social-button/bootstrap-social.css" />
    <link rel="stylesheet" href="./../../QlBanGiay/resources/assets/distcss/main.css">
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Main Content-->
    <div class="container">

        <div class="row vh-100 justify-content-between align-items-center">

            <div class="col-12">
                <?php

                    $message = Session::get('message');
                    if ($message) {
                    ?>
                <div class="alert alert-danger alert-dismissible fade show col-7 text-center" style="margin: 0 auto"
                    role="alert">
                    <strong><?php echo $message; ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php
                      Session::put('message', null);
                    }
                    ?>

                <form action="{{ URL::to('/QLBanGiay/admin/doi-mat-khau-reset') }}" method="post"
                    class="row row-eq-height lockscreen  mt-3 mb-5">
                    @csrf
                    <div class="lock-image col-12 col-sm-6"></div>
                    <div class="login-form col-12 col-sm-6">
                        <div class="form-group mb-3">
                            <input class="form-control" type="text" id="IdUsers" name="IdUsers" value="{{ $id }}"
                                hidden>

                            <label for="TaiKhoan">Tài khoản</label>
                            <input class="form-control" type="text" id="UserName" name="UserName" value="{{ $name }}"
                                placeholder="Tên tài khoản ..." readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Mật khẩu thay đổi</label>
                            <input class="form-control" type="password" id="Password" name="Password"
                                placeholder="Nhập mật khẩu ...">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Xác nhận mật khẩu</label>
                            <input class="form-control" type="password" id="PasswordCheck" name="PasswordCheck"
                                placeholder="Nhập mật khẩu ...">
                        </div>
                        <div class="form-group mb-0">
                            <button class="btn btn-primary" type="submit" id="btn_thaydoi"> Cập nhập thay đổi
                            </button>
                        </div>
                        <p class="my-2 text-muted">--------------------------</p>
                        <div class="mt-2"><a href="/QLBanGiay/admin/dang-nhap-he-thong">(Đăng nhập hệ thống)</a></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END: Content-->

    <!-- START: Template JS-->
    <script src="./../../QlBanGiay/resources/assets/distvendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="./../../QlBanGiay/resources/assets/distvendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="./../../QlBanGiay/resources/assets/distvendors/moment/moment.js"></script>
    <script src="./../../QlBanGiay/resources/assets/distvendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../../QlBanGiay/resources/assets/distvendors/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- END: Template JS-->
    <script>
    var myController = {
        init: function() {
            $("#btn_thaydoi").prop('disabled', true);
            myController.regesterEvent();
        },

        regesterEvent: function() {
            $("#PasswordCheck").keyup(function() {
                var Password = $("#Password").val();
                var PasswordCheck = $("#PasswordCheck").val();
                if (Password != "") {
                    if (Password == PasswordCheck) {
                        $("#btn_thaydoi").prop('disabled', false);
                    } else {
                        $("#btn_thaydoi").prop('disabled', true);
                    }
                }
            });

        },

    };
    myController.init();
    </script>
</body>
<!-- END: Body-->

</html>