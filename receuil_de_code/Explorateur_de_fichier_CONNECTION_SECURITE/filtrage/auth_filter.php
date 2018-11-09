<?php
/**
 * Created by PhpStorm.
 * User: kalidou
 * Date: 09/10/2018
 * Time: 15:21
 */

if (!isset($_COOKIE['username']) && !isset($_COOKIE['password'])){
    header('location: index.php');
    exit();
}