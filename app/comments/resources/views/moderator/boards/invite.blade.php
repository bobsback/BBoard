@extends('comments::moderator.layout')

@section('title')
Invite People to Your Board
@stop

@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::to('/') }}">
                Home
            </a>
        </li>
        <li>
            <a href="{{ URL::route('moderator.boards.index') }}">
                Boards
            </a>
        </li>
        <li class="active">
            Invites
        </li>
    </ol>

    Invite test

@stop
