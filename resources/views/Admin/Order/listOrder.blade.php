@extends('Layout.LayoutAdmin')
@section('body')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
        <p>Tổng số đơn hàng: <strong>{{$listOders->total()}}</strong></p>
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
    <tr>
        <td colspan="4"> {{ $listOders->onEachSide(5)->links()}} </td>
    </tr>
</div>

@endsection