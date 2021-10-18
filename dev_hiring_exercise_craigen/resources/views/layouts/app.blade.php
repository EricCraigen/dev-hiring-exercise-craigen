@extends('layouts.base')

@section('body')
    @yield('content')
    @include('layouts.navigation')
    <header class="bg-white shadow">

        <div class="{{ isset($header) ? '' : 'hidden' }} max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold text-gray-900">
            {{ isset($header) ? $header : '' }}
          </h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto">

        @isset($slot)
            {{ $slot }}
        @endisset

    </main>

@endsection
