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
                @for($i = 0; $i < 5; $i++)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                            <div class="card-body">
                                <p class="card-text">Название товара</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </main>

@endsection
