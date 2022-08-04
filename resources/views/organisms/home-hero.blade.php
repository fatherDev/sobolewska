@php
$slides = $data['slides'] ?? [];
@endphp

@if ($slides)
  <section class="c-home-hero" data-scroll-section>
    <div class="c-home-hero__splide splide js-home-hero-splide">
      <div class="c-home-hero__track splide__track">
        <ul class="c-home-hero__list splide__list">
          @foreach ($slides as $slide)
            @php
              $title = $slide['title'] ?? '';
              $subtitle = $slide['subtitle'] ?? '';
              $mediumType = $slide['medium_type'] ?? 'img';
              $imgDesktop = $slide['img']['img_desktop'] ?? false;
              $imgMobile = $slide['img']['img_mobile'] ?? false;
              $videoDesktop = $slide['video']['video_desktop'] ?? false;
              $videoMobile = $slide['video']['video_mobile'] ?? false;
              $addOverlay = $slide['add_overlay'] ?? true;
              $addThumbnailOverlay = $slide['add_thumbnail_overlay'] ?? true;
              $barLabel = $slide['label'] ?? '';
              $barDesc = $slide['desc'] ?? '';
              $barBtn = $slide['btn'] ?? false;
              $barImg = $slide['thumbnail'] ?? false;
            @endphp

            <li class="c-home-hero__slide splide__slide">
              <div class="c-home-hero__inner l-inner">

                @if ($mediumType === 'img')
                  {{-- Slide picture --}}
                  <picture class="c-home-hero__slide-media c-home-hero__slide-media--picture">
                    <source srcset="{{ $imgDesktop['url'] ?? '' }}" media="(min-width: 768px)">
                    <img class="c-home-hero__picture-img" src="{{ $imgMobile['url'] ?? '' }}" alt="" />
                  </picture>

                  {{-- Slide Video --}}
                @elseif($mediumType === 'video')
                  <video class="c-home-hero__slide-media c-home-hero__slide-media--video" preload="auto" loop paused
                    playsinline muted data-desktop-vid="{{ $videoDesktop['url'] ?? '' }}"
                    data-mobile-vid="{{ $videoMobile['url'] ?? ($videoDesktop['url'] ?? '') }}">
                  </video>
                @endif

                {{-- Overlay --}}
                @if ($addOverlay)
                  <div class="c-home-hero__slide-overlay"></div>
                @endif

                {{-- Slide Title and subtitle --}}
                <div class="c-home-hero__grid l-grid">
                  <h1 class="c-home-hero__slide-title">{!! $title !!}</h1>
                  <h2 class="c-home-hero__slide-subtitle">{!! $subtitle !!}</h2>
                </div>
              </div>

              {{-- Info bar --}}
              <div class="c-home-hero__slide-info-bar">

                {{-- Slide progress bar --}}
                <div class="c-home-hero__progress">
                  <div class="c-home-hero__progress-bar js-home-hero-progress-bar"></div>
                </div>

                <div class="c-home-hero__slide-inner l-inner">
                  <span class="c-home-hero__slide-label">{!! $barLabel !!}</span>
                  <p class="c-home-hero__slide-desc">{!! $barDesc !!}</p>

                  {{-- Info bar button --}}
                  @if ($barBtn)
                    @include('atoms.btn', [
                        'class' => 'home-hero',
                        'title' => $barBtn['title'] ?? '',
                        'href' => $barBtn['url'] ?? '#',
                        'target' => $barBtn['target'] ?? '',
                    ])
                  @endif
                </div>

                @if ($barImg)
                  <div class="c-home-hero__slide-thumbnail-wrapper">

                    {{-- Info bar thumbnail --}}
                    <img class="c-home-hero__slide-thumbnail" src="{{ $barImg['url'] ?? '' }}"
                      alt="{{ $barImg['alt'] ?? '' }}">

                    {{-- Thumbnail overlay --}}
                    @if ($addThumbnailOverlay)
                      <div class="c-home-hero__slide-thumbnail-overlay"></div>
                    @endif
                  </div>
                @endif

              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </section>
@endif
