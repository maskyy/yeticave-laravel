@extends('layout')

@section('title', 'Главная')
@section('class', 'class=container')

@section('page-content')
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            @foreach($categories as $category)
                <li class="promo__item promo__item--{{ $category->alias }}">
                    <a class="promo__link" href="#">{{ $category->title }}</a>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            @foreach($lots as $lot)
                <x-lot :lot="$lot"></x-lot>
            @endforeach
        </ul>
    </section>
@endsection

