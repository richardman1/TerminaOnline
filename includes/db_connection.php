<?php

/*
 * Database connectie bestand. Na het includen van dit bestand wordt de database connectie opgeslagen in $link.
 */
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$link = mysqli_connect("localhost", "root", "", "terminaonline", "3306");
if (mysqli_connect_error($link))
{
    echo "de volgende error heeft zich voortgedaan: " . mysqli_connect_error($connection);
    exit;
}
setlocale(LC_ALL, "nl_NL");
?>