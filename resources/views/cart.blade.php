@extends('layout')

@section('title')Корзина@endsection

@section('main_content')
    <main class="container">
        <div class="row align-items-md-stretch py-5">
            <div class="col-md-6">
                <div class="h-100 p-5 rounded-3 text-bg-dark bg-black">
                    <h2>Корзина</h2>
                    @if ($cartItems->isEmpty())
                        <p>Корзина пуста.</p>
                    @else
                        <form action="{{ route('cart.update.quantities') }}" method="POST">
                            @csrf
                            <ul>
                                @foreach ($cartItems as $item)
                                    <li>
                                        {{ $item->product->name }} -
                                        <button type="button" onclick="updateQuantity({{ $item->id }}, -1)">-</button>
                                        <input type="text"
                                               name="quantities[{{ $item->id }}]"
                                               value="{{ $item->quantity }}"
                                               style="width: 40px; text-align: center;"
                                               readonly>
                                        <button type="button" onclick="updateQuantity({{ $item->id }}, 1)">+</button>
                                        <a href="{{ route('cart.remove', $item->id) }}" class="text-danger">Удалить</a>
                                    </li>
                                @endforeach
                            </ul>
                            <button class="btn btn-warning mt-3" type="submit">Обновить количество</button>
                        </form>
                        <form action="{{ route('cart.place.order') }}" method="POST" class="mt-3">
                            @csrf
                            <button class="btn btn-success" type="submit">Оформить заказ</button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 rounded-3 text-bg-dark bg-black">
                    <h2>Заказы</h2>
                    @if ($orders->isEmpty())
                        <p>У вас нет заказов.</p>
                    @else
                        <ul>
                            @foreach ($orders as $order)
                                <li>
                                    Заказ #{{ $order->id }} (Статус: {{ $order->status }})
                                    <ul>
                                        @foreach ($order->items as $item)
                                            <li>{{ $item->product->name }} ({{ $item->quantity }} шт.)</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <script>
        function updateQuantity(cartId, change) {
            const input = document.querySelector(`input[name="quantities[${cartId}]"]`);
            let quantity = parseInt(input.value);
            quantity += change;

            if (quantity < 1) {
                quantity = 1; // Минимальное количество — 1
            }

            input.value = quantity;
        }
    </script>
@endsection
