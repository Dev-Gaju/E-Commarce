@extends('admin.master')
@section('main-content')

    <section class="content" >
        <div class="row col-sm-offset-2">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class=" text-center text-success ">Manage Product Info</h3>
                        @if($message=Session::get('message'))
                            <h3>{{$message}}</h3>
                            @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Brand Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Short Description</th>
                                <th>Long Description</th>
                                <th>Main Image</th>
                                <th>Publication Status</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                            @foreach($productInfo as $product)
                            <tbody>

                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->brand_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_quantity}}</td>
                            <td>{{$product->short_description}}</td>
                            <td>{{$product->long_description}}</td>
                            <td><img src="{{asset($product->main_image)}}" height="40" width="40"></td>
                            <td>{{$product->publication_status==1 ? 'Published':'Unpublished'}}</td>
                            <td>
                                <a href="" class="btn btn-success btn-xs"  title="view product Info" >
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                </a>
                                <a href="" class="btn btn-warning btn-xs"  title="Published" >
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                <a href="{{url('/product/edit-product/'.$product->id)}}" class="btn btn-info btn-xs" title="Edit Info" >
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="" class="btn btn-danger btn-xs"  title="Delete Info" >
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>

                            </td>
                        @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


@endsection