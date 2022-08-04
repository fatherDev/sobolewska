@php
$data = $data ?? '';
@endphp

@if (!empty($data))
  <section data-scroll-section class="c-hero">
    <div class="l-inner">
      <div class="c-hero__inner l-grid">
        <div class="c-hero__col c-hero__col--left">
          <p class="c-hero__label" data-scroll>{{ $data['hero_label'] ?? '' }}</p>
          @include('molecules.text-block', [
              'data' => $data['text_block'] ?? '',
              'HTMLElement' => 'h1',
              'animationDirection' => 'left',
          ])
          <div class="c-hero__links-wrapper" data-scroll>
            @if (!empty($data['links_repeater']))
              @foreach ($data['links_repeater'] ?? '' as $item)
                <div class="c-hero__link-item">
                  <a href="{{ $item['link']['url'] ?? '' }}" class="c-hero__link">
                    {{ $item['link']['title'] ?? '' }}
                  </a>
                </div>
              @endforeach
            @endif
          </div>
        </div>
        <div class="c-hero__col c-hero__col--right">
          <div data-scroll class="c-hero__img-wrapper">
            <img data-scroll class="c-hero__img" src="{{ $data['img']['url'] ?? '' }}"
              alt="{{ $data['img']['alt'] ?? '' }}">
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
