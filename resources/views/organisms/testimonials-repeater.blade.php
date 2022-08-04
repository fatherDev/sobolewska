@php
$testimonials = $testimonials ?? false;
@endphp


@if ($testimonials && !empty($testimonials['repeater']))
  <section class="c-testimonials-repeater js-testimonials-repeater" data-scroll-section>

    <div class="c-testimonials-repeater__splide splide js-testimonial-splide">
      <div class="c-testimonials-repeater__track splide__track">

        <ul class="c-testimonials-repeater__list splide__list">
          @foreach ($testimonials['repeater'] as $item)
            <li data-pagination-id="{{ $loop->index }}"
              class="c-testimonials-repeater__slide splide__slide js-testimonial-slide">
              @include('molecules.testimonial', ['data' => $item['testimonial']])
            </li>
          @endforeach
        </ul>

      </div>
    </div>

    <div class="c-testimonials__pagination">
      @include('molecules.testimonials-pagination')
    </div>

  </section>
@endif
