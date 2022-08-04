@php
$hero = $fields['hero'] ?? false;
$textBlockWithImg7 = $fields['img_text_block_7'] ?? false;
$info = $fields['info'] ?? false;
$textBlockWithImg1 = $fields['img_text_block_1'] ?? false;
$textBlockWithImg4 = $fields['img_text_block_4'] ?? false;
$quote = $fields['quote'] ?? false;
$textBlockWithImg2 = $fields['img_text_block_2'] ?? false;
$textBlockWithImg6 = $fields['img_text_block_6'] ?? false;
$textBlockWithImg3 = $fields['img_text_block_3'] ?? false;
$textBlockWithImg5 = $fields['img_text_block_5'] ?? false;
$cta = $fields['cta'] ?? false;
$video = $fields['video'] ?? false;
$partners = $fields['partners'] ?? false;
$testimonials = $fields['testimonials'] ?? false;
@endphp


@extends('organisms.app')

@section('content')
  @include('organisms.hero', ['data' => $hero])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg7])
  @include('organisms.info-cards-repeater', ['data' => $info])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg1])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg4])
  @include('organisms.testimonial-with-img', ['data' => $quote])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg2])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg6])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg3])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg5])
  @include('organisms.cta', ['data' => $cta])
  @include('organisms.video-modal', ['data' => $video])
  @include('organisms.partners', ['data' => $partners])
  @include('organisms.testimonials-repeater', ['data' => $testimonials])
@endsection
