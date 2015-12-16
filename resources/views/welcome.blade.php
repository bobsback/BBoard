@extends('app')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">


        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    families: ["Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Roboto:300,regular","Roboto Condensed:regular","Amaranth:regular,italic,700"]
                }
            });
        </script>
        <script type="text/javascript" src="js/modernizr.js"></script>

    </head>
    <body>
    <div id="PinSearch" class="w-section section hero">
        <div class="w-container container">
            <h1 data-ix="slowload">Go beyond feedback</h1>
            <div data-ix="slowload" class="findaboartd">Join a board by entering its pin:</div>
            <div class="w-form sign-up-form">
                <form name="wf-form-signup-form" data-name="Signup Form" action="{{ URL::route('board.access-via-pincode') }}" method="POST" class="w-clearfix">
                    {{ csrf_field() }}

                    <input id="Board-Search" type="text" placeholder="Insert board pin code" name="pincode" data-name="Board Search" required="required" data-ix="load-from-left" class="w-input field">
                    <input type="submit" value="Find your board" data-wait="Please wait..." data-ix="load-from-right" class="w-button button">
                </form>

            </div>
        </div>
    </div>

    <div id="WhatnWhy" data-anchor="slide1" class="section grey">
        <div class="w-container">
            <div class="w-row">
                <div data-ix="load-from-left" class="w-col w-col-6">
                    <h1>What?</h1>
                    <div class="desctext">A flexible private&nbsp;<strong>discussion </strong>platform.
                        <br>For&nbsp;<strong>feedback, strategy and ideas.</strong>
                        <br>For <strong>employees and/or customers.&nbsp;</strong>
                        <br><strong>Pin code </strong>for basic board entry.
                        <br>Honesty&nbsp;through <strong>semi-anonymity</strong>.</div>
                    <div style="padding-top: 56.17021276595745%;" class="w-embed w-video video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/IkUKFdacHvo" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div data-ix="load-from-right" class="w-col w-col-6">
                    <h1>Why?</h1>
                    <div class="desctext"><strong>Communication.</strong> Improves it.
                        <br><strong>Innovation. </strong>Maximises the flow of ideas.
                        <br><strong>Community.&nbsp;</strong>Loyalty through community.
                        <br><strong>Any-time. </strong>Don't restrict your community to surveys.
                        <br><strong>Engagement.</strong>&nbsp;Aims to maximise engagement.</div>
                    <div style="padding-top: 56.17021276595745%;" class="w-embed w-video video">

                        <iframe width="560" height="315" src="https://www.youtube.com/embed/fPzAABMozs0" frameborder="0" allowfullscreen></iframe>

                    </div>
                </div>
            </div>
        </div><img width="874" src="images/front page pic.png" class="board-image">
    </div>
    <div id="HowitWorks" class="section">
        <div class="w-container">
            <h2 class="grey-heading">How it works</h2>
            <div class="w-row">
                <div data-ix="scrollin" class="w-col w-col-3 howcol1">
                    <div class="howtitle">1 Build a Board</div>
                    <div class="howdesc">Simply choose a name, any sub sections and the board blurb.</div><img src="images/Board page v21.jpg">
                </div>
                <div data-ix="scrollin" class="w-col w-col-3 colum2">
                    <div class="howtitle">2 Choose your pin</div>
                    <div class="howdesc">People access your board using a pin (which can also be a link). Choose your pin and some advanced settings.&nbsp;</div><img width="108" src="images/pin code icon.png" class="pincodeicon">
                </div>
                <div data-ix="scrollin-2" class="w-col w-col-3">
                    <div class="howtitle">3 Spread the word</div>
                    <div class="howdesc">Hey presto you have your bubble board. Now distribute the pins to the intended users, we have multiple guides on the best ways to do this.</div><img width="85" src="images/shout icon.png" class="shouticopn">
                </div>
                <div data-ix="scrollin-2" class="w-col w-col-3">
                    <div class="howtitle">4 Watch the genius flow</div>
                    <div class="howdesc">Sit back and watch the power of collective intelligence.</div><a href="buildabubble.html" class="w-button buildabb">Build a Bubble Board!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="w-section section grey">
        <h1>Pricing&nbsp;Table</h1>
        <div class="w-container">
            <div class="w-row">
                <div class="w-col w-col-4 pricetable">
                    <h2 class="pricetable">Free&nbsp;</h2>
                    <h4>Simple yet&nbsp;Brilliant</h4>
                    <div class="featureinfo">1&nbsp;Board</div>
                    <div class="featureinfo">Pin&nbsp;Code&nbsp;Access</div>
                    <div class="featureinfo">1&nbsp;Admin</div>
                    <div class="featureinfo">Basic&nbsp;User&nbsp;Tracking</div>
                    <div class="featureinfo">No&nbsp;pinned&nbsp;posts</div>
                    <div class="featureinfo final">Chat&nbsp;Only</div><a href="buildabubble.html" class="w-button buildabb pricei">Build&nbsp;Your&nbsp;Board</a>
                </div>
                <div class="w-col w-col-4">
                    <div class="pricetable adv">
                        <h2 class="pricetable">?Better</h2>
                        <h4>Feature Packed</h4>
                        <div class="featureinfo">Unlimmited&nbsp;Subboards</div>
                        <div class="featureinfo">Pin&nbsp;Code&nbsp;+&nbsp;Domain&nbsp;Access</div>
                        <div class="featureinfo">Timed&nbsp;&amp;&nbsp;Permission based Pins</div>
                        <div class="featureinfo">Unlimited&nbsp;Admins</div>
                        <div class="featureinfo">Advance&nbsp;User&nbsp;Tracking</div>
                        <div class="featureinfo">Pinned&nbsp;Posts</div>
                        <div class="featureinfo final">Chat&nbsp;Only</div><a href="about.html" class="w-button buildabb pricei">Register&nbsp;Interest</a>
                    </div>
                </div>
                <div class="w-col w-col-4">
                    <div class="pricetable adv">
                        <h2 class="pricetable">Enterprise</h2>
                        <h4>?The&nbsp;Ultimate&nbsp;Tool</h4>
                        <div class="featureinfo">Feature&nbsp;Info</div>
                        <div class="featureinfo">Active&nbsp;Directory&nbsp;Sync</div>
                        <div class="featureinfo">GPS&nbsp;Location&nbsp;Access</div>
                        <div class="featureinfo">Feature&nbsp;Info</div>
                        <div class="featureinfo">Advance&nbsp;User&nbsp;Tracking</div>
                        <div class="featureinfo">Pulse&nbsp;Polls</div>
                        <div class="featureinfo">Advance&nbsp;Analytics</div>
                        <div class="featureinfo final">?Image&nbsp;+&nbsp;Document&nbsp;uploads</div><a href="about.html" class="w-button buildabb pricei">Register&nbsp;Interest</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Email" class="w-section social-section">
        <div class="w-container convo">
            <h2>Refer your Boss</h2>
            <p>Suggest&nbsp;Bubble&nbsp;Board&nbsp;to&nbsp;someone</p>
            <div class="w-form">
                <form id="email-form" name="email-form" data-name="Email Form" action="http://emailsend.php" class="w-clearfix emaillist">
                    <label for="email" class="keepup">Enter&nbsp;an&nbsp;email&nbsp;address&nbsp;to&nbsp;get&nbsp;an&nbsp;introductory&nbsp;to&nbsp;Bubble&nbsp;Board&nbsp;or&nbsp;to&nbsp;stay&nbsp;in&nbsp;touch.</label>
                    <input id="email" type="email" placeholder="Enter an email address" name="email" data-name="Email" required="required" class="w-input field">
                    <input type="submit" value="Submit" data-wait="Please wait..." class="w-button button">
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/webflow.js"></script>
    <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->

    </body>
</html>
@endsection
