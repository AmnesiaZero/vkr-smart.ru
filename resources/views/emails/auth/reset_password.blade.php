@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Password Reset</div>

                    <div class="card-body">
                        <p>Hello!</p>

                        <p>You are receiving this email because we received a password reset request for your account.</p>

                        <p>
                            Click the following link to reset your password:
                            <br>
                            <a href="{{ $resetLink }}" class="btn btn-primary">Reset Password</a>
                        </p>

                        <p>If you did not request a password reset, no further action is required.</p>

                        <p>Thank you!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
