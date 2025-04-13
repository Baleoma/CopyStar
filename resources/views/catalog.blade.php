@extends('layout')

@section('title')О нас@endsection

@section('main_content')

    <main class="container">
        <div class="album my-5">
            <div class="row row-cols-4">
                @foreach($products as $product)
                    <div class="col my-1">
                        <div class="card shadow-sm bg-black text-bg-dark">
                            <img class="card-img-top" src="images/{{ $product->photo }}" alt="Картинка товара" style="width: 100%; height: 300px; object-fit: cover; background: #6c757d;">
                            <div class="card-body">
                                <p class="card-text">{{ $product->name }}</p>
                                <button type="button" class="w-100 btn btn-lg btn-warning">{{ $product->price }}р</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

@endsection
