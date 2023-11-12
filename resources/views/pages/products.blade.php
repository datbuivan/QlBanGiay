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
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer trans-04 m-r-8 m-tb-4">
                    <select name="select-total" id="select-total"
                        style="height: 100%;border:none;outline: none;min-width:70px;">
                        <option value="8">Default</option>
                        <option value="4">4</option>
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="">All</option>
                    </select>
                </div>
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div>

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

            <!-- Filter -->
            @include('layout.filter')
        </div>

        <div class="row isotope-gridd" id="isotope-grid">
            <!--content-->
        </div>

        <!-- <div class="pagination" id="pagination">
        </div> -->
        <div class="flex-c-m flex-w w-full p-t-38 pagination flex-c" id="pagination">
            <!-- <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                <i class="zmdi zmdi-arrow-left"></i>
            </a>
            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                1
            </a>
            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                2
            </a>
            <a href="#" class="flex-c-m trans-04 dot-pagination1">
                <i class="fa fa-circle" aria-hidden="true"></i>
                <i class="fa fa-circle" aria-hidden="true"></i>
                <i class="fa fa-circle" aria-hidden="true"></i>
            </a>
            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                12
            </a>
            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                <i class="zmdi zmdi-arrow-right"></i>
            </a> -->
        </div>
    </div>
</section>

@endsection

@section('foot-js')
<!-- <script src="../../../QlBanGiay/resources/assets/vendor/jquery/jquery-3.2.1.min.js"></script> -->
<script src="../../../QlBanGiay/resources/assets/js/filterapi.js"></script>
@endsection