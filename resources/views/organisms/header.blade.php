<header class="l-header">
  <div class="l-inner">
    <div class="l-header__inner">
      <a class="ui-link" href="{{ home_url('/') }}">
        @include('icon::logo')
      </a>
      {{-- @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'c-nav__list js-nav-list', 'echo' => false]) !!}
        </nav>
      @endif --}}
      @include('molecules.custom-menu')
      <div class="js-toggle-menu c-hamburger">
        <div class="c-hamburger__line c-hamburger__line--top"></div>
        <div class="c-hamburger__line c-hamburger__line--middle"></div>
        <div class="c-hamburger__line c-hamburger__line--bottom"></div>
      </div>
    </div>
  </div>
</header>
