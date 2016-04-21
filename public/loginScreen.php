<?php
//B00084376
//This page is used when a user tries to log in.

include "base.php";
$title = "Login";
$linkAddress1 = "../public/images/BabyMetal.jpg";
$linkAddress2 = "../public/images/Sia This is Acting.jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo $title; ?></title>

    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <script language="javascript" type="text/javascript">
        function clearText(field)
        {
            if (field.defaultValue == field.value)
                field.value = '';
            else if (field.value == '')
                field.value = field.defaultValue;
        }
    </script></head>
<body>
<div id="templatemo_container_wrapper">
    <div id="templatemo_container">

        <div id="templatemo_banner">

            <div id="site_title">
                <h1><a href="#">Dublin Music</a></h1>
                <h1><a href="#"><small><?php echo $title; ?></a></h1>
            </div>

            <div id="templatemo_menu">
                <ul>
                    <li><a href="index.php" class="current">Home</a></li>
                    <li><a href="cdsForSale.php">CD's</a></li>
                    <li><a href="instrumentsForSale.php">Instruments</a></li>
                    <li><a href="shoppingCart.php">Shopping Cart</a></li>
                    <li><a href="loginScreen.php"><?php echo $title; ?></a></li>
                </ul>
            </div>

        </div>

        <div id="templatemo_content">
            <div id="side_column">
                <div class="side_column_box">
                    <h2><span></span>New Releases</h2>
                    <div class="side_column_box_content">
                        <div class="news_section">
                            <div style="text-align: center;"><a href="#"><img style="width: 154px; height: 129px;" src="<?php echo $linkAddress1; ?>"/></a></div><a href="#"></a>
                            <p style="text-align: center; color: yellow;">Babymetal</p><p style="text-align: center;">Babymetal</p>
                        </div>

                        <div class="news_section">
                            <div style="text-align: center;"><a href="#"><img style="width: 154px; height: 129px;" src="<?php echo $linkAddress2; ?>" /></a></div><a href="#">
                            </a>
                            <p style="text-align: center; color: yellow;">This is Acting</p><p style="text-align: center;">Sia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main_column">
            <div class="main_column_section">
                <h2><span></span>Member Login<br />
                </h2>
                <div class="main_column_section_content">
                    <?php
                    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))  //If a user has already logged in the below will occur. Showing the user their username and email.
                    {
                        ?>

                        <h5>Thanks for logging in! <br /> <br /> You are <b><?=$_SESSION['Username']?><b> and your email address is <b><?=$_SESSION['EmailAddress']?></b>.
                        <h5><br /> Click below to logout.</h5>

                        <ul>
                            <li><a href="logout.php">Logout.</a></li>
                        </ul>

                        <?php
                    }
                    elseif(!empty($_POST['username']) && !empty($_POST['password'])) //When the user successfully logs in the below will occur.
                    {
                        $username = mysql_real_escape_string($_POST['username']);
                        $password = md5(mysql_real_escape_string($_POST['password'])); //This obtains the password and uses md5 autentiacation for encription.

                        $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");

                        if(mysql_num_rows($checklogin) == 1) //If account and password is correct.
                        {
                            $row = mysql_fetch_array($checklogin);
                            $email = $row['EmailAddress'];

                            $_SESSION['Username'] = $username;
                            $_SESSION['EmailAddress'] = $email;
                            $_SESSION['LoggedIn'] = 1;

                            echo "<h5>You have successfully logged in.<br/><br/></h5>";
                            echo "<h5>Thank you for logging in!<br/><br/></h5>";
                            echo "<h5>Now you can order items and recieve a 20% discount!<br/><br/></h5>";

                            if(($_SESSION['Username']) == 'admin')  //If the admin logs in they will have the option to go to this link for a custom site just the admin can see.
                            {
                                echo "<h5><a href=\"admin.php\"> Click here</a> to the admin's page!</h5>";
                            }

                            else
                            {
                                echo "<h5><a href=\"index.php\"> Click here</a> to go back to main page!</h5>";
                            }

                            echo "<meta http-equiv='refresh' content='=2;index.php' />";
                        }
                        else //If account and/or password is incorrect this will be displayed.
                        {
                            echo "<h5>Error</h5><br/><br/>";
                            echo "<h5>Sorry, your account could not be found. Please <a href=\"loginScreen.php\">click here to try again</a>.</h5>";
                        }
                    }
                    else //When user first visits the login page they will be shown the below until they log in.
                    {
                        ?>

                        <h5>Thanks for visiting! <br /><br /> Please either login below, or <a href="register.php">click here to register</a>.
                            <br /><br />If you are logged in you will recieve a discount on CD's and Instruments! <br />
                            <br /> If you wish to return to the main page <a href="index.php">click here</a>.</h5> <br />

                        <form method="post" action="loginScreen.php" name="loginform" id="loginform">
                            <fieldset>
                                <h5><label for="username">Username:</label><input type="text" name="username" id="username" /><br />
                                <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
                                <input type="submit" name="login" id="login" value="Login" /></h5>
                            </fieldset>
                        </form>

                        <?php
                    }
                    ?>
                </div>
                <div class="cleaner"></div>
                <div class="bottom"></div>
            </div>
            <div class="cleaner"></div>
        </div>
        <div style="text-align: center;" id="templatemo_footer" align="center">
            <div id="templatemo_footer_bar">
                <ul class="footer_menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cdsForSale.php">CD's</a></li>
                    <li><a href="instrumentsForSale.php">Instruments's</a></li>
                    <li><a href="shoppingCart.php">Shopping Cart</a></li>
                    <li><a href="loginScreen.php"><?php echo $title; ?></a></li>
                </ul>
                Copyright © 2016 <a href="index.php#">Dublin Music's <?php echo $title; ?> Page</a>
            </div>
        </div>
    </div>
</div>
</body></html>