@extends('organisms.app')

@section('content')
  @while (have_posts()) @php(the_post())
    @include('atoms.page-header')
    @includeFirst(['molecules.content-page', 'molecules.content'])
  @endwhile
@endsection
