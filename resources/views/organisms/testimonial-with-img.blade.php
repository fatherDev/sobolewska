@php
$data = $data ?? false;
@endphp

@if (!empty($data))
  <section class="c-testimonial-with-img" data-scroll-section>
    <div class="l-inner">
      <div class="c-testimonial-with-img__wrapper">
        <div class="c-testimonial-with-img__content-wrapper">
          <div class="l-grid">
            <div style="background-color: {{ $data['bg'] }}"
              class="c-testimonial-with-img__content ui-fade-left--group" data-scroll data-scroll-offset="30%">
              @if (!empty($data['testimonial']))
                <div class="c-testimonial-with-img__img" data-scroll-target=".c-testimonial-with-img__content">
                  @include('icon::quote', ['class' => 'c-testimonial-with-img__quote'])
                </div>
                <p class="t-typo-h3 o-bot-40" data-scroll-target=".c-testimonial-with-img__content" style="--i:1">
                  {!! $data['testimonial'] !!}</p>
                @if (!empty($data['name']))
                  <span class="t-typo-p2" data-scroll-target=".c-testimonial-with-img__content"
                    style="--i:2">{{ $data['name'] }}</span>
                @endif
              @endif
            </div>
          </div>
        </div>

        <div class="c-testimonial-with-img__bg-wrapper">
          <div class="l-grid">
            <div class="c-testimonial-with-img__bg">
              @if (!empty($data))
                <img class="c-testimonial-with-img__img ui-img-full" src="{{ $data['img']['url'] }}"
                  alt="{{ $data['img']['alt'] }}">
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
