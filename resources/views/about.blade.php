@extends('layout')

@section('title')О нас@endsection

@section('main_content')

    <main class="container">
        <div class="bg-warning px-4 py-5 my-5 text-center">
            <h2 class="display-5 fw-bold text-body-emphasis">Copy Star</h2>
            <p class="col-lg-6 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tellus nibh, tincidunt eget viverra sagittis, dictum ut tortor. Suspendisse a elit nec arcu viverra consectetur. Suspendisse condimentum sagittis viverra. Mauris eros neque, scelerisque non sapien eget, euismod congue quam. Ut vel nisl risus. Vestibulum libero turpis, iaculis quis efficitur at, lobortis vitae magna. Vestibulum aliquam tincidunt mauris.</p>
        </div>

        <div class="album">
            <div class="row row-cols-5">
                @foreach($products as $product)
                    <div class="col">
                        <div class="card shadow-sm bg-black text-bg-dark">
                            <img class="card-img-top" src="images/{{ $product->photo }}" alt="Картинка товара" style="width: 100%; height: 300px; object-fit: cover; background: #6c757d;">
                            <div class="card-body">
                                <p class="card-text">{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

@endsection
