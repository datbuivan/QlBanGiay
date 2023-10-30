<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../QlBanGiay/resources/assets/images/icons/favicon.png " />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" ,
        href="../../../QlBanGiay/resources/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet"
        href="../../../QlBanGiay/resources/assets/fonts/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" ,
        href="../../../QlBanGiay/resources/assets/fonts/iconic/css/material-design-iconic-font.min.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/fonts/linearicons-v1.0.0/icon-font.min.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/vendor/animate/animate.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/vendor/css-hamburgers/hamburgers.min.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/vendor/animsition/css/animsition.min.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/vendor/select2/select2.min.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/vendor/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/vendor/slick/slick.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/vendor/MagnificPopup/magnific-popup.css" />
    <link rel="stylesheet" ,
        href="../../../QlBanGiay/resources/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/css/util.css" />
    <link rel="stylesheet" , href="../../../QlBanGiay/resources/assets/css/main.css" />
    <style>
    .size {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin: 20px 0;
    }

    .size1 {
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .size1:hover {
        border: 1px solid #000;
    }

    .size1-label {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        width: 120px;
        height: 48px
    }

    .size1 input:checked~.size1-label {
        border: 1px solid #000;
    }

    .close-td {
        text-align: center !important;
    }


    .close-icon:hover {
        color: red;
        cursor: pointer;
    }

    .price {
        display: flex;
    }

    .price_discount {
        margin-right: 10px;
        font-size: 14px;
        text-decoration: line-through;
        color: red;
    }

    .pointer:hover .hover {
        color: #fff !important;
    }

    .stext-109 {
        font-size: 16px
    }

    .stars-outer {
        position: relative;
        display: inline-block;
        margin: 10px 0;
        margin-right: 15px;
    }

    .stars-inner {
        position: absolute;
        top: 0;
        left: 0;
        white-space: nowrap;
        overflow: hidden;
        width: 0;
    }

    .stars-outer::before {
        content: '\f005 \f005 \f005 \f005 \f005';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #ccc;
    }

    .stars-inner::before {
        content: '\f005 \f005 \f005 \f005 \f005';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #f8ce0b;
    }

    .star-1 {
        border: none !important;
        padding-left: 0 !important;
    }

    .star-1::before {
        content: '\f005 ';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #ccc;
    }

    .star-2::before {
        content: '\f005 \f005 ';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #ccc;
    }

    .star-3::before {
        content: '\f005 \f005 \f005 ';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #ccc;
    }

    .star-4::before {
        content: '\f005 \f005 \f005 \f005 ';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #ccc;
    }

    .star-5::before {
        content: '\f005 \f005 \f005 \f005 \f005';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #ccc;
    }

    .active::before {
        font-weight: 900;
        color: #f8ce0b;
    }

    .active-star::before {
        font-weight: 900;
        color: #f8ce0b;
        position: absolute;
        top: 0;
    }

    .star:hover::before {
        cursor: pointer;
        transition: all 0.3s linear;
        font-weight: 900;
        color: #f8ce0b;
    }

    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 30px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }

    .active_status {
        color: #26aa99 !important;
    }
    </style>

</head>

<body class="animsition">
    <!-- Header -->
    @include('layout.header')

    <!-- Product -->
    @yield('content')

    <!-- Footer -->
    @include('Layout.footer')


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="../../../QlBanGiay/resources/assets/images/icons/icon-close.png" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3"
                                        data-thumb="../../../QlBanGiay/resources/assets/images/product-detail-01.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="../../../QlBanGiay/resources/assets/images/product-detail-01.jpg"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="images/product-detail-01.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3"
                                        data-thumb="../../../QlBanGiay/resources/assets/images/product-detail-02.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="../../../QlBanGiay/resources/assets/images/product-detail-02.jpg"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="images/product-detail-02.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3"
                                        data-thumb="../../../QlBanGiay/resources/assets/images/product-detail-03.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="../../../QlBanGiay/resources/assets/images/product-detail-03.jpg"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="images/product-detail-03.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                Lightweight Jacket
                            </h4>

                            <span class="mtext-106 cl2">
                                $58.79
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat
                                ornare feugiat.
                            </p>

                            <!--  -->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Size S</option>
                                                <option>Size M</option>
                                                <option>Size L</option>
                                                <option>Size XL</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Color
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Red</option>
                                                <option>Blue</option>
                                                <option>White</option>
                                                <option>Grey</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="num-product" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                <div class="flex-m bor9 p-r-10 m-r-11">
                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                        data-tooltip="Add to Wishlist">
                                        <i class="zmdi zmdi-favorite"></i>
                                    </a>
                                </div>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/bootstrap/js/popper.js"></script>
    <script src="../../../QlBanGiay/resources/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/select2/select2.min.js"></script>
    <script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
    </script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="../../../QlBanGiay/resources/assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/slick/slick.min.js"></script>
    <script src="../../../QlBanGiay/resources/assets/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/parallax100/parallax100.js"></script>
    <script>
    $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
    </script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
    $('.js-addwish-b2').on('click', function(e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function() {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
        });
    });
    </script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function() {
            ps.update();
        })
    });
    </script>
    <!--===============================================================================================-->
    <script src="../../../QlBanGiay/resources/assets/js/main.js"></script>

</body>

</html>