@extends('admin.master')

@section('main-content')

    <div class="row" >
        <div class="col-sm-offset-2 panel panel-default">
            <h2 class="text-center text-warning">Manage Category</h2>
            @if($message=Session::get('message'))
                <h3 class="text-success text-center">{{$message}}</h3>
            @endif

            <div class="panel-body">
                <table class=" table table-bordered table-hover">
                    <tr>
                        <td>SL</td>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Payment Type </th>
                        <th>Payment Status</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->first_name.' '.$order->last_name}}</td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>{{$order->payment_type}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                <a href="{{url('/order/view-order/'.$order->id)}}" class="btn btn-info btn-xs"  title="view order details" >
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                </a>
                                <a href="{{url('/order/view-order-invoice/'.$order->id)}}" class="btn btn-success btn-xs"  title="view order invoice" >
                                    <span class="glyphicon glyphicon-zoom-out"></span>
                                </a>
                                <a href="{{url('/order/download-invoice/'.$order->id)}}" class="btn btn-secondary btn-xs"  title="download order invoice" >
                                    <span class="glyphicon glyphicon-download"></span>
                                </a>
                                <a href="{{url('/order/edit-order/'.$order->id)}}" class="btn btn-primary btn-xs" title="edit order" >
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{url('/order/delete-order/'.$order->id)}}" onclick="return confirm('Are you sure to Delete!!!')" class="btn btn-danger btn-xs"  title="delete order" >
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection