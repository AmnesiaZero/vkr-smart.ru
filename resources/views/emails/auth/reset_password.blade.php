@extends('layouts.app')

@section('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            color: #666;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1>Password Reset</h1>
        <p>Hello,</p>
        <p>We received a request to reset your password. If you did not make this request, you can ignore this
            email.</p>
        <p>To reset your password, click the button below:</p>
        <p><a href="{{$resetLink}}" class="btn">Reset Password</a></p>
        <p>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web
            browser:</p>
        <p><a href="{{$resetLink}}">{{$resetLink}}</a></p>
        <p>If you continue to have issues or didn't request a password reset, please contact support.</p>
        <p>Thank you,</p>
        <p>Your Company Name</p>
    </div>
@endsection


