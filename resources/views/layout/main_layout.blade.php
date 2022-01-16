<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title')</title>
  @include('layout.css_global')
  @yield('css_custom')
</head>

<body>
    <div id="app">
    <div class="main-wrapper">
        @include('layout.navbar')
        @include('layout.sidebar')
        <!-- Main Content -->
        <div class="main-content">
        @yield('content')
        </div>
    </div>
    </div>

@include('layout.js_global')

</body>
@include('layout.footer')
@yield('script')
</html>