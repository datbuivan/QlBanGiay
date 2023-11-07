@extends('Layout.LayoutAdmin')
@section('body')
<form action="{{url('QLBanGiay/admin/product/edit',['id'=>$product->id])}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9 content_left">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="{{$product->name}}" >
                @if ($errors->has('name'))
                    <span class="help is-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Chi tiết sản phẩm</label>
                <textarea type="text" class="form-control" name="description" rows="5" placeholder="Nhập chi tiết sản phẩm" ><?php echo htmlspecialchars($product->description); ?></textarea>
                @if ($errors->has('desciption'))
                    <span class="help is-danger">{{ $errors->first('desciption') }}</span>
                @endif
            </div>
            <div class="group-product-roperties">
                <div class="color col-md-3" >
                    <label for="">Màu Sắc</label>
                    <select name="color_id" id="" class="form-control">
                        <option value="{{$product->colors->id}}">{{$product->colors->name}}</option>
                    @foreach ($colors as $color )
                        <option value="{{$color->id}}">{{$color->name}}</option>        
                    @endforeach
                    </select>
                    @if ($errors->has('color_id'))
                    <span class="help is-danger">{{ $errors->first('color_id') }}</span>
                    @endif
                </div>
                <div class="typeProduct col-md-3" >
                    <label for="">Loại giày</label>
                    <select name="type_product_id" id="" class="form-control">
                        <option value="{{$product->typeProduct->id}}">{{$product->typeProduct->name}}</option>
                    @foreach ($typeproducts as $typeproduct )
                        <option value="{{$typeproduct->id}}">{{$typeproduct->name}}</option>        
                    @endforeach
                    </select>
                    @if ($errors->has('type_product_id'))
                    <span class="help is-danger">{{ $errors->first('type_product_id') }}</span>
                    @endif
                </div>
                <div class="gender col-md-3" >
                    <label for="">Giới tính</label>
                    <select name="gender_id" id="" class="form-control">
                        <option value="{{$product->gender->id}}">{{$product->gender->name}}</option>
                    @foreach ($genders as $gender )
                        <option value="{{$gender->id}}">{{$gender->name}}</option>        
                    @endforeach
                    </select>
                    @if ($errors->has('gender_id'))
                    <span class="help is-danger">{{ $errors->first('gender_id') }}</span>
                    @endif
                </div>
                <div class="design col-md-3" >
                    <label for="">Kiểu dáng</label>
                    <select name="design_id" id="" class="form-control">
                        @if ($product->design==null)
                        <option value="">Chọn kiểu dáng</option>        
                        @else    
                        <option value="{{$product->design->id}}">{{$product->design->name}}</option>
                        @endif()
                    @foreach ($designs as $design )
                        <option value="{{$design->id}}">{{$design->name}}</option>        
                    @endforeach
                    </select>
                    @if ($errors->has('design_id'))
                    <span class="help is-danger">{{ $errors->first('design_id') }}</span>
                    @endif                       
                </div>
            </div>
            <div class="form-group col-md-3 uploadImage" >
                <br>
                <label for="">Image</label>
                <input type="file" class="form-control" value="{{$product->avatar}}" name="avatar" >
                <img src="{{url('QLBanGiay/resources/assets/Image')}}/{{$product->avatar}}" alt="/resources/assets/Image/{{$product->avatar}}" width="200px" height="auto">
                @if ($errors->has('avatar'))
                <span class="help is-danger">{{ $errors->first('avatar') }}</span>
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
                <input type="text" class="form-control" name="import_price" value="{{$product->import_price}}">
                @if ($errors->has('import_price'))
                <span class="help is-danger">{{ $errors->first('import_price') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Giá bán</label>
                <input type="text" class="form-control" name="export_price" value="{{$product->export_price}}">
                @if ($errors->has('export_price'))
                <span class="help is-danger">{{ $errors->first('export_price') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Giảm giá</label>
                <input type="text" class="form-control" name="discount" value="{{$product->discount}}" >
                @if ($errors->has('discount'))
                <span class="help is-danger">{{ $errors->first('discount') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Trạng thái sản phẩm</label>
                <div class="radio">
                    @if ($product->product_status==true)
                        <label>
                            <input type="radio" name="product_status" value="1" checked>
                            Mở bán
                        </label>
                        <label>
                            <input type="radio" name="product_status" value="0" >
                            Ngừng bán
                        </label>
                    @else
                    <label>
                        <input type="radio" name="product_status" value="1}" >
                        Mở bán
                    </label>
                    <label>
                        <input type="radio" name="product_status" value="0" checked>
                        Ngừng bán
                    </label>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="">Sản phẩm hot</label>
                <div class="radio">
                @if ($product->hot_status==true)
                    <label>
                        <input type="radio" name="hot_status" value="1" checked>
                        Có
                    </label>
                    <label>
                        <input type="radio" name="hot_status" value="0" >
                        Không
                    </label>
                @else
                    <label>
                        <input type="radio" name="hot_status" value="1" >
                        Có
                    </label>
                    <label>
                        <input type="radio" name="hot_status" value="0" checked>
                        Không
                    </label>
                @endif
                    
                </div>
            </div>
            <div class="form-group">
                <label for="">Sản phẩm khuyến mãi</label>
                <div class="radio">
                    @if ($product->best_seller_status==true)
                    <label>
                        <input type="radio" name="best_seller_status" value="1" checked>
                        Có
                    </label>
                    <label>
                        <input type="radio" name="best_seller_status" value="0" >
                        Không
                    </label>
                    @else
                    <label>
                        <input type="radio" name="best_seller_status" value="1" >
                        Có
                    </label>
                    <label>
                        <input type="radio" name="best_seller_status" value="0" checked>
                        Không
                    </label>
                    @endif
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
    </div>
</form>
@endsection