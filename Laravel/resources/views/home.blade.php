<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <title>Home page</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    >

    <link rel="stylesheet" href="{{ asset('css/generic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
                    <a class="nav-link" href="{{ url('/home') }}">Admin</a>
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
                <a class="btn btn-sm btn-primary" href="{{ url('/cart') }}">
                    Cart <span class="badge text-bg-secondary">3</span>
                </a>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="container categories col-10 offset-1">
                <h3 style="text-align: center">Categories</h3>
                <div class="row gy-1">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{ route('products.filter', ['brand' => 'all']) }}" class="btn btn-sm {{ request('brand') === 'all' || !request('brand') ? 'btn-primary' : 'btn-secondary' }}">
                        <img src="{{ asset('images/logos/all.png') }}" alt="logo" class="me-2">
                            <span>All</span>
                        </a>
                    </div>

                    <!-- Category 1 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{ route('products.filter', ['brand' => 'audi']) }}" class="btn btn-sm {{ request('brand') === 'audi' ? 'btn-primary' : 'btn-secondary' }}">
                        <img src="{{ asset('images/logos/audi.png') }}" alt="logo" class="me-2">
                            <span>Audi</span>
                        </a>
                    </div>
                    <!-- Category 2 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{ route('products.filter', ['brand' => 'bentley']) }}" class="btn btn-sm {{ request('brand') === 'bentley' ? 'btn-primary' : 'btn-secondary' }}">
                        <img
                                src="{{ asset('images/logos/bentley.png') }}"
                                alt="logo"
                                class="me-2"
                            >
                            <span>Bentley</span>
                        </a>
                    </div>
                    <!-- Category 3 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{ route('products.filter', ['brand' => 'bmw']) }}" class="btn btn-sm {{ request('brand') === 'bmw' ? 'btn-primary' : 'btn-secondary' }}">
                        <img src="{{ asset('images/logos/bmw.png') }}" alt="logo" class="me-2">
                            <span>BMW</span>
                        </a>
                    </div>
                    <!-- Category 4 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{ route('products.filter', ['brand' => 'ferrari']) }}" class="btn btn-sm {{ request('brand') === 'ferrari' ? 'btn-primary' : 'btn-secondary' }}">
                        <img
                                src="{{ asset('images/logos/ferrari.png') }}"
                                alt="logo"
                                class="me-2"
                            >
                            <span>Ferrari</span>
                        </a>
                    </div>
                    <!-- Category 5 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{ route('products.filter', ['brand' => 'jaguar']) }}" class="btn btn-sm {{ request('brand') === 'jaguar' ? 'btn-primary' : 'btn-secondary' }}">
                        <img
                                src="{{ asset('images/logos/jaguar.png') }}"
                                alt="logo"
                                class="me-2"
                            >
                            <span>Jaguar</span>
                        </a>
                    </div>
                    <!-- Category 6 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{ route('products.filter', ['brand' => 'lamborghini']) }}" class="btn btn-sm {{ request('brand') === 'lamborghini' ? 'btn-primary' : 'btn-secondary' }}">
                        <img
                                src="{{ asset('images/logos/lamborghini.png') }}"
                                alt="logo"
                                class="me-2"
                            >
                            <span>Lamborghini</span>
                        </a>
                    </div>
                    <!-- Category 7 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{ route('products.filter', ['brand' => 'maserati']) }}" class="btn btn-sm {{ request('brand') === 'maserati' ? 'btn-primary' : 'btn-secondary' }}">
                        <img
                                src="{{ asset('images/logos/maserati.png') }}"
                                alt="logo"
                                class="me-2"
                            >
                            <span>Maserati</span>
                        </a>
                    </div>
                    <!-- Category 8 -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a href="{{ route('products.filter', ['brand' => 'tesla']) }}" class="btn btn-sm {{ request('brand') === 'tesla' ? 'btn-primary' : 'btn-secondary' }}">
                        <img
                                src="{{ asset('images/logos/tesla.png') }}"
                                alt="logo"
                                class="me-2"
                            >
                            <span>Tesla</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="container col-10 col-lg-3">
                <h4 style="text-align: center">Sidebar</h4>
                <form action="{{ route('products.filter') }}" method="GET">
                    <input type="hidden" name="brand" value="{{ request('brand', 'all') }}">



                    <hr>
                    <!-- Search -->
                    <label for="searchBar" class="form-label">Search bar:</label>
                    <input
                        type="text"
                        class="form-control"
                        aria-label="Text input with checkbox"
                        placeholder="search"
                        id="searchBar"
                        value="{{ request('search') }}"
                        onchange="this.form.submit()"
                        name="search"
                    >

                    <hr>

                    <!-- price range -->
                    <label>Price:</label>
                    <div class="input-group mb-3">
                        <input name="price_min" type="text" class="form-control" placeholder="from">
                        <input name="price_max" type="text" class="form-control" placeholder="to">
                        <span class="input-group-text">€</span>
                    </div>

                    <hr>

                    <!-- engine power -->

                    <label>Engine power in HP:</label>
                    <div class="input-group mb-3">
                        <input name="power_min" type="text" class="form-control" placeholder="from">
                        <input name="power_max" type="text" class="form-control" placeholder="to">
                        <span class="input-group-text">&#128014;</span>
                    </div>

                    <hr>

                    <!-- transmision -->

                    {{--<label>Transmision:</label>
                    <div class="row">
                        <div class="form-check col-6">
                            <label class="form-check-label" for="Manual"> Manual </label>
                            <input class="form-check-input" type="checkbox" id="Manual">
                        </div>

                        <div class="form-check col-6">
                            <label class="form-check-label" for="Automatic">
                                Automatic
                            </label>
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="Automatic"
                            >
                        </div>
                    </div>--}}

                    <label>Transmission:</label>
                    <div class="row">
                        <div class="form-check col-6">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="transmission[]"
                                value="Manual"
                                id="Manual"
                                {{ is_array(request('transmission')) && in_array('Manual', request('transmission')) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="Manual">
                                Manual
                            </label>
                        </div>

                        <div class="form-check col-6">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="transmission[]"
                                value="Automatic"
                                id="Automatic"
                                {{ is_array(request('transmission')) && in_array('Automatic', request('transmission')) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="Automatic">
                                Automatic
                            </label>
                        </div>
                    </div>


                    <hr>

                    <!-- fuel -->
                    <label>Fuel:</label>
                    <div class="row">
                        <div class="form-check col-6">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="fuel[]"
                                value="Petrol"
                                id="Gasoline"
                                {{ is_array(request('fuel')) && in_array('Petrol', request('fuel')) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="Gasoline">
                                Gasoline
                            </label>
                        </div>

                        <div class="form-check col-6">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="fuel[]"
                                value="Diesel"
                                id="Diesel"
                                {{ is_array(request('fuel')) && in_array('Diesel', request('fuel')) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="Diesel">
                                Diesel
                            </label>
                        </div>

                        <div class="form-check col-6">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="fuel[]"
                                value="LPG"
                                id="LPG"
                                {{ is_array(request('fuel')) && in_array('LPG', request('fuel')) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="LPG">
                                LPG
                            </label>
                        </div>
                    </div>


                    <hr>

                    <!-- submit -->

                    <div class="btn-group me-2 w-100">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Search
                        </button>
                    </div>
                </form>
                <hr>
            </div>

            <!-- content -->
            <div class="container col-10 col-lg-8">
                <!--Sorting-->
                {{--<div class="row gy-1">
                    <div class="col-12 col-sm-6 col-md-4">
                        <input
                            type="radio"
                            class="btn-check"
                            name="btnradio"
                            id="lowToHigh"
                            checked
                        >
                        <label
                            class="btn btn-sm btn-outline-primary w-100"
                            for="lowToHigh"
                        >Price Low to High</label
                        >
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <input
                            type="radio"
                            class="btn-check"
                            name="btnradio"
                            id="highToLow"
                        >
                        <label
                            class="btn btn-sm btn-outline-primary w-100"
                            for="highToLow"
                        >Price High to Low</label
                        >
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <input
                            type="radio"
                            class="btn-check"
                            name="btnradio"
                            id="HpHighToLow"
                        >
                        <label
                            class="btn btn-sm btn-outline-primary w-100"
                            for="HpHighToLow"
                        >Horse power High to Low</label
                        >
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <input
                            type="radio"
                            class="btn-check"
                            name="btnradio"
                            id="HpLowToHigh"
                        >
                        <label
                            class="btn btn-sm btn-outline-primary w-100"
                            for="HpLowToHigh"
                        >Horse power Low to High</label
                        >
                    </div>
                </div>--}}

                <form action="{{ route('products.filter') }}" method="GET" id="sortForm">
                    <!-- Keep all previous parameters for sorting -->
                    @foreach(request()->except('sort') as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach

                    <div class="row gy-1">
                        <div class="col-12 col-sm-6 col-md-4">
                            <input
                                type="radio"
                                class="btn-check"
                                name="sort"
                                value="price_low_high"
                                id="lowToHigh"
                                onchange="document.getElementById('sortForm').submit()"
                                {{ (request('sort') == 'price_low_high' || !request()->has('sort')) ? 'checked' : '' }}
                            >
                            <label class="btn btn-sm btn-outline-primary w-100" for="lowToHigh">
                                Price Low to High
                            </label>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <input
                                type="radio"
                                class="btn-check"
                                name="sort"
                                value="price_high_low"
                                id="highToLow"
                                onchange="document.getElementById('sortForm').submit()"
                                {{ request('sort') == 'price_high_low' ? 'checked' : '' }}
                            >
                            <label class="btn btn-sm btn-outline-primary w-100" for="highToLow">
                                Price High to Low
                            </label>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <input
                                type="radio"
                                class="btn-check"
                                name="sort"
                                value="hp_high_low"
                                id="HpHighToLow"
                                onchange="document.getElementById('sortForm').submit()"
                                {{ request('sort') == 'hp_high_low' ? 'checked' : '' }}
                            >
                            <label class="btn btn-sm btn-outline-primary w-100" for="HpHighToLow">
                                Horse power High to Low
                            </label>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <input
                                type="radio"
                                class="btn-check"
                                name="sort"
                                value="hp_low_high"
                                id="HpLowToHigh"
                                onchange="document.getElementById('sortForm').submit()"
                                {{ request('sort') == 'hp_low_high' ? 'checked' : '' }}
                            >
                            <label class="btn btn-sm btn-outline-primary w-100" for="HpLowToHigh">
                                Horse power Low to High
                            </label>
                        </div>
                    </div>
                </form>

                <hr>
                <!--Cars-->
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-12 col-lg-6 col-xxl-4 mb-3">
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-5 col-md-4 col-lg-12">
                                        @if($product->mainImage)
                                            <img
                                                src="{{ asset($product->mainImage->image_path) }}"
                                                class="object-fit-contain"
                                                alt="{{ $product->title }}"
                                            >
                                        @else
                                            <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="No image">
                                        @endif

                                    </div>
                                    <div class="col-sm-7 col-md-8 col-lg-12">
                                        <div class="card-body">
                                            <h1 class="card-title">{{ $product->title }}</h1>
                                            <p class="card-text">Price: {{ number_format($product->price) }} €</p>
                                            <div class="row w-100">
                                                <div
                                                    class="btn-group me-2"
                                                    role="group"
                                                    aria-label="Second group"
                                                >
                                                    <a
                                                        href="{{ route('products.show', ['id' => $product->id]) }}"
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        View
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    {{--@foreach($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    <p class="card-text">
                                        <strong>Brand:</strong> {{ $product->brand->name ?? 'Unknown' }}<br>
                                        <strong>Price:</strong> ${{ number_format($product->price) }}<br>
                                        <strong>Engine Power:</strong> {{ $product->engine_power }} HP<br>
                                        <strong>Fuel:</strong> {{ $product->fuel->type ?? 'Unknown' }}<br>
                                        <strong>Transmission:</strong> {{ $product->transmission->type ?? 'Unknown' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach--}}

                </div>
            </div>

            <div class="btn-toolbar col-12" role="toolbar">
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary">&lt;</button>
                    <button type="button" class="btn btn-secondary">1</button>
                    <button type="button" class="btn btn-secondary">2</button>
                    <button type="button" class="btn btn-secondary">3</button>
                    <button type="button" class="btn btn-secondary">4</button>
                    <button type="button" class="btn btn-secondary">&gt;</button>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
