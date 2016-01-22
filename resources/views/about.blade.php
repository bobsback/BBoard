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

    {!! HTML::style('css/reset.css') !!}
    {!! HTML::style('css/faq.css') !!}
    {!! HTML::style('css/normalize.css') !!}
    {!! HTML::style('css/webflow.css') !!}
    {!! HTML::style('css/bubbl-board-beta.webflow.css') !!}

            <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script type="text/javascript" src="/js/modernizr.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <script src="js/modernizr.js"></script> <!-- Modernizr -->
</head>
<div class="w-section navbar">
    <div class="w-container">
        <div class="w-row containersss">
            <div class="w-col w-col-4 w-col-small-6 w-col-tiny-6 left-nav">
                <a href="{{ url('/') }}" class="w-inline-block">{!! HTML::image('images/bboard logo v1 white.png', 'Logo', array('width' => 264, 'class' => 'logo'))!!}
                </a>

            </div>
            <div class="w-col w-col-8 w-col-small-6 w-col-tiny-6 w-clearfix right-nav">
                <div class="w-hidden-medium w-hidden-small w-hidden-tiny in3min">In 1 min for free!</div>
                <div data-collapse="medium" data-animation="default" data-duration="400" data-contain="1" class="w-nav nav-bar">
                    <div class="w-container navbar2" id="navbar1">
                        <nav role="navigation" class="w-nav-menu">



                            @if(auth()->guest())
                                @if(!Request::is('auth/login'))
                                    <a class="w-nav-link link2"  href="{{ url('/auth/login') }}">Login</a>
                                @endif
                                @if(!Request::is('auth/register'))
                                    <a class="w-nav-link link2" href="{{ url('/auth/register') }}">Register</a>
                                @endif
                            @else

                                <a href="#" class="w-nav-link link2" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdownlog" role="menu">

                                    <a class="link3" href="{{ url('/auth/logout') }}">Logout</a>

                                </ul>
                                <a href="{{ url('/board') }}"  class="w-nav-link link2">Your Boards</a>
                            @endif

                            <a href="{{ url('/about') }}" class="w-nav-link link2">Info</a>


                            <a href="{{ url('/Build') }}" class="w-nav-link link">Build a Board!</a>

                        </nav>
                        <div class="w-nav-button menubutton">
                            <div class="w-icon-nav-menu menu-icon"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-hidden-tiny just-do-it">Beta (but omg it's going to be good)
        <form class="search-container" data-name="Signup Form" action="{{ URL::route('board.access-via-pincode') }}" method="POST" >
            {{ csrf_field() }}
            <input id="board-search" placeholder="Enter a Board Pin" type="text" class="search-box" name="pincode" data-name="Board Search" required="required" />
            <label for="search-box"><span class="glyphicon glyphicon-search search-icon"></span></label>
            <input type="submit" id="search-submit" />
        </form>
    </div>
</div>




<div class="w-section section hero">
    <div class="w-container container">
        <h2>About & FAQ</h2>
        <p>Where are you</p>
    </div>
</div>

