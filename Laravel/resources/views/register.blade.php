<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <title>Register</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    >
    <link rel="stylesheet" href="{{ asset('css/generic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
</head>

<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav flex-row gap-1">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url()->previous() }}">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <a class="btn btn-sm btn-primary" href="{{ url('/cart') }}">
                    Cart
                </a>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="container col-8 offset-2 mb-4 gy-4">
                <!-- REGISTER FORM-->
                <form action="/perform_registration" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <h1 class="h3 mb-3 font-weight-normal">Register</h1>

                    <!-- email -->
                    <div class="row input-group mb-2">
                <span class="input-group-text col-12 col-md-4"
                >Email address</span
                >
                        <input
                            name="email"
                            type="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="email address"
                            required
                        >
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- password -->
                    <div class="row input-group mb-2">
                        <span class="input-group-text col-12 col-md-4">Password</span>
                        <input
                            name="password"
                            type="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="password"
                            required
                        >
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="row input-group mb-2">
                        <span class="input-group-text col-12 col-md-4">Confirm Password</span>
                        <input
                            name="password_confirmation"
                            type="password"
                            id="passwordConfirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="confirm password"
                            required
                        >
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <hr>

                    <!-- Full name -->
                    <div class="row input-group mb-2">
                        <span class="input-group-text col-12 col-md-4">Full name</span>
                        <input
                            name="full_name"
                            type="text"
                            id="fullName"
                            class="form-control @error('full_name') is-invalid @enderror"
                            placeholder="full name"
                            required
                        >
                        @error('full_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Phone number-->
                    <div class="row input-group mb-2">
                <span class="input-group-text col-12 col-md-4"
                >Phone number</span
                >
                        <input
                            name="phone_number"
                            type="tel"
                            id="phoneNumber"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            placeholder="phone number"
                            required
                        >
                        @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <hr>
                    <!-- State -->
                    <div class="row input-group mb-2">
                        <span class="input-group-text col-12 col-md-4">State</span>
                        <input
                            name="state"
                            type="text"
                            id="state"
                            class="form-control @error('state') is-invalid @enderror"
                            placeholder="slovakia"
                            required
                        >
                        @error('state')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- City -->
                    <div class="row input-group mb-2">
                        <span class="input-group-text col-12 col-md-4">City</span>
                        <input
                            name="city"
                            type="text"
                            id="city"
                            class="form-control @error('city') is-invalid @enderror"
                            placeholder="city"
                            required
                        >
                        @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="row input-group mb-2">
                        <span class="input-group-text col-12 col-md-4">Address</span>
                        <input
                            name="address"
                            type="text"
                            id="address"
                            class="form-control @error('address') is-invalid @enderror"
                            placeholder="address"
                            required
                        >

                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- Postal code -->
                    <div class="row input-group mb-2">
                <span class="input-group-text col-12 col-md-4"
                >Postal code</span
                >
                        <input
                            name="postal_code"
                            type="text"
                            id="postalCode"
                            class="form-control @error('postal_code') is-invalid @enderror"

                            placeholder="postal code"
                            required
                        >
                        @error('postal_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <hr>
                    <button
                        class="btn btn-sm btn-primary btn-block w-100"
                        type="submit"
                    >
                        Register
                    </button>
                </form>
                <hr>
                <a href="{{ url('/login') }}">Already have an account?</a>
            </div>
        </div>
    </div>
</main>

{{--<script>
    (() => {
        "use strict";
        const forms = document.querySelectorAll(".needs-validation");

        Array.from(forms).forEach((form) => {
            form.addEventListener(
                "submit",
                (event) => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add("was-validated");
                },
                false
            );
        });
    })();
</script>--}}
</body>
</html>
