@php
$data = $data ?? false;
$HTMLElement = $HTMLElement ?? 'h2';
$scrollTarget = $scrollTarget ?? '';
$uniqueClass = 'c-text-block-' . rand();
$animationDirection = $animationDirection ?? 'right';
@endphp

@if (!empty($data))
  <div
    class="c-text-block {{ $uniqueClass }} {{ $class ?? '' }} {{ $animationDirection === 'left' ? 'ui-fade-left--group' : 'ui-fade-right--group' }}"
    {{ $scrollTarget ? 'data-scroll data-scroll-target=' . $scrollTarget : 'data-scroll data-scroll-offset=30%' }}>
    @if (!empty($data['title']))
      <{{ $HTMLElement }} class="c-text-block__title"
        data-scroll-target="{{ $scrollTarget ? $scrollTarget : '.' . $uniqueClass }}">
        {!! $data['title'] !!}
        </{{ $HTMLElement }}>
    @endif

    @if (!empty($data['desc1']))
      <div class="c-text-block__desc1" data-scroll-target=".{{ $uniqueClass }}" style="--i:1">
        {!! $data['desc1'] !!}
      </div>
    @endif

    @if (!empty($data['desc2']))
      <div class="c-text-block__desc2" data-scroll-target=".{{ $uniqueClass }}" style="--i:2">
        {!! $data['desc2'] !!}
      </div>
    @endif

    @if (!empty($data['btn']))
      <div class="c-text-block__btn" data-scroll-target=".{{ $uniqueClass }}" style="--i:3">
        @include('atoms.btn', [
            'title' => $data['btn']['title'],
            'href' => $data['btn']['url'],
        ])
      </div>
    @endif
  </div>
@endif