<div class="w-section aboutsection">

    <section class="cd-faq">
        <ul class="cd-faq-categories">
            <li><a href="#Contact">Contact</a></li>
            <li><a href="#basics">About</a></li>
            <li><a href="#mobile">The Team</a></li>
            <li><a href="#account">Account</a></li>
        </ul> <!-- cd-faq-categories -->

        <div class="cd-faq-items">
            <ul id="Contact" class="cd-faq-group">
                <li class="cd-faq-title"><h2>Contact</h2></li>
                <li>
                    <a class="cd-faq-trigger" href="#0">Contact us</a>
                    <div class="cd-faq-content">
                            @include ('about.contact')
                    </div> <!-- cd-faq-content -->
                </li>
            </ul>
            <ul id="basics" class="cd-faq-group">
                <li class="cd-faq-title"><h2>About</h2></li>
                <li>
                    <a class="cd-faq-trigger" href="#0">About</a>
                    <div class="cd-faq-content"><p>
                       Bubble board is a SaaS start up that aims to revolutionise how people give
                            feedback and communicate ideas (thought bubbles). We want to ultimately be
                            inspirational in facilitating positive change in businesses and organisation through the power of their
                            employees and customers. Why hire consultants to tell you whats wrong when all the answers are already in your grasp.
                            At the moment we are currently testing our beta product and looking for customers.
                        <img width="147" src="images/face.jpg" class="myface">
                        <div class="imagesubhead">BB's brave leader (2010)</div></p>
                    </div> <!-- cd-faq-content -->
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">Feature Developement</a>
                    <div class="cd-faq-content"><p>
                        The final product will have a few more features, advance passwords that time out or have different levels of access, subboards, advance ways to join a board,
                        with more advance user analysis, discussion options and business to customer interactions.</p>
                    </div> <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">How can people access a bubble board?</a>
                    <div class="cd-faq-content">
                        <p>For the beta each boards password is unique, anyone with a board's password can access that board via the homepage or by visiting the boarsd url.</p>
                    </div> <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">Do I need an Account?</a>
                    <div class="cd-faq-content">
                        <p>You do not need an account to enter a board and leave some feedback. <br>
                        You do need an account to build a board and you need an account to save boards to revisit them.</p>
                    </div> <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">How long will the beta be?</a>
                    <div class="cd-faq-content">
                        <p>The time frame is for the product to be in beta for 2-4 months before the final version is finalised.</p>
                    </div> <!-- cd-faq-content -->
                </li>
            </ul> <!-- cd-faq-group -->

            <ul id="mobile" class="cd-faq-group">
                <li class="cd-faq-title"><h2>The Team</h2></li>
                <li>
                    <a class="cd-faq-trigger" href="#0">How does syncing work?</a>
                    <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi
                            mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo
                            repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore,
                            odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis
                            cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium
                            a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
                    </div> <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">How do I upload files from my phone or tablet?</a>
                    <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempore, placeat quisquam rerum! Eligendi fugit dolorum tenetur modi
                            fuga nisi rerum, autem officiis quaerat quos. Magni quia, quo quibusdam odio. Error magni aperiam amet architecto adipisci aspernatu
                            r! Officia, quaerat magni architecto nostrum magnam fuga nihil, ipsum laboriosam similique voluptatibus facilis nobis? Eius non asper
                            iores, nesciunt suscipit veniam blanditiis veritatis provident possimus iusto voluptas, eveniet architecto quidem quos molestias, aperiam
                            eum reprehenderit dolores ad deserunt eos amet. Vero molestiae commodi unde dolor dicta maxime alias, velit, nesciunt cum dolorem, ipsam
                            soluta sint suscipit maiores mollitia assumenda ducimus aperiam neque enim! Quas culpa dolorum ipsam? Ipsum voluptatibus numquam natus? E
                            ligendi explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae, molestias!</p>
                    </div> <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">How do I link to a file or folder?</a>
                    <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                    </div> <!-- cd-faq-content -->
                </li>
            </ul> <!-- cd-faq-group -->

            <ul id="account" class="cd-faq-group">
                <li class="cd-faq-title"><h2>Mobile Apps</h2></li>
                <li>
                    <a class="cd-faq-trigger" href="#0">How do I change my password?</a>
                    <div class="cd-faq-content">
                        <p>For the beta bubble board is currently a web app in a browser, but mobile apps on andoird and iphone for easy board access are in developement.
                        </p>
                    </div> <!-- cd-faq-content -->

                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">How do I change my account settings?</a>
                    <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                    </div> <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">I forgot my password. How do I reset it?</a>
                    <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum at aspernatur iure facere ab a corporis mollitia molestiae quod omnis minima, est labore quidem nobis accusantium ad totam sunt doloremque laudantium impedit similique iste quasi cum! Libero fugit at praesentium vero. Maiores non consequuntur rerum, nemo a qui repellat quibusdam architecto voluptatem? Sequi, possimus, cupiditate autem soluta ipsa rerum officiis cum libero delectus explicabo facilis, odit ullam aperiam reprehenderit! Vero ad non harum veritatis tempore beatae possimus, ex odio quo.</p>
                    </div> <!-- cd-faq-content -->
                </li>
            </ul> <!-- cd-faq-group -->


        </div> <!-- cd-faq-items -->
        <a href="#0" class="cd-close-panel">Close</a>
    </section>
</div>

    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/jquery.mobile.custom.min.js"></script>
    <script src="js/main.js"></script> <!-- Resource jQuery -->

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