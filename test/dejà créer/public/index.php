<?php
require "../app/autoloader.php";
\Evengyl\Autoloader::register();
$base_path = "/robot_game/public";
$app = \Evengyl\db\App::get_instance();




// enregistrement du logo
ob_start();
require '../content/show_logo.php';
$header = ob_get_clean();



// enregistrement du breadcumb
ob_start();
require '../content/show_breadcumb.php';
$breadcumb_content = ob_get_clean();



//start menu lateral + la home page avec des article aléatoire + prochainement des textes et articles + explication
ob_start();

if(isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 'home';

if($page == 'home')
{
    $title_page = 'Home Page';
}
    require "../content/show_menu_lateral.php";

$menu_lateral = ob_get_clean();




ob_start();

$content = ob_get_clean();



ob_start();

$random_home_page = ob_get_clean();



require_once "../content/templates/default.php";
?>