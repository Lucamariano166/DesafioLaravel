
@extends('_layout.app')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="sidenav">
    <div class="login-main-text">
        <h2>Auto<br> Veículos</h2>
        <p>Manutenções para o seu veículo.</p>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <x-jet-label value="{{ __('Email') }}" />
                    <x-jet-input class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Password') }}" />
                    <x-jet-input class="form-control" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="col-md-6 col-sm-12">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                    <button type="submit" class="btn btn-dark">Login</button>    
            </form>
            <div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="/register">Sign Up</a>
				</div>
				
			</div>
        </div>
    </div>
</div>