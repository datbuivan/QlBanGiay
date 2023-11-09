@extends('Layout.LayoutAdmin')
@section('body')
<div class="row">
    <div class="col-md-9">
        <h1>Danh Sách Sản Phẩm</h1>
    </div>
    <div class="col-md-3">
        <p>
            <a class="btn btn-primary" href="{{url('QLBanGiay/admin/product/create')}}">Thêm sản phẩm</a>
        </p>
    </div>
</div>
<p>Tổng số sản phẩm: <strong>{{$products->total()}}</strong></p>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá nhập</th>
            <th>Giá Bán</th>
            <th>Avatar</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <th>{{$productIndex++}}</th>
            <th>{{$product->name}}</th>
            <th>{{$product->import_price}}</th>
            <th>{{$product->export_price}}</th>
            <th>
                <img style="width: 50px; height: 50px"
                    src="../../../QlBanGiay/resources/assets/image/{{$product->avatar}}" alt="">
            </th>
            <th>
                <a href="{{url('QLBanGiay/admin/product/edit',['id'=>$product->id])}}" class="btn btn-info">Chi tiết</a>
                <a href="" class="btn btn-danger">Xóa</a>

            </th>
        </tr>
        @endforeach
    </tbody>
</table>
<tr>
    <td colspan="4"> {{ $products->onEachSide(5)->links()}} </td>
</tr>
@endsection