<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <title>Product</title>
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
                {{--<li class="nav-item">
                    <a class="nav-link" href="productAdmin.html">Admin</a>
                </li>--}}
            </ul>
            <div class="d-flex align-items-center gap-1">
                <div
                    class="btn-group"
                    role="group"
                    aria-label="Basic outlined example"
                >
                    <a href="{{ url('/login') }}" class="btn btn-sm btn-outline-primary">Login</a>
                    <a href="{{ url('/register') }}" class="btn btn-sm btn-outline-primary">Register</a>
                </div>
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
            <div class="col-10 col-md-6 offset-1 offset-md-0">
                <div class="container overflow-auto" style="max-height: 42rem">
                    <div class="row">
                        <!-- image 1-->
                        @foreach($product->images as $image)
                            <div class="gy-1">
                                <div
                                    class="card"
                                    onclick="openModal('{{ asset($image->image_path) }}')"
                                >
                                    <img
                                        src="{{ asset($image->image_path) }}"
                                        class="card-img-top"
                                        alt="Image 1"
                                    >
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-10 offset-1 col-md-6 offset-md-0">
                <div class="container">
                    <h1>{{ $product->title }}</h1>
                    <h2 style="font-size: 1.25rem;">Description:</h2>
                    <p>{{ $product->description }}
                    </p>
                    <h2 style="font-size: 1.25rem;">Specifics:</h2>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">Brand</th>
                            <td>{{ $product->brand->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Price</th>
                            <td>{{ number_format($product->price) }} €</td>
                        </tr>
                        <tr>
                            <th scope="row">Horse power</th>
                            <td>{{ $product->engine_power }} HP</td>
                        </tr>
                        <tr>
                            <th scope="row">Transmision</th>
                            <td>{{ $product->transmission->type}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Fuel</th>
                            <td>{{ $product->fuel->type}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <form action="{{ route('shopping_cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="row" style="justify-content: center">
                            <div class="input-group mb-3" style="max-width: 24rem">
                                    <span class="input-group-text">Quantity</span>
                                    <input
                                        type="number"
                                        class="form-control text-center"
                                        value="1"
                                        name="quantity"
                                        min="1"
                                    >

                                    <button class="btn btn-success btn-sm" type="submit">
                                        Add to basket
                                    </button>
                            </div>
                        </div>
                    </form>
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
                        type="button"
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
            </div>
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
