<?php
/**
 * The Header for our app.
 *
 * @package 
 */
?><!DOCTYPE html>
<!--[if lt IE 9]><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
<head>
	<meta charset="UTF-8" />
    <meta name="theme-color" content="#FFFFFF">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta property="og:image" content="assets/images/facebook-og.jpg" />
    <meta property="og:description" content="That's right. Irish Ferries are offering a luxury break to Ireland. The prize includes Club Class Ferry Travel to Ireland with your car and a two night stay for 2 adults in Athaneanum House in Waterford. " />
    <meta property="og:url" content="http://ebowfb.com/irishferries-travel-together/" />
	<title>Irish Ferries Competition</title>
	
	<!--[if IE ]><link rel="stylesheet" href="assets/css/ie-starter.css" /><![endif]-->
    
    <!-- FONTS --> 
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700' rel='stylesheet' type='text/css'>
    
    <!-- CSS -->
    <link rel='stylesheet' id='production_css'  href='assets/css/production.min.css' type='text/css' media='all' />
    
    <!-- SCRIPT -->
    <script type='text/javascript' src='assets/js/production.min.js'></script>
        
</head>
<body>
    
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=270234236470665";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
        
    <?php 
        // Connect to the database
        require('db.php'); 
    ?>
        
    <?php if ( !empty($_POST) && $_POST['fname'] && $_POST['lname'] && $_POST['email'] && $_POST['country'] && $_POST['question'] && $_POST['terms']) { // IF FORM IS SUBMITTED ?>
    
        <?php 

            /* SAVE ALL DATA TO DATABASE */
            $fname = htmlspecialchars($_POST['fname']);
            $lname = htmlspecialchars($_POST['lname']);
            $country = htmlspecialchars($_POST['country']);
            $answer = htmlspecialchars($_POST['question']);
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
                $email = $_POST['email'];               
            }

            date_default_timezone_set("Europe/Dublin");
            $date = date('Y:m:d H:i');

            $insert = "INSERT INTO users ( fname, lname, email, country, answer, date ) VALUES ( '$fname', '$lname', '$email', '$country', '$answer', '$date' )";
            mysqli_select_db( $dbhandle, 'dev_fb_irishferries' );
            $enter_data = mysqli_query( $dbhandle, $insert );

        ?>
    
        <section id="thank_you" class="outer">
            <a href="#" class="mobile_only back_btn"> <img src="assets/images/back_logo.png" /></a>
            <div class="inner">
                <img class="text_top hide_on_mobile" src="assets/images/text_desktop_thankyou_top.png" />
                <img class="text_top mobile_only" src="assets/images/text_mobile_thankyou_top.png" />
                <p>We’ll be contacting our lucky winner by 30th june 2016</p>
                <p>In the meantime, why not check out <a href="http://www.irishferries.com/ie-en/to-britain-from-ireland/" target="_blank">Irish Ferries</a> and <a href="http://athenaeumhousehotel.com/" target="_blank">Athenaeum House Hotel</a>?</p>
                <div class="share_wrapper">
                    <img class="share_text hide_on_mobile" src="assets/images/text_desktop_thankyou_bottom.png" />
                    <img class="share_text mobile_only" src="assets/images/text_mobile_thankyou_bottom.png" />
                    <ul class="share_bar">
                        <li><a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://ebowfb.com/irishferries-travel-together/" title="Facebook">Facebook</a></li>
                        <li><a class="twitter" target="_blank" href="https://twitter.com/home?status=http://ebowfb.com/irishferries-travel-together/" title="Twitter">Twitter</a></li>
                        <li><a class="google" target="_blank" href="https://plus.google.com/share?url=http://ebowfb.com/irishferries-travel-together/" title="Google Plus">Google Plus</a></li>
                    </ul>
                </div>
            </div>   
            <a href="" class="video_link"><div class="inner"></div></a>
            <div class="footer_thankyou">
                <div class="inner">
                    <div class="center_outer">
                        <div class="center_inner">
                            <img src="assets/images/logo.png" />
                        </div>
                    </div>
                </div>
            </div>    
        </section>    
    
    <?php } else { // DEFAULT PAGE ?>

        <!-- CONTENT -->
        <section id="content" class="outer">
            <div class="inner">

                <div class="mobile_top">
                    <div class="top_text">
                        <img src="assets/images/text_desktop_top.png" />
                    </div>
                    <p>
                        That's right. Irish Ferries are offering a luxury break to Ireland.
                        The prize includes Club Class Ferry Travel to Ireland with your car
                        and a two night stay for 2 adults in Athaneanum House in Waterford. 
                    </p>
                </div>
                <p>To be in with a chance of winning, simply answer the question and submit your details below.</p>

                <div class="question"><img class="hide_on_mobile" src="assets/images/text_desktop_question.png" /><img class="mobile_only" src="assets/images/text_mobile_question.png" /></div>
               
                <form action="" method="POST" id="competition" name="competition">
                    <ul>
                        <li class="radio_holder">
                            <div class="radio_wrap">
                                <input type="radio" name="question" id="radio01" class="css-checkbox custom_radio" value="Connacht" /><label for="radio01" class="css-radiolabel">Connacht</label>
                            </div>
                            <div class="radio_wrap">
                                <input type="radio" name="question" id="radio02" class="css-checkbox custom_radio" value="Ulster" /><label for="radio02" class="css-radiolabel">Ulster</label>
                            </div>
                            <div class="radio_wrap">
                                <input type="radio" name="question" id="radio03" class="css-checkbox custom_radio" value="Munster" /><label for="radio03" class="css-radiolabel">Munster</label>
                            </div>
                            <div class="radio_errors"></div>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <input type="text" name="fname" id="fname" placeholder="First name" required/>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <input type="text" name="lname" id="lname" placeholder="Last name" required/>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <input type="text" name="email" id="email" placeholder="Email address" required/>
                            <div class="clearfix"></div>
                        </li>
                        <li class="select_outer">
                            <div class="select_wrapper">
                                <select name="country" class="select_country">
                                    <option value="" disabled selected>Country of Origin</option>
                                    <option value="Republic of Ireland">Republic of Ireland</option>
                                    <option value="Northern Ireland">Northern Ireland</option>
                                    <option value="England">England</option>
                                    <option value="Scotland">Scotland</option>
                                    <option value="Wales">Wales</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        <li class="terms_holder">
                            <input type="checkbox" name="terms" id="terms" class="css-checkbox" />
                            <label for="terms" class="css-checkboxlabel">I have read and agree to the competition’s <a href="#rules">Terms & Conditions</a></label>
                        </li>
                        <li>
                            <button type="submit">Enter now</button>
                        </li>
                    </ul>
                </form>
                <div class="clearfix"></div>

            </div>
        </section>

        <!-- FOOTER -->
        <footer class="outer">
            <div class="inner">
                <div class="footer_bottom" id="rules">
                    <a href="http://www.irishferries.com/ie-en/to-britain-from-ireland/" target="_blank"><img src="assets/images/logo.png" /></a>
                    <h3>Terms & Conditions</h3>
                     <ol>
                        <li>All entrants must be over 18 years of age. Irish Ferries reserves the right to request written proof of age of the winning Entrant.</li>
                        <li>Anyone that enters the Competition agrees to the terms and conditions that govern Competition and by submitting an entry to the Competition each Entrant agrees to be bound by these.</li>
                        <li>For contestants in the UK, the prize includes return ferry crossing from Britain for two, including Club Class Travel, two nights Bed & Breakfast accommodation for 2 people sharing a twin or double room in Athenaeum House Hotel.</li>
                        <li>Contestants in the Republic of Ireland are entitled to two nights Bed & Breakfast accommodation for 2 people sharing a twin or double room in Athenaeum House Hotel.</li>
                        <li>Valid for stay between now and 19 June 2017 (excludes 22 December 2016 – 1 January 2017).</li>
                        <li>Ferry travel is available on a cruise ferry crossing only from either Holyhead or Pembroke with the dates to be agreed by both Irish Ferries and the winner.</li>
                        <li>This prize cannot be used in conjunction with any other discounts or special offers.</li>
                        <li>The prize cannot be exchanged and duplicates will not be issued for lost tickets/vouchers.</li>
                        <li>Tickets/vouchers are non-transferable and must not be resold.</li>
                        <li>Unless otherwise stated, entries must arrive by the published closing date for the competition.</li>
                        <li>Entries received after this time will be disqualified. Irish Ferries may, at its discretion, extend the closing date without prior notice.</li>
                        <li>Irish Ferries reserves the right to change the rules or void the competition at any time.</li>
                        <li>Prize is as stated and there is no cash alternative in any circumstances whatsoever to prizes offered. Prizes are not transferable unless otherwise stated.</li>
                        <li>If the winner of the competition is unable to take up the prize for any reason Irish Ferries reserves the right to award it to an alternative winner, in which case the first winner chosen will not be eligible for any share of the prize whatsoever.</li>
                        <li>If the winner(s) of the prize cannot be traced after reasonable efforts having been made, Irish Ferries may dispose of the prize as it thinks fit without any liability to the winner(s) for having done so.</li>
                        <li>All winners are required to co-operate with Irish Ferries to publicise their win as Ferries deems appropriate.</li>
                        <li>Failure to comply with any of these rules will disqualify an entry from taking part in the competition. Irish Ferries reserves the right to disqualify any entry at its absolute discretion.</li>
                        <li>Irish Ferries’ decision is final in all matters concerning the competition.</li>
                        <li>It is a condition of entry to the competition that the entrant agrees to be bound by these rules.</li>
                        <li>Where prizes are to be provided by a third party then the winner will be required to complete all appropriate or applicable booking or other formalities direct with such provider. Irish Ferries will have no responsibility for the acts or defaults of any other persons.</li>
                        <li>Email addresses supplied by entrants can be used for promotional purposes by Irish Ferries.  Entrants to the competition agree to this condition. Entrants can unsubscribe from Irish Ferries’ email distribution list at any time.</li>
                        <li>The prize is not in conjunction with any other offers.</li>
                        <li>Competition closes on 21.06.16.  Winner will be announced before the 30.06.16</li>
                        <li>Details of the winner will be posted on Irish Ferries social media channels and will be contacted via email.</li>
                    </ol>
                    <div class="clearfix"></div>
                    <div class="see_more">See more</div>
                </div>
                <div class="clearfix"></div>
            </div>
        </footer>
    
    <?php } ?>

</body>
</html>

