@php
$data = $data ?? false;
@endphp

@if ($data && !empty($data['quote']))
  <div class="c-testimonial {{ $class ?? 'c-testimonial--dark' }}" data-scroll data-scroll-offset="40%">
    @include('icon::quote', ['class' => 'c-testimonial__quote'])

    <p class="c-testimonial__desc">{!! $data['quote'] !!}</p>

    @if (!empty($data['name']))
      <span class="c-testimonial__name">{{ $data['name'] }}</span>
    @endif
  </div>
@endif
