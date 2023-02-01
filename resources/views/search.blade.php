@extends('layout')

@section('title', 'Поиск лотов')

@section('page-content')
<x-nav></x-nav>
<div class="container">
    @if ($lots->isNotEmpty())
        <section class="lots">
            @isset($category)
            <h2>Все лоты в категории <span>{{ $category }}</span></h2>
            @endisset
            @isset($search)
            <h2>Результаты поиска по запросу «<span>{{ $search }}</span>»</h2>
            @endisset
            @isset($favorites)
            <h2>Избранные лоты</h2>
            @endisset
            <ul class="lots__list">
                @foreach ($lots as $lot)
                    <x-lot :$lot></x-lot>
                @endforeach
            </ul>
        </section>
        <ul class="pagination-list">
            <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
            <li class="pagination-item pagination-item-active"><a>1</a></li>
            <li class="pagination-item"><a href="#">2</a></li>
            <li class="pagination-item"><a href="#">3</a></li>
            <li class="pagination-item"><a href="#">4</a></li>
            <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
        </ul>
    @else
        <section class="lots">
            @isset($category)
                <h2>В категории <span>{{ $category }}</span> лотов не найдено.</h2>
            @endisset
            @isset($search)
                <h2>Результатов поиска по запросу «<span>{{ $search }}</span>» нет.</h2>
            @endisset
            @isset($favorites)
                <h2>Избранных лотов пока нет.</h2>
            @endisset
        </section>
    @endif
</div>
@endsection
