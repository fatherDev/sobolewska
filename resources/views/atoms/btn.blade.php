@php
$class = $class ?? false;
@endphp
<a class="c-btn {{ $class ? 'c-btn--' . $class : '' }}" href="{{ $href ?? '' }}" target="{{ $target ?? '' }}">
  <span>
    {{ $title ?? '' }}
  </span>
  @include('icon::arrow')
</a>
