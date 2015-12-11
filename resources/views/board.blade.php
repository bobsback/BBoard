@extends('app')

@section('content')
    <h1>
        All Discussion Boards
    </h1>

    @if($boards->count())
        <ul>
            @foreach($boards as $board)
                <li>
                    <a href="{{ URL::to('board/' . $board->boardname) }}">
                        {{ $board->boardname }}
                    </a>

                    @if($user && $user->isModerator($board->id))
                        <a class="btn btn-primary btn-xs" href="{{ URL::route('moderator.boards.comments.index', $board->id) }}">
                            <i class="fa fa-cogs"></i> Manage
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection
