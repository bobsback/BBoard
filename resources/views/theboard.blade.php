<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bubble Board</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/vendor/comments/css/prism-okaidia.css"> <!-- Optional -->
    <link rel="stylesheet" href="/vendor/comments/css/comments.css">


    {!! HTML::style('css/normalize.css') !!}
    {!! HTML::style('css/webflow.css') !!}
    {!! HTML::style('css/bubbl-board-beta.webflow.css') !!}

            <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/modernizr.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="w-row rowpagetemp">
    <div class="w-col w-col-2 colpagechat">
        <div data-collapse="medium" data-animation="default" data-duration="400" data-contain="1" data-no-scroll="1" class="w-nav lefttayto">
            <div class="w-container">
                <a href="#" class="w-nav-brand brand">{!! HTML::image('images/bboard logo v1 white.png', 'Logo', array('width' => 199, 'class' => 'logo3'))!!}
                </a>
                <h5>Go beyond feedback</h5>
            </div>
            <div class="w-clearfix board-div-block"><a href="#" class="w-button link">{{ $board->boardname }}</a>
                <div class="board-blurb">{{ $board->boardblurb }}</div>
            </div>
            <div class="divblocklogin">
                <div class="logintoview"><a class="loginlink" href="#">Login </a>to view your other boards</div>
                <div class="logintoview"><a class="loginlink" href="#">Sign up</a>&nbsp;to save this board and revisit it</div>
            </div>
        </div>
    </div>
    <div class="w-col w-col-10 colom2">
        <div class="w-section boardheadersection">
            <div class="w-container rightcontainer">
                <h2 class="boardnamhead">{{ $board->boardname }}</h2>
            </div>
        </div>
        @include('comments::display', ['boardname' => 'page1'])
    </div>
</div>





    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- This must be included before the closing </body> tag! -->
    <script src="/vendor/comments/js/comments.js"></script>
    <!-- Search form -->
    <script> document.addEventListener("touchstart", function(){}, true);</script>


</body>
</html>

