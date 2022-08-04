@php
$posts = $posts ?? false;

$postsCount = count($posts);
$postsPerPage = 6;
$totalPages = ceil($postsCount / $postsPerPage);
$index = 0;
@endphp

@if (!empty($posts))
  <section class="c-blog-posts" data-scroll-section>
    <div class="l-inner">
      <span class="t-typo-p2">Więcej artykułów</span>
      <div id="posts-wrapper" class="c-blog-posts__grid l-grid" data-page="1" data-total-pages="{{ $totalPages }}">
        @foreach ($posts as $post)
          @if ($index < $postsPerPage)
            <div data-scroll class="c-blog-posts__item">
              @include('atoms.blog-card', [
                  'title' => get_the_title($post),
                  'subtitle' => get_field('subtitle', $post),
                  'href' => get_the_permalink($post),
                  'desc' => !empty(get_field('desc', $post))
                      ? wp_trim_words(get_field('desc', $post), 30, '...')
                      : wp_trim_words($post->post_content, 30, '...'),
              ])
            </div>
          @endif
          @php
            $index++;
          @endphp
        @endforeach
      </div>

      {{-- Add "Load more" button if necessary --}}
      @if ($postsCount > $postsPerPage)
        <button id="load-more-btn" class="c-blog-posts__btn">Pokaż więcej</button>
      @endif
    </div>
  </section>
@endif
