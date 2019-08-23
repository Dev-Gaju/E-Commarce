@extends('admin.master')
@section('main-content')
    <div class="row">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="well">
                @if($message=Session::get('message'))
                    <h3 class="text-center text-success">{{$message}}</h3>
                @endif
                <h3 class="text-center text-success">Add Product Info</h3><br/>
                <form name="editProductform" class="form-horizontal" method="post" action="{{url('/product/update-product')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="add a name" value="{{$productInfo->product_name}}" name="product_name" class="form-control">
                            <input type="hidden"  value="{{$productInfo->id}}" name="product_id" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2">Product Price</label>
                        <div class="col-sm-10">
                            <input type="number" value="{{$productInfo->product_price}}"  name="product_price" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Product Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" value="{{$productInfo->product_quantity}}"  name="product_quantity" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2">product short Description </label>
                        <div class="col-sm-10">
                            <textarea class="form-control"  rows="10" name="short_description">{{$productInfo->short_description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2">product Long Description </label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="10" name="long_description">{{$productInfo->long_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">product Main Image</label>
                        <div class="col-sm-10">
                            <input type="file" value="{{$productInfo->main_image}}" accept="image/*" name="main_image"  >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">product Sub Image</label>
                        <div class="col-sm-10">
                            <input type="file" accept="image/*" name="sub_image[]"  multiple >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Publication Status</label>
                        <div class="col-sm-10">
                            <select name="publication_status" class="form-control">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Product Info">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        document.forms['editProductform'].elements['publication_status'].value='{{$productInfo->publication_status}}'
    </script>

@endsection