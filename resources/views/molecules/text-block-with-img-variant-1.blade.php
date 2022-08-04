@php
$class = $className ?? '';
$textBlock = $data['text_block'] ?? '';
$textBlockTitle = $textBlock['title'] ?? '';
$textBlockDesc1 = $textBlock['desc1'] ?? '';
$textBlockDesc2 = $textBlock['desc2'] ?? '';
$img = $data['img'] ?? '';
$accent = $accent ?? 'box';
$uniqueClass = 'c-text-block-with-img-variant-1-' . rand();
@endphp

@if ($textBlockTitle || $textBlockDesc1 || $textBlockDesc2 || $img)
  <div
    class="c-text-block-with-img-variant-1 {{ $uniqueClass }}{{ $class ? ' ' . $class : '' }}{{ $accent === 'two-boxes' ? ' c-text-block-with-img-variant-1--two-boxes' : '' }}"
    data-scroll data-scroll-offset="30%">
    <div class="c-text-block-with-img-variant-1__inner l-inner">
      <div class="c-text-block-with-img-variant-1__container c-text-block-with-img__variant-container">
        <div class="c-text-block-with-img-variant-1__grid l-grid">

          {{-- Text block --}}
          <div class="c-text-block-with-img-variant-1__text-block-wrapper">
            @include('molecules.text-block', [
                'data' => $textBlock,
                'HTMLElement' => 'h4',
                'scrollTarget' => '.' . $uniqueClass,
            ])
          </div>

          {{-- Image --}}
          @if ($img)
            <div class="c-text-block-with-img-variant-1__img-wrapper">
              <img class="c-text-block-with-img-variant-1__img" src="{{ $img['url'] ?? '' }}"
                alt="{{ $img['alt'] ?? '' }}">

              {{-- Accents --}}
              @if ($accent === 'box')
                <div class="c-text-block-with-img-variant-1__accent c-text-block-with-img-variant-1__accent--box"
                  aria-hidden="true">
                  <div class="c-text-block-with-img-variant-1__accent-inner ui-fade-left" data-scroll
                    data-scroll-target=".{{ $uniqueClass }}" style="--i:1"></div>
                </div>
              @elseif ($accent === 'two-boxes')
                <div class="c-text-block-with-img-variant-1__accent c-text-block-with-img-variant-1__accent--box-smaller"
                  aria-hidden="true">
                  <div class="c-text-block-with-img-variant-1__accent-inner ui-fade-left" data-scroll
                    data-scroll-target=".{{ $uniqueClass }}" style="--i:1"></div>
                </div>
                <div class="c-text-block-with-img-variant-1__accent c-text-block-with-img-variant-1__accent--box-bigger"
                  aria-hidden="true">
                  <div class="c-text-block-with-img-variant-1__accent-inner ui-fade-right" data-scroll
                    data-scroll-target=".{{ $uniqueClass }}" style="--i:1"></div>
                </div>
              @endif
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endif
