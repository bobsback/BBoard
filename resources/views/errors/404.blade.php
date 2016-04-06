<!DOCTYPE html>
<html>
<head>
    <title>404</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
        <div class="title">This is a dang 404 error, something went and not worked, if something should be here hit me up.</div>
        <a href="{{ url('/') }}" class="footerlink">Find out about Bubble Board</a><br>
        <a href="{{ url('/auth/login') }}" class="footerlink">Login - login into your board</a><br>
        <a href="{{ url('/Build') }}" class="footerlink">Build a bubble board</a><br>

        <div class="w-col w-col-4">{!! Html::image('images/appscomingsoon.png', 'Logo', array('width' => 150))!!}
    </div>
    </div>
</div>

</body>
</html>
