<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
<style>
    html, body {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        color: #000011;
        display: table;
        font-weight: 100;
        font-family: 'Roboto';
    }

    .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }

    .content {
        text-align: center;
        display: inline-block;
    }

    .title {
        font-size: 20px;
        margin-bottom: 40px;
    }
</style>
<div class="container">
<h2>Hey There!</h2>
<p>Bubble Board is revolutionary system for feedback and discussion.</p>
<p>You've been invited to contribute on {{ array_get($data, 'board.boardname') }} board on Bubble Board(Exciting)! </p>
<p>
    You can enter your board here <a href="{{ url('/board/' . array_get($data, 'board.boardname') . '?access_key=' . array_get($data, 'access_key')) }}">link</a>, you must log in to and save the board to enter it again!
</p>
</div>