@extends('comments::moderator.layout')

@section('title')
    {{ $board->boardname }} Board Settings
@stop

@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ URL::to('/') }}">
                Home
            </a>
        </li>
        <li>
            <a href="{{ URL::route('boards') }}">
                Boards
            </a>
        </li>
        <li class="active">
            Settings
        </li>
        <li>
        <div class="floatright">
        <a class="btn btn-info" href="#inviteusers">
            Invite Users
        </a>
        <a class="btn btn-primary" href="#editdetails">
            Edit Details
        </a>

        <a class="btn btn-warning" href="moderatecomments">
            Moderate Comments
        </a>

        <a class="btn btn-danger" href="viewbans">
            View Bans
        </a>
        </div>
        </li>
    </ol>
<a name="editdetails">
    <h2 class="page-subheader">
        Edit {{ $board->boardname }} details
    </h2>
    </a>

    <form action="{{ URL::route('moderator.boards.update', $board->id) }}" method="POST">
        {{ csrf_field() }}

        <input name="_method" type="hidden" value="PUT">

        <div class="form-group">
            {!! Form::label('boardname', 'Change the Board name:', ['class' => 'w-form-label checkboxtext']) !!} <br>

            {!! Form::text('boardname', $board->boardname, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('boardblurb', 'Change the Board Blurb:', ['class' => 'w-form-label checkboxtext']) !!} <br>

            {!! Form::textarea('boardblurb', $board->boardblurb, ['class' => 'h100']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('pincode', 'Change the boards passkey:', ['class' => 'w-form-label checkboxtext']) !!}

            {!! Form::text('pincode', $board->pincode, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Update Board', ['class' => 'btn btn-primary']) !!}
    </form>
    {!!Form::open(['method' =>'DELETE','route'=>['board.destroy',$board->boardname]])!!}


    {!! Form::submit('Permanently Delete Board',['class'=> 'btn btn-danger']) !!}


    {!! Form::close() !!}

@stop
