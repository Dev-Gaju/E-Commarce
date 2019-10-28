<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Reset Password Form  Responsive Widget Template | Home :: w3layouts</title>
    <link href="{{asset('/front/resetpassword')}}/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Reset Password Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!--google fonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
<!--element start here-->
<div class="elelment">
    <h2>Reset Password Form</h2>
    <div class="element-main">
        <h1>Reset Password</h1>
        {{--@if(Session('status'))--}}
          {{--<div class="alert alert-success" role="alert">--}}
              {{--{{Session('status')}}--}}
          {{--</div>--}}
        {{--@endif--}}

        {{--@if($errors->has('email'))--}}
            {{--<div class="alert alert-success" role="alert">--}}
            {{--{{$errors->first('email')}}--}}
            {{--</div>--}}
        {{--@endif--}}

        {{--@if($errors->has('password'))--}}
            {{--<div class="alert alert-success" role="alert">--}}
            {{--{{$errors->first('password')}}--}}
            {{--</div>--}}
        {{--@endif--}}

        <form method="post" action="{{url('/update-password')}}">
             @csrf
            <input type="hidden"  name="token" value="{{$token}}">
            <input type="password" value="Your e-mail address" placeholder="Password" name="password" onfocus="this.value = '';">
            <input type="password" value="Your e-mail address" placeholder="confirm Password" name="confirm_password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your e-mail address';}">
            <input type="submit" value="Reset my Password">
        </form>
    </div>
</div>


<!--element end here-->
</body>
</html>