<?php

//kết nối csdl

$host = DB_HOST;
$port = DB_PORT;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$db_name = DB_NAME;



try {
    $conn = new PDO("mysql:host=$host;port = $port;dbname=$db_name", $username, $password);
    // cai dat che do bao loi la xu ly ngoai le
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //cai dat che do tra du lieu
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
   debug("Connection failed: " . $e->getMessage());
}
