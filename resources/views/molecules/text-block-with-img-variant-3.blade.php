@php
$class = $className ?? '';
$textBlock = $data['text_block'] ?? '';
$textBlockTitle = $textBlock['title'] ?? '';
$textBlockDesc1 = $textBlock['desc1'] ?? '';
$textBlockDesc2 = $textBlock['desc2'] ?? '';
$img = $data['img'] ?? '';
$accent = $accent ?? 'two-boxes';
$uniqueClass = 'c-text-block-with-img-variant-2-' . rand();
@endphp

@if ($textBlockTitle || $textBlockDesc1 || $textBlockDesc2 || $img)
  <div class="c-text-block-with-img-variant-3 {{ $uniqueClass }}{{ $class ? ' ' . $class : '' }}" data-scroll
    data-scroll-offset="30%">
    <div class="c-text-block-with-img-variant-3__inner l-inner">
      <div class="c-text-block-with-img-variant-3__container c-text-block-with-img__variant-container">
        <div class="c-text-block-with-img-variant-3__grid l-grid">
          {{-- Text block --}}
          <div class="c-text-block-with-img-variant-3__text-block-wrapper">
            @include('molecules.text-block', [
                'data' => $textBlock,
                'HTMLElement' => 'h4',
                'scrollTarget' => '.' . $uniqueClass,
                'animationDirection' => 'right',
            ])
          </div>

          {{-- Image --}}
          @if ($img)
            <div class="c-text-block-with-img-variant-3__img-wrapper">
              <img class="c-text-block-with-img-variant-3__img" src="{{ $img['url'] ?? '' }}"
                alt="{{ $img['alt'] ?? '' }}">

              {{-- Accents --}}
              @if ($accent === 'two-boxes')
                <div class="c-text-block-with-img-variant-3__accent c-text-block-with-img-variant-3__accent--box-smaller"
                  aria-hidden="true">
                  <div class="c-text-block-with-img-variant-3__accent-inner ui-fade-left" data-scroll
                    data-scroll-target=".{{ $uniqueClass }}" style="--i:1"></div>
                </div>
                <div class="c-text-block-with-img-variant-3__accent c-text-block-with-img-variant-3__accent--box-bigger"
                  aria-hidden="true"></div>
              @endif
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endif
