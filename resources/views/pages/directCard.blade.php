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
                    <?php
                        $total = 0;
                        for($i=0; $i < $listOder->orderDetails->count(); $i++){
                            $total += $listOder->orderDetails[$i]->price*$listOder->orderDetails[$i]->quantity;
                        }
                    ?>
                    <div class="wrap-table-shopping-cart m-b-50">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Sản phẩm</th>
                                <th class="column-2"></th>
                                <th class="column-3">Giá bán</th>
                                <th style="text-align: center;" class="column-4">Số lượng</th>
                                <th class="column-4">Tổng tiền</th>
                                <th style="color:red"
                                    class="column-5 {{$listOder->status === 'Đã xác nhận' ? 'active_status' : ''}}">
                                    {{$listOder->status}}
                                </th>
                            </tr>
                            @foreach($listOder->orderDetails as $orderDetail)
                            <tr class="table_row">
                                <td class="column-1">
                                    <div style=" width: 70px;" class="how-itemcart1">
                                        <img style="border: 1px solid #e6e6e6; height: 70px; width: 70px;"
                                            src="../../../QlBanGiay/resources/assets/image/{{$orderDetail->avatar}}"
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
                                <td class="column-3">{{number_format($orderDetail->price, 0, ',', '.') . ' đ'}}</td>
                                <td class="column-4">
                                    <div style="justify-content: center;" class="flex-w m-l-auto m-r-0">
                                        {{$orderDetail->quantity}}
                                    </div>
                                </td>
                                <td class="column-4">
                                    {{number_format($orderDetail->price*$orderDetail->quantity , 0, ',', '.') . ' đ'}}
                                </td>
                                <td class="column-5">
                                    <a href="{{ url('/QLBanGiay/review/' . $orderDetail->id ) }}" type="button"
                                        style="margin: 0 4px; color: #fff; cursor: pointer; {{$listOder->status === 'Đã xác nhận' ? '' : 'display: none'}}"
                                        class="btn btn-success">
                                        Đánh giá
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="flex-w flex-sb-m bor15  p-lr-15-sm flex-row-reverse">
                            <div class="flex-w flex-m  " style="padding-right: 50px;">
                                <div
                                    style="padding: 14px 10px; border-right: 1px solid #e6e6e6; color: rgba(0,0,0,.54); font-size: 14px;">
                                    Tổng tiền hàng
                                </div>
                                <div style="min-width: 250px; text-align: right;">
                                    {{number_format($total, 0, ',', '.') . ' đ'}}
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-sb-m bor15  p-lr-15-sm flex-row-reverse">
                            <div class="flex-w flex-m " style="padding-right: 50px;">
                                <div
                                    style="padding: 14px 10px; border-right: 1px solid #e6e6e6; color: rgba(0,0,0,.54); font-size: 14px;">
                                    Phí vận chuyển
                                </div>
                                <div style="min-width: 250px; text-align: right;">
                                    {{number_format($listOder->delivers->cost , 0, ',', '.') . ' đ'}}
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-sb-m bor15  p-lr-15-sm flex-row-reverse">
                            <div class="flex-w flex-m " style="padding-right: 50px;">
                                <div
                                    style="padding: 14px 10px; border-right: 1px solid #e6e6e6; color: rgba(0,0,0,.54); font-size: 14px;">
                                    Thành tiền
                                </div>
                                <div style="min-width: 250px; text-align: right; color: #ee4d2d; font-size: 22px;">
                                    {{number_format($total+ $listOder->delivers->cost , 0, ',', '.') . ' đ'}}
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-sb-m bor15  p-lr-15-sm flex-row-reverse"
                            style="{{$listOder->status === 'Đã xác nhận' ? 'display: none' : ''}}">
                            <div class="flex-w flex-m " style="padding-right: 50px;">
                                <form method='post' action="{{ url('/QLBanGiay/cancelOrder/' . $listOder->id ) }}"
                                    style="min-width: 250px; text-align: right; color: #ee4d2d; font-size: 22px;
                                    padding: 14px 10px;">
                                    @csrf
                                    @method('delete')
                                    <button style="margin: 0 4px; color: #fff; cursor: pointer; "
                                        class="btn btn-danger">
                                        Hủy đơn hàng
                                    </button>
                                </form>
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