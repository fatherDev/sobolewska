@php
$data = $data ?? false;
@endphp

@if ($data)
  <section data-scroll-section class="l-mini-text-blocks {{ $class ?? '' }}">
    <div class="l-inner">
      <div class="l-mini-text-blocks__inner l-grid">
        <div class="l-mini-text-blocks__col l-mini-text-blocks__col--left">
          <p class="l-mini-text-blocks__label">{{ $data['label'] ?? '' }}</p>
        </div>
        <div class="l-mini-text-blocks__col l-mini-text-blocks__col--right">
          <div class="l-mini-text-blocks__item-wrapper">
            @if (!empty($data['mini_text_blocks_repeater']))
              @foreach ($data['mini_text_blocks_repeater'] as $item)
                <div data-scroll data-scroll-offset="30%" class="l-mini-text-blocks__item">
                  <p class="l-mini-text-blocks__title">{{ $item['title'] ?? '' }}</p>
                  <p class="l-mini-text-blocks__desc">{!! $item['content'] ?? '' !!}</p>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
