@extends('Layout.LayoutAdmin')
@section('body')
<form action="{{url('QLBanGiay/admin/product/create')}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9 content_left">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Mô tả sản phẩm</label>
                <textarea type="text" class="form-control" name="description" rows="5"
                    placeholder="Nhập Mô tả sản phẩm"></textarea>
                @if ($errors->has('desciption'))
                <span class="text-danger">{{ $errors->first('desciption') }}</span>
                @endif
            </div>
            <div class="group-product-roperties">
                <div class="color col-md-3">
                    <label for="">Màu Sắc</label>
                    <select name="color_id" id="" class="form-control">
                        <option value="">Chọn màu</option>
                        @foreach ($colors as $color )
                        <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('color_id'))
                    <span class="text-danger">{{ $errors->first('color_id') }}</span>
                    @endif
                </div>
                <div class="typeProduct col-md-3">
                    <label for="">Loại giày</label>
                    <select name="type_product_id" id="" class="form-control">
                        <option value="">Chọn loại giày</option>
                        @foreach ($typeproducts as $typeproduct )
                        <option value="{{$typeproduct->id}}">{{$typeproduct->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('type_product_id'))
                    <span class="text-danger">{{ $errors->first('type_product_id') }}</span>
                    @endif
                </div>
                <div class="gender col-md-3">
                    <label for="">Giới tính</label>
                    <select name="gender_id" id="" class="form-control">
                        <option value="">Chọn giới tính</option>
                        @foreach ($genders as $gender )
                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('gender_id'))
                    <span class="text-danger">{{ $errors->first('gender_id') }}</span>
                    @endif
                </div>
                <div class="design col-md-3">
                    <label for="">Kiểu dáng</label>
                    <select name="design_id" id="" class="form-control">
                        <option value="">Chọn kiểu dáng</option>
                        @foreach ($designs as $design )
                        <option value="{{$design->id}}">{{$design->name}}</option>
                        @endforeach
                    </select>
                    {{-- @if ($errors->has('design_id'))
                        <span class="text-danger">{{ $errors->first('design_id') }}</span>
                    @endif --}}
                </div>
            </div>
            <div class="form-group col-md-3 uploadImage">
                <br>
                <label for="">Image</label>
                <input type="file" class="form-control" placeholder="Chọn ảnh" name="avatar" id="avatar">
                @if ($errors->has('avatar'))
                <span class="text-danger">{{ $errors->first('avatar') }}</span>
                @endif
            </div>
            <div class="form-group ">
                <br>
                <a href="{{url('QLBanGiay/admin/product')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Giá nhập</label>
                <input type="text" class="form-control" name="import_price">
                @if ($errors->has('import_price'))
                <span class="text-danger">{{ $errors->first('import_price') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Giá bán</label>
                <input type="text" class="form-control" name="export_price">
                @if ($errors->has('export_price'))
                <span class="text-danger">{{ $errors->first('export_price') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Giảm giá</label>
                <input type="text" class="form-control" name="discount">
                @if ($errors->has('discount'))
                <span class="text-danger">{{ $errors->first('discount') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Trạng thái sản phẩm</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="product_status" value="1" checked>
                        Mở bán
                    </label>
                    <label>
                        <input type="radio" name="product_status" value="0" checked>
                        Ngừng bán
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Sản phẩm hot</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="hot_status" value="1" checked>
                        Có
                    </label>
                    <label>
                        <input type="radio" name="hot_status" value="0" checked>
                        Không
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Sản phẩm khuyến mãi</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="best_seller_status" value="1" checked>
                        Có
                    </label>
                    <label>
                        <input type="radio" name="best_seller_status" value="0" checked>
                        Không
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
    </div>
</form>
@stop