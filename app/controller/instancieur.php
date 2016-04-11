<?php
//instancie toutes les class pour les rendre volatile dans tout le site


$config = new Config();
$_db_connect = new _db_connect();
$all_query = new all_query();
$user = new user();
$security = new security();
$parser = new parser();

?>