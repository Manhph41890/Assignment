@extends('client.layouts.master_ls')

@section('content')
    <!-- Register Area Start -->
    <div class="register-form-area mt-40">
        <div class="container">
            <div class="register-form text-center">
                <!-- Login Heading -->
                <div class="register-heading">
                    <span>Register</span>
                    <p>Create your account to get full access</p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register.handle') }}" method="post">
                    @csrf
                    <!-- Single Input Fields -->
                    <div class="input-box">
                        <div class="single-input-fields">
                            <label>Full name</label>
                            <input type="text" name="name" id="name" placeholder="Enter full name">
                        </div>
                        <div class="single-input-fields">
                            <label>Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Enter email address">
                        </div>
                        <div class="single-input-fields">
                            <label>Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password">
                        </div>
                        <div class="single-input-fields">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <!-- form Footer -->
                    <div class="register-footer">
                        <p> Already have an account? <a href="login.html"> Login</a> here</p>
                        <button class="submit-btn3" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Register Area End -->
@endsection
