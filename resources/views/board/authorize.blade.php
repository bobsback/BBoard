<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Nov 24 2015 13:48:30 GMT+0000 (UTC) -->
<html data-wf-site="55ddf3cd589f44b96aee07cd" data-wf-page="55eee37bffeb9dfb4814f650">
<head>
    <meta charset="utf-8">
    <title>Passkey required page</title>
    <meta name="description" content="A discussion platform hidden behind a pin code for feedback, idea's and strategy discussion. Employees or customers can post and interact anonymously.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:description" content="A discussion platform hidden behind a pin code for feedback, idea's and strategy discussion. Employees or customers can post and interact anonymously to maximise honesty.">
    <meta name="generator" content="Webflow">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    {!! HTML::style('css/normalize.css') !!}
    {!! HTML::style('css/webflow.css') !!}
    {!! HTML::style('css/bubbl-board-beta.webflow.css') !!}
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Roboto:300,regular","Roboto Condensed:regular","Amaranth:regular,italic,700"]
            }
        });
    </script>
    <script type="text/javascript" src="js/modernizr.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="images/BB favicon.png">
    <link rel="apple-touch-icon" href="images/webclip_1.png">
</head>
<body>
<div class="w-row">
    <div class="w-col w-col-2">
        <div data-collapse="medium" data-animation="default" data-duration="400" data-contain="1" data-no-scroll="1" class="w-nav lefttayto">
            <div class="w-container">
                <a href="{{ url('/') }}" class="w-nav-brand brand">{!! HTML::image('images/bboard logo v1 white.png', 'Logo', array('width' => 199, 'class' => 'logo3'))!!}
                </a>
                <h5>Go beyond feedback</h5>
            </div>
            <div class="w-clearfix board-div-block"><a href="#" class="w-button link">A Board Name</a>
                <div class="board-blurb">Hello, this would be some information about a board but you haven't made it to a board quite yet</div>
            </div>

        </div>
    </div>
    <div class="w-col w-col-10 col2">
        <div class="w-section boardheadersection">
            <div class="w-container rightcontainer">
                <h2 class="boardnamhead">Not quite made it :(</h2>
            </div>
        </div>
        <div class="w-section bgounrdnoaccess">
            <div class="w-container noacesscont">
                <div data-ix="load" class="divacess">
                    <p>Yo, enter the bubble board passkey or <a class="loginlink" href="{{ url('/auth/login') }}">login </a>to access your boards!&nbsp;</p>
                    <div class="w-form formwrapper">
                        <form action="{{ URL::route('board.authorize.post', $board->boardname) }}" method="POST" class="w-clearfix">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Enter Passkey Code</label>
                                <input class="w-input pinentry" placeholder="Enter the Passkey" name="pincode" type="text">
                            </div>

                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    {{$errors->first()}}
                                </div>
                            @endif

                            <div class="form-group">
                                <button class="w-button send" type="submit">Enter</button>
                            </div>
                        </form>


                    </div>
                </div>
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
                    <div class="w-col w-col-4">{!! HTML::image('images/appscomingsoon.png', 'Logo', array('width' => 150))!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="{!! asset('js/webflow.js') !!}"></script>
<!--[if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
<!-- Hero text JS -->
</body>
</html>

