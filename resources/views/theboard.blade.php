
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
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    {!! Html::style('css/normalize.css') !!}
    {!! Html::style('css/webflow.css') !!}
    {!! Html::style('css/bubbl-board-beta.webflow.css') !!}

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
    <script src="//js.pusher.com/3.0/pusher.min.js"></script>
    <script>
        var pusher = new Pusher("{{env("PUSHER_KEY")}}")
        var channel = pusher.subscribe('test-channel');
        channel.bind('test-event', function(data) {
            alert(data.text);
        });
    </script>
</head>
<body>
<div class="w-row rowpagetemp">
    <div class="w-col w-col-2 colpagechat">
        <div data-collapse="medium" data-animation="default" data-duration="400" data-contain="1" data-no-scroll="1" class="w-nav lefttayto">
            <div class="w-container">
                <a href="{{ url('/') }}" class="w-nav-brand brand">{!! Html::image('images/bboard logo v1 white.png', 'Logo', array('width' => 199, 'class' => 'logo3'))!!}
                </a>
                <h5>Go beyond feedback</h5>
            </div>
            <div style="" class="w-clearfix board-div-block">
                <!--<a href="#" class="w-button link active">
                    {{ $board->boardname }}
                </a>

                <br>
                <div class="board-blurb">{{ $board->boardblurb }}</div>-->

                @if(!(Auth::user() && Auth::user()->boards->contains($board->id)))
                    <a class="w-button save @if(!Auth::user()) save-board-guest-toggle @endif" href="{{ URL::route('board.save', $board->boardname) }}">
                        <i class="fa fa-check"></i>
                        Save Board
                    </a>
                @endif

            </div>
            <div class="divblocklogin">
                @if(auth()->guest())
                    <div class="board-blurb">
                        Register (or log in) to save this board and revisit it anytime! :)
                    </div>
                            <div>
                    @if(!Request::is('auth/login'))
                        <a class="w-nav-link link"  href="{{ url('loginpls/' . $board->boardname) }}">Login</a>
                    @endif

                    @if(!Request::is('auth/register'))
                        <a class="w-nav-link link" href="{{ url('regpls/' . $board->boardname) }}">Register</a>
                    @endif  </div>
                @else
                    @if($boards->count())
                        <div class="yourboards">
                        @foreach($boards as $b)
                            <div>
                                <a class="w-button link padtop active" href="{{ URL::to('board/' . $b->boardname) }}">
                                    {{ $b->boardname }}
                                </a>

                                @if($user && $user->isModerator($b->id))
                                    <a class="btn btn-primary btn-xs greenbground" href="{{ URL::route('moderator.boards.edit', $b->id) }}">

                                        <i class="fa fa-cogs "></i>
                                    </a>
                                    @else
                                    <button data-user-id="{{ $user->id }}" value="{{$b->id}}" class="btn-xs greenbground remove-board-toggle"><span class="white fa fa-times"></span></button>
                                @endif</div>
                        @endforeach
                        </div>
                    <!--Alt Board selection-->
                        <div class="yourboardsalt">
                            <a href="{{ url('/board') }}"  class="w-nav-link link2">Your Boards</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div class="w-col w-col-10 colom2">
        <div class="w-section boardheadersection">
            <div class="w-container rightcontainer">
                <h2 class="boardnamhead">{{ $board->boardname }}</h2>
                <div class="rnav2"><div>
                    <div class="textleft"><dfnn data-info="{{ $board->boardblurb }}"><i class="green fa fa-question"></i></dfnn></div>
                    @if($user && $user->isModerator($board->id))
                        <div class="lock">
                            <dfnn data-info="Passkey: {{ $board->pincode }}"><i class="green fa fa-lock"></i></dfnn>
                        </div>
                        <a class="btn btn-primary greenbground" href="{{ URL::route('moderator.boards.edit', $board->id) }}">
                            Manage Board <i class="fa fa-cogs"></i>
                        </a>
                    @endif
                    @if(auth()->guest())
                    @else
                            <a class="bnavlink2 boardlink" href="{{ url('/auth/logout') }}">Logout</a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
        <!--Admin Panel-->

        @include('comments::display', ['pageId' => $board->id])
    </div>
</div>
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- This must be included before the closing </body> tag! -->
    <script src="/vendor/comments/js/comments.js"></script>
    <script src="/vendor/js/bootbox.min.js"></script>
    <script src="/js/app.js"></script>

    <!-- Search form -->
    <script> document.addEventListener("touchstart", function(){}, true);</script>

    <script>
        $(document).on('click', '.save-board-guest-toggle', function(e) {
            e.preventDefault();

            var self = $(this);

            bootbox.confirm('You must be logged in to save a board', function(result) {
                if (result) {
                    location.href = self.attr('href');
                }
            });
        });
    </script>


</body>
</html>

