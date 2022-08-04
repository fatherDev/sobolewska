@php
global $wp_query;
$menu_id = App\get_menu_id('primary_navigation');
$header_menu = wp_get_nav_menu_items($menu_id);
$current_id = $wp_query->queried_object_id;
$contactData = get_field('contact_data', 'option') ?? '';
$socials = get_field('socials_repeater', 'option') ?? '';
@endphp




@if (!empty($header_menu) && is_array($header_menu))
  <nav class="main-nav js-nav-list">
    <ul class="c-nav__list">
      @foreach ($header_menu as $menu_item)
        @if (!$menu_item->menu_item_parent)
          @php
            $child_menu_items = App\get_child_menu_items($header_menu, $menu_item->ID);
          @endphp

          @if (!$child_menu_items)
            <li class="menu-item c-fade-right {{ $current_id == $menu_item->object_id ? 'menu-active' : '' }}">
              <a href="{{ $menu_item->url }}">{{ $menu_item->title }}</a>
            </li>
          @else
            <li class="menu-item c-fade-right menu-item-has-children ">
              <a>{{ $menu_item->title }}</a>
              <div class="js-accordion__body sub-menu__wrapper">
                <ul class="sub-menu">
                  @foreach ($child_menu_items as $menu_item)
                    <li class="menu-item {{ $current_id == $menu_item->object_id ? 'menu-active' : '' }}">
                      <a href="{{ $menu_item->url }}">{{ $menu_item->title }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </li>
          @endif
        @endif
      @endforeach
    </ul>
    <div class="c-mobile-contact">
      @if ($contactData['phone_repeater'])
        <div class="c-mobile-contact__wrapper">
          @foreach ($contactData['phone_repeater'] as $item)
            <a href="tel:{{ $item['phone'] ?? '' }}">{{ $item['phone'] ?? '' }}</a>
          @endforeach
        </div>
      @endif
      @if ($contactData['mail_repeater'])
        <div class="c-mobile-contact__wrapper">
          @foreach ($contactData['mail_repeater'] as $item)
            <a href="mailto:{{ $item['e-mail'] ?? '' }}">{{ $item['e-mail'] ?? '' }}</a>
          @endforeach
        </div>
      @endif
      @if ($socials)
        <div class="c-mobile-contact__wrapper">
          @foreach ($socials as $item)
            <a href="{{ $item['url'] ?? '' }}">{{ $item['name'] ?? '' }}</a>
          @endforeach
        </div>
      @endif
    </div>
  </nav>
@endif
