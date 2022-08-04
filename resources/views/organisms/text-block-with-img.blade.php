@php
$variant = $data['variant'] ?? 1;
$class = $class ?? '';
@endphp

<section class="c-text-block-with-img{{ $class ? ' ' . $class : '' }}" data-scroll-section>
  @if ($variant === '1')
    @include('molecules.text-block-with-img-variant-1', [
        'data' => $data,
        'className' => 'c-text-block-with-img__variant',
        'accent' => 'box',
    ])
  @elseif ($variant === '2')
    @include('molecules.text-block-with-img-variant-1', [
        'data' => $data,
        'className' => 'c-text-block-with-img__variant',
        'accent' => 'two-boxes',
    ])
  @elseif ($variant === '3')
    @include('molecules.text-block-with-img-variant-2', [
        'data' => $data,
        'className' => 'c-text-block-with-img__variant',
        'accent' => 'left-right-boxes',
    ])
  @elseif ($variant === '4')
    @include('molecules.text-block-with-img-variant-2', [
        'data' => $data,
        'className' => 'c-text-block-with-img__variant',
        'accent' => 'two-right-boxes',
    ])
  @elseif ($variant === '5')
    @include('molecules.text-block-with-img-variant-3', [
        'data' => $data,
        'className' => 'c-text-block-with-img__variant',
        'accent' => 'two-boxes',
    ])
  @endif
</section>
