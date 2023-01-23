<nav class="nav">
      <ul class="nav__list container">
        @foreach ($categories as $category)
            <li class="nav__item">
            <a href="{{ route('category-search', ['id' => $category->id]) }}">{{ $category->title }}</a>
            </li>
        @endforeach
      </ul>
    </nav>
