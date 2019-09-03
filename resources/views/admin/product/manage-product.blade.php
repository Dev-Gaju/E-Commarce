@extends('admin.master')
@section('main-content')

    <section class="content" >
        <div class="row col-sm-offset-2">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class=" text-center text-success ">Manage Product Info</h3>
                        @if($message=Session::get('message'))
                            <h3 class="text-success text-center">{{$message}}</h3>
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
                            <td >{{$product->long_description}}</td>
                            <td><img src="{{asset($product->main_image)}}" height="40" width="40"></td>
                            <td>{{$product->publication_status==1? 'Published': 'Unpublished'}}</td>
                            <td>
                                <a  class="btn btn-dark btn-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="{{json_encode($product)}}" title="view product Info" >
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                </a>
                                @if($product->publication_status==1)
                                <a href="{{url('/product/unpublished-product/'.$product->id)}}" class="btn btn-info btn-xs"  title="Published" >
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                @else
                                    <a href="{{url('/product/published-product/'.$product->id)}}" class="btn btn-warning btn-xs"  title="unPublished" >
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                @endif
                                <a href="{{url('/product/edit-product/'.$product->id)}}" class="btn btn-outline-primary btn-xs" title="Edit Info" >
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{url('/product/delete-product/'.$product->id)}}" class="btn btn-danger btn-xs"  title="Delete Info" >
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

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center text-success" >Product Info</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-dark">
                                    <tr>
                                        <th>Product ID</th>
                                        <td id="p_id" class="tab-content"></td>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <td id="p_name" class="tab-content"></td>
                                    </tr>
                                    <tr>
                                        <th>Brand Name</th>
                                        <td id="b_name" class="tab-content"></td>
                                    </tr>
                                    <tr>
                                        <th>Category Name</th>
                                        <td id="c_name" class="tab-content"></td>
                                    </tr>
                                    <tr>
                                        <th>Product Quantity</th>
                                        <td id="p_quan" class="tab-content"></td>
                                    </tr>
                                    <tr>
                                        <th>Short Description</th>
                                        <td id="p_sdes" class="tab-content"></td>
                                    </tr>
                                    <tr>
                                        <th>Long Description</th>
                                        <td id="p_ldes" class="tab-content"></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><img id="my_Image"  class="img-responsive" src="" alt=""  style="width: 40px; height: 24px;></td>
                                    </tr>



                                </table>
                                    {{--<div class="form-group">--}}
                                        {{--<span>Product Name:</span>--}}
                                        {{--<label  for="recipient-name" class="control-label"></label>--}}

                                    {{--</div>--}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#exampleModal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var recipient = button.data('whatever') // Extract info from data-* attributes
                        var modal = $(this)
                        // modal.find('#exampleModalLabel').text(recipient.category_name)
                        //modal.find('#exampleModalLabel').text(recipient.category_name)
                        //modal.find('.modal-body input').val(recipient.category_name)
                        modal.find('#p_id').text(recipient.id)
                        modal.find('#p_name').text(recipient.product_name)
                        modal.find('#b_name').text(recipient.brand_name)
                        modal.find('#c_name').text(recipient.category_name)
                        modal.find('#p_quan').text(recipient.product_quantity)
                        modal.find('#p_sdes').text(recipient.short_description)
                        modal.find('#p_ldes').text(recipient.long_description)
                        $('#my_Image').attr('src','../'+recipient.main_image);


                    })
                </script>

@endsection