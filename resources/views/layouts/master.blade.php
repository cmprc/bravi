<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <title>{{ $title ?? null }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- CSRF Token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="{{ config('app.name') }}" name="description" />
  <meta content="Bravi" name="author" />

  <meta name="api_token" content="{{session('api_token')}}">

  {{-- App favicon --}}
  <link rel="shortcut icon" href="{{ asset('favicon.ico')}}">

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="{{ asset(mix('css/app.css')) }}" id="app-style" rel="stylesheet" type="text/css" />

  <!--loadStyles-->
  @foreach( session('loadStyles', []) as $url=>$load )
  @if( $load )
  <link rel="stylesheet" href="{{$url}}" />
  @endif
  @endforeach
  <!--/loadStyles-->

  @stack('css')
</head>

<body>
  <main id="wrapper">
    @yield('content')
  </main>

  <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/libs/jquery-validation/jquery.validate.min.js')}}"></script>
  <script src="{{ asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>

  {{-- App Js --}}
  {{-- <script src="{{ asset(mix('assets/cms/js/app.js')) }}"></script> --}}

  <!--loadScripts-->
  @foreach( session('loadScripts', []) as $url=>$load )
  @if( $load )
  <script src="{{$url}}"></script>
  @endif
  @endforeach
  <!--/loadscripts-->

  @stack('scripts')
</body>

</html>