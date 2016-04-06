<!DOCTYPE html>
<html>
<head>
    <title>404</title>

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
        <div class="title">This is a dang 404 error, something went and goofed, if something should be here hit me up.</div>
    </div>
</div>
<div class="w-section section grey">
    <div class="w-container">
        <div class="w-row">
            <div class="w-col w-col-4">
                <div class="w-widget w-widget-twitter">
                    <iframe src="https://platform.twitter.com/widgets/follow_button.html#screen_name=bubbleboardyes&amp;show_count=true&amp;size=m&amp;show_screen_name=true&amp;dnt=true" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 100%; height: 20px;"></iframe>
                </div>
                <div class="w-widget w-widget-facebook">
                    <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FBubbleboard%2F&amp;layout=button_count&amp;locale=en_US&amp;action=like&amp;show_faces=false&amp;share=false" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 90px; height: 20px;"></iframe>
                </div>
                <div class="w-widget w-widget-twitter">
                    <iframe src="https://platform.twitter.com/widgets/tweet_button.html#url=http%3A%2F%2Fbubbleboard.co.uk&amp;counturl=bubbleboard.co.uk&amp;text=This%20looks%20a%20touch%20awesome&amp;count=horizontal&amp;size=m&amp;dnt=true" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 110px; height: 20px;"></iframe>
                </div>
            </div>
            <div class="w-col w-col-4 footer-central-colum">
                <div class="footerh1">This is the site footer</div><a href="{{ url('/') }}" class="footerlink">Find out about Bubble Board</a><a href="{{ url('/auth/login') }}" class="footerlink">Login - login into your board</a><a href="{{ url('/Build') }}" class="footerlink">Build a bubble board</a>
                <div class="footerh1">Everything here is copyrighted etc etc.&nbsp;</div>
            </div>
            <div class="w-col w-col-4">{!! Html::image('images/appscomingsoon.png', 'Logo', array('width' => 150))!!}

            </div>
        </div>
    </div>
</div>
</body>
</html>
