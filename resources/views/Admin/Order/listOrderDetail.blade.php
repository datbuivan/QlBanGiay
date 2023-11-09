@extends('Layout.LayoutAdmin')
@section('body')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
    </div>
    @foreach($listOrderDetails as $listOrderDetail)
    <?php
        $total = 0;
        for($i=0; $i < $listOrderDetail->orderDetails->count(); $i++){
            $total += $listOrderDetail->orderDetails[$i]->price*$listOrderDetail->orderDetails[$i]->quantity;
        }
    ?>
    <div class="card-body">
        <div class="table-responsive">
            <table style="margin-bottom: 0px" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th class="column-1" style="min-width: 350px;">Sản phẩm</th>
                        <th class="column-3">Số lượng</th>
                        <th class="column-4">Giá bán</th>
                        <th class="column-2">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listOrderDetail->orderDetails as $orderDetail)
                    <tr class="table_row">
                        <td>
                            MĐH{{ $orderDetail->order_id}}
                        </td>
                        <td style="display: flex" class="column-1">
                            <div style=" width: 70px; margin-right: 20px;" class="how-itemcart1">
                                <img style="border: 1px solid #e6e6e6; height: 70px; width: 70px;"
                                    src="../../../QlBanGiay/resources/assets/image/{{$orderDetail->avatar}}" alt="IMG">
                            </div>
                            <div>
                                <p>
                                    {{$orderDetail->product->name}}
                                </p>
                                <p>
                                    Size:
                                    {{$orderDetail->size}}
                                </p>
                            </div>
                        </td>
                        <td class="column-4">
                            <div style="justify-content: center;" class="flex-w m-l-auto m-r-0">
                                {{$orderDetail->quantity}}
                            </div>
                        </td>
                        <td style='min-width: 120px;' class="column-4">
                            {{number_format($orderDetail->price , 0, ',', '.') . ' đ'}}
                        </td>
                        <td style='min-width: 120px;' class="column-5">
                            {{number_format($orderDetail->price*$orderDetail->quantity , 0, ',', '.') . ' đ'}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class=" flex-w flex-sb-m bor15  p-lr-15-sm flex-row-reverse">
                <div class="d-flex flex-w flex-m "
                    style="justify-content: flex-end; border-bottom: 1px solid #e6e6e6; border-left: 1px solid #e6e6e6; border-right: 1px solid #e6e6e6">
                    <div
                        style="padding: 14px 10px; border-right: 1px solid #e6e6e6; color: rgba(0,0,0,.54); font-size: 14px;">
                        Tổng tiền hàng
                    </div>
                    <div style="min-width: 250px; text-align: right;padding: 14px 10px;">
                        {{number_format($total, 0, ',', '.') . ' đ'}}
                    </div>
                </div>
            </div>

            <div class=" flex-w flex-sb-m bor15  p-lr-15-sm flex-row-reverse">
                <div class="d-flex flex-w flex-m "
                    style="justify-content: flex-end; border-bottom: 1px solid #e6e6e6; border-left: 1px solid #e6e6e6; border-right: 1px solid #e6e6e6">
                    <div
                        style="padding: 14px 10px; border-right: 1px solid #e6e6e6; color: rgba(0,0,0,.54); font-size: 14px;">
                        Phí vận chuyển
                    </div>
                    <div style="min-width: 250px; text-align: right;padding: 14px 10px;">
                        {{number_format($listOrderDetail->delivers->cost , 0, ',', '.') . ' đ'}}
                    </div>
                </div>
            </div>

            <div class=" flex-w flex-sb-m bor15  p-lr-15-sm flex-row-reverse">
                <div class="d-flex flex-w flex-m "
                    style="justify-content: flex-end; border-bottom: 1px solid #e6e6e6; border-left: 1px solid #e6e6e6; border-right: 1px solid #e6e6e6">
                    <div
                        style="padding: 14px 10px; border-right: 1px solid #e6e6e6; color: rgba(0,0,0,.54); font-size: 14px;">
                        Thành tiền
                    </div>
                    <div style="min-width: 250px; text-align: right; color: #ee4d2d; font-size: 22px; padding:10px;">
                        {{number_format($total+ $listOrderDetail->delivers->cost , 0, ',', '.') . ' đ'}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <tr>
        <td colspan="4"> {{ $listOrderDetails->onEachSide(5)->links()}} </td>
    </tr>
</div>

@endsection