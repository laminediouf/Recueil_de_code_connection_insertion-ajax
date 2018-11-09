<?php
/**
 * PDO connexion
 * @return connexion
 */
function connexion() {
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=table_1;charset=utf8','root','');
        return $connexion;
        //echo 'Connexion etabli';
    }
    catch(Exception $ex) {
        die("Erreur " . $ex->getMessage());
    }
}



/**
 * select function
 * @param string select query
 * @return request
 */
function select_request($query) {
    $con = connexion();

    $request = $con->prepare($query);
    $request->execute();

    return $request;
}


/**
 * insert function
 * @param string insert request
 */
function insert_request($query) {
    $con = connexion();
    $request = $con->prepare($query);
    $request->execute();
}

function insert($first_name, $last_name, $address) {
    $con = connexion();
    $query = 'INSERT INTO users(first_name, last_name, user_address) VALUES (?, ?, ?)';
    $request = $con->prepare($query);
    try {
        $request->execute(array($first_name, $last_name, $address));
        echo 'Enregistrement réussi';
    }
    catch(Exception $ex) {
        die('Erreur : ' . $ex->getMessage());
    }

}


/**
 * search function
 * @param string character searched
 */
function search($search_value) {
    $con = connexion();
    $query = 'SELECT first_name, last_name FROM table_1 WHERE first_name like ?"%" OR last_name like ?"%"';
    $request = $con->prepare($query);
    $request->execute(array($search_value, $search_value));
    
    return $request;
}


?>