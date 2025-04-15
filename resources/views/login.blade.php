@extends('layout')

@section('title')Вход@endsection

@section('main_content')
    <div class="container">
        <div class="text-bg-dark my-5">
            <h4 class="mb-3">Вход</h4>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="needs-validation" novalidate="" action="{{ url('login') }}" method="POST">
                @csrf <!-- Добавьте CSRF защиту -->

                <div class="row g-3">
                    <div class="col-12">
                        <label for="login" class="form-label">Логин</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="login" id="login" placeholder="Логин" required value="{{ old('login') }}">
                            <div class="invalid-feedback">
                                Ваш логин обязателен.
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" required>
                        <div class="invalid-feedback">
                            Пароль обязателен.
                        </div>
                    </div>

                    <button type="submit" class="w-100 btn btn-lg btn-warning">Войти</button>
                </div>
            </form>
        </div>
    </div>
@endsection
