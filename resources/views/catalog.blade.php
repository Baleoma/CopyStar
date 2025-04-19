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
                                <button type="button" class="w-75 btn btn-lg btn-warning">{{ $product->price }}р</button>

                                <!-- Кнопка "+" только для авторизованных пользователей -->
                                @auth
                                    <button type="button"
                                            class="btn btn-lg btn-warning add-to-cart"
                                            data-product-id="{{ $product->id }}">
                                        +
                                    </button>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Находим все кнопки с классом "add-to-cart"
            const addToCartButtons = document.querySelectorAll('.add-to-cart');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const productId = button.dataset.productId;

                    // Отправляем POST-запрос на сервер
                    fetch(`/cart/add/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF-токен для защиты
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.success); // Уведомление об успешном добавлении
                            } else {
                                alert('Ошибка при добавлении товара.');
                            }
                        })
                        .catch(error => {
                            console.error('Ошибка:', error);
                            alert('Произошла ошибка при добавлении товара.');
                        });
                });
            });
        });
    </script>
@endsection
