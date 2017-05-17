<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en+">
    <head>
        <title>100 Men Who Give | Join</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" media="screen and (min-width:750px)" type="text/css" href="css/desktopNav.css" />
        <link rel="stylesheet" media="screen and (max-width:749px)" type="text/css" href="css/mobalNav.css" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0, minimum-scale=1.0" />
        <meta charset="utf-8" />
        <style>
            section section
            {
                background-color:#ffffff;
                background-color:rgba(255, 255, 255, 0.8);
                margin:30px;
                width:80vw;
                justify-content:space-between;
            }
            section h1
            {
                width:100%;
                padding:30px;
                font-size:4em;
            }
            section > div
            {
                width:40%;
                align-self:flex-start;
            }
            section p
            {
                line-height:26px;
                padding:30px;
            }
            form
            {
                width:40%;
                margin:30px;
                display:flex;
                flex-wrap:wrap;
                justify-content:space-between;
                align-self:flex-start;
            }
            fieldset
            {
                padding:15px;
                width:100%;
                margin-bottom:20px;
                border:1px solid #000000;
            }
            fieldset input
            {
                border:1px solid #999999;
                margin-top:5px;
                margin-bottom:5px;
            }
            form > input
            {
                padding:15px;
                width:45%;
                margin:15px;
                margin-left:0px;
                margin-right:0px;
            }
            @media screen and (max-width:1178px)
            {
                fieldset:nth-of-type(2) span
                {
                    display:block;
                    width:100%;
                }
            }
            @media screen and (max-width:950px)
            {
                section h1
                {
                    font-size:2.2em;
                }
                section > div, form
                {
                    width:100%;
                }
            }
            @media screen and (max-width:388px)
            {
                section section
                {
                    margin:0px;
                    width:100%;
                }
                section h1
                {
                    text-align:center;
                }
                section h1, section p
                {
                    padding:15px;
                }
                form
                {
                    margin:15px;
                }
            }
        </style>
    </head>
    
    <body>
        <?php
            if($_SESSION['form_completed'] === false) {
                echo "<script>alert('Error submitting form: Please verify all fields were filled out');</script>";
                $_SESSION['form_completed'] = null;
            } 
        
            if($_SESSION['email_valid'] === false) {
                echo "<script>alert('Error submitting form: Please enter a valid email');</script>";
                $_SESSION['email_valid'] = null;
            }

            if($_SESSION['phones_valid'] === false) {
                echo "<script>alert('Error submitting form: One or more phone numbers was invalid.');</script>";
                $_SESSION['phones_valid'] = null;
            }
			
            if($_SESSION['form_submitted'] === true) {
                echo "<script>alert('Thanks for signing up!');</script>";
            }
        ?>
        
        <header>
            <img alt="100 Men Who Give" src="images/logo.jpg" />
        </header>
        
        <nav tabindex="1">
            <div id="hamburg">
                <div></div>
                <div></div>
                <div></div>
            </div>
            
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="history.html">History</a></li>
                <li><a href="meetings.html">Meetings</a></li>
                <li><a href="charities.html">Charities</a></li>
                <li><a href="join.php">Join&nbsp;Us</a></li>
            </ul>
        </nav>
        
        <main>
            <section id="center">
                <section>
                    <h1>Join The 100 Men</h1>
                    
                    <form method="post" action="php/mail.php">
                        <fieldset>
                            <legend>Basic Information</legend>
                            <div>
                                <span>First Name: </span>
                                <!--<input type="text" name="fname" required />-->
                                <input type="text" name="fname" />
                            </div>
                            <div>
                                <span>Last Name: </span>
                                <!--<input type="text" name="lname" required />-->
                                <input type="text" name="lname" />
                            </div>
                            <div>
                                <span>Your Email: </span>
                                <!--<input type="text" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,3}$" required />-->
                                <input type="text" name="email" />
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Contact Number</legend>
                            <div>
                                <span>Home Number: </span>
                                (<input type="text" name="hphone1" maxlength="3" size="3" />) -
                                <input type="text" name="hphone2" maxlength="3" size="3" /> -
                                <input type="text" name="hphone3" maxlength="4" size="4" /><br />
                                <span>Work Number: </span>
                                (<input type="text" name="wphone1" maxlength="3" size="3" />) -
                                <input type="text" name="wphone2" maxlength="3" size="3" /> -
                                <input type="text" name="wphone3" maxlength="4" size="4" /><br />
                                <span>Cell Number: </span>
                                (<input type="text" name="cphone1" maxlength="3" size="3" />) -
                                <input type="text" name="cphone2" maxlength="3" size="3" /> -
                                <input type="text" name="cphone3" maxlength="4" size="4" />
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Mailing Information</legend>
                            <div>
                                <span>Street Adress: </span>
                                <!--<input type="text" name="address" required />-->
                                <input type="text" name="address" />
                            </div>
                            <div>
                                <span>City: </span>
                                <!--<input type="text" name="city" required />-->
                                <input type="text" name="city" />
                            </div>
                            <div>
                                <span>Zip Code: </span>
                                <!--<input type="text" name="zip" maxlength="5" size="5" required pattern="[0-9]{5}" />-->
                                <input type="text" name="zip" maxlength="5" size="5" />
                            </div>
                            <div>
                                <span>State: </span>
                                <select name = "state">
                                    <option value="al">AL</option>
                                    <option value="ak">AK</option>
                                    <option value="az">AZ</option>
                                    <option value="ar">AR</option>
                                    <option value="ca">CA</option>
                                    <option value="co">CO</option>
                                    <option value="ct">CT</option>
                                    <option value="de">DE</option>
                                    <option value="fl">FL</option>
                                    <option value="ga">GA</option>
                                    <option value="hi">HI</option>
                                    <option value="id">ID</option>
                                    <option value="il">IL</option>
                                    <option value="in">IN</option>
                                    <option value="ia">IA</option>
                                    <option value="ks">KS</option>
                                    <option value="ky">KY</option>
                                    <option value="la">LA</option>
                                    <option value="me">ME</option>
                                    <option value="md">MD</option>
                                    <option value="ma">MA</option>
                                    <option value="mi" selected>MI</option>
                                    <option value="mn">MN</option>
                                    <option value="ms">MS</option>
                                    <option value="mo">MO</option>
                                    <option value="mt">MT</option>
                                    <option value="ne">NE</option>
                                    <option value="nv">NV</option>
                                    <option value="nh">NH</option>
                                    <option value="nj">NJ</option>
                                    <option value="nm">NM</option>
                                    <option value="ny">NY</option>
                                    <option value="nc">NC</option>
                                    <option value="nd">ND</option>
                                    <option value="oh">OH</option>
                                    <option value="ok">OK</option>
                                    <option value="or">OR</option>
                                    <option value="pa">PA</option>
                                    <option value="ri">RI</option>
                                    <option value="sc">SC</option>
                                    <option value="sd">SD</option>
                                    <option value="tn">TN</option>
                                    <option value="tx">TX</option>
                                    <option value="ut">UT</option>
                                    <option value="vt">VT</option>
                                    <option value="va">VA</option>
                                    <option value="wa">WA</option>
                                    <option value="wv">WV</option>
                                    <option value="wi">WI</option>
                                    <option value="wy">WY</option>
                                </select>
                            </div>
                        </fieldset>
                        <input type="submit" value="Submit" />
                        <input type="reset" value="Reset" />
                    </form>
                    
                    <div>
                        <p>Thank you so much for your interest in the 100 (or more) Men Who Give project. Enclosed you will find the information that you need to join this dynamic group. If you would like to join us, fill out the commitment form below and hit the send button at the bottom of the form.</p>

                        <p>I understand that in joining "100 (or more) Men Who Give" I am making a commitment to contribute an annual donation of $400.00 per year ($100.00 per quarter) to worthy causes, charities, and non-profits. I agree to honor my commitment even if I am not fond of the charity chosen. If I am not able to attend the quarterly meeting I will give my check (which will also serve as my proxy vote) to another member to deliver on my behalf.</p>
                    </div>
                </section>
            </section>
        </main>
        
        <footer>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="history.html">History</a></li>
                <li><a href="meetings.html">Meetings</a></li>
                <li><a href="charities.html">Charities</a></li>
                <li><a href="join.php">Join&nbsp;Us</a></li>
            </ul>
            <ul>
                <li>Copyright Information | Email Information</li>
                <li><a href="https://www.facebook.com/100MenTriCities/"><img src="images/facebook_icon.png" alt="Facebook Page" /></a></li>
            </ul>
        </footer>
        <script src="javascript/join.js"></script>
    </body>
</html>