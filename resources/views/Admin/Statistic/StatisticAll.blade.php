@extends('Layout.LayoutAdmin')
@section('body')
<div class="row">
    <?php
            $totalRevenua = 0;
            $quantity = 0;
            $statisticRevenua = 0;
            foreach($revenuas as $revenua){
                $totalRevenua += ($revenua->price * $revenua->quantity);
            }

            foreach($listOrders as $listOrder){
                $statisticRevenua += ($listOrder->price * $listOrder->quantity);
                $quantity +=  $listOrder->quantity;
            }
        ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tổng doanh thu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{number_format($totalRevenua , 0, ',', '.') . ' đ'}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            thống kê thu nhập </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{number_format($statisticRevenua , 0, ',', '.') . ' đ'}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sản phẩm đã bán
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$quantity}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Yêu cầu đang đợi giải quyết</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$revenuaStutus->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 ">
        <form action="{{ url('/QLBanGiay/admin/statisticAll') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style='display: flex; justify-content: space-between;'>
                <div>
                    <label class="form-label">Chọn phương thức thống kê:</label>
                    <div style='display: flex;'>
                        <select onchange="selectMethodStatistic()" id="methodStatistic" name="methodStatistic"
                            class="form-control radius-30" style='width: auto; margin-right: 20px;'>
                            <option style="display: none" value="">Chọn phương thức thống kê
                            </option>
                            <option value="thống kê tất cả sản phẩm">Thống kê tất cả sản phẩm</option>
                            <option value="thống kê theo ngày">Thống kê sản phẩm theo ngày</option>
                            <option value="thống kê loại sản phẩm theo ngày">Thống kê loại sản phẩm theo ngày</option>
                            <option value="thống kê sản phẩm bán chạy theo tháng">Thống kê sản phẩm bán chạy trong tháng
                            </option>
                        </select>
                        <button disabled id="btnStatistic" class="btn btn-primary">
                            Thống kê
                        </button>
                    </div>
                </div>

                <div id="byDate" style='display: none; width:50%; justify-content: space-around;'>
                    <div>
                        <label class="form-label">Từ ngày:</label>
                        <input name="fromDate" type="date" class="form-control" />
                    </div>
                    <div>
                        <label class="form-label">Đến ngày:</label>
                        <input name="toDate" type="date" class="form-control" />
                    </div>
                </div>

                <div id="byProductType" style='display: none; width:50%; justify-content: space-around;'>
                    <div>
                        <label class="form-label">Loại sản phẩm</label>
                        <select name='productType' class="form-control radius-30">
                            <option style='display: none;' value="">Chọn loại sản phẩm</option>
                            @foreach($listProductTypes as $listProductType)
                            <option value="{{$listProductType->id}}">{{$listProductType->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Chọn ngày:</label>
                        <input name="date" type="date" class="form-control" />
                    </div>
                </div>

                <div id="bestSell" style='display: none; width:50%; justify-content: space-around;'>
                    <div>
                        <label class="form-label">Chọn tháng:</label>
                        <select style="min-width: 150px;" class="form-control" name="month" id="month">
                            @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}">
                                Tháng {{$i}}</option>
                                @endfor
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Chọn năm:</label>
                        <select style="min-width: 150px;" class="form-control" name="year" id="year">
                            @for ($year = date('Y'); $year >= 1990; $year--)
                            <option value="{{ $year }}">Năm {{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

            </div>
        </form>

        <div class="card-body">
            <div class="table-responsive">
                @if($bestSellProducts != null)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="column-1" style="width: 500px;">Tên sản phẩm</th>
                            <th class="column-2" style="text-align: center">Giá bán</th>
                            <th class="column-3" style="text-align: center">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bestSellProducts as $bestSellProduct)
                        <tr>
                            <td>{{$bestSellProduct->name}}</td>
                            <td style="text-align: center">
                                {{number_format($bestSellProduct->export_price-($bestSellProduct->export_price*$bestSellProduct->discount) , 0, ',', '.') . ' đ'}}
                            </td>
                            <td style="text-align: center">{{$bestSellProduct->total_quantity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @elseif($listOrders->count() > 0)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="column-1" style="width: 500px;">Tên sản phẩm</th>
                            <th class="column-2" style="text-align: center">Giá bán</th>
                            <th class="column-3" style="text-align: center">Số lượng</th>
                            <th class="column-4" style="text-align: center">kích thước</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listOrders as $listOrder)
                        <tr>
                            <td>{{$listOrder->product->name}}</td>
                            <td style="text-align: center">{{number_format($listOrder->price , 0, ',', '.') . ' đ'}}
                            </td>
                            <td style="text-align: center">{{$listOrder->quantity}}</td>
                            <td style="text-align: center">{{$listOrder->size}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div style='text-align: center;' class="alert alert-danger">không tồn tại sản phẩm</div>
                @endif

                @if($bestSellProducts != null)
                @if($bestSellProducts->count() == 0)
                <div style='text-align: center;' class="alert alert-danger">không tồn tại sản phẩm</div>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>

<tr>
    <td colspan="4"> {{ $listOrders->onEachSide(5)->links()}} </td>
</tr>

<script>
function selectMethodStatistic() {
    var methodStatistic = document.getElementById("methodStatistic").value;

    if (methodStatistic === "thống kê theo ngày") {
        document.getElementById("byDate").style.display = "flex";
        document.getElementById("byProductType").style.display = "none";
        document.getElementById("bestSell").style.display = "none";
        document.getElementById("btnStatistic").disabled = false;
    } else if (methodStatistic === "thống kê loại sản phẩm theo ngày") {
        document.getElementById("byProductType").style.display = "flex";
        document.getElementById("byDate").style.display = "none";
        document.getElementById("bestSell").style.display = "none";
        document.getElementById("btnStatistic").disabled = false;
    } else if (methodStatistic === "thống kê tất cả sản phẩm") {
        document.getElementById("byProductType").style.display = "none";
        document.getElementById("byDate").style.display = "none";
        document.getElementById("bestSell").style.display = "none";
        document.getElementById("btnStatistic").disabled = false;
    } else if (methodStatistic === "thống kê sản phẩm bán chạy theo tháng") {
        document.getElementById("byProductType").style.display = "none";
        document.getElementById("byDate").style.display = "none";
        document.getElementById("bestSell").style.display = "flex";
        document.getElementById("btnStatistic").disabled = false;
    }
}
</script>
@endsection