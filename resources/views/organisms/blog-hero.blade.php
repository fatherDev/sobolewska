@php
$title = $title ?? false;
$desc = $desc ?? false;
$posts = $posts ?? false;

@endphp

@if (!empty($title))
  <section class="c-blog-hero" data-scroll-section>
    <div class="c-blog-hero__box1"></div>
    <div class="c-blog-hero__box2"></div>
    <div class="l-inner">
      <h1 class="t-typo-h1">{!! $title !!}</h1>
      @if (!empty($desc))
        <p class="c-blog-hero__desc">{!! $desc !!} </p>
      @endif

      @if (!empty($posts))
        <span class="c-blog-hero__subtitle">Najnowsze artykuły</span>
        <div class="c-link-cards-repeater__grid l-grid">
          @foreach ($posts as $post)
            @php
              $cardTitle = get_the_title($post);
              $cardIMG = get_the_post_thumbnail_url($post);
              $cardLink = get_the_permalink($post);
            @endphp

            {{-- Link card --}}
            @include('molecules.link-card', [
                'className' => 'c-link-cards-repeater__card',
                'title' => $cardTitle,
                'href' => $cardLink,
                'imgURL' => $cardIMG,
            ])
          @endforeach
        </div>
      @endif

    </div>
  </section>
@endif
