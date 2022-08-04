<ul class="c-testimonials-pagination">
  @foreach ($testimonials['repeater'] as $item)
    <li class="c-testimonials-pagination__item c-testimonials-pagination__item--active js-pagination-btn"
      data-paginationid="{{ $loop->index }}">
      <svg class="c-testimonials-pagination__svg {{ $class ?? '' }}" viewBox="0 0 95 95" fill="none">
        <circle class="c-testimonials-pagination__circle js-circle" cx="47.5" cy="47.5" r="47" stroke="currentColor" />
      </svg>

      <button class="c-testimonials-pagination__box ">
        @if ($item['img'])
          <img class="ui-img-full" src="{{ $item['img']['url'] }}"
            alt="{{ !empty($item['img']['alt']) ? $item['img']['alt'] : $item['testimonial']['name'] }}">
        @else
          @include('icon::person')
        @endif
      </button>
    </li>
  @endforeach
</ul>
