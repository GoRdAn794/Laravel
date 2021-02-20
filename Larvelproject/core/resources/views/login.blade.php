<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<style>
    h1
    {
        text-align: center;
    }
    </style>
<body>
    @if (Session::has('message','Account Created Successfully!!'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message')}}
          </div>
          @else
    @endif
    @if (Session::has('message'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('message')}}
      </div>
  @endif
<h1>Login Form</h1>
<form>
    @csrf
  <div class="form-group w-50">
    <label>Username</label>
    <input type="email" name="email" class="form-control p_input">
    <span class="text-danger" id="em"></span>

  </div>
  <div class="form-group w-50">
    <label>Password *</label>
    <input type="password" name="password" class="form-control p_input">
    <span class="text-danger" id="pass"></span>

  </div>

  <div class="text-center w-50">
    <button type="button" id="log" class="btn btn-primary btn-block enter-btn">Login</button>
  </div>

  <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a></p>
</form>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    var APP_URL = {!! json_encode(url('/')) !!}
    $("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
       $("div.alert").remove();
    }, 3000 ); // 5 secs

});
$(document).ready(function(){
  $("#log").click(function(e){
    e.preventDefault();
  var email=$("input[name=email]").val();
  var password=$("input[name=password]").val();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
  $.ajax({
    type:"POST",
    dataType:'JSON',
    url:APP_URL+"/login",
    data:{
      'email':email,
      'password':password
    },
    success:function(data)
    {
      let re=$.parseJSON(data);
      console.log(re);
      if(re.status=="success")
      {
        location.reload();
      }
    },
    error:function(data)
    {
      $("#em").text(data.responseJSON.errors.name);
      $("#pass").text(data.responseJSON.errors.password);

      console.log(data.responseJSON.errors.name);
      console.log(data.responseJSON.errors.password);

    }
  });
  console.log(email);
  console.log(password);
  });
});

</script>
</html>