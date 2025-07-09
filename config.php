<?php
$config = array();

$config['dbname'] = "projeto_cinehub";
$config['host'] = "localhost";
$config['dbuser'] = "root";
$config['dbpass'] = '';

define('BASE_URL', 'http://localhost/cursophp.com/');

global $db;

try {
    $db = new PDO(
        "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'] . ";charset=utf8",
        $config['dbuser'],
        $config['dbpass'],
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (PDOException $e) {
    echo "erro " . $e->getMessage();
}
?>