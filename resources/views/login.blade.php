@extends('layout')

@section('title')Вход@endsection

@section('main_content')

    <div class="container">
        <div class="text-bg-dark my-5">
            <h4 class="mb-3">Регистрация</h4>
            <form class="needs-validation" novalidate="">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="login" class="form-label">Логин</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="login" placeholder="Логин" required="">
                            <div class="invalid-feedback">
                                Your login is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="text" class="form-control" id="password" placeholder="Пароль" value="" required="">
                        <div class="invalid-feedback">
                            Valid password is required.
                        </div>
                    </div>

                    <button type="button" class="w-100 btn btn-lg btn-warning">Войти</button>
                </div>
            </form>
        </div>
    </div>

@endsection
