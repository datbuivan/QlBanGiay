 <?php

use Illuminate\Support\Facades\Session;
?>
 <!DOCTYPE html>
 <html lang="en">
 <!-- START: Head-->

 <head>
     <meta charset="UTF-8">
     <title>Khôi phục mật khẩu</title>
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
                 <?php

                    $message = Session::get('message');
                    if ($message) {
                    ?>
                 <div class="alert alert-danger alert-dismissible fade show col-9 text-center" style="margin: 0 auto"
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

                 <form action="{{URL::to('/QLBanGiay/login/khoi-phuc-mat-khau-reset')}}" method="post"
                     class="row row-eq-height lockscreen  mt-3 mb-5" style="max-width: 800px">
                     @csrf
                     <div class="lock-image col-12 col-sm-6"></div>
                     <div class="login-form col-12 col-sm-6">
                         <div class="form-group mb-3">
                             <label class="form-label">Bạn muốn khôi phục tài khoản qua:</label>
                             <select name="cbKhoiPhuc" id="cbKhoiPhuc" class="form-control form-control-sm radius-30">
                                 <option value="Khôi phục qua email">Khôi phục qua email</option>
                                 <option value="Khôi phục qua mã pin">Khôi phục qua mã pin</option>
                                 <option value="Khôi phục qua câu hỏi">Khôi phục qua câu hỏi</option>
                             </select>
                         </div>
                         <div class="form-group mb-3 email">
                             <label class="form-label">Email</label>
                             <input type="email" class="form-control" name="email" id="Email"
                                 placeholder="nhập email đănh ký">
                         </div>
                         <div class="form-group mb-3 taikhoan">
                             <label class="form-label">Tài khoản</label>
                             <input type="text" class="form-control" id="UserName" placeholder="Tên tài khoản">
                         </div>
                         <div class="form-group mb-3 mapin">
                             <label class="form-label">Mã Pin</label>
                             <input type="number" class="form-control" id="MaPin" placeholder="Nhập mã pin gồm 6 số">
                         </div>
                         <div class="form-group mb-3 cauhoi">
                             <label class="form-label">Chọn câu hỏi:</label>
                             <select name="CauHoi" id="" class="form-control">
                                 <option value="">-- Mời bạn chọn câu hỏi --</option>
                                 <option value="Bạn thích nhất con vật gì">Bạn thích nhất con vật gì</option>
                             </select>
                         </div>
                         <div class="form-group mb-3 cauhoi">
                             <label class="form-label">Câu trả lời</label>
                             <input type="text" class="form-control" id="CauTraLoi" placeholder="Nhập câu trả lời">
                         </div>
                         <div class="form-group mb-2">
                             <button class="btn btn-primary" type="submit"> Gửi yêu cầu </button>
                         </div>
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                             <strong>
                                 <li>Nhập tên Tài khoản và Mã Pin</li>
                                 <li>Nhập tên Tài khoản và Trả lời câu hỏi </li>
                                 <li>Khôi phục qua email</li>
                                 <li>Liên hệ quản trị viên | hotline: 0332581817 </li>
                             </strong>
                         </div>
                         <div class="mt-2"><a href="/QLBanGiay/login/dang-nhap-he-thong">(Đăng nhập hệ thống)</a></div>
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
     <script>
     var myController = {
         init: function() {
             myController.resetForm();
             myController.regesterEvent();
         },

         resetForm: function() {
             $(".taikhoan").hide();
             $(".mapin").hide();
             $(".cauhoi").hide();
             $(".email").show();
         },

         regesterEvent: function() {
             $("#cbKhoiPhuc").change(function() {
                 var cbKhoiPhuc = $("#cbKhoiPhuc").val();
                 if (cbKhoiPhuc == "Khôi phục qua mã pin") {
                     $(".taikhoan").show();
                     $(".mapin").show();
                     $(".cauhoi").hide();
                     $(".email").hide();
                 } else if (cbKhoiPhuc == "Khôi phục qua câu hỏi") {
                     $(".taikhoan").show();
                     $(".cauhoi").show();
                     $(".mapin").hide();
                     $(".email").hide();
                 } else {
                     $(".taikhoan").hide();
                     $(".cauhoi").hide();
                     $(".mapin").hide();
                     $(".email").show();
                 }
             });


         },

     };
     myController.init();
     </script>
     <!-- END: Template JS-->
 </body>
 <!-- END: Body-->

 </html>