@extends('front.master')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center text-success">Product Cart Info</h2>
            </div>
            <div class="col-sm-12">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @php($sum=0)
                        @foreach($cartproducts as $cartproduct)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$cartproduct->id}}</td>
                            <td>{{$cartproduct->name}}</td>
                            <td><img src="{{asset($cartproduct->options->image)}}" alt="/" height="70" width="50"></td>
                            <td>{{$cartproduct->price}}</td>
                            <td>
                                <form action="{{url('/update-cart-product')}}" method="Post">
                                    @csrf
                                    <input type="text" value="{{$cartproduct->qty}}" name="qty" min="1">
                                    <input type="hidden" value="{{$cartproduct->rowId}}" name="rowId">
                                    <input type="submit" value="update" name="btn">
                                </form>
                            </td>
                            <td>TK.{{ $total  =$cartproduct->price*$cartproduct->qty}}</td>
                            <td>
                                <a href="{{url('/delete-cart-product/'.$cartproduct->rowId)}}" class="btn btn-danger btn-xs" title="Delete Cart Product">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>

                            </td>
                        </tr>
                          @php($sum=$sum+$total)
                        @endforeach
                        <table class="table table-bordered">
                            <tr>
                                <th>Sub Total</th>
                                <td>TK.{{$sum}}</td>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <td>TK.{{$discount=0}}</td>
                            </tr>
                            <tr>
                                <th>Tax</th>
                                <td>TK.{{$tax=0}}</td>
                            </tr>
                            <tr>
                                <th>Grant Total</th>
                                <td>TK.{{ $grantTotal =($sum-$discount)+$tax}}</td>
                                {{Session::put('grantTotal',$grantTotal)}}
                            </tr>

                        </table>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <a href="" class="btn btn-primary">Continue Shopping</a>
                            </td>
                            <td>
                                @if(Session::get('customerID'))
                                    <a href="{{url('/shipping-info')}}" class="btn btn-primary">CheckOut</a>
                                @else
                                    <a href="{{url('/checkout')}}" class="btn btn-primary">CheckOut</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>















    @endsection