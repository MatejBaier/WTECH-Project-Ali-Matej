<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <title>cart</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    >

    <link rel="stylesheet" href="../css/generic.css">
    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav flex-row gap-4">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url()->previous() }}">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-1">
                @auth()
                    <div class="d-flex align-items-center gap-1">
                        <span class="badge rounded-pill fs-6 text-white bg-primary">{{ auth()->user()->full_name }}</span>
                        <form action="{{ url('/perform_log_out') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                        </form>
                    </div>
                @else
                    <div
                        class="btn-group"
                        role="group"
                        aria-label="Basic outlined example"
                    >
                        <a href="{{ url('/login') }}" class="btn btn-sm btn-outline-primary">Login</a>
                        <a href="{{ url('/register') }}" class="btn btn-sm btn-outline-primary">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="container col-10 col-md-5 mb-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Incorrect fields:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="needs-validation" novalidate method="POST" action="{{ route('shopping_cart.order') }}">
                    @csrf
                    <!-- Full name -->
                    <div class="row input-group mb-2">
                <span
                    class="input-group-text col-12 col-sm-4 col-md-12 col-xl-4"
                >Full name</span
                >
                        <input
                            type="text"
                            id="fullName"
                            name="full_name"
                            class="form-control"
                            {{--placeholder="Full name"--}}
                            value="{{ old('full_name', auth()->user()->full_name ?? '') }}"
                            required
                        >
                        <div class="invalid-feedback">Please choose full name.</div>
                    </div>

                    <!-- email -->
                    <div class="row input-group mb-2">
                <span
                    class="input-group-text col-12 col-sm-4 col-md-12 col-xl-4"
                >Email</span
                >
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            {{--placeholder="martinbajovsky@gmail.com"--}}
                            value="{{ old('email', auth()->user()->email ?? '') }}"
                            required

                        >
                        <div class="invalid-feedback">
                            Please choose a valid email address.
                        </div>
                    </div>

                    <!-- Phone number-->
                    <div class="row input-group mb-2">
                <span
                    class="input-group-text col-12 col-sm-4 col-md-12 col-xl-4"
                >Phone number</span
                >
                        <input
                            type="tel"
                            id="phoneNumber"
                            name="phone_number"
                            class="form-control"
                            {{--placeholder="1111111111"--}}
                            value="{{ old('phone_number', auth()->user()->phone_number ?? '') }}"
                            required
                        >
                        <div class="invalid-feedback">
                            Please choose a phone number.
                        </div>
                    </div>

                    <hr>

                    <!-- State -->
                    <div class="row input-group mb-2">
                <span
                    class="input-group-text col-12 col-sm-4 col-md-12 col-xl-4"
                >State</span
                >
                        <input
                            type="text"
                            id="state"
                            name="state"
                            class="form-control"
                            {{--placeholder="Slovakia"--}}
                            value="{{ old('state', auth()->user()->state ?? '') }}"
                            required
                        >
                        <div class="invalid-feedback">Please choose a state.</div>
                    </div>
                    <!-- City -->
                    <div class="row input-group mb-2">
                <span
                    class="input-group-text col-12 col-sm-4 col-md-12 col-xl-4"
                >City</span
                >
                        <input
                            type="text"
                            id="city"
                            name="city"
                            class="form-control"
                            {{--placeholder="Bratislava"--}}
                            value="{{ old('city', auth()->user()->city ?? '') }}"
                            required
                        >
                        <div class="invalid-feedback">Please choose a city.</div>
                    </div>

                    <!-- Address -->
                    <div class="row input-group mb-2">
                <span
                    class="input-group-text col-12 col-sm-4 col-md-12 col-xl-4"
                >Address</span
                >
                        <input
                            type="text"
                            id="address"
                            name="address"
                            class="form-control"
                            {{--placeholder="Skoricova"--}}
                            value="{{ old('address', auth()->user()->address ?? '') }}"
                            required
                        >

                        <div class="invalid-feedback">Please choose a address.</div>
                    </div>
                    <!-- Postal code -->
                    <div class="row input-group mb-2">
                <span
                    class="input-group-text col-12 col-sm-4 col-md-12 col-xl-4"
                >Postal code</span
                >
                        <input
                            type="text"
                            id="postalCode"
                            name="postal_code"
                            class="form-control"
                            {{--placeholder="844 17"--}}
                            value="{{ old('postal_code', auth()->user()->postal_code ?? '') }}"
                            required

                        >
                        <div class="invalid-feedback">Please choose a postal code.</div>
                    </div>

                    <!-- delivery & payment method -->
                    <hr>

                    <div class="row input-group mb-2">
                <span
                    class="input-group-text col-12 col-sm-4 col-md-12 col-xl-4"
                >Delivery method</span
                >
                        <select class="form-select" id="deliveryMethod" name="delivery_method" required>
                            <option selected disabled value="">...</option>
                            <option value="to my address" {{ old('delivery_method') == 'to my address' ? 'selected' : '' }}>to my address</option>
                            <option value="to nearest dealership" {{ old('delivery_method') == 'to nearest dealership' ? 'selected' : '' }}>to nearest dealership</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose a delivery method.
                        </div>
                    </div>

                    <div class="row input-group mb-2">
                <span
                    class="input-group-text col-12 col-sm-4 col-md-12 col-xl-4"
                >Payment method</span
                >
                        <select class="form-select" id="paymentMethod" name="payment_method" required>
                            <option selected disabled value="">...</option>
                            <option value="card" {{ old('payment_method') == 'card' ? 'selected' : '' }}>card</option>
                            <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>cash</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose a payment method.
                        </div>
                    </div>

                    <hr>

                    <!-- submit -->
                    <div class="btn-group me-2 w-100">
                        <button class="btn btn-success btn-sm" type="submit">
                            Confirm order
                        </button>
                    </div>
                </form>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                    <hr>
            </div>

            <!--cart-->
            <div class="container col-10 col-md-6 mb-4">
                <div class="row gy-3">
                    @foreach($cartItems as $cartItem)
                        <div class="card">
                            <div class="row">
                                <div class="col-12 col-xl-4">
                                    <img
                                        src="{{ asset($cartItem->product->mainImage->image_path ?? 'images/default.png') }}"
                                        class="object-fit-contain"
                                        alt="{{ $cartItem->product->title }}"
                                    >
                                </div>
                                <div class="col-12 col-md-12 col-xl-8">
                                    <div class="card-body">
                                        <h1 class="card-title">{{ $cartItem->product->title }}</h1>
                                        <p class="card-text">Price: {{ number_format($cartItem->product->price) }} €</p>
                                        <div class="row">
                                            <div class="container-fluid col-12 col-sm-7 col-md-12 col-xxl-7">
                                                <div class="btn-group w-100" role="group" aria-label="Button group">
                                                    <a href="{{ route('products.show', $cartItem->product->id) }}" class="btn btn-primary btn-md">View</a>

                                                    <form action="{{ route('shopping_cart.remove', $cartItem->product->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-md">Remove</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="container-fluid col-12 col-sm-5 col-md-12 col-xxl-5">
                                                <form action="{{ route('shopping_cart.update', $cartItem->product->id) }}" method="POST" class="d-flex">
                                                    @csrf
                                                    @method('PUT')
                                                    <span class="input-group-text">Quantity</span>
                                                    <input
                                                        type="number"
                                                        name="quantity"
                                                        class="form-control text-center"
                                                        value="{{ $cartItem->quantity }}"
                                                        min="1"
                                                    >
{{--                                                    <button type="submit" class="btn btn-success btn-sm">Update</button>--}}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                    <!-- car 1 -->
                    {{--<div class="card">
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <img
                                    src="../images/cars/ferrari_1.jpg"
                                    class="object-fit-contain"
                                    alt="Ferrari"
                                >
                            </div>
                            <div class="col-12 col-md-12 col-xl-8">
                                <div class="card-body">
                                    <h1 class="card-title">Ferrari F8 Tributo</h1>
                                    <p class="card-text">Price: 50,000 €</p>
                                    <div class="row">
                                        <div
                                            class="container-fluid col-12 col-sm-7 col-md-12 col-xxl-7"
                                        >
                                            <div
                                                class="btn-group w-100"
                                                role="group"
                                                aria-label="Button group"
                                            >
                                                <a
                                                    href="product.html"
                                                    class="btn btn-primary btn-md"
                                                >View</a
                                                >
                                                <a class="btn btn-danger btn-md" onclick=""
                                                >Remove</a
                                                >
                                            </div>
                                        </div>
                                        <div
                                            class="container-fluid col-12 col-sm-5 col-md-12 col-xxl-5"
                                        >
                                            <div class="input-group" id="quantity_1">
                                                <span class="input-group-text">Quantity</span>
                                                <input
                                                    type="number"
                                                    class="form-control text-center"
                                                    value="1"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}

                    <!-- car 2 -->
                    {{--<div class="card">
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <img
                                    src="../images/cars/ferrari_4.jpg"
                                    class="object-fit-contain"
                                    alt="Ferrari"
                                >
                            </div>
                            <div class="col-12 col-md-12 col-xl-8">
                                <div class="card-body">
                                    <h1 class="card-title">Ferrari Sport</h1>
                                    <p class="card-text">Price: 80,000 €</p>
                                    <div class="row">
                                        <div
                                            class="container-fluid col-12 col-sm-7 col-md-12 col-xxl-7"
                                        >
                                            <div
                                                class="btn-group w-100"
                                                role="group"
                                                aria-label="Button group"
                                            >
                                                <a
                                                    href="product.html"
                                                    class="btn btn-primary btn-md"
                                                >View</a
                                                >
                                                <a class="btn btn-danger btn-md" onclick=""
                                                >Remove</a
                                                >
                                            </div>
                                        </div>
                                        <div
                                            class="container-fluid col-12 col-sm-5 col-md-12 col-xxl-5"
                                        >
                                            <div class="input-group" id="quantity_2">
                                                <span class="input-group-text">Quantity</span>
                                                <input
                                                    type="number"
                                                    class="form-control text-center"
                                                    value="2"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</main>

<script>
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
</script>
</body>
</html>
