@extends('Layout.LayoutAdmin')
@section('body')
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
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

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
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
        <div class="card-body" style='display: flex; justify-content: space-between;'>
            <div>
                <label class="form-label">Chọn phương thức thống kê:</label>
                <div style='display: flex;'>
                    <select onchange="methodStatistic()" id="methodStatistic" class="form-control radius-30"
                        style='width: auto; margin-right: 20px;'>
                        <option style=' display: none;' value="">Chọn phương thức thống kê</option>
                        <option value="thống kê theo ngày">thống kê theo ngày</option>
                        <option value="thống kê loại sản phẩm theo ngày">thống kê loại sản phẩm theo ngày</option>
                    </select>
                    <button class="btn btn-primary">Thống kê</button>
                </div>
            </div>

            <div id="byDate" style='display: none; width:50%; justify-content: space-around;'>
                <div>
                    <label class="form-label">Từ ngày:</label>
                    <input type="date" class="form-control" />
                </div>
                <div>
                    <label class="form-label">Từ ngày:</label>
                    <input type="date" class="form-control" />
                </div>
            </div>

            <div id="byProductType" style='display: none; width:50%; justify-content: space-around;'>
                <div>
                    <label class="form-label">Loại sản phẩm</label>
                    <select class="form-control radius-30">
                        <option style='display: none;' value="">Chọn loại sản phẩm</option>
                        @foreach($listProductTypes as $listProductType)
                        <option value="{{$listProductType->name}}">{{$listProductType->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label">Chọn ngày:</label>
                    <input type="date" class="form-control" />
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Phương thức thanh toán</th>
                            <th style="text-align: center;">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listOders as $listOder)
                        <tr>
                            <td>{{$listOder->full_name}}</td>
                            <td>{{$listOder->email}}</td>
                            <td>{{$listOder->phone_number}}</td>
                            <td>{{$listOder->address}}</td>
                            <td>{{$listOder->pay_method}}</td>
                            <td style="text-align: center;">
                                <form method='post' action="{{ url('/QLBanGiay/admin/statusOrder/'.$listOder->id) }}">
                                    @csrf
                                    @method('post')
                                    <button style="min-width: 130px; opacity: 1"
                                        class=" btn {{$listOder->status === 'Chờ xác nhận' ?'btn-danger' : 'btn-success'}}"
                                        {{$listOder->status === 'Chờ xác nhận' ? '' : 'disabled'}}>
                                        {{$listOder->status === 'Chờ xác nhận' ? 'Xác nhận' :$listOder->status}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    function methodStatistic() {
        var methodStatistic = document.getElementById("methodStatistic").value;
        if (methodStatistic === "thống kê theo ngày") {
            document.getElementById("byDate").style.display = "flex";
            document.getElementById("byProductType").style.display = "none";
        } else if (methodStatistic === "thống kê loại sản phẩm theo ngày") {
            document.getElementById("byProductType").style.display = "flex";
            document.getElementById("byDate").style.display = "none";
        } else {
            document.getElementById("byProductType").style.display = "none";
            document.getElementById("byDate").style.display = "none";
        }
    }
    </script>
    @endsection