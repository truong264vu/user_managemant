<div class="container h-100 d-flex justify-content-center align-items-center ">
    <div class="p-5 border border-white bg-dark rounded ">
        <form method="post" action="{{ route('auth.HandleLogin') }}">
            @csrf
            <div class="d-flex justify-content-center mb-5">
                <dt class="text-white"> Login</dt>
            </div>
            @if(Session::get('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="form-group text-white">
                <label for="email-login">Email address</label>
                <input type="email" class="form-control" name="email_login" id="email-login" placeholder="Enter email">
            </div>
            <div class="form-group text-white">
                <label for="password-login">Password</label>
                <input type="password" class="form-control" name="password_login" id="password-login" placeholder="Password">
            </div>
            <div class="form-group form-check text-white">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1 text-white">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary text-white">Login</button>
        </form>
    </div>
</div>
