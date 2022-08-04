@php
$data = $data ?? '';
@endphp

@if (!empty($data))
  <div class="c-video-modal__wrapper js-video-wrapper">
    @include('icon::close', ['class' => 'c-video-modal__close js-video-close'])
    @if ($data['video_type'] === 'Plik')
      <video class="c-video-modal__video js-video" src="" preload="metadata" loop="" muted="" playsinline="">
      </video>
    @elseif ($data['video_type'] === 'Link do youtube')
      <iframe class="c-video-modal__video js-video" src="" frameborder="0">
      </iframe>
    @endif
  </div>
@endif
