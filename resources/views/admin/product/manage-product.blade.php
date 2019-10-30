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
                      {{-- @if(count($data) > 0) --}}
                           <select id="catID">
                                  <option>All Category</option>
                                  @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                           </select>
                           {{-- @else --}}




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

                            <tbody id="productData">
                            @foreach($productInfo as $product)

                         <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->brand_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_quantity}}</td>
                            <td>{{$product->short_description}}</td>
                            <td >{{$product->long_description}}</td>
                            <td><img src="{{asset($product->main_image)}}" class="media-object img-circle" border-radius="50%" height="40" width="40"></td>
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
                                <a  data-target="#myModal" data-whatever="{{$product->id}}"  data-toggle="modal" class="btn btn-danger btn-xs"  title="Delete Info" >
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                         </tr>
                        @endforeach
                    </tbody>

                             {{-- @endif --}}
                        </table>
                        {{$productInfo->links()}}
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
                                    <div class="form-group">
                                        <span>Product Name:</span>
                                        <label  for="recipient-name" class="control-label"></label>

                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                < <link rel="stylesheet" href="{{asset('/admin')}}/css/style.css.php">

                <!-- Modal HTML -->
                <div id="myModal" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="icon-box">
                                    <i class="material-icons"><span class="glyphicon glyphicon-remove"></span></i>
                                </div>
                                <h4 class="modal-title">Are you sure?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <form id="modal_form"  method="post" action="{{url('/product/delete-product')}}">
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>

                                    <input type="text"  style="display: none"  id="delete_id" name="product_id" value="" >
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <input type="submit"  class="btn btn-danger" value="Delete" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>






                    $('#myModal').on('show.bs.modal',function (event){
                        var button=$(event.relatedTarget)
                        var recipient=button.data('whatever')
                        var modal = $(this)
                        modal.find('.modal-body  #delete_id').val(recipient)

                    })
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
<script>
        $(document).ready(function(){
          $("#catID").change(function(){
            // console.log('gggggg')
             var cat_id=$(this).val();
            $.ajax({
              type: 'get',
              dataType : 'html',
              url: 'productsCat',
              data: {id:cat_id},
              success:function(response){ //console.log(response)
                $('#productData').html(response);

              }
            });
          });
        });
        </script>
@endsection
