@php
$video = $fields['video'] ?? false;
@endphp

<div id="body-classes" @php(body_class())></div>

@include('organisms.header')


<main class="l-main">
    @yield('content')
</main>

@include('organisms.modal', ['data' => $video])

@include('organisms.footer')
