<?php
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
    <link rel="shortcut icon" href="./../../QlBanGiay/public/Login/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="./../../QlBanGiay/public/Login/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../QlBanGiay/public/Login/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="./../../QlBanGiay/public/Login/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="./../../QlBanGiay/public/Login/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./../../QlBanGiay/public/Login/vendors/flags-icon/css/flag-icon.min.css">
    <link rel="stylesheet" href="./../../QlBanGiay/public/Login/vendors/social-button/bootstrap-social.css" />
    <link rel="stylesheet" href="./../../QlBanGiay/public/Login/css/main.css">
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Main Content-->
    <div class="container">

        <div class="row vh-100 justify-content-between align-items-center">

            <div class="col-12">
                @if($message = Session::get('error'))

                <div class="lockscreen alert alert-danger " style="background-color: #f8d7da;">
                    {{ $message }}
                </div>

                @endif
                <form action="{{url('QLBanGiay/login/register')}}" method="POST"
                    class="row row-eq-height lockscreen  mt-3 mb-5">
                    @csrf
                    <div class="lock-image col-12 col-sm-6"></div>
                    <div class="login-form col-12 col-sm-6">
                        <div class="form-group mb-3">
                            <label for="TaiKhoan">Tên đăng nhập</label>
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Nhập tên đăng nhâp">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="TaiKhoan">Email</label>
                            <input class="form-control" type="text" id="email" name="email" placeholder="Nhập email">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Mật khẩu</label>
                            <input class="form-control" type="password" id="password" name="password"
                                placeholder="Mật khẩu">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Nhập lại mật khẩu</label>
                            <input class="form-control" type="password" id="password_confirmation"
                                name="password_confirmation" placeholder="Mật khẩu">
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Nhập số điện thoại</label>
                            <input class="form-control" name="phone" placeholder="Số điện thoại">
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary " type="submit"> Đăng Ký </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END: Content-->

    <!-- START: Template JS-->
    <script src="./../../QlBanGiay/public/Login/vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="./../../QlBanGiay/public/Login/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="./../../QlBanGiay/public/Login/vendors/moment/moment.js"></script>
    <script src="./../../QlBanGiay/public/Login/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../../QlBanGiay/public/Login/vendors/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- END: Template JS-->
</body>
<!-- END: Body-->

</html>