
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

<div class="w-form">
    {!! Form::open(array('route' => 'referboss', 'class' => 'w-clearfix emaillist')) !!}

    <label for="email" class="keepup">Enter an email address to get an introductory to Bubble Board or to stay& in touch.</label>
    <input id="email" type="email" placeholder="Enter an email address" name="email" data-name="Email" required="required" class="w-input field">
{!! Form::submit('Submit', array('class'=>'w-button button')) !!}
{!! Form::close() !!}

</div>