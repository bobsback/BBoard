<h2>Hello</h2>
<p>You've got invite to {{ array_get($data, 'board.boardname') }} board on Bubble Board</p>
<p>
    Please go to this <a href="{{ url('/board/' . array_get($data, 'board.boardname') . '?access_key=' . array_get($data, 'access_key')) }}">link</a>
</p>