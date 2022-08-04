@php
$title = $fields['title'] ?? get_the_title();
$desc = $fields['desc'] ?? false;

@endphp


@extends('organisms.app')

@section('content')
  <section class="c-page-contact" data-scroll-section>
    <div class="l-inner">
      <div class="l-grid">
        <div class="c-page-contact__content">
          <h1 class="c-page-contact__title">{!! $title !!}</h1>
          @if (!empty($desc))
            <p>{!! $desc !!}</p>
          @endif

          @include('organisms.contact-data')
        </div>

        <div class="c-page-contact__form">
          {!! do_shortcode('[contact-form-7 id="188" title="Kontakt"]') !!}
        </div>
      </div>
    </div>
  </section>
@endsection
