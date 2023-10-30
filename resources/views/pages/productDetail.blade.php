@extends('index')

@section("content")


<div class="container" style="margin-top: 84px">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
            Chi tiết sản phẩm
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{$productDetails->name}}
        </span>
    </div>
</div>

@if($productDetails)
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <form class="row" method="POST" action="{{ url('/QLBanGiay/addCart') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            @foreach($productDetails->productImages as $productImage)
                            <div class="item-slick3"
                                data-thumb="../../../QlBanGiay/resources/assets/image/{{$productImage->name}}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="../../../QlBanGiay/resources/assets/image/{{$productImage->name}}"
                                        alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="image/{{$productImage->name}}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{$productDetails->name}}
                    </h4>
                    <?php
                        $starsTotal = 5;
                        $starPercentage = ($productDetails->total_reviews / $starsTotal) * 100;
                        $starPercentageRounded = round($starPercentage,0).'%';
                        $starMedium = round($productDetails->total_reviews, 1);
                    ?>
                    <span style="color: #f8ce0b; text-decoration: underline; margin-right: 4px;">
                        {{$starMedium}}
                    </span>
                    <div class="stars-outer">
                        <div style=' width: {{$starPercentageRounded}}' class="stars-inner"></div>
                    </div>
                    <span style="padding: 0 15px; border-left: 2px solid #ccc;">{{$productDetails->reviews}} Đánh
                        giá</span>
                    <br />
                    <span class="mtext-106 cl2">
                        {{number_format($productDetails->export_price -($productDetails->export_price*$productDetails->discount), 0, ',', '.') . ' đ'}}
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        Giày thể thao Dope được coi là sự tự chăm sóc bản thân. Và với màu sắc lấy cảm hứng từ các lối
                        đi của cửa hàng bán đồ làm đẹp tại địa phương của bạn (cộng với lớp đệm Nike Air giống như đám
                        mây dưới chân), những chiếc J's cỡ trung này sẽ khiến bạn có cảm giác như không có gì khác ngoài
                        phần giữa. Hãy tiếp tục - hãy đối xử với chính mình.
                    </p>

                    <!--  -->
                    <div class="p-t-33">
                        <div class="size-203 flex-c-m respon6">
                            Chọn size
                        </div>

                        <div class="size">
                            @foreach($productSizes as $productSize)
                            <div class="size1 ">
                                <input style="display: none" class="size1-input" id="size-{{$productSize->nameSize}}"
                                    value="{{$productSize->nameSize}}" type="radio" name="size"></input>
                                <label class="size1-label"
                                    for="size-{{$productSize->nameSize}}">{{$productSize->nameSize}}</label>
                            </div>
                            @endforeach
                        </div>

                        @error('size')
                        <div class="alert alert-danger">Vui lòng chọn kích thước</div>
                        @enderror

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" name="quantity" id="quantity"
                                        type="number" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>


                                <input type="hidden" value="{{ $productDetails->id }}" name="product_id">
                                <input type="hidden" value="{{ $productDetails->name }}" name="nameProduct">
                                <input type="hidden" value="{{ $productDetails->avatar }}" name="avatar">
                                <input type="hidden"
                                    value="{{$productDetails->export_price -($productDetails->export_price*$productDetails->discount)}}"
                                    name="export_price">
                                <input type="hidden" value="{{ $productDetails->colors->name }}" name="color">

                                <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">Add
                                    To Cart</button>
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

        </form>
        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Miêu tả sản phẩm</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh giá
                            ({{$listReviews->reviews->count()}})</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit
                                amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus
                                interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et
                                elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu
                                velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor sit amet orci nec
                                iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec laoreet consequat,
                                purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in arcu sed metus
                                rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
                            </p>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    @if($listReviews->reviews->count() > 0)
                                    @foreach($listReviews->reviews as $listReview)
                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="../../../QlBanGiay/resources/assets/images/avatar-01.jpg"
                                                alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    {{$listReview->user->name}}
                                                    <p>{{$listReview->created_at->format('d-m-Y')}}</p>
                                                </span>
                                                <div class="stars-outer">
                                                    <div class="star-{{$listReview->rate}}  active-star"></div>
                                                </div>
                                            </div>

                                            <p style="font-size: 16px;" class="stext-102 cl6">
                                                {{$listReview->comment}}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div style="text-align: center; font-size: 20px; color:red;">Sản phẩm chưa có đánh
                                        giá nào
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
    </div>
</section>

<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Những sản phẩm tương tự
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach($similarProducts as $similarProduct)
                <?php
                $starsTotal = 5;
                $starPercentage = ($similarProduct->total_reviews / $starsTotal) * 100;
                $starPercentageRounded = round($starPercentage,0).'%';
                ?>
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div style="border: 1px solid #ccc" class="block2-pic hov-img0">
                            <img style="height: 270px"
                                src="../../../QlBanGiay/resources/assets/image/{{$similarProduct->avatar}}"
                                alt="IMG-PRODUCT">

                            <a style="border: 1px solid #ccc; font-size: 13px;"
                                href="{{ url('/QLBanGiay/' . $similarProduct->id . '/productDetail') }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 
                            ">
                                Chi tiết sản phẩm
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{$similarProduct->name}}
                                </a>

                                <div class="price">
                                    <span class="stext-105 cl3 price_discount">
                                        {{number_format($similarProduct->export_price , 0, ',', '.') . ' đ'}}
                                    </span>
                                    <span class="stext-105 cl3 price_span">
                                        {{number_format($similarProduct->export_price-($similarProduct->export_price*$similarProduct->discount) , 0, ',', '.') . ' đ'}}
                                    </span>
                                </div>
                                <div class="stars-outer">
                                    <div style=' width: {{$starPercentageRounded}}' class="stars-inner"></div>
                                </div>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04"
                                        src="../../../QlBanGiay/resources/assets/images/icons/icon-heart-01.png"
                                        alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="../../../QlBanGiay/resources/assets/images/icons/icon-heart-02.png"
                                        alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@else
<p style="          margin: 60px 0;
                    text-align: center;
                    width: 100%;
                    font-size: 20px;
                    color: red;
                ">không tồn tại sản phẩm</p>
@endif
@endsection