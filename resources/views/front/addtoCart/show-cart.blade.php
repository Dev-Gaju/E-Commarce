@extends('front.master')
@section('main-content')
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

    @endsection