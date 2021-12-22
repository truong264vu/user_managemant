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
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Login</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Register</button>
    </li>
</ul>

<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">@include('authentication.login')</div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">@include('authentication.register')</div>
</div>

</body>
</html>


@include('layout.script')
<script>

        $(document).on('click', '#register', function (e) {
            e.preventDefault();

            let token = $('input[name=_token]').val();
            let emailRegitser = $('input[name=email-regitser]').val();
            let passwordRegister = $('input[name=password-register]').val();
            let confirmPassword = $('input[name=confirm-password]').val();

            let formData = new FormData();
            formData.append('emailRegitser', emailRegitser);
            formData.append('passwordRegister', passwordRegister);
            formData.append('confirmPassword', confirmPassword);

            const registerUrl = `{{ route('auth.register') }}`;
            fetch(registerUrl, {
                method: "POST",
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                },
                body: formData,
            }).then(async (response) => {
                const result = await response.json();
                console.log(result)
            })
        });
</script>