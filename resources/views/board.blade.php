@extends('app')

@section('content')
    <div class="w-section section hero">
        <div class="w-container container">
            <h1>Your Boards</h1>
            <p>Your Saved Boards</p>
        </div>
    </div>
    <div class="w-section">
        <div class="w-row">
            <div class="w-col w-col-6 yourboardinfo">
                <h1 class="white">Saved Boards</h1>
                @if($boards->count())
                    <ul>
                        @foreach($boards as $board)
                            <div>
                                <a class="h4 white link4" href="{{ URL::to('board/' . $board->boardname) }}">
                                    {{ $board->boardname }}

                                </a>

                                @if($user && $user->isModerator($board->id))
                                    <a class="btn btn-primary btn-xs" href="{{ URL::route('moderator.boards.comments.index', $board->id) }}">
                                        <i class="fa fa-cogs"></i> Manage
                                    </a>

                                @endif
                                <br><div class="white paddingtop">{{ $board->boardblurb }}</div> <br/>

                            </div>
                        @endforeach
                    </ul>
                @endif


            </div>
            <div class="w-col w-col-6">
                <h1>Activity Centre</h1>
                <p>Coming soon</p>


            </div>
        </div>
    </div>




@endsection
