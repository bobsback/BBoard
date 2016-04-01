<h2>Hey!</h2>
<p>Bubble Board is revolutionary system for feedback and discussion.</p>
<p>You've been invited to contribute on {{ array_get($data, 'board.boardname') }} board on Bubble Board(Exciting)! </p>
<p>
    You can enter your board here <a href="{{ url('/board/' . array_get($data, 'board.boardname') . '?access_key=' . array_get($data, 'access_key')) }}">link</a>, you must log in to and save the board to enter it again!
</p>