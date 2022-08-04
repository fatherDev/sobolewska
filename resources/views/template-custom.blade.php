{{--
  Template Name: Custom Template
--}}

@extends('organisms.app')

@section('content')
  @while (have_posts()) @php(the_post())
    @include('atoms.page-header')
    @include('molecules.content-page')
  @endwhile
@endsection
