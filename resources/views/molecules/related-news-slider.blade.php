@php
$query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
]);

$posts = $query->posts;
@endphp

@if (!empty($posts))
  <div class="c-related-news-slider splide js-related-news-splide">
    {{-- Arrows --}}
    <div class="splide__arrows">
      <button class="splide__arrow splide__arrow--prev">
        @include('icon::long-arrow')
      </button>
      <button class="splide__arrow splide__arrow--next">
        @include('icon::long-arrow')
      </button>
    </div>

    {{-- Slider --}}
    <div class="c-related-news-slider__track splide__track">
      <ul class="c-related-news-slider__list splide__list">

        @foreach ($posts as $post)
          <li class="c-related-news-slider__slide splide__slide">
            @include('atoms.blog-card', [
                'title' => get_the_title($post),
                'subtitle' => get_field('subtitle', $post),
                'href' => get_the_permalink($post),
                'desc' => !empty(get_field('desc', $post))
                    ? wp_trim_words(get_field('desc', $post), 30, '...')
                    : wp_trim_words($post->post_content, 30, '...'),
            ])
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif
