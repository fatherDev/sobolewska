@php
$class = $className ?? '';
$textBlock = $data['text_block'] ?? '';
$textBlockTitle = $textBlock['title'] ?? '';
$textBlockDesc1 = $textBlock['desc1'] ?? '';
$textBlockDesc2 = $textBlock['desc2'] ?? '';
$img = $data['img'] ?? '';
$accent = $accent ?? 'left-right-boxes';
$uniqueClass = 'c-text-block-with-img-variant-2-' . rand();
@endphp

@if ($textBlockTitle || $textBlockDesc1 || $textBlockDesc2 || $img)
  <div class="c-text-block-with-img-variant-2 {{ $uniqueClass }}{{ $class ? ' ' . $class : '' }}" data-scroll
    data-scroll-offset="30%">
    <div class="c-text-block-with-img-variant-2__inner l-inner">
      <div class="c-text-block-with-img-variant-2__container">
        <div class="c-text-block-with-img-variant-2__grid l-grid">
          {{-- Text block --}}
          <div class="c-text-block-with-img-variant-2__text-block-wrapper">
            @include('molecules.text-block', [
                'data' => $textBlock,
                'HTMLElement' => 'h4',
                'scrollTarget' => '.' . $uniqueClass,
                'animationDirection' => 'left',
            ])
          </div>

          {{-- Image --}}
          @if ($img)
            <div class="c-text-block-with-img-variant-2__img-wrapper">
              <img class="c-text-block-with-img-variant-2__img" src="{{ $img['url'] ?? '' }}"
                alt="{{ $img['alt'] ?? '' }}">

              {{-- Accents --}}
              @if ($accent === 'left-right-boxes')
                <div class="c-text-block-with-img-variant-2__accent c-text-block-with-img-variant-2__accent--box-smaller"
                  aria-hidden="true">
                  <div class="c-text-block-with-img-variant-2__accent-inner ui-fade-left" data-scroll
                    data-scroll-target=".{{ $uniqueClass }}" style="--i:1"></div>
                </div>
                <div class="c-text-block-with-img-variant-2__accent c-text-block-with-img-variant-2__accent--box-bigger"
                  aria-hidden="true">
                  <div class="c-text-block-with-img-variant-2__accent-inner ui-fade-right" data-scroll
                    data-scroll-target=".{{ $uniqueClass }}" style="--i:1"></div>
                </div>
              @elseif($accent === 'two-right-boxes')
                <div
                  class="c-text-block-with-img-variant-2__accent c-text-block-with-img-variant-2__accent--right-box-smaller"
                  aria-hidden="true">
                  <div class="c-text-block-with-img-variant-2__accent-inner"></div>
                </div>
                <div class="c-text-block-with-img-variant-2__accent c-text-block-with-img-variant-2__accent--box-bigger"
                  aria-hidden="true">
                  <div class="c-text-block-with-img-variant-2__accent-inner ui-fade-right" data-scroll
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
{{-- <div class="c-text-block-with-img-variant-2__accent-inner ui-fade-left" data-scroll
  data-scroll-target=".{{ $uniqueClass }}" style="--i:1"></div> --}}
