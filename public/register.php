<?php
/*
 * B00084376
 * This page is used to register a user into the database "users".
 */
$title = 'Register';
$title2 = 'Login';
$linkAddress1 = '../public/images/BabyMetal.jpg';
$linkAddress2 = '../public/images/Sia This is Acting.jpg';
?>

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
                <h1><a href="#"><?php echo $title; ?></a></h1>
            </div>

            <div id="templatemo_menu">
                <ul>
                    <li><a href="../public/index.php" class="current">Home</a></li>
                    <li><a href="../public/cdsForSale.php">CD's</a></li>
                    <li><a href="../public/instrumentsForSale.php">Instruments</a></li>
                    <li><a href="../public/shoppingCart.php">Shopping Cart</a></li>
                    <li><a href="../public/loginScreen.php"><?php echo $title2; ?></a></li>
                </ul>
            </div>

        </div>

        <div id="templatemo_content">
            <div id="side_column">
                <div class="side_column_box">
                    <h2><span></span>New Releases</h2>
                    <div class="side_column_box_content">
                        <div class="news_section">
                            <div style="text-align: center;"><a href="../public/cdsForSale.php"><img style="width: 154px; height: 129px;" src="<?php echo $linkAddress1; ?>"/></a></div><a href="#">
                            </a>
                            <p style="text-align: center; color: yellow;">Babymetal</p><p style="text-align: center;">Babymetal</p>
                        </div>

                        <div class="news_section">
                            <div style="text-align: center;"><a href="../public/cdsForSale.php"><img style="width: 154px; height: 129px;" src="<?php echo $linkAddress2; ?>"/></a></div><a href="#">
                            </a>
                            <p style="text-align: center; color: yellow;">This is Acting</p><p style="text-align: center;">Sia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main_column">
            <div class="main_column_section">
                <h2><span></span>Register<br />
                </h2>
                <div class="main_column_section_content">
                    <h5>
                        <?php
                        if(!empty($_POST['username']) && !empty($_POST['password']))  //If the user enters a username and password the below will happen.
                        {
                            $username = mysql_real_escape_string($_POST['username']);
                            $password = md5(mysql_real_escape_string($_POST['password']));
                            $email = mysql_real_escape_string($_POST['email']);

                            $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'"); //This will run a mysql query to see if the username entered exists in the table.

                            if(mysql_num_rows($checkusername) == 1)  //If the username exists then the user can not register that username.
                            {
                                echo "<h1>Error</h1>";
                                echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
                            }

                            else //If the username and password do not exist in the database.
                            {
                                $registerquery = mysql_query("INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$password."', '".$email."')");  //This add the username, password and email to the table using the mysql command "INSERT".

                                if($registerquery)
                                {
                                    echo "<h1>Success</h1>";
                                    echo "<p>Your account was successfully created. Please <a href=\"loginScreen.php\">click here to login</a>.</p>";
                                }
                                else
                                {
                                    echo "<h1>Error</h1>";
                                    echo "<p>Sorry, your registration failed. Please go back and try again.</p>";
                                }
                            }
                        }
                        else  //This will occur when the user wants to create an account.
                        {
                            ?>

                            <h5><big><p>Please enter your details below to register.</p></big>

                            <form method="post" action="register.php" name="registerform" id="registerform">
                                <fieldset>
                                    <small><label for="username">Username:</label><input type="text" name="username" id="username" /><br />
                                    <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
                                    <label for="email">Email Address:</label><input type="text" name="email" id="email" /><br /></small>
                                    <input type="submit" name="register" id="register" value="Register" />
                                </fieldset>
                            </form></h5>

                            <?php
                        }
                        ?>
                    </h5>
                </div>
                <div class="cleaner"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div style="text-align: center;" id="templatemo_footer" align="center">
            <div id="templatemo_footer_bar">
                <ul class="footer_menu">
                    <li><a href="../public/index.php">Home</a></li>
                    <li><a href="../public/cdsForSale.php">CD's</a></li>
                    <li><a href="../public/instrumentsForSale.php">Instruments's</a></li>
                    <li><a href="../public/shoppingCart.php">Shopping Cart</a></li>
                    <li><a href="../public/loginScreen.php"><?php echo $title2; ?></a></li>
                </ul>
                Copyright © 2016 <a href="../public/index.php">Dublin Music's <?php echo $title; ?> Page</a>
            </div>
        </div>
    </div>
</div>
</body></html>