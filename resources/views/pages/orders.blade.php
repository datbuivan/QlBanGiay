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
            Đặt hàng
        </span>
    </div>
</div>

<!-- Shoping Cart -->
<div class="bg0 p-t-75" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                @if($message = Session::get('success'))

                <div class="alert alert-success">
                    {{ $message }}
                </div>

                @endif
                @if($listCarts->count() > 0)
                <form class=" m-lr-0-xl" method="POST" action="{{ url('/QLBanGiay/addOrders') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Ảnh sản phẩm</th>
                                <th class="column-1">Tên sản phẩm</th>
                                <th style="text-align: center;" class="column-3">Giá bán</th>
                                <th style="text-align: center;" class="column-3">Số lượng</th>
                                <th style="text-align: center;" class="column-5">Tổng tiền</th>
                            </tr>
                            @foreach($listCarts as $listCart)
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="../../../QlBanGiay/resources/assets/image/{{$listCart->avatar}}"
                                            alt="IMG">
                                    </div>
                                </td>
                                <td style="padding-left: 50px;" class="column-2">
                                    <p>
                                        {{$listCart->name}}
                                    </p>
                                    <p>
                                        Size:
                                        {{$listCart->size}}
                                    </p>
                                </td>
                                <td style="text-align: center;" class="column-3">
                                    {{number_format($listCart->export_price , 0, ',', '.') . ' đ'}}</td>
                                <td class="column-3">
                                    <input type="number" style="text-align: center;display: inline;width: 100%;"
                                        name="listCart[{{$listCart->id}}][quantity]" value="{{$listCart->quantity}}">
                                </td>
                                <td style="text-align: center;" class="column-5">
                                    {{number_format($listCart->export_price*$listCart->quantity , 0, ',', '.') . ' đ'}}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                    <div
                        style="border-left: 1px solid #e6e6e6; border-right: 1px solid #e6e6e6; border-bottom: 1px solid #e6e6e6;">
                        <div style="padding-left: 50px; padding-right: 50px; padding-top: 16px;  " class="form-group">
                            <label for="firstname-dd">Họ Và Tên <span class="require">*</span></label>
                            <input type="text" id="firstname-dd" name="CustomerName" class="form-control">
                            @error('CustomerName')
                            <div class="alert" style="color: red">Vui lòng nhập tên</div>
                            @enderror
                        </div>

                        <div style="padding-left: 50px; padding-right: 50px;" class="form-group">
                            <label for="email-dd">E-Mail </label>
                            <input type="text" id="email-dd" name="Email" class="form-control">
                            @error('Email')
                            <div class="alert" style="color: red">Vui lòng nhập email</div>
                            @enderror
                        </div>
                        <div style="padding-left: 50px; padding-right: 50px;" class="form-group">
                            <label for="telephone-dd">Số điện thoại <span class="require">*</span></label>
                            <input type="text" id="telephone-dd" name="Phone" class="form-control">
                            @error('Phone')
                            <div class="alert" style="color: red">Vui lòng nhập số điện thoại</div>
                            @enderror
                        </div>

                        <div style="padding-left: 50px; padding-right: 50px;" class="form-group">
                            <label for="company-dd">Địa chỉ <span class="require">*</span></label>
                            <input type="text" id="company-dd" name="Address" class="form-control">
                            @error('Address')
                            <div class="alert" style="color: red">Vui lòng nhập địa chỉ</div>
                            @enderror
                        </div>

                        <div style="padding-left: 50px; padding-right: 50px;" class="form-group">
                            <label for="company-dd">Phương thức thanh toán</label>
                            <select class="form-control" name="ThanhToan">
                                <option value='' style="display:none">Phương thức thanh toán</option>
                                <option value='Thanh toán khi nhận hàng'>Thanh toán khi nhận hàng</option>
                                <option value='Ngân hàng điện tử'>Ngân hàng điện tử</option>
                                <option value='Thẻ ATM nội địa'>Thẻ ATM nội địa</option>
                            </select>
                            @error('ThanhToan')
                            <div class="alert" style="color: red">Vui lòng chọn phương thức thanh toán</div>
                            @enderror
                        </div>

                        <div style="padding-left: 50px; padding-right: 50px;" class="form-group">
                            <label for="company-dd">Phương thức giao hàng</label>
                            <select class="form-control" name="deliver">
                                <option value='' style="display:none">Phương thức giao hàng</option>
                                @foreach($delivers as $deliver)
                                <option value='{{$deliver->id}}'>{{$deliver->name}}</option>
                                @endforeach
                            </select>
                            @error('deliver')
                            <div class="alert" style="color: red">Vui lòng chọn phương thức giao hàng</div>
                            @enderror
                        </div>
                        @foreach($listCarts as $listCart)
                        <input type="hidden" value="{{ $listCart->product_id }}"
                            name="listCart[{{$listCart->id}}][product_id]">
                        <input type="hidden" value="{{ $listCart->size }}" name="listCart[{{$listCart->id}}][size]">
                        <input type="hidden" value="{{ $listCart->avatar }}" name="listCart[{{$listCart->id}}][avatar]">
                        <input type="hidden"
                            value="{{$listCart->export_price -($listCart->export_price*$listCart->discount)}}"
                            name="listCart[{{$listCart->id}}][export_price]">
                        @endforeach

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <button style="margin: 0 4px;"
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Mua hàng
                                </button>
                                <div style="margin: 0 4px;"
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    <a style="color:#000" class="hover" href="/QLBanGiay/cart">
                                        Quay lại
                                    </a>
                                </div>
                            </div>
                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Tổng tiền: {{number_format($total , 0, ',', '.') . ' đ'}}
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection