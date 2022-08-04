@php
$data = $data ?? false;
@endphp

@if (!empty($data) && !empty($data['partners_repeater']))
  <section class="c-partners" data-scroll-section>
    <div class="l-inner">
      <div class="l-grid">
        <div class="c-partners__text-block ui-fade-right--group" data-scroll data-scroll-offset="40%">
          @if (!empty($data['subtitle']))
            <span class="t-typo-p2" data-scroll-target=".c-partners__text-block">{{ $data['subtitle'] }}</span>
          @endif
          @if (!empty($data['title']))
            <h2 class="t-typo-h2 o-top-30 o-bot-60" data-scroll-target=".c-partners__text-block" style="--i:1">
              {!! $data['title'] !!}
            </h2>
          @endif
          @if (!empty($data['desc']))
            <p class="t-typo-p2 o-bot-50" data-scroll-target=".c-partners__text-block" style="--i:2">
              {!! $data['desc'] !!}</p>
          @endif
          @if (!empty($data['btn']))
            <div class="c-partners__text-block-btn" data-scroll-target=".c-partners__text-block" style="--i:3">
              @include('atoms.btn', [
                  'title' => $data['btn']['title'],
                  'href' => $data['btn']['url'],
                  'class' => 'white',
              ])
            </div>
          @endif
        </div>
        <div class="c-partners__box">
          <div class="c-partners__list-wrapper">
            @if (!empty($data['partners_repeater']))
              <ul class="c-partners__list js-partners-list">
                @foreach ($data['partners_repeater'] as $item)
                  <li class="c-partners__item js-partners-item">
                    <span
                      class="c-partners__index">{{ $loop->index < 9 ? '0' . ($loop->index + 1) : $loop->index + 1 }}</span>
                    <span>{{ $item['partner'] }}</span>
                  </li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
