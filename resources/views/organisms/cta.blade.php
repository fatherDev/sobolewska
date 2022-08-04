@php
$data = $data ?? '';
$class = $class ?? '';
@endphp

@if (!empty($data))
  <section data-scroll-section class="c-cta {{ $class ?? '' }}">
    @if ($class !== 'c-cta__img-in-grid')
      <img class="c-cta__img" src="{{ $data['img']['url'] ?? '' }}" alt="{{ $data['img']['alt'] ?? '' }}">
    @endif
    <div class="l-inner">
      <div class="c-cta__inner l-grid">
        @if ($class === 'c-cta__img-in-grid')
          <img class="c-cta__img" src="{{ $data['img']['url'] ?? '' }}" alt="{{ $data['img']['alt'] ?? '' }}">
        @endif
        <div class="c-cta__col ui-fade-right--group" data-scroll data-scroll-offset="40%">
          <p class="c-cta__label" data-scroll-target=".c-cta__col">{{ $data['label'] ?? '' }}</p>
          <p class="c-cta__title" data-scroll-target=".c-cta__col" style="--i:1">{!! $data['title'] ?? '' !!}</p>
          <p class="c-cta__desc" data-scroll-target=".c-cta__col" style="--i:2">{!! $data['desc'] ?? '' !!}</p>

          <div class="c-cta__btn c-btn c-btn--white" data-scroll-target=".c-cta__col" style="--i:3">
            @include('atoms.btn', [
                'title' => $data['btn']['title'] ?? '',
                'href' => $data['btn']['url'] ?? '',
                'class' => 'white',
            ])
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
