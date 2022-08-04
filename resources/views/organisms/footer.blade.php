@php
$contactData = get_field('contact_data', 'option') ?? '';
$socials = get_field('socials_repeater', 'option') ?? '';
@endphp

<footer data-scroll-section class="l-footer js-footer">
  <div class="l-inner">
    <div class="l-footer__wrapper">
      <div class="l-grid">

        <div class="l-footer__logo">
          <a href="{{ home_url('/') }}">
            @include('icon::logo')
          </a>
        </div>
        <div class="l-footer__box">

          <div class="l-footer__mobile-column">
            <p class="l-footer__heading ui-hide-mobile-tablet">Oferta</p>
            @if (has_nav_menu('footer_offer_navigation'))
              <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('footer_offer_navigation') }}">
                {!! wp_nav_menu(['theme_location' => 'footer_offer_navigation', 'container' => false, 'menu_class' => 'l-footer__offer-nav', 'echo' => false]) !!}
              </nav>
            @endif
          </div>

          <div class="l-footer__mobile-row">
            <p class="l-footer__heading ui-hide-mobile-tablet">Menu</p>
            @if (has_nav_menu('footer_navigation'))
              <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
                {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'container' => false, 'menu_class' => 'l-footer__nav', 'echo' => false]) !!}
              </nav>
            @endif
          </div>

          <div class="l-footer__mobile-column">
            <p class="l-footer__heading">Dane kontaktowe</p>
            @if ($contactData['mail_repeater'])
              @foreach ($contactData['mail_repeater'] ?? [] as $item)
                <div class="l-footer__link">
                  <a href="mailto:{{ $item['e-mail'] ?? '' }}">{{ $item['e-mail'] ?? '' }}</a>
                </div>
              @endforeach
            @endif
            @if ($contactData['phone_repeater'])
              @foreach ($contactData['phone_repeater'] ?? [] as $item)
                <div class="l-footer__link">
                  <a href="tel:{{ $item['phone'] ?? '' }}">{{ $item['phone'] ?? '' }}</a>
                </div>
              @endforeach
            @endif
          </div>

          <div class="l-footer__mobile-row">
            <p class="l-footer__heading ui-hide-mobile-tablet">Subskrybuj</p>
            @if ($socials)
              @foreach ($socials ?? [] as $item)
                <div class="l-footer__link">
                  <a href="{{ $item['url'] ?? '' }}" target="_blank">{{ $item['name'] ?? '' }}</a>
                </div>
              @endforeach
            @endif
          </div>
        </div>

      </div>
      <div class="l-footer__bottom-bar">
        <a class="l-footer__prograffing" target="_blank" href="https://prograffing.pl/strony-internetowe/">
          <span>Projektowanie</span>
          @include('icon::logo-prograffing')
        </a>
      </div>
    </div>
  </div>
</footer>
