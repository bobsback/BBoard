@extends('app')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            <div class="content">
                <form class="form-inline" action="{{ URL::route('board.access-via-pincode') }}" method="POST">
                    {{ csrf_field() }}

                    <input class="form-control" name="pincode" type="text" placeholder="Enter PINCode...">

                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
@endsection
