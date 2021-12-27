<div class="container h-100 d-flex justify-content-center align-items-center ">
    <div class="p-5 border border-white bg-dark rounded ">
        <form method="post" action="{{route('auth.register')}}">
            @csrf
            <div class="d-flex justify-content-center mb-5">
                <dt class="text-white">Register</dt>
            </div>
            <div class="form-group text-white">
                <label for="email_register">Email address</label>
                <input type="email" class="form-control" id="email-register" name="email_register" value="{{old('email_register')}}"  placeholder="Enter email">
            </div>

            @error('email_register')
            <div class="form-group text-danger  text-xs">
                <p id="error" attr-data="{{$message}}">{{$message}}</p>
            </div>
            @enderror

            <div class="form-group text-white">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{old('name')}}" placeholder="Enter name">
            </div>

            @error('name')
            <div class="form-group text-danger  text-xs">
                <p id="error">{{$message}}</p>
            </div>
            @enderror

            <div class="form-group text-white">
                <label for="password-register">Password</label>
                <input type="password" class="form-control" id="password-register"  value="{{old('password_register')}}" name="password_register">
            </div>

            @error('password_register')
            <div class="form-group text-danger  text-xs">
                <p id="error">{{$message}}</p>
            </div>
            @enderror
            
            <div class="form-group text-white">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Password">
            </div>

            @error('confirm_password')
            <div class="form-group text-danger  text-xs">
                <p id="error">{{$message}}</p>
            </div>
            @enderror

            <button type="submit" class="btn btn-primary" id="register">Register</button>
        </form>
    </div>
</div>

