@extends('layout')

@section('title')О нас@endsection

@section('main_content')

    <div class="container">
        <div class="row align-items-md-stretch my-5">
            <div class="col-md-6">
                <img class="rounded-3" src="images/map.jpeg" alt="map">
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 rounded-3 bg-black text-bg-dark">
                    <h2>Контакты</h2>
                    <p>Номер телефона: 8(999)999-99-99</p>
                    <p>Почта: example123@example.com</p>
                    <p>Адрес: г.Москва, Кремль, Мавзолей</p>
                </div>
            </div>
        </div>
    </div>

@endsection
