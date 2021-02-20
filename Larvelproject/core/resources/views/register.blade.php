<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    h1{
        text-align: center;
    }
    </style>

<body>
    <h1>Register Now!!</h1>
<form method="post" action="{{ route('register') }}">
    @csrf
  <div class="form-group w-50">
    <label>Username</label>
    <input type="text" name="name" class="form-control p_input">
  </div>
  <div class="form-group w-50">
    <label>Email</label>
    <input type="email" name="email" class="form-control p_input">
  </div>
  <div class="form-group w-50">
    <label>Password</label>
    <input type="password" name="password" class="form-control p_input">
  </div>
  
  <div class="text-center w-50">
    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
  </div>
  
  <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>
  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
  </form>
</body>
</html>