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

    <div class="row">
        <div class="col-md-4">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form method="post" action="/invites">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="board_id">Board</label>
                    <select id="board_id" class="form-control" name="board_id">
                        @foreach($boards as $board)
                            <option value="{{ $board->id }}">{{ $board->boardname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email..." value="{{ old('email') }}"/>
                    <p class="help-block">{{ $errors->first('email') }}</p>
                </div>
                <button class="btn btn-primary" type="submit">Invite</button>
            </form>
        </div>
    </div>


@stop
