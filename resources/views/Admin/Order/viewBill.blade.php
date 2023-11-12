<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In hóa đơn</title>
    <style>
    body {
        font-family: 'Dejavu Sans';
        line-height: 1.6;
        margin: 50px;
    }

    .invoice {
        max-width: 800px;
        width: 100%;
        margin: 0 auto;
        border: 1px solid #ccc;
        padding: 50px 20px;
    }

    .title {
        text-align: center;
        border-bottom: 1px solid #ccc;
        padding: 1.25rem;
    }

    .footer {
        display: inline-block;
        width: 100%;
        margin-top: 20px;
    }

    table,
    td,
    th {
        border: 1px solid #ccc;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        text-align: center;
    }

    p,
    h2,
    h4 {
        margin: 0;
    }
    </style>

</head>


<body>

    <div class="invoice">
        <div>

            <?php
                $total = 0;
                $MaHD = rand(100000,999999);
                $day = date("j ");
                $month = date("n ");
                $year = date("Y");
                for($i=0; $i < $listBill->orderDetails->count(); $i++){
                    $total += $listBill->orderDetails[$i]->price*$listBill->orderDetails[$i]->quantity;
                }
            ?>
            <div style="border-bottom: 1px solid #ccc;padding-bottom: 20px;">
                <h2>Website bán giày</h2>
                <p>Địa chỉ: 48 Nguyễn Khánh Toàn, P. Quan Hoa, Q. Cầu Giấy, Tp. Hà Nội</p>
                <p>Điện thoại: 0965420922</p>
            </div>

            <div class="title">
                <h2>Hóa đơn bán hàng</h2>
                <h4>Ngày {{$day}} tháng {{$month}} năm {{$year}}</h4>
            </div>

            <div style="margin: 20px 0">
                <h4>Mã hóa đơn: #{{$MaHD}}</h4>
                <p>Tên khách hàng: {{ $listBill->full_name }}</p>
                <p>Địa chỉ: {{ $listBill->address }}</p>
                <p>Hình thức thanh toán: {{ $listBill->pay_method }}</p>
            </div>

            <div class="table-responsive">
                <table style="margin-bottom: 0px" class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th class="column-1">Sản phẩm</th>
                            <th class="column-1">Kích thước</th>
                            <th class="column-3">Số lượng</th>
                            <th class="column-4">Giá bán</th>
                            <th class="column-2">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listBill->orderDetails as $orderDetail)
                        <tr class="table_row">
                            <td class="column-1">
                                <p>
                                    {{$orderDetail->product->name}}
                                </p>
                            </td>
                            <td>
                                {{$orderDetail->size}}
                            </td>
                            <td class="column-4">
                                <div style="justify-content: center; text-align: center;" class="flex-w m-l-auto m-r-0">
                                    x{{$orderDetail->quantity}}
                                </div>
                            </td>
                            <td style='min-width: 120px; text-align: center;' class="column-4">
                                {{number_format($orderDetail->price , 0, ',', '.') . ' đ'}}
                            </td>
                            <td style='min-width: 120px; text-align: center;' class="column-5">
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
                            style="padding: 4px 10px; border-right: 1px solid #e6e6e6; color: rgba(0,0,0,.54); font-size: 16px; text-align: right;">
                            Tổng tiền hàng: {{number_format($total, 0, ',', '.') . ' đ'}}
                        </div>
                    </div>
                </div>

                <div class=" flex-w flex-sb-m bor15  p-lr-15-sm flex-row-reverse">
                    <div class="d-flex flex-w flex-m "
                        style="justify-content: flex-end; border-bottom: 1px solid #e6e6e6; border-left: 1px solid #e6e6e6; border-right: 1px solid #e6e6e6">
                        <div
                            style="padding: 4px 10px; border-right: 1px solid #e6e6e6; color: rgba(0,0,0,.54); font-size: 16px; text-align: right;">
                            Phí vận chuyển: {{number_format($listBill->delivers->cost , 0, ',', '.') . ' đ'}}
                        </div>
                    </div>
                </div>

                <div class=" flex-w flex-sb-m bor15  p-lr-15-sm flex-row-reverse">
                    <div class="d-flex flex-w flex-m "
                        style="justify-content: flex-end; border-bottom: 1px solid #e6e6e6; border-left: 1px solid #e6e6e6; border-right: 1px solid #e6e6e6">
                        <div
                            style="padding: 4px 10px; border-right: 1px solid #e6e6e6; color: rgba(0,0,0,.54); font-size: 16px; text-align: right;">
                            Thành tiền:
                            <span style="color: red;     font-size: 20px;">
                                {{number_format($total+ $listBill->delivers->cost , 0, ',', '.') . ' đ'}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="footer">
                <div style="float: left;text-align:center;margin-left: 100px;">
                    <p>Nười bán hàng</p>
                    <p>(kí,ghi rõ họ tên)</p>
                    <p>Đức</p>
                    <p>Phạm Quang Đức</p>
                </div>

                <div style="float: right;text-align:center;margin-right: 100px;">
                    <p>Khách hàng</p>
                    <p>(kí,ghi rõ họ tên)</p>
                </div>
            </div> -->
        </div>
    </div>
</body>

</html>