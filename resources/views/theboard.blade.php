@extends('app')

@section('content')

    <div class="container">
        <h1>
            {{ $board->boardname }}
        </h1>

        <h1>
            {{ $board->boardblurb }}
        </h1>

        @include('comments::display', ['boardname' => 'page1'])
    </div>





@endsection
