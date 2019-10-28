<h1>Hello {{$customer->name}}</h1>

<p>

    Please click the password reset button and reset your password.
    <button><a href="{{url('/reset-email'}}">Reset Password</a></button>
</p>