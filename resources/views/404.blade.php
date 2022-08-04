@extends('organisms.app')

@section('content')
  @include('atoms.page-header')

  @if (!have_posts())
    {!! get_search_form(false) !!}
  @endif
@endsection
