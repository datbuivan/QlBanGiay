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
            Giỏ hàng
        </span>
    </div>
</div>

<!-- Shoping Cart -->
<form class="bg0 p-t-75" enctype="multipart/form-data">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                @if($message = Session::get('success'))

                <div class="alert alert-success">

                    {{ $message }}
                </div>

                @endif
                @if($listCarts->count() > 0)
                <div class=" m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Sản phẩm</th>
                                <th class="column-2"></th>
                                <th style="text-align: center;" class="column-3">Giá bán</th>
                                <th style="text-align: center;" class="column-4">Số lượng</th>
                                <th style="text-align: center;" class="column-5">Tổng tiền</th>
                                <th class="column-4"></th>
                            </tr>
                            @foreach($listCarts as $listCart)
                            <tr class="table_row">
                                <td class="column-1">
                                    <div style=" width: 70px;" class="how-itemcart1">
                                        <img style="border: 1px solid #e6e6e6; height: 70px; width: 70px;"
                                            src="../../../QlBanGiay/resources/assets/image/{{$listCart->avatar}}"
                                            alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">
                                    <p>

                                        {{$listCart->name}}
                                    </p>
                                    <p>
                                        Size:
                                        {{$listCart->size}}
                                    </p>
                                </td>
                                <td style="text-align: center;" class="column-3">
                                    {{number_format($listCart->export_price , 0, ',', '.') . ' đ'}}
                                </td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="num-product1" value="{{$listCart->quantity}}">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: center;" class="column-5">
                                    {{number_format($listCart->export_price*$listCart->quantity , 0, ',', '.') . ' đ'}}
                                </td>
                                <td class="column-4 close-td">
                                    <form method='post' action="{{ url('/QLBanGiay/'.$listCart->id.'/deleteCart') }}">
                                        @csrf
                                        @method('delete')
                                        <button class="close-icon ">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <div style="margin: 0 4px;"
                                class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                <a class="hover" style="color:#000" href="/QLBanGiay/orders">
                                    Đặt hàng
                                </a>
                            </div>
                            <div style="margin: 0 4px;"
                                class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Cập nhật giỏ hàng
                            </div>
                        </div>
                        <div
                            class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            Tổng tiền: {{number_format($total , 0, ',', '.') . ' đ'}}
                        </div>
                    </div>
                </div>
                @else
                <div style="display: flex; justify-content: center;">
                    <div style="text-align: center;">
                        <img style=" height: 200px; width: 200px;"
                            src="../../../QlBanGiay/resources/assets/image/imgCart.png" alt="IMG">
                        <div>
                            <p style="
                                text-align: center;
                                width: 100%;
                                font-size: 20px;
                                color: red;
                                margin-bottom: 12px;
                            ">Chưa có sản phẩm nào được thêm vào giỏ hàng
                            </p>
                        </div>
                        <a href="/QLBanGiay/home" class="btn btn-danger">Mua ngay</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</form>


@endsection