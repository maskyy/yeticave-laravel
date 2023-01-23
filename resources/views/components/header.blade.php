<header class="main-header">
    <div class="main-header__container container">
        <h1 class="visually-hidden">YetiCave</h1>
        <a class="main-header__logo" href=" {{ route('main-page') }}">
            <img src="/img/logo.svg" width="160" height="39" alt="Логотип компании YetiCave">
        </a>
        <form class="main-header__search" method="get" action="/search" autocomplete="off">
            <input type="search" name="search" placeholder="Поиск лота">
            <input class="main-header__search-btn" type="submit" name="find" value="Найти">
        </form>
        <a class="main-header__add-lot button" href="#">Добавить лот</a>
        <nav class="user-menu">
            @if(Auth::user())
                <div class="user-menu__logged">
                    <p>{{Auth::user()->name}}</p>
                    <a class="user-menu__bets user-menu" href="#">Мои ставки</a>
                    <a class="user-menu__logout" href="#">Выход</a>
                </div>
            @else
                <ul class="user-menu__list">
                    <li class="user-menu__item">
                        <a href="#">Регистрация</a>
                    </li>
                    <li class="user-menu__item">
                        <a href="#">Вход</a>
                    </li>
                </ul>
            @endif
        </nav>
    </div>
</header>
