@extends('comments::moderator.layout')

@section('title')
    Manage boards
@stop

@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::to('/') }}">
                Home
            </a>
        </li>
        <li class="active">
            Boards
        </li>
    </ol>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th class="column-author">Board</th>
                <th class="column-comment">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($boards->count())
                @foreach($boards as $board)
                    <tr>
                        <td>
                            {{ $board->id }}
                        </td>
                        <td>
                            {{ $board->boardname }}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ URL::route('moderator.boards.edit', $board->id) }}">
                                Edit
                            </a>

                            <a class="btn btn-warning" href="{{ URL::route('moderator.boards.comments.index', $board->id) }}">
                                Comments
                            </a>

                            <a class="btn btn-danger" href="{{ URL::route('moderator.boards.bans.index', $board->id) }}">
                                Bans
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">
                        No boards found.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@stop
