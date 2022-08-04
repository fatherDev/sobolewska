@php
global $post;
$author_id = $post->post_author;

$profileImg = get_field('profile_img', 'user_' . $author_id) ?? false;

$cta = $fields['cta'] ?? false;
@endphp
@extends('organisms.app')

@section('content')
  @include('organisms.single-post-hero')
  <article class="c-single" data-scroll-section>
    <div class="l-inner">
      <div class="l-grid">
        <div class="c-single__author">
          <span>Autor</span>
          @if (!empty($profileImg))
            <div class="c-single__author-img">
              <img class="ui-img-full" src="{{ $profileImg['url'] }}" alt="{{ $profileImg['alt'] }}">
            </div>
          @endif
        </div>
        {!! the_content() !!}

      </div>
  </article>

  @include('organisms.cta', ['data' => $cta])
@endsection
