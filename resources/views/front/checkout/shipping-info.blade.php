@extends('front.master')
@section('main-content')
    <div class="men">
        <div class="container">
            <div class="col-md-12 register">
                <h3 class="text-center text-success" > Welcome {{Session::get('customername')}}.You have to give us shipping info for your valuable order </h3>
                <hr/>

            </div>
            <div class="col-md-12 register">
            </div>
            <br/>
            <hr/>
            <br/>
            <div class="col-md-12 register">
                <br/><br/>
                <form  action="{{url('/new-shipping')}}" method="POST">
                    @csrf

                    <div class="register-top-grid">
                        <h1 class="text-center">Shipping Info</h1>
                        <h3 class="text-center text-primary">If your shipping and billing  info are same then Just press the Save Button otherwise You have to changed.</h3>
                        <br/><br/><br/>
                        <div>
                            <span>Full Name<label>*</label></span>
                            <input type="text" value="{{$customer->first_name.' '.$customer->last_name}}" name="full_name" class="form-control">
                            <span>{{$errors->has('first_name')? $errors->first('first_name') :''}}</span>

                        </div>

                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="email" value="{{$customer->email}}" name="email" class="form-control">
                            <span>{{$errors->has('email')? $errors->first('email') :''}}</span>

                        </div>
                        <div>
                            <span>Phone Number<label>*</label></span>
                            <input type="number" value="{{$customer->phone_number}}" name="phone_number" class="form-control">
                            <span>{{$errors->has('number')? $errors->first('number') :''}}</span>

                        </div>
                        <div>
                            <span>Address<label>*</label></span>
                            <textarea name="address" class="form-control">{{$customer->address}}</textarea>
                            <span>{{$errors->has('address')? $errors->first('address') :''}}</span>

                        </div>
                        <div>
                            <input type="submit" value="Save Shipping Info" class="btn btn-primary col-lg-offset-10">
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