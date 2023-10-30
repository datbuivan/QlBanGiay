@extends('index')

@section("content")
<!-- breadcrumb -->
<div class="container" style="margin-top: 84px">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Đánh giá sản phẩm
        </span>
    </div>
</div>

@if($listReviews)
<!-- Shoping Cart -->
<form class="bg0 p-t-75" method="POST" action="{{ url('/QLBanGiay/ratingStar') }}" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                <div class="  m-lr-0-xl">
                    <div class="wrap-table-shopping-cart m-b-50">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Sản phẩm</th>
                                <th class="column-2">Tên sản phẩm</th>
                                <th class="column-2">Chất lượng sản phẩm</th>
                            </tr>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="../../../QlBanGiay/resources/assets/image/{{$listReviews->avatar}}"
                                            alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">
                                    <p>
                                        {{$listReviews->product->name}}
                                    </p>
                                    <p>
                                        Size:
                                        {{$listReviews->size}}
                                    </p>
                                </td>
                                <td class="column-2">
                                    <div class="star">
                                        <div class="stars">
                                            <input value="5" class="star star-5" id="star-5" type="radio"
                                                name="ratingstar" />
                                            <label class="star star-5" for="star-5"></label>
                                            <input value="4" class="star star-4" id="star-4" type="radio"
                                                name="ratingstar" />
                                            <label class="star star-4" for="star-4"></label>
                                            <input value="3" class="star star-3" id="star-3" type="radio"
                                                name="ratingstar" />
                                            <label class="star star-3" for="star-3"></label>
                                            <input value="2" class="star star-2" id="star-2" type="radio"
                                                name="ratingstar" />
                                            <label class="star star-2" for="star-2"></label>
                                            <input value="1" class="star star-1" id="star-1" type="radio"
                                                name="ratingstar" />
                                            <label class="star star-1" for="star-1"></label>
                                        </div>
                                    </div>
                                    <div>
                                        <textarea style="border: 1px solid #ccc; width: 70%; padding: 4px 10px;"
                                            placeholder="để lại đánh giá" name="comment"></textarea>
                                        <input value="{{$listReviews->product_id}}" style="display: none" type="text"
                                            name="productId" />
                                    </div>
                                </td>

                            </tr>
                        </table>
                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm flex-row-reverse">
                            <div class="flex-w flex-m m-r-20 m-tb-5  ">
                                <button class="btn btn-success" style="margin: 0 4px; color: #fff; cursor: pointer;"
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Đánh giá
                                </button>
                                <a class="btn btn-secondary" style="margin: 0 4px; color: #fff; cursor: pointer;"
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Xem đánh giá shop
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@else
<p style="          margin: 60px 0;
                    text-align: center;
                    width: 100%;
                    font-size: 20px;
                    color: red;
                ">không tồn tại sản phẩm</p>
@endif

@endsection