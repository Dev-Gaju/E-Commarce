Click Here to reset your password <br/>

<a href="{{$link=url('password/reset',$token).'?email='.urldecode($user->getEmailForPasswordReset())}}">{{$link}}</a>