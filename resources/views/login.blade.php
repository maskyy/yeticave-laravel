@extends('layout')

@section('title', 'Вход')

@section('page-content')
    <x-nav></x-nav>
    <form class="form container @if ($errors->any()) form-invalid @endif"
    action="{{ route('login') }}" method="post">
      @csrf
      <h2>Вход</h2>
      <div class="form__item @error('email') form__item--invalid @enderror"> <!-- form__item--invalid -->
        <label for="email">E-mail <sup>*</sup></label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="{{ old('email') }}">
        @error('email')
          <span class="form__error">Введите e-mail</span>
        @enderror
      </div>
      <div class="form__item form__item--last
          @error('password') form__item--invalid @enderror
          @error('auth_error') form__item--invalid @enderror">
        <label for="password">Пароль <sup>*</sup></label>
        <input id="password" type="password" name="password" placeholder="Введите пароль">
        @error('password')
          <span class="form__error">Введите пароль</span>
        @enderror
        @error('auth_error')
          <span class="form__error">{{ $message }}</span>
        @enderror
      </div>
      <button type="submit" class="button">Войти</button>
    </form>
@endsection
