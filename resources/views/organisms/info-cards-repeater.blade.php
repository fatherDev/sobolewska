@php
$data = $data ?? '';
@endphp

@if (!empty($data))
  <section data-scroll-section class="c-info-repeater">
    <div class="l-inner">
      <div class="c-info-repeater__inner">
        <div class="c-info-repeater__wrapper">
          <p class="c-info-repeater__label">{{ $data['label'] ?? '' }}</p>
        </div>
        <div class="c-info-repeater__splide splide js-info-splide">
          <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev">
              @include('icon::long-arrow')
            </button>
            <button class="splide__arrow splide__arrow--next">
              @include('icon::long-arrow')
            </button>
          </div>
          <div class="c-info-repeater__track splide__track">
            <ul class="c-info-repeater__list splide__list">
              @if ($data['info_repeater'])
                @foreach ($data['info_repeater'] ?? [] as $item)
                  <li class="c-info-card splide__slide">
                    <img class="c-info-card__img" src="{{ $item['img']['url'] ?? '' }}"
                      alt="{{ $item['img']['alt'] ?? '' }}">
                    <div class="c-info-card__wrapper">
                      <p class="c-info-card__label">{{ $item['label'] ?? '' }}</p>
                      <p class="c-info-card__title">{{ $item['title'] ?? '' }}</p>
                      <p class="c-info-card__content">{{ $item['content'] ?? '' }}</p>
                    </div>
                  </li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
