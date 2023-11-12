@extends('index')

@section("content")

@include('layout.sliderImage')

<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Tổng quan về sản phẩm
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a href="{{ url('/QLBanGiay/home/') }}"
                    class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả sản phẩm
                </a>
                @foreach($nameProductTypes as $productType)
                <a href="{{ url('/QLBanGiay/home/' . $productType->id ) }}"
                    class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                    {{$productType->name}}
                </a>
                @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <form action="" id="search-submit">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                            placeholder="Search" id="">
                    </div>
                </form>
            </div>

        </div>

        <div class="row isotope-grid">

            @forelse($products as $product)
            <?php
              $starsTotal = 5;
              $starPercentage = ($product->total_reviews / $starsTotal) * 100;
              $starPercentageRounded = round($starPercentage,0).'%';
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div style="border: 1px solid #ccc" class="block2-pic hov-img0">
                        <img style="height: 270px" src="../../../QlBanGiay/resources/assets/image/{{$product->avatar}}"
                            alt="IMG-PRODUCT">

                        <a style="border: 1px solid #ccc; font-size: 13px;"
                            href="{{ url('/QLBanGiay/' . $product->id . '/productDetail') }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 
                            ">
                            Chi tiết sản phẩm
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{$product->name}}
                            </a>

                            <div class="price">
                                <span class="stext-105 cl3 price_discount">
                                    {{number_format($product->export_price , 0, ',', '.') . ' đ'}}
                                </span>
                                <span class="stext-105 cl3 price_span">
                                    {{number_format($product->export_price-($product->export_price*$product->discount), 0, ',', '.') . ' đ'}}
                                </span>
                            </div>
                            <div class="stars-outer">
                                <div style=' width: {{$starPercentageRounded}}' class="stars-inner"></div>
                            </div>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04"
                                    src="../../../QlBanGiay/resources/assets/images/icons/icon-heart-01.png" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                    src="../../../QlBanGiay/resources/assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p style="width: 100%;
                    text-align: center;
                    font-size: 20px;
                    color: red;">
                Không có sản phẩm
            </p>
            @endforelse

        </div>
    </div>
</section>

@endsection