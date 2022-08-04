@php
$class = $className ?? '';
$title = $title ?? '';
$imgURL = $imgURL ?? '';
$href = $href ?? '';
$HTMLElement = $href ? 'a' : 'div';
@endphp

<{{ $HTMLElement }} {{ $href ? 'href=' . $href : '' }} class="c-link-card{{ $class ? ' ' . $class : '' }}"
  data-scroll data-scroll-offset="30%">
  @if (!empty($imgURL))
    <img src="{{ $imgURL }}" class="c-link-card__img">
  @endif
  <div class="c-link-card__wrapper">
    <h3 class="c-link-card__title">{!! $title !!}</h3>
  </div>
  </{{ $HTMLElement }}>
