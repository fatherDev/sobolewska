@php
$data = $data ?? '';
@endphp

@if (!empty($data['video'] || $data['link']))
  <section data-scroll-section class="c-video-modal">
    <div class="l-inner">
      <div class="c-video-modal__inner l-grid">
        @if (!empty($data['poster']))
          <div class="c-video-modal__poster-wrapper">
            <img class="c-video-modal__poster" src="{{ $data['poster']['url'] ?? '' }}" alt="">
          </div>
        @endif
        <div class="c-video-modal__col ui-fade-right--group" data-scroll data-scroll-offset="40%">
          <p class="c-video-modal__title" data-scroll-target=".c-video-modal__col">{!! $data['title'] ?? '' !!}</p>
          @if ($data['video_type'] === 'Link do youtube')
            <button data-scroll-target=".c-video-modal__col" style="--i:1"
              class="c-video-modal__trigger c-video-modal__trigger--link js-video-trigger js-video-trigger--link"
              data-src="{{ $data['link'] }}">
              zobacz video
              @include('icon::play')
            </button>
          @elseif ($data['video_type'] === 'Plik')
            <button data-scroll-target=".c-video-modal__col" style="--i:1"
              class="c-video-modal__trigger c-video-modal__trigger--file js-video-trigger js-video-trigger--file"
              data-src="{{ $data['video']['url'] ?? '' }}">
              zobacz video
              @include('icon::play')
            </button>
          @endif
        </div>
      </div>
    </div>
  </section>
@endif
