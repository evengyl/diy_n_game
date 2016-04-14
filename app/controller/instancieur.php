<?php
//instancie toutes les class pour les rendre volatile dans tout le site


$config = new Config();
$_db_connect = new _db_connect();
$all_query = new all_query();
$security = new security();
$base_module = new base_module();
$parser = new parser();
$route = new router();

?>