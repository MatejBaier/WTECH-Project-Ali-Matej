<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <title>Login</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    >
    <link rel="stylesheet" href="../css/generic.css" >
    <link rel="stylesheet" href="../css/signin.css" >
</head>

<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav flex-row gap-1">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <a class="btn btn-sm btn-primary" href="{{ url('/cart') }}">
                    Cart <span class="badge text-bg-secondary">3</span>
                </a>
            </div>
        </div>
    </nav>
</header>
<main>
    @auth()
    <p>Si prihlaseny</p>
    @else
    <p>Nie si prihlaseny</p>
    @endauth
    <div class="container-fluid">
        <div class="row">
            <div class="container col-8 offset-2 mb-4 gy-4">
                <!-- LOGIN FORM-->
                <form class="needs-validation" novalidate action="/perform_log_in" method="POST">
                    @csrf

                    <h1 class="h3 mb-3 font-weight-normal">Login</h1>

                    <!-- email -->
                    <div class="row input-group mb-2">
                <span class="input-group-text col-12 col-md-4"
                >Email address</span
                >
                        <input
                            name="email"
                            type="email"
                            id="email"
                            class="form-control"
                            placeholder="email address"
                            required
                        >
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                    </div>

                    <!-- password -->
                    <div class="row input-group mb-2">
                        <span class="input-group-text col-12 col-md-4">Password</span>
                        <input
                            name="password"
                            type="password"
                            id="password"
                            class="form-control"
                            placeholder="password"
                            required
                        >
                        <div class="invalid-feedback">Please enter a password.</div>
                    </div>

                    <button
                        class="btn btn-sm btn-primary btn-block w-100"
                        type="submit"
                    >
                        Login
                    </button>
                </form>
                <hr>
                <a href="{{ url('/register') }}">Don't have an account?</a>
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
