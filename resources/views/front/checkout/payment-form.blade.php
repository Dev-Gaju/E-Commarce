@extends('front.master')
@section('main-content')
    <div class="men">
        <div class="container">
            <div class="col-md-12 register">
                <h3 class="text-center text-success" > Welcome {{Session::get('customername')}}.You have to give us product payment for your valuable order </h3>
                <hr/>

            </div>
            <div class="col-md-12 register">
            </div>
            <br/>
            <hr/>
            <br/>
            <div class="col-md-12 register">
                <br/><br/>
                <form  action="{{url('/new-order')}}" method="POST">
                    @csrf

                    <div class="register-top-grid">
                        <h1 class="text-center">Payment Info</h1>
                        <br/><br/><br/>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Cash On Delivery</th>
                                    <td><input type="radio" name="payment_type" value="Cash On Delivery"></td>
                                </tr>
                                <tr>
                                    <th>Bkash</th>
                                    <td><input type="radio" name="payment_type" value="Bkash"></td>
                                </tr>
                                <tr>
                                    <th>Paypal</th>
                                    <td><input type="radio" name="payment_type" value="Paypal"></td>
                                </tr>

                            </table>
                            <input type="submit" value="Confirm Order" class="btn btn-success">
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </form>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection