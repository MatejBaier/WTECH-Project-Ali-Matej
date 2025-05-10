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
                    <a class="nav-link" href="{{ url()->previous() }}">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-1">
                    @auth()
                        <div class="d-flex align-items-center gap-1">
                            <span class="badge rounded-pill fs-6 text-white bg-primary">{{ auth()->user()->full_name }}</span>

                            @auth
                                @if(auth()->user()->is_admin)
                                    <span class="badge rounded-pill fs-6 text-white bg-primary">ADMIN</span>
                                @endif
                            @endauth

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
                    Cart
                </a>
            </div>
        </div>


        <form action="{{ route('products.global_search') }}" method="GET" class="d-flex flex-column flex-sm-row w-100">
            <input type="text" name="search" class="form-control" placeholder="Search for all products" value="{{ request('search') }}" aria-label="Search for all products">
            <button type="submit" class="btn btn-primary mt-2 mt-sm-0 ms-sm-2">Search</button>
        </form>

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

                    @foreach ($brands as $brand)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <a
                            href="{{ route('products.filter', ['brand' => strtolower($brand->name)]) }}"
                            class="btn btn-sm {{ request('brand') === strtolower($brand->name) ? 'btn-primary' : 'btn-secondary' }}">
                            <img src="{{ asset('images/logos/' . strtolower($brand->name) . '.png') }}" alt="{{ $brand->name }}" class="me-2">
                            <span>{{ ucfirst($brand->name) }}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Sidebar -->
            <div class="container col-10 col-lg-3">
                <h4 style="text-align: center">Filters</h4>
                <form action="{{ route('products.filter') }}" method="GET">
                    <input type="hidden" name="brand" value="{{ request('brand', 'all') }}">



                    <hr>
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


                    <!-- Search -->
                    <label hidden for="searchBar" class="form-label">Search bar:</label>
                    <input
                        hidden
                        type="text"
                        class="form-control"
                        aria-label="Text input with checkbox"
                        placeholder="search"
                        id="searchBar"
                        value="{{ request('search') }}"
                        onchange="this.form.submit()"
                        name="search"
                    >

                    <hr hidden>

                    <!-- price range -->
                    <label>Price:</label>
                    <div class="input-group mb-3">
                        <input name="price_min" type="text" class="form-control" placeholder="from" value="{{ request('price_min') }}">
                        <input name="price_max" type="text" class="form-control" placeholder="to"value="{{ request('price_max') }}">
                        <span class="input-group-text">€</span>
                    </div>

                    <hr>

                    <!-- engine power -->

                    <label>Engine power in HP:</label>
                    <div class="input-group mb-3">
                        <input name="power_min" type="text" class="form-control" placeholder="from" value="{{ request('power_min') }}">
                        <input name="power_max" type="text" class="form-control" placeholder="to" value="{{ request('power_max') }}">
                        <span class="input-group-text">&#128014;</span>
                    </div>

                    <hr>

                    <!-- transmission -->
                    <label>Transmission:</label>
                    <div class="row">

                        @foreach ($transmissions as $transmission)
                        <div class="form-check col-6">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="transmission[]"
                                value="{{ $transmission->type }}"
                                id="trans_{{ $transmission->type }}"
                                {{ is_array(request('transmission')) && in_array($transmission->type, request('transmission')) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="trans_{{ $transmission->type }}">
                                {{ ucfirst($transmission->type) }}
                            </label>
                        </div>
                        @endforeach
                    </div>


                    <hr>

                    <!-- fuel -->
                    <label>Fuel:</label>
                    <div class="row">

                        @foreach($fuels as $fuel)
                        <div class="form-check col-6">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="fuel[]"
                                value="{{ $fuel->type }}"
                                id="fuel_{{ $fuel->id }}"
                                {{ is_array(request('fuel')) && in_array($fuel->type, request('fuel')) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="Diesel">
                                {{ $fuel->type }}
                            </label>
                        </div>
                        @endforeach
                    </div>


                    <hr>

                    <!-- submit -->

                    <div class="btn-group me-2 w-100">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Search
                        </button>

                        @auth
                            @if(auth()->user()->is_admin)
                            <a
                                class="btn btn-warning btn-sm"
                                type="button"
                                href="{{ route('products.create') }}"
                            >
                                New product
                            </a>
                            @endif
                        @endauth

                    </div>
                </form>
                <hr>
            </div>

            <!-- content -->
            <div class="container col-10 col-lg-8">
                <!--Sorting-->
                <form action="{{ route('products.filter') }}" method="GET" id="sortForm">
                    <!-- Keep all previous parameters for sorting -->
                    @foreach(request()->except('sort') as $key => $value)
                        @if(is_array($value))
                            @foreach($value as $v)
                                <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                            @endforeach
                        @else
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
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

                                                    @auth
                                                        @if(auth()->user()->is_admin)
                                                        <a
                                                            href="{{ route('products.manage', ['product' => $product->id]) }}"
                                                            class="btn btn-warning btn-sm"
                                                        >Manage</a
                                                        >
                                                        @endif
                                                    @endauth

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

            @if ($products->hasPages())
                <div class="mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{-- Previous page link --}}
                            @if ($products->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->appends(request()->query())->previousPageUrl() }}" rel="prev">&laquo;</a>
                                </li>
                            @endif

                            {{-- Pages --}}
                            @php
                                # Calculate range of pages to be shown
                                $start = max($products->currentPage() - 2, 1);
                                $end = min($products->currentPage() + 2, $products->lastPage());
                            @endphp

                            @for ($i = $start; $i <= $end; $i++)
                                @if ($i == $products->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $i }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->appends(request()->query())->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endif
                            @endfor

                            {{-- Next page link --}}
                            @if ($products->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->appends(request()->query())->nextPageUrl() }}" rel="next">&raquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">&raquo;</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @else
                <div class="mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">1</span>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</main>
</body>
</html>
