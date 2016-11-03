<!--Header voor de website -->
<header>
<?php if (!isset($active)) $active = 0;?>
    <nav> <ul id="mainnav">
            <li<?php if ($active =="1") {?> class="active"<?php } ?>><a href="index.php">Home</a></li>
            <li<?php if ($active =="2") {?> class="active"<?php } ?>><a href="register.php">Register</a></li>
            <li<?php if ($active =="3") {?> class="active"<?php } ?>><a href="gameinfo.php">Game-Info</a></li>
            <li<?php if ($active =="4") {?> class="active"<?php } ?>><a href="download.php">Download</a></li>
            <li<?php if ($active =="5") {?> class="active"<?php } ?>><a href="contactus.php">Contact us</a></li>
        </ul>
    
    
    
    </nav>


</header>