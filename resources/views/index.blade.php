@php
$pageID = get_queried_object_id();
$title = get_field('title', $pageID) ?? 'Blog';
$desc = get_field('desc', $pageID) ?? false;

$query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post__not_in' => $excludedPostsID,
]);

$morePosts = $query->posts;

@endphp
@extends('organisms.app')

@section('content')
  @include('organisms.blog-hero', [
      'title' => $title,
      'desc' => $desc,
      'posts' => $highlightedPosts,
  ])

  @include('organisms.blog-posts', ['posts' => $morePosts])
@endsection
