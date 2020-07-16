<?php
define('ROOT_URL', 'http://localhost:8080/Matdoz-nettside/');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Z85SRckFBtHExR2g');
define('DB_NAME', 'matdoz');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$connection) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>


