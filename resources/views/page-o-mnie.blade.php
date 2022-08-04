@php
$hero = $fields['hero'] ?? false;
$textBlockWithImg2 = $fields['text_block_with_img_2'] ?? false;
$textBlockWithImg = $fields['text_block_with_img'] ?? false;
$video = $fields['video'] ?? false;
$quote = $fields['quote'] ?? false;
$cta = $fields['cta'] ?? false;
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.hero', [
      'data' => $hero,
  ])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg2])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg])
  @include('organisms.video-modal', [
      'data' => $video,
  ])
  <section data-scroll-section>
    @include('molecules.testimonial', ['data' => $quote, 'class' => 'c-testimonial--light'])
  </section>
  @include('organisms.cta', [
      'data' => $cta,
  ])
@endsection
