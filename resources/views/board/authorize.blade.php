@extends('app')

@section('content')
    <div class="w-section section hero">
        <div class="w-container container">
            <h1>
                Authorize to board
            </h1>
        </div>
    </div>

    <div class="container">
        <form action="{{ URL::route('board.authorize.post', $board->boardname) }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label>
                    Enter PIN Code
                </label>

                <input class="form-control" name="pincode" type="text">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
