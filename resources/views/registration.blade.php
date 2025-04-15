@extends('layout')

@section('title')Регистрация@endsection

@section('main_content')
    <div class="container">
        <div class="text-bg-dark my-5 p-4 rounded">
            <h4 class="mb-3">Регистрация</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="needs-validation" novalidate method="POST" action="{{ url('register') }}">
                @csrf

                <div class="row g-3">
                    <div class="col-sm-4">
                        <label for="surname" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="surname" name="surname"
                               placeholder="Фамилия" value="{{ old('surname') }}" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите вашу фамилию.
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Имя" value="{{ old('name') }}" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите ваше имя.
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="patronymic" class="form-label">Отчество</label>
                        <input type="text" class="form-control" id="patronymic" name="patronymic"
                               placeholder="Отчество (необязательно)" value="{{ old('patronymic') }}">
                        <div class="invalid-feedback">
                            Пожалуйста, введите ваше отчество.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="login" class="form-label">Логин</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="login" name="login"
                                   placeholder="Логин" value="{{ old('login') }}" required>
                            <div class="invalid-feedback">
                                Пожалуйста, придумайте логин.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="you@example.com" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите корректный email.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Пароль" required>
                        <div class="invalid-feedback">
                            Пожалуйста, придумайте пароль.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="password_confirmation" class="form-label">Повтор пароля</label>
                        <input type="password" class="form-control" id="password_confirmation"
                               name="password_confirmation" placeholder="Повтор пароля" required>
                        <div class="invalid-feedback">
                            Пароли должны совпадать.
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">Я согласен с правилами регистрации</label>
                            <div class="invalid-feedback">
                                Вы должны согласиться с правилами.
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-100 btn btn-lg btn-warning">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
@endsection
