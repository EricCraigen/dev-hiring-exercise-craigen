@extends('layouts.base')

@section('body')
    <div class="flex flex-col justify-center min-h-screen">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
