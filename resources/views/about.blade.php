@extends('app')

@section('content')
<div class="w-section section hero">
    <div class="w-container container">
        <h1>Information</h1>
        <p>Where are you</p>
    </div>
</div>
<div class="w-section aboutsection2">
    <div class="w-container col12buildboard">
        <div class="w-row">
            <div class="w-col w-col-6">
                <h4>About</h4>
                <div class="about-blurb">Bubble board is a start up that aims to empower people to communicate ideas and feedback (thought bubbles), then go one step further by openly discussing them. We want to ultimately be inspirational in facilitating positive change in businesses and organisation through the power of their employees and customers.&nbsp;Why hire consultants to tell&nbsp;you what&nbsp;</div>
            </div>
            <div class="w-col w-col-6 colum2">
                <h4>Contact</h4>
                <div class="about-blurb">Hit me up for any info
                    <br>Email:&nbsp;
                    <br>Phone:&nbsp;</div><img width="147" src="images/face.jpg" class="myface">
                <div class="imagesubhead">BB's brave leader (2010)</div>
            </div>
        </div>
    </div>
</div>
<div class="w-section aboutsection">
    <div class="w-container">
        <div class="w-row rowabout">
            <div class="w-col w-col-6">
                <h4>The Product</h4>
                <div class="about-blurb">Its a discussion platform to improve stuff</div>
            </div>
            <div class="w-col w-col-6">
                <h4>Future Features</h4>
                <ul class="about-blurb">
                    <li>Pins that time out</li>
                    <li>User access that times out</li>
                    <li>Post only access for some users</li>
                    <li>Subboards</li>
                    <li>GPS&nbsp;board access</li>
                    <li>Active directory sync for employees access</li>
                    <li>Image &amp; document uploading capabilities</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w-container container2"></div>
</div>
<div class="w-section">
    <div class="w-container padcontainer">
        <div class="w-form">
            <form id="email-form" name="email-form" data-name="Email Form">
                <h4>Contact us or register an interest in our future products.</h4>
                <label for="email-2">Email Address:</label>
                <input id="email-2" type="email" placeholder="Enter your email address" name="email-2" data-name="Email 2" required="required" class="w-input">
                <label for="field-2">Message:</label>
                <textarea id="field-2" placeholder="Example Text" name="field-2" data-name="Field 2" class="w-input"></textarea>
                <input type="submit" value="Submit" data-wait="Please wait..." class="w-button lpagesubmit">
            </form>
            <div class="w-form-done">
                <p>Thank you! Your submission has been received!</p>
            </div>
            <div class="w-form-fail">
                <p>Oops! Something went wrong while submitting the form</p>
            </div>
        </div>
    </div>
</div>
<div class="w-section mapsection">
    <div class="w-container container2">
        <div data-widget-latlng="51.602785,-0.191554" data-widget-style="roadmap" data-widget-zoom="9" data-widget-tooltip="Bubble HQ" class="w-widget w-widget-map map"></div>
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
                <div class="footerh1">This is the site footer</div><a href="about.html" class="footerlink">About - Find out about bubble board</a><a href="#" class="footerlink">Login - login into your board</a><a href="buildabubble.html" class="footerlink">Build a bubble board</a>
                <div class="footerh1">Everything here is copyrighted etc etc.&nbsp;</div>
            </div>
            <div class="w-col w-col-4"><img width="65" src="images/webclip.png">
            </div>
        </div>
    </div>
</div>
@endsection