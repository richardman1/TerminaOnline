
<!DOCTYPE html>
<!--
Website Termina Online
Author: Richard de Jongh
-->
<?php include "includes/db_connection.php";?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="standardstyle.css">
        <link rel="stylesheet" type="text/css" href="Navigationsheet.css" media="screen">
        <title>Termina Online | Register</title>

    </head>
    <body>

        <div id="banner">
            <img src="img/banner.png" alt="Banner Termina">
        </div>

        <div id="header">
            <?php $active = 2;
            include "includes/header.php";
            ?>
        </div>

        <div id="maincontent">
            <section>
                <article>


                    <p>
                        Don't want to lose time to register when the game is released? Sign up now!

                    <h1>Registerform</h1>
                    <hr>
                    <p>
                        Fill in your data here to create your own personal account!
                    </p>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
                            isset($_POST['username'], $_POST['name'], $_POST['password'], $_POST['passwordcontrol'], $_POST['adress'], $_POST['city'], $_POST['dateofbirth'], $_POST['phonenumber'], $_POST['email'], $_POST['zipcode'])) {
                        // We gaan de errors in een array bijhouden
                        // We kunnen dan alle foutmeldingen in een keer afdrukken.
                        $aErrors = array();

                        //  Een naam bevat letters en spaties (minimaal 3)
                        if (!isset($_POST['username']) or ! preg_match('~^[\w ]{3,24}$~', $_POST['username'])) {
                            $aErrors['username'] = 'The username you have entered is incorrect.';
                        }

                        //  Een naam bevat letters en spaties (minimaal 3)
                        if (!isset($_POST['name']) or ! preg_match('~^[\w ]{3,}$~', $_POST['name'])) {
                            $aErrors['name'] = 'The name you have entered is incorrect.';
                        }

                        //  Een email-adres is wat ingewikkelder
                        if (!isset($_POST['email']) or ! preg_match('~^[a-z0-9][a-z0-9_.\-]*@([a-z0-9]+\.)*[a-z0-9][a-z0-9\-]+\.([a-z]{2,6})$~i', $_POST['email'])) {
                            $aErrors['email'] = 'The e-mail is incorrect.';
                        }

                        //  Een adres heeft letters, cijfers, spaties (minimaal 5)
                        if (!isset($_POST['adress']) or ! preg_match('~^[\w\d ]{5,}$~', $_POST['adress'])) {
                            $aErrors['adress'] = 'The adress is incorrect.';
                        }

                        //  Een plaatsnaam heeft letters, spaties en misschien een apostrof
                        if (!isset($_POST['city']) or ! preg_match('~^[\w\d\' ]*$~', $_POST['city'])) {
                            $aErrors['city'] = 'The city is incorrect.';
                        }

                        //  Een postcode heeft vier cijfers, eventueel een spatie, en twee letters
                        if (!isset($_POST['zipcode']) or ! preg_match('~^\d{4} ?[a-zA-Z]{2}$~', $_POST['zipcode'])) {
                            $aErrors['zipcode'] = 'Your zipcode is incorrect.';
                        }

                        // wachtwoord (minimaal 3)
                        if (!isset($_POST['password']) or ! preg_match('~^[\w ]{3,30}$~', $_POST['password'])) {
                            $aErrors['password'] = 'Illegal password entered.';
                        }

                        // wachtwoord (minimaal 3)
                        if (!isset($_POST['passwordcontrol']) or ! preg_match('~^[\w ]{3,30}$~', $_POST['passwordcontrol'])) {
                            $aErrors['password'] = 'Illegal password entered.';
                        }

                        if (count($aErrors) == 0) {

                            if (mysqli_connect_errno()) {
                                printf("Connect failed: %s\n", mysqli_connect_error());
                            }

                            if ($_POST['password'] != $_POST['passwordcontrol']) {
                                echo '<br /><div class="warning">Passwords are not the same.</div>';
                            } else {
                                $sql = "INSERT INTO User (`Username`,`Password`, `Name`, `Adress`, `Zipcode`, `City`,`Dateofbirth`,`Phonenumber`,`E-mail`) VALUES " .
                                        "('" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['name'] . "', '" . $_POST['adress'] . "', '" . $_POST['zipcode'] . "', '" . $_POST['city'] . "', '" . $_POST['dateofbirth'] . "', '" . $_POST['phonenumber'] . "', '" . $_POST['email'] . "');";

                                // Voer de query uit en vang fouten op 
                                if (!mysqli_query($link, $sql)) {
                                    $aErrors['username'] = '<div class="warning">Registration failed.</div>';
                                } else {
                                    echo '<br /><p>You have registered yourself succesfully!<br /><br /><a href="index.php" title="homepage">Click here</a> to go back to the home page.</p>';
                                    // Met myslqi_insert_id krijg je de id van het autoincrement veld terug - het klantnr.
                                    $user = mysqli_insert_id($link);

//                                    $_SESSION['user'] = $user;
//                                    $_SESSION['name'] = $_POST["name"];

                                    // Sluit de connection
                                    mysqli_close($link);
                                }
                            }
                        }
                    }

                    if (isset($aErrors) and count($aErrors) > 0) {
                        print '<ul class="errorlist">';
                        foreach ($aErrors as $error) {
                            print '<li class="warning">' . $error . '</li>';
                        }
                        print '</ul>';
                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
                            isset($_POST['username'], $_POST['name'], $_POST['password'], $_POST['passwordcontrol'], $_POST['adress'], $_POST['city'], $_POST['dateofbirth'], $_POST['phonenumber'], $_POST['email'], $_POST['zipcode'])) {
                        
                    } else {}
                        ?>
                        <br />
                        <h3>
                            Please enter the following details:
                        </h3>
                        <form id="registratieform" method="post" action="">
                            <table id="toevoegenp" >
                                <tr><th colspan="3"><h2>Useraccount:</h2></th></tr>
                                <tr><td colspan="3"><hr></td></tr>
                                <tr><th>Your username:					</th><td><input type="text" name="username" size="24" maxlength="24" placeholder="username" required>								<br></td>
                                    <td>Maximum of 24 characters</td></tr>
                                <tr><th>Enter your password here:			</th><td><input type="password" name="password" placeholder="password" size="30" maxlength="30" required>								<br></td>
                                    <td>Maximum of 30 characters:</td></tr>
                                <tr><th>Please enter your password again: <br/>(control purposes): </th><td><input type="password" name="passwordcontrol" size="30" placeholder="passwordcontrol" maxlength="35" required>	<br></td></tr>

                                <td><br /></td>

                                <tr><th colspan="3"><h2>Personal details:</h2></th>
                                <tr><td colspan="3"><hr></td></tr>
                                <tr><th>Enter your name:				</th><td><input type="text" name="name" placeholder="name" size="35" maxlength="45" required>												<br></td></tr>
                                <tr><th>Enter your adress:				</th><td><input type="text" name="adress" placeholder="adress" size="35" maxlength="35" required>												<br></td></tr>
                                <tr><th>Enter your city:			</th><td><input type="text" name="city" placeholder="city" size="20" maxlength="35" required>									<br></td></tr>
                                <tr><th style="text-align: left;">Enter your zipcode:			</th><td><input type="text" name="zipcode" placeholder="1234AB" size="6" maxlength="6" required>								<br></td></tr>
                                <tr><th>Enter your date of birth:		</th><td><input type="date" name="dateofbirth" placeholder="dd-mm-yyyy" size="10" maxlength="11" required>								<br></td></tr>
                                <tr><th>Enter your phonenumber:		</th><td><input type="tel" name="phonenumber" placeholder="06-12345678" size="12" maxlength="14" required>								<br></td></tr>
                                <tr><th>Enter your email:			</th><td><input type="email" name="email" placeholder="Jantje@gmail.com" size="30" maxlength="45" required>									<br></td></tr>

                                <tr><td colspan="2" id="bijschrijvingen">* all fields are required and no foreign characters</td><th align="right"><input id="knoppen" align="right" type="submit" name="toevoegsubmit" value="Register"></th></tr>
                            </table>
                        </form>
                        
                        </p>


                    </article>
                </section>
            </div>

            <div id="footer">
    <?php include "includes/footer.php"; ?>
        </div>
    </body>
</html>
