@extends('layout')

@section('title', 'Страница лота')

@section('page-content')
<x-nav></x-nav>
<section class="lot-item container">
    <h2>{{ $lot->title }}</h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="/{{ $lot->url }}" width="730" height="548" alt="Сноуборд">
            </div>
            <p class="lot-item__category">Категория: <span>{{ $lot->category->title }}</span></p>
            <p class="lot-item__description">{{ $lot->description }}</p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    10:54
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost">{{ $lot->currentPrice() }}</span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span>{{ $lot->minBet() }}</span>
                    </div>
                </div>
                @if ($user_id !== null && (count($bets) === 0 || $bets[count($bets) - 1]->author->id !== $user_id))
                <form class="lot-item__form" action="{{ route('bets.store') }}" method="post" autocomplete="off">
                    @csrf
                    <p class="lot-item__form-item form__item @error('cost') form__item--invalid @enderror">
                        <input type="hidden" name="id" value="{{ $lot->id }}">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="text" name="cost" placeholder="{{ $lot->minBet() }}" value="{{ old('cost') }}">
                        @error('cost')
                            <span class="form__error">{{ $message }}</span>
                        @enderror
                    </p>
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
                @endif
            </div>
            <div class="history">
                <h3>История ставок (<span>{{ count($bets) }}</span>)</h3>
                <table class="history__list">
                    @foreach ($bets as $bet)
                        <tr class="history__item">
                            <td class="history__name">{{ $bet->author->name }}</td>
                            <td class="history__price">{{ $bet->bet_price }} р</td>
                            <td class="history__time">{{ $bet->formatDate() }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
