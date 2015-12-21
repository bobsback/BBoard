@extends('app')

@section('content')
    <div class="w-section section hero">
        <div class="w-container container">
            <h1>Your Stuff</h1>
            <p>Things about your account are here.</p>
        </div>
    </div>
    <div class="w-section">
        <div class="w-row">
            <div class="w-col w-col-6 yourboardinfo">
                <h2 class="white">Your Boards</h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th class="white">Name</th>
                        <th class="white">Blurb</th>
                        <th class="white">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($boards->count())
                        @foreach($boards as $board)
                            <tr>
                                <td>
                                    <a class="w-button link" href="{{ URL::to('board/' . $board->boardname) }}">
                                        {{ $board->boardname }}

                                    </a>
                                </td>
                                <td>
                                    <div class="white ">{{ $board->boardblurb }}
                                </td>
                                <td>
                                    @if($user && $user->isModerator($board->id))
                                        <a class="btn btn-primary btn-xs greenbground" href="{{ URL::route('moderator.boards.comments.index', $board->id) }}">
                                            <i class="fa fa-cogs "></i> Manage
                                        </a>

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="white" colspan="3">
                                No boards found :(<br>Get into a board and make sure to click 'save board'!
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>
            <div class="w-col w-col-6">
                <p> Activity Centre Coming soon</p>


            </div>
        </div>
    </div>




@endsection
