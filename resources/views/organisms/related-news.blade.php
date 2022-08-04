@php
$data = $data ?? false;
@endphp

@if (!empty($data))
  <section class="c-related-news" data-scroll-section>
    <div class="c-related-news__wrapper">
      <div class="l-inner">
        <div class="l-grid">
          <div data-scroll class="c-related-news__title-wrapper ui-fade-left--group">
            @if (!empty($data['subtitle']))
              <span class="t-typo-p2 ui-color--light">{{ $data['subtitle'] }}</span>
            @endif

            @if (!empty($data['title']))
              <h2 style="--i:1" class="c-related-news__title">{!! $data['title'] !!}</h2>
            @endif

            @if (!empty($data['btn']))
              <div style="--i:2" class="c-related-news__btn">
                @include('atoms.btn', [
                    'title' => $data['btn']['title'],
                    'href' => $data['btn']['url'],
                    'class' => 'dark',
                ])
              </div>
            @endif
          </div>

          <div class="c-related-news__img-wrapper">
            @if ($data['img'])
              <img class="ui-img-full" src="{{ $data['img']['url'] }}" alt="{{ $data['img']['alt'] }}">
            @else
              <div class="ui-img-full ui-bg--primary"></div>
            @endif
          </div>
        </div>

        <div class="o-tablet-top-100 o-top-40">
          @include('molecules.related-news-slider')
        </div>
      </div>
    </div>
  </section>
@endif
