<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <title>Manage | Admin</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    >

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        defer
    ></script>


    <link rel="stylesheet" href="{{ asset('css/generic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
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
            {{--<form class="form-container" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf--}}

            <div class="col-10 col-md-6 offset-1 offset-md-0">
                <div class="container overflow-auto" style="max-height: 42rem">
                    <div class="row">
                        <!-- image 1-->


                        @if(isset($product) && $product->images)
                            @foreach($product->images as $image)
                                <div class="gy-1">
                                    <div
                                        class="card"
                                        {{--onclick="openModal('../images/cars/BMW.jpg')"--}}
                                    >
                                        <img
                                            src="{{ asset($image->image_path) }}"
                                            onclick="openModal('{{ asset($image->image_path) }}')"
                                            alt="Product image"
                                            class="card-img-top"
                                        >
                                        <div class="text-muted text-center small">ID: {{ $image->id }}</div>
                                        <div class="text-muted small">
                                            Route: {{ route('products.images.destroy', $image->id) }}
                                        </div>



                                        <div class="card-footer text-center p-1">
                                            <form action="{{ route('products.images.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger w-100">Remove</button>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>


            <div class="col-10 offset-1 col-md-6 offset-md-0">
                <form class="form-container" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <span class="input-group-text">Name</span>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="BMW g2"
                            id="name"
                            name="title"
                            value="{{ old('title', $product->title ?? '') }}"
                            required
                        >
                    </div>
                    <hr>

                    <div class="input-group mb-3" id="price">
                        <span class="input-group-text">Price</span>
                        <input
                            type="number"
                            min=0
                            class="form-control"
                            name="price"
                            placeholder="75000"
                            value="{{ old('price', $product->price ?? '') }}"
                            required
                        >
                        <span class="input-group-text">€</span>
                    </div>
                    <hr>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Engine power</span>
                        <input
                            type="number"
                            class="form-control"
                            name="engine_power"
                            placeholder="550"
                            value="{{ old('engine_power', $product->engine_power ?? '') }}"
                            required
                        >
                        <span class="input-group-text">&#128014;</span>
                    </div>

                    <hr>

                    <label>Transmission:</label>
                    <div class="row">

                        @foreach($transmissions as $transmission)
                            <div class="col-6 col-md-4 col-xl-3">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="transmission_id"
                                        id="transmission_{{ $transmission->id }}"
                                        value="{{ $transmission->id }}"
                                        {{ (old('transmission_id', $product->transmission_id ?? '') == $transmission->id) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="transmission_{{ $transmission->id }}"
                                    >{{ $transmission->type }}</label
                                    >
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <hr>

                    <label>Fuel:</label>
                    <div class="row">

                        @foreach($fuels as $fuel)
                        <div class="col-6 col-md-4 col-xl-3">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="fuel_id"
                                    id="fuel_{{ $fuel->id }}"
                                    value="{{ $fuel->id }}"
                                    {{ (old('fuel_id', $product->fuel_id ?? '') == $fuel->id) ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="fuel_{{ $fuel->id }}"
                                >{{ $fuel->type }}</label
                                >
                            </div>
                        </div>
                        @endforeach


                    </div>

                    <hr>

                    <label>Brand:</label>
                    <div class="row">


                        @foreach($brands as $brand)
                        <div class="col-6 col-md-4 col-xl-3">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="brand_id"
                                    id="brand_{{ $brand->id }}"
                                    value="{{ $brand->id }}"
                                    {{ (old('brand_id', $product->brand_id ?? '') == $brand->id) ? 'checked' : '' }}

                                >
                                <label class="form-check-label" for="brand_{{ $brand->id }}"
                                >{{ ucfirst($brand->name) }}</label
                                >
                            </div>
                        </div>
                        @endforeach


                    </div>


                        <hr>

                        {{--@if(isset($product))--}}
                        <div class="d-grid gap-2 w-100" role="group">


                            <button type="submit" class="btn btn-warning btn-sm">
                                Update
                            </button>


                        </div>

                    </form>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm w-100">
                            Delete
                        </button>
                    </form>

                    <button type="button" class="btn btn-info btn-sm w-100" data-bs-toggle="modal" data-bs-target="#addImageModal">
                        Add picture
                    </button>
                </div>

            </div>


        </div>
    </div>

    <div
        class="modal fade"
        id="imageModal"
        tabindex="-1"
        aria-labelledby="imageModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image preview</h5>

                    <button
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <img
                        id="modalImage"
                        src="#"
                        alt="Preview"
                        class="img-fluid w-100"
                    >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm w-100">
                        delete picture
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload image modal -->
    <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form
                action="{{ route('products.images.store', $product->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="modal-content"
            >
                @csrf
                <input type="file" name="image" required>
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>

</main>

<script>
    function openModal(src) {
        document.getElementById("modalImage").src = src;
        var myModal = new bootstrap.Modal(
            document.getElementById("imageModal")
        );
        myModal.show();
    }
</script>
</body>
</html>
