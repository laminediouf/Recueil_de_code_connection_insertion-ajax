<?php
/**
 * Created by PhpStorm.
 * User: kalidou
 * Date: 09/10/2018
 * Time: 15:31
 */

$temps = 0;
setcookie ("username", $username, time() + $temps);
setcookie ("password", $password, time() + $temps);

header('location: index.php');