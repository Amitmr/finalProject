<?php

    $con=mysqli_connect('localhost','amitmr_amit','Aa123456','amitmr_users');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>
