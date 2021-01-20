<?php

    $db=mysqli_connect("localhost", "root", "", "library");
    /* sever name, username, password, database name  */

    if(!$db)
    {
        die("Connection Failed: " .mysqli_connect_error());
    }



?>