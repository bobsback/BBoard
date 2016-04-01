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
        <div class="col-md-8">

            <h3>Use the Actual Passkey</h3>
           <p> Anyone can enter your Bubble Board using the boards passkey.<br><br>
            Your board passkeys:
            <table class="table table-striped">
                <thead>
                <tr>

                    <th class="column-author">Your Boards</th>
                    <th class="column-comment">Passkey</th>
                    <th class="column-comment"></th>
                </tr>
                </thead>
                <tbody>
               @foreach($boards as $board)
                   <tr>
                       <td>
                   <div class="btn btn-success" href="{{ URL::to('board/' . $board->boardname) }}">{{ $board->boardname }}</div>

                       </td>
                       <td><div class="howtitle">{{ $board->pincode }}</div>
                       </td><td>
                       <a class="btn btn-primary" href="{{ URL::route('moderator.boards.edit', $board->id) }}">
                           Edit Passkey
                       </a>
                       </td>
                   </tr>
               @endforeach
                </tbody>
            </table>

            The passkey can be entered on:<ol>
            <li><a href="{{ URL::to('/') }}">bubbleboard.co 's homepage</a> </li>
              <li>  the boards direct URL eg bubbleboard.co/board/YourBoardsName</li>
               <li> Bubble Boards official apps (beta release may 2016)<br></li>
            </p>
            </ol>
        </div>

        <div class="col-md-8">
            <h3>Use a Direct Link or Email</h3>
            <p>In the email is a direct link to your board, the link includes your boards passkey so goes direct to the board. You can copy this link and use it anywhere, the link becomes null if a second is sent to the same email address or if the pincode is changed.   </p>
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form method="post" action="/invites">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="board_id">Choose your Board</label>
                    <select id="board_id" class="form-control" name="board_id">
                        @foreach($boards as $board)
                            <option value="{{ $board->id }}">{{ $board->boardname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                    <label for="email">Email the board invite to:</label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email..." value="{{ old('email') }}"/>
                    <p class="help-block">{{ $errors->first('email') }}</p>
                </div>
                <button class="btn btn-primary" type="submit">Invite</button>
            </form>
        </div>
    </div>


@stop
