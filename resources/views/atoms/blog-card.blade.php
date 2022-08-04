@php
$class = $className ?? false;
$title = $title ?? false;
$subtitle = $subtitle ?? false;
$desc = $desc ?? false;
$href = $href ?? false;

$HTMLElement = $href ? 'a' : 'div';
@endphp

<article>
  <{{ $HTMLElement }} {{ $href ? 'href=' . $href : '' }} class="c-blog-card {{ $class ? $class : '' }}">
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
    </{{ $HTMLElement }}>
</article>
