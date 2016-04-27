<?php
namespace Evengyl\db;

use \PDO;


Class Database
{
    private $database_name = "";
    private $user = "";
    private $password = "";
    private $host = "";
    public $pdo = "";

    public $number_row;


    /**
     * @param string $database_name
     * @param string $user
     * @param string $password
     * @param string $host
     */
    public function __construct($database_name, $user, $password, $host)
    {
        $this->database_name = $database_name;
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;

    }

    /**
     * @return PDO
     */
    private function get_pdo()
    {

        if($this->pdo == null)
        {

            $pdo = new PDO('mysql:dbname=' . $this->database_name . ';host=' . $this->host, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            // initialisation à la base de données , fonctionne comme avec mysqli.
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // attribution des code d'erreur de retour comme le die() de mysqli
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    /**
     * @param $query
     * @return resultat tab -> obj
     */
    public function exec_pdo($query)
    {
        $pdo = $this->get_pdo();
        $res_pdo = $pdo->exec($query);
        return $res_pdo->fetchAll(PDO::FETCH_OBJ);
    }

    public function prepare_pdo($query, $options, $class_name = "", $one_article = false)
    {
        $pdo = $this->get_pdo(); // recupération de l'instance de PDO

        $res_pdo = $pdo->prepare($query); //on prepare la requète avec prepare
        // on dis a PDO que la requète est de type préparée donc va attendre de recevoir l'execute pour continuer la requète



        $res_pdo->execute($options);
        // on execute la commande avec execute en lui donant les parametre

        if($class_name == "")
        {
            $res_pdo->setFetchMode(PDO::FETCH_OBJ);
        }
        else if($class_name != "")
        {
            $res_pdo->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        // ici on associe la méthode de fetch qui sera utlisée pour les requète

        if($one_article == true)
        {
            return $res_pdo->fetch(); //on fetch le resultat qui sera unique
        }
        else if($one_article == false)
        {
            return $res_pdo->fetchAll();//on fetch les résultats
        }

    }

    /**
     * @param $query
     * @return array
     */
    public function query_pdo($query, $class_name = '')
    {
        $pdo = $this->get_pdo();
        $res_pdo = $pdo->query($query);

        $this->count_row_affect($res_pdo);

        if(preg_match("/INSERT INTO/", $res_pdo->queryString))
        {
            return true;
        }
        else
        {
            if($class_name == '')
            {
                return $res_pdo->fetchAll(PDO::FETCH_OBJ);
            }
            else
            {
                return $res_pdo->fetchAll(PDO::FETCH_CLASS,$class_name);
            }
        }



        /* en gros avec PDO je peux le dire d'au lieu de me retourner un objet de class standart comme avec
           mysqli, je peux lui dire de retourner un objet de class "citée après la virgule avec Fetch Class*/
    }





    private function count_row_affect($res_pdo)
    {
        $this->number_row =  $res_pdo->rowCount();
    }
}
?>