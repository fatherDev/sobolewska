@php
$class = $class ?? '';
$cards = $data['cards'] ?? [];
@endphp

@if ($cards)
  <section class="c-link-cards-repeater{{ $class ? ' ' . $class : '' }}" data-scroll-section>
    <div class="c-link-cards-repeater__inner l-inner">
      <div class="c-link-cards-repeater__grid l-grid">
        @foreach ($cards as $card)
          @php
            $cardField = $card['card'] ?? '';
            $cardTitle = $cardField['title'] ?? '';
            $cardIMG = $cardField['img'] ?? '';
            $cardLink = $cardField['link'] ?? '';
          @endphp

          {{-- Link card --}}
          @include('molecules.link-card', [
              'className' => 'c-link-cards-repeater__card',
              'title' => $cardTitle,
              'href' => $cardLink,
              'imgURL' => $cardIMG['url'] ?? '',
          ])
        @endforeach
      </div>
    </div>
  </section>
@endif
