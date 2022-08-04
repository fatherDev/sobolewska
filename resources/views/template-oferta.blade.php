{{--
    Template Name: Szablon - Oferta
--}}

@php
$hero = $fields['hero'] ?? false;
$textBlockWithImg5 = $fields['text_block_with_img_5'] ?? false;
$info = $fields['info'] ?? false;
$textBlockWithImg = $fields['text_block_with_img'] ?? false;
$textBlockWithImg2 = $fields['text_block_with_img_2'] ?? false;
$video = $fields['video'] ?? false;
$textBlockWithImg3 = $fields['text_block_with_img_3'] ?? false;
$textBlockWithImg4 = $fields['text_block_with_img_4'] ?? false;
$cta = $fields['cta'] ?? false;
$testimonials = $fields['testimonials'] ?? false;
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.hero', [
      'data' => $hero,
  ])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg5])
  @include('organisms.info-cards-repeater', [
      'data' => $info,
  ])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg2])
  @include('organisms.video-modal', [
    'data' => $video,
    ])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg3])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg4])
  @include('organisms.cta', [
      'data' => $cta,
      'class' => 'c-cta__img-in-grid',
  ])
  @include('organisms.testimonials-repeater', ['data' => $testimonials])
@endsection
