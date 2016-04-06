<!DOCTYPE html>
<html>
<head>
    <title>500.</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    {!! HTML::style('css/normalize.css') !!}
    {!! HTML::style('css/webflow.css') !!}
    {!! HTML::style('css/bubbl-board-beta.webflow.css') !!}

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
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
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">500 error. My bad looks like i fucked up something, it's probably the governments fault, be a kind citizen and tell me what went wrong.</div>
        <a href="{{ url('/') }}" class="footerlink">Find out about Bubble Board</a><br>
        <a href="{{ url('/auth/login') }}" class="footerlink">Login - login into your board</a><br>
        <a href="{{ url('/Build') }}" class="footerlink">Build a bubble board</a><br>

    </div>
</div>

</body>
</html>
