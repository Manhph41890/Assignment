@extends('client.layouts.master_ls')

@section('content')
    <div class="login-form-area mt-40">
        <div class="container">
            <div class="login-form">
                <!-- Login Heading -->
                <div class="login-heading">
                    <span>Login</span>
                    <p>Enter Login details to get access</p>
                </div>
                <form action="{{ route('login.handle') }}" method="post">
                    @csrf
                    <!-- Single Input Fields -->
                    <div class="input-box">
                        <div class="single-input-fields">
                            <label>Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Enter email address">
                        </div>
                        <div class="single-input-fields">
                            <label>Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password">
                        </div>
                    </div>
                    <!-- form Footer -->
                    <div class="login-footer">
                        <p>Don’t have an account? <a href="{{ route('register') }}">Sign Up</a> here</p>
                        <button class="submit-btn3" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
