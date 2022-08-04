@php
$hero = $fields['hero'] ?? false;
$miniTextRepeater = $fields['mini_text_blocks'] ?? '';
$linkCards = $fields['link_cards'] ?? false;
$textBlockWithImg1 = $fields['text_block_with_img_1'] ?? false;
$textBlockWithImg2 = $fields['text_block_with_img_2'] ?? false;
$textBlockWithImg3 = $fields['text_block_with_img_3'] ?? false;
$newsSection = $fields['news'] ?? false;
$partnersSection = $fields['partners'] ?? false;
$testimonials = $fields['testimonials'] ?? false;
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.home-hero', ['data' => $hero])
  @include('organisms.mini-text-blocks-repeater', ['data' => $miniTextRepeater])
  @include('organisms.link-cards-repeater', ['data' => $linkCards])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg1])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg2])
  @include('organisms.text-block-with-img', ['data' => $textBlockWithImg3])
  @include('organisms.related-news', ['data' => $newsSection])
  @include('organisms.partners', ['data' => $partnersSection])
  @include('organisms.testimonials-repeater', ['data' => $testimonials])
@endsection
