<!DOCTYPE html>
<!--
Website Termina Online
Author: Richard de Jongh
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="standardstyle.css">
       <link rel="stylesheet" type="text/css" href="Navigationsheet.css" media="screen">
        <title>Termina Online | Contact us</title>
      ownee wacht!  
        
    </head>
    <body>
        
        <div id="banner">
            <img src="img/banner.png" alt="Banner Termina">
        </div>
        
        <div id="header">
            <?php $active = 5;
            include "includes/header.php"; 
            ?>
        </div>
        
        <div id="maincontent">
            <section>
                <article>
                    
                 <p>
                          Do you have a question, comment or something else you want to say to us?
                          Send us a message by filling in the form below!
                        </p>
                        <br />
                        <form method="post" id="messageform">
                            <input type="text" name="name" placeholder="Name"><br>
                            <input type="text" name="email" placeholder="E-mail"><br>
                            <textarea name="message" cols="30" rows="5" placeholder="Your message comes here"></textarea>
                            <br>
                            <input id="knoppen" type="submit" name="sendmail" value="Send">
                        </form>
                        <?php
                        if (!empty($_POST["sendmail"]))
                        {
                            $name       = $_POST["name"];
                            $email = $_POST["email"];
                            $message    = $_POST["message"] . "\n\nThis message is from: $email";
                            $mijnemail = "richarddejongh@home.nl";
                            $result = mail($mijnemail, "Message: $name", $message);
                            if ($result == true)
                            {
                                $sent = true;
                            }
                            else
                            {
                                $sent = false;
                            }
                            // var_dump($result); 
                            
                        }
                        ?>

                    </div>
                    
                </article>
            </section>
        
        <div id="footer">
            <?php include "includes/footer.php"; ?>
        </div>
        <?php

if ($sent == true) 
{
    echo "alert('Bericht verstuurd');";
}
?>
    </body>
</html>
