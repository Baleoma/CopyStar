@extends('layout')

@section('title')Регистрация@endsection

@section('main_content')

<div class="container">
    <div class="text-bg-dark my-5">
        <h4 class="mb-3">Регистрация</h4>
        <form class="needs-validation" novalidate="">
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Имя" value="" required="">
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Фамилия" value="" required="">
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="username" class="form-label">Логин</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="username" placeholder="Логин" required="">
                        <div class="invalid-feedback">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Пароль</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Пароль" value="" required="">
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Повтор пароля</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Повтор пароля" value="" required="">
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="same-address">
                    <label class="form-check-label" for="same-address">Я согласен с правилами регистрации</label>
                </div>

                <button type="button" class="w-100 btn btn-lg btn-warning">Регистрация</button>
            </div>
        </form>
    </div>
</div>

@endsection
