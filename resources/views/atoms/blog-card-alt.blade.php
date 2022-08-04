@php
$pageID = get_queried_object_id();

$title = get_the_title($pageID) ?? false;
$subtitle = get_field('subtitle', $pageID) ?? false;
$desc = !empty(get_field('desc', $pageID)) ? wp_trim_words(get_field('desc', $pageID), 30, '...') : wp_trim_words(get_the_content($pageID), 30, '...');
$href = get_the_permalink($pageID) ?? false;

@endphp

<article>
  <a href={{ $href }} class="c-blog-card">
    <div class="c-blog-card__wrapper">
      @if (!empty($subtitle))
        <span class="c-blog-card__subtitle">{{ $subtitle }}</span>
      @endif

      @if (!empty($title))
        <h3 class="c-blog-card__title {{ empty($subtitle) ? 'o-tablet-top-25 o-top-20' : '' }}">{!! $title !!}
        </h3>
      @endif

      @if (!empty($desc))
        <p>{!! $desc !!}</p>
      @endif
    </div>
  </a>
</article>
