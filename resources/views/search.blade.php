@extends('organisms.app')

@section('content')
  @include('atoms.page-header')

  @if (!have_posts())
    {!! get_search_form(false) !!}
  @endif

  @while (have_posts()) @php(the_post())
    @include('molecules.content-search')
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection
