@php
$title = get_the_title() ?? false;

@endphp
<section class="c-single-post-hero" data-scroll-section>

  <div class="c-single-post-hero__box1"></div>
  <div class="l-inner">
    <div class="l-grid">
      <div data-scroll class="c-single-post-hero__box2 ui-slide-right"></div>
      <div data-scroll class="c-single-post-hero__title-wrapper ui-fade-left--group">
        <span>Artykuł</span>

        <h1 style="--i:2" class="c-single-post-hero__title">{{ $title }}</h1>
        <span style="--i:3">Opublikowano</span>
        <div style="--i:3" class="o-top-10">
          <time datetime="{{ get_post_time('c', true) }}">
            {{ get_the_date('F Y') }}
          </time>
        </div>
      </div>
      <div class="c-single-post-hero__img-wrapper">
        @if (!empty(get_the_post_thumbnail_url()))
          <img class="ui-img-full" src="{{ get_the_post_thumbnail_url() }}" alt="{{ $title }}">
        @else
          <div class="c-single-post-hero__error">Zdjęcie Thumbnail</div>
        @endif
      </div>
    </div>
  </div>
</section>
