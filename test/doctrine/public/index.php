<?php


function affiche_pre($var_a_print)
{
    ?><div class='col-xs-12' style='margin-bottom:50px;'><pre><?
        print_r($var_a_print);
    ?></pre></div><?
}


require_once('../app/doctrine/lib/Doctrine.php');
spl_autoload_register(array('Doctrine_Core', 'autoload'));

require_once '../app/modele/models/Object.php';


//connection au sgbd
$link ='mysql://root:darkevengyl@localhost/db_doctrine_test';
$db_link = Doctrine_Manager::connection($link);


/*
//ajotuer un ligne dans la bsd
$article = new Article();

$article->titre = 'Doctrine';
$article->auteur = 'Georges Clooney';
$article->contenu = 'Doctrine, what else ?';
$article->save();
*/


//Récupérer les données de la table
$requete = Doctrine_Query::create()
		->select('title, content')
		->from('article a')
		->where('user_id = 1')
		->execute();



$requete_with_relation = Doctrine_Query::create()
				->select('a.title, a.content, a.user_id, u.name')
				->from('user u')
				->leftjoin('u.article a')
				->where("user_id = 1")
				->execute();



foreach($requete_with_relation as $row)
{
	affiche_pre($row);

}

//Récupérer tout les données de la table
$article = Doctrine_Core::getTable('article')->findAll();

//Récupérer un seul enregistrement
$article = Doctrine_Core::getTable('article')->find(1);


//Comme tout les champs sont récup en bojet on peux tout modifier tant que ->save() est appeler apres pour changer dans la bases
