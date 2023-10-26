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
            Đơn đặt hàng
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
                @if($directCards->count() > 0)
                <div class="  m-lr-0-xl">
                    @foreach($directCards as $listOder)
                    <div class="wrap-table-shopping-cart m-b-50">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Sản phẩm</th>
                                <th class="column-2"></th>
                                <th class="column-3">Giá bán</th>
                                <th style="text-align: center;" class="column-4">Số lượng</th>
                                <th class="column-4">Tổng tiền</th>
                                <th style="color:red" class="column-5">{{$listOder->status}}</th>
                            </tr>
                            @foreach($listOder->orderDetails as $orderDetail)
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="../../../QlBanGiay/resources/assets/image/{{$orderDetail->avatar}}"
                                            alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">
                                    <p>

                                        {{$orderDetail->product->name}}
                                    </p>
                                    <p>
                                        Size:
                                        {{$orderDetail->size}}
                                    </p>
                                </td>
                                <td class="column-3">{{$orderDetail->price}}</td>
                                <td class="column-4">
                                    <div style="justify-content: center;" class="flex-w m-l-auto m-r-0">
                                        {{$orderDetail->quantity}}
                                    </div>
                                </td>
                                <td class="column-4">{{$orderDetail->price*$orderDetail->quantity}}</td>
                                <td class="column-5"></td>
                            </tr>
                            @endforeach
                        </table>
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
                                {{$listOder->delivers->cost}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p style="
                    text-align: center;
                    width: 100%;
                    font-size: 20px;
                    color: red;
                ">Chưa có sản phẩm nào được mua</p>
                @endif
            </div>
        </div>
    </div>
</form>


@endsection