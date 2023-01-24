@extends('layout')

@section('title', 'Личный кабинет')

@section('page-content')
    <x-nav></x-nav>
    <section class="rates container">
        <h2>Мои ставки</h2>
        <table class="rates__list">
            @foreach ($bets as $bet)
            <tr class="rates__item">
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="{{ $bet->lot->url }}" width="54" height="40" alt="{{ $bet->lot->title }}">
                    </div>
                    <h3 class="rates__title"><a href="{{ route('lot-page', ['id' => $bet->lot->id]) }}">{{ $bet->lot->title }}</a></h3>
                </td>
                <td class="rates__category">
                    {{ $bet->lot->category->title }}
                </td>
                <td class="rates__timer">
                    @if ($bet->isWinner())
                    <div class="timer timer--win">Ставка выиграла</div>
                    @else
                    <div class="timer timer--finishing">07:13:34</div>
                    @endif
                </td>
                <td class="rates__price">
                    {{ $bet->bet_price }} р
                </td>
                <td class="rates__time">
                    {{ $bet->formatDate() }}
                </td>
            </tr>
            @endforeach
        </table>
    </section>
@endsection
