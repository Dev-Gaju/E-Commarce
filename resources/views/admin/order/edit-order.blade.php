@extends('admin.master')
@section('main-content')
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
    <div class="well">
        @if($message=Session::get('message'))
        <h3>{{$message}}</h3>
        @endif

    <form  class="col-sm-offset-2" method="POST" action="{{url('/order/order-status')}}">
        @csrf
        <table>
            <input type="hidden" name="id" value="{{$orderinfo->id}}"  >
            <tr>
                <td class="font-weight-light">Order Status</td>
                <td>
                    <select name="order_status">
                        <option value="pending" >Pending</option>
                        <option value="cancel" >Cancel</option>
                        <option value="successful" >Successful</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Payment Status</td>
                <td>
                    <select name="payment_status">
                        <option value="pending">Pending</option>
                        <option value="cancel">Cancel</option>
                        <option value="successful">Successfull</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Order Status</td>
                <td>
                    <input type="submit" name="btn" value="Update Order"/>
                </td>
            </tr>
        </table>
    </form>
    </div>
        </div>
        </div>
    </div>

@endsection