@extends('layout')

@section('title')О нас@endsection

@section('main_content')

    <main class="container">
        <div class="album my-5">
            <div class="row row-cols-4">
                @for($i = 0; $i < 20; $i++)
                    <div class="col my-1">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                            <div class="card-body">
                                <p class="card-text">Название товара</p>
                                <button type="button" class="w-100 btn btn-lg btn-primary">12000р</button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </main>

@endsection
