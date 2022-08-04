@php
$contactData = get_field('contact_data', 'option') ?? '';
$socials = get_field('socials_repeater', 'option') ?? '';
@endphp

<div class="c-page-contact__data">
  <span>Telefon</span>
  <div class="c-page-contact__box">
    @if ($contactData['phone_repeater'])
      @foreach ($contactData['phone_repeater'] ?? [] as $phone)
        <p>
          <a class="c-page-contact__item" href="tel:{{ $phone['phone'] ?? '' }}">{{ $phone['phone'] ?? '' }}</a>
        </p>
      @endforeach
    @endif
  </div>

  <div class="c-page-contact__box">
    <span>E-mail</span>
    @if ($contactData['mail_repeater'])
      @foreach ($contactData['mail_repeater'] ?? [] as $email)
        <p>
          <a class="c-page-contact__item" href="mailto:{{ $email['e-mail'] ?? '' }}">{{ $email['e-mail'] ?? '' }}</a>
        </p>
      @endforeach
    @endif
  </div>

  <span>Subskrybuj</span>
  <div class="c-page-contact__box c-page-contact__box--col">
    @if ($socials)
      @foreach ($socials ?? [] as $item)
        <a class="c-page-contact__item" href="{{ $item['url'] ?? '' }}">{{ $item['name'] ?? '' }}</a>
      @endforeach
    @endif
  </div>
</div>
