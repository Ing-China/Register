@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 bg-white rounded shadow-sm p-4" style="height: 700px">
                <h1 class="register text-center">{{ __('REGISTER') }}</h1>
                <div class="py-4">
                    <h3>Adventure starts here&#128640</h3>
                    <h5>Make your app management easy and fun!</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <div class="row mb-3">
                            <div>
                                <label for="name"
                                    class="col-md-1 col-form-label text-md-end">{{ __('USERNAME') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div>
                                <label for="email"
                                    class="col-md-1 col-form-label text-md-end">{{ __('Email') }}</label>
                            </div>

                            <div class="col-md-12">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div>
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                            </div>

                            <div class="col-md-12 input-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">
                                <span class="input-group-text password-toggle-icon">
                                    <i class="fas fa-eye" id="togglePassword" style="width: 17px"></i>
                                </span>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div>
                                <label for="password-confirm"
                                    class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="col-md-12 input-group">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                                <span class="input-group-text password-toggle-icon">
                                    <i class="fas fa-eye" id="toggleConfirmPassword" style="width: 17px"></i>
                                </span>
                            </div>
                        </div>




                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    required>
                                <label class="form-check-label" for="flexCheckChecked">
                                    I agree to
                                </label>
                                <a href="">privacy policy & terms</a>
                            </div>
                        </div>

                        <div class="row py-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%"
                                    id="registerButton" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-center">
                            <span>Already have an accouunt?</span>
                            <a href="{{ route('login') }}">Sign in instead</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const registrationForm = document.getElementById('registrationForm');
            const registerButton = document.getElementById('registerButton');
            const flexCheckChecked = document.getElementById('flexCheckChecked');

            flexCheckChecked.addEventListener('change', function() {
                if (this.checked) {
                    registerButton.removeAttribute('disabled');
                } else {
                    registerButton.setAttribute('disabled', 'disabled');
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const registrationForm = document.getElementById('registrationForm');
            const registerButton = document.getElementById('registerButton');
            const flexCheckChecked = document.getElementById('flexCheckChecked');

            // Toggle password visibility for the password field
            const togglePassword = document.getElementById('togglePassword');
            togglePassword.addEventListener('click', function() {
                const passwordField = document.getElementById('password');
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            // Toggle password visibility for the confirm password field
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            toggleConfirmPassword.addEventListener('click', function() {
                const confirmPasswordField = document.getElementById('password-confirm');
                const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordField.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            flexCheckChecked.addEventListener('change', function() {
                if (this.checked) {
                    registerButton.removeAttribute('disabled');
                } else {
                    registerButton.setAttribute('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection
