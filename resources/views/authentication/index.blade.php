<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Authentication</title>
</head>
<body>

<ul class="nav nav-tabs d-flex justify-content-center  " id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-page" type="button" role="tab" aria-controls="home" aria-selected="true">Login</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link " id="register-tab" data-bs-toggle="tab" data-bs-target="#register-page" type="button" role="tab" aria-controls="profile" aria-selected="false">Register</button>
    </li>
</ul>

<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="login-page" role="tabpanel" aria-labelledby="home-tab">@include('authentication.login')</div>
    <div class="tab-pane fade" id="register-page" role="tabpanel" aria-labelledby="profile-tab">@include('authentication.register')</div>
</div>

</body>
</html>


@include('layout.script')
<script>
  $(document).ready(function(){
      if($('#error').html()) {
         $('#login-tab').removeClass('active');
          $('#login-page').removeClass('show');
          $('#login-page').removeClass('active');

          $('#register-tab').addClass('active');
          $('#register-page').addClass('show');
          $('#register-page').addClass('active');
      }
  });
</script>