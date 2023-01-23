@extends('layout')

@section('title', 'Регистрация')

@section('page-content')
    <x-nav></x-nav>
    <form class="form container @if ($errors->any()) form--invalid @endif" action="{{ route('signup') }}" method="post" autocomplete="off">
      @csrf
      <h2>Регистрация нового аккаунта</h2>
      <div class="form__item @error('email') form__item--invalid @enderror">
        <label for="email">E-mail <sup>*</sup></label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="{{ old('email') }}">
        @error('email')
            <span class="form__error">Введите e-mail</span>
        @enderror
      </div>
      <div class="form__item @error('password') form__item--invalid @enderror">
        <label for="password">Пароль <sup>*</sup></label>
        <input id="password" type="password" name="password" placeholder="Введите пароль" value="{{ old('password') }}">
        @error('password')
            <span class="form__error">Введите пароль</span>
        @enderror
      </div>
      <div class="form__item @error('name') form__item--invalid @enderror">
        <label for="name">Имя <sup>*</sup></label>
        <input id="name" type="text" name="name" placeholder="Введите имя" value="{{ old('name') }}">
        @error('name')
            <span class="form__error">Введите имя</span>
        @enderror
      </div>
      <div class="form__item @error('message') form__item--invalid @enderror">
        <label for="message">Контактные данные <sup>*</sup></label>
        <textarea id="message" name="message" placeholder="Напишите как с вами связаться" value="{{ old('message') }}"></textarea>
        @error('message')
            <span class="form__error">Напишите как с вами связаться</span>
        @enderror
      </div>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" class="button">Зарегистрироваться</button>
      <a class="text-link" href="#">Уже есть аккаунт</a>
    </form>
@endsection
