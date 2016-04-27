<?php


namespace Evengyl\module;

Class Breadcrumb
{

    public $name;

    public function __construct()
    {
        if(isset($_GET['id_sub_categ']))
        {
            //name est défine quand la requète à la base données est éffectuée
            $this->get_name_url_breadcrumb_sub_categ($this->name);
        }
        else
        {
            $this->get_name_url_breadcrumb_categ($this->name);
        }
    }


    public static function db_get_current_categ()
    {
        if(isset($_GET['categ_id']))
        {
            //on détermine l'option a envoyer pour la requète préparée, ici on envoie l'ID
            $options = array(':id' => $_GET['categ_id']);
            //Pour le breadcrumb, on a uniquement besoin du nom de la page courante
            //le résultat de la requère est directement convertit en objet de type breadcumb prédéfini ici et envoiyer au construteur
            $current_categ = \Evengyl\db\App::DB()->prepare_pdo("SELECT name FROM test_category WHERE id = :id", $options, "Evengyl\module\Breadcrumb", true );

            //va donc rappeler le constructeur de cette classe pour alimenter les données
            return $current_categ;
        }
        else
        {
            return NULL;
        }

    }


    public function db_get_current_sub_categ()
    {
        //on détermine l'option a envoyer pour la requète préparée, ici on envoie l'ID
        $options = array(':id' => $_GET['id_sub_categ']);
        $current_sub_categ = \Evengyl\db\App::DB()->prepare_pdo("SELECT name FROM test_sub_category WHERE id = :id", $options, "Evengyl\module\Breadcrumb", true );
        return $current_sub_categ;
    }


    public function get_name_url_breadcrumb_categ($name)
    {
        if(isset($_GET['categ_id']))
        {
            $id = $_GET['categ_id'];
            return "<a href='?page=category&categ_id=" . $id . "'>" . $name . "</a>";
        }
        else
        {
            return NULL;
        }

    }


    public function get_name_url_breadcrumb_sub_categ($name)
    {
        $id = $_GET['categ_id'];
        $this->name = "<a href='?page=category&categ_id=" . $id . "'>" . $name . "</a>";
    }




}

?>