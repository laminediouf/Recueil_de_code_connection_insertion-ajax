<?php
require_once 'database.php';

$value_searched = $_GET['value'];

$request = search($value_searched);

while($result = $request->fetch()) {
    echo '<a href="#">' . $result['first_name'] . ' ' . $result['last_name'] . '</a></br>';
    // echo 'Hello';
}
// echo $_GET['value'];