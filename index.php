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
    <meta property="og:description" content="Competition" />
    <meta property="og:url" content="" />
	<title>Facebook Competition</title>
	
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
                        That's right. We are offering a luxury break to Ireland. 
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
                        <h3>Terms & Conditions</h3>
                     <ol>
                        <li>All entrants must be over 18 years of age.</li>
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

