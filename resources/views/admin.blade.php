@extends('layout')

@section('title')Админ-панель@endsection

@section('main_content')
    <div class="container mt-5">
        <h1 class="text-warning mb-4">Админ-панель</h1>

        <!-- Пользователи -->
        <div class="card bg-dark mb-4">
            <div class="card-header">
                <h5 class="text-warning mb-0">Пользователи</h5>
            </div>
            <div class="card-body">
                <table class="table table-dark table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->surname }} {{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                    <span class="badge {{ $user->role_id == 1 ? 'bg-warning' : 'bg-secondary' }}">
                                        {{ $user->role_id == 1 ? 'Admin' : 'User' }}
                                    </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Категории -->
        <div class="card bg-dark mb-4">
            <div class="card-header">
                <h5 class="text-warning mb-0">Категории</h5>
            </div>
            <div class="card-body">
                <table class="table table-dark table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Товары -->
        <div class="card bg-dark mb-4">
            <div class="card-header">
                <h5 class="text-warning mb-0">Товары</h5>
            </div>
            <div class="card-body">
                <table class="table table-dark table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Категория</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }} ₽</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Заказы -->
        <div class="card bg-dark">
            <div class="card-header">
                <h5 class="text-warning mb-0">Заказы</h5>
            </div>
            <div class="card-body">
                <table class="table table-dark table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Пользователь</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>
                                    <span class="badge {{ $order->status == 'completed' ? 'bg-success' : ($order->status == 'canceled' ? 'bg-danger' : 'bg-warning') }}">
                                        {{ $order->status }}
                                    </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
