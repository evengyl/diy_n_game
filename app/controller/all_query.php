<?php
##########################################
#	Createur : Evengyl
#	Date de creation : 29-09-2014
#	Version : 1.2
#	Date de modif : 29-10-2014
##########################################

class all_query extends _db_connect
{
	

	public $ctx;
	public $db_link;
	
	public function set_db_link()
	{
		$this->db_link = parent::get_db_link();
	}

	public function __construct()
	{
		$this->ctx = (object)array();
	}


	public function other_query($req_sql)
	{
		if(isset($req_sql))
		{
			$i = 0;
			while($row = parent::fetch_object($req_sql))
			{
				$res_fx[$i] = $row;
				$i++;
			}
            if(isset($res_fx))
            {
                if(empty($res_fx))
                {
                    return $res_fx = NULL;
                }
                else
                {
                    return $res_fx;
                }
            }
            else
            {
                return $res_fx = NULL;
            }
		}
		else
		{
			return false;
		}
	}


	public function select_simple($var, $from, $where='', $order='', $type_return='object', $limite ='')
	{	

		if($where != '')
			$req_sql = "SELECT ".$var." FROM ".$from." WHERE ".$where."";		
		else
			$req_sql = "SELECT ".$var." FROM ".$from."";			


		if($order != '')
			$req_sql = $req_sql." ".$order;
		if($limite != '')
			$req_sql = $req_sql.' LIMIT '.$limite;

		// $security = new security(); // instancie le fichier de securiter 
		// $req_sql = $security->verif_req($req_sql); // return la requète sécurisée !		

		if($type_return == 'object')
		{
			$i = 0;

			while($row = parent::fetch_object($req_sql))
			{
				$res_fx[$i] = $row;
				$i++;
			}
		}
		else if($type_return == 'array')
		{
			$i = 0;
			while($row = parent::fetch_array($req_sql))
			{
				$res_fx[$i] = $row;
				$i++;
			}
		}
		else if($type_return == 'assoc')
		{	
			$i = 0;
			while($row = parent::fetch_assoc($req_sql))
			{
				$res_fx[$i] = $row;
				$i++;
			}
		}
		
		unset($req_sql); //vide le buffer de memoire $req_sql pour liberer de la place 
		if(!isset($res_fx))
			return '';
		else 
			return $res_fx;		
	}


	public function insert_into($res_sql) // opérationnel et fonctionnel , reste à tester sur la validation
	{

		$key_all = "";
		$value_all = "";

		$res_sql->ctx['created_on'] = date('Y-m-d H:i:s');
        $res_sql->ctx['modified_on'] = date('Y-m-d H:i:s');
		foreach($res_sql->ctx as $key => $values)
		{			
			$key_all = $key_all.", ".$key;
			$value_all = $value_all.", '".$values."'";			
		}

		$key_all = substr($key_all,2);

		if(isset($res_sql->date))
		{
			$key_all = $key_all.", date";
			$value_all = $value_all.", '".$res_sql->date."'";
			$value_all = substr($value_all,2);
			$req_sql = "INSERT INTO ".$res_sql->table." (".$key_all.") VALUES (".$value_all.")";
		}
		else
		{
			$value_all = substr($value_all,2);
			$req_sql = "INSERT INTO ".$res_sql->table." (".$key_all.") VALUES (".$value_all.")";
		}

		parent::query($req_sql);

		unset($_POST);
		//echo '<p style="font-size:17px; padding:10px; text-align:center;" class="bg-success">Ligne Ajoutée !</p>';

	}

    public function escape_sql($var)
    {
        parent::escape_sql($var);
    }


	public function add_new_column($table, $lines_name, $type_column)
	{
			$req_sql_create_column = "ALTER TABLE ".$table." ADD ".$lines_name." ".$type_column;
			parent::query($req_sql_create_column);	
	}


	public function update($object) // en test et evolution
	{

		$set_all = "";


		
		if(is_object($object->ctx))
		{	
			//$object->ctx->modified_on = date('Y-m-d H:i:s');

			foreach($object->ctx as $key => $values)
			{
				$set_all = $set_all.', '.$key.' = "'.$values.'"';				
			}
		
			$set_all = substr($set_all,2);
			if(isset($object->where))
			{				
				if($object->where == "" OR $object->where == " ")
					$req_sql = 'UPDATE '.$object->table.' SET '.$set_all;
				else
					$req_sql = 'UPDATE '.$object->table.' SET '.$set_all.' WHERE '.$object->where;	
			}
			parent::query($req_sql);

		}
		else if(is_array($object->ctx))
		{	
			//$object->ctx['modified_on'] = date('Y-m-d H:i:s');	

			foreach($object->ctx as $key => $values)
			{
				$set_all = $set_all.', '.$key.' = "'.$values.'"';
			}

			$set_all = substr($set_all,2);

			if($object->where == "" OR $object->where == " ")
				$req_sql = 'UPDATE '.$object->table.' SET '.$set_all;
			else
				$req_sql = 'UPDATE '.$object->table.' SET '.$set_all.' WHERE '.$object->where;
			parent::query($req_sql);

		}
        return $erreur = 'modification bien appliquée';

	}


	public function delete_row($table, $where)
	{
		$req_sql = "DELETE FROM ".$table." WHERE ".$where;
		parent::query($req_sql);
	}


    public function query_simple($query)
    {
        parent::query($query);
    }


	public function tri_before_update($ctx)
	{
		$ctx = (object) $ctx;
		if($ctx->table == 'compte')
		{
			if (isset($ctx->id))
			{
				$res_sql_affiche = $this->select_simple($var='*', $from = $ctx->table, $where = 'id = '.$ctx->id, $order='', $type_return='object');
				foreach($res_sql_affiche as $res_fx)
				$res_fx->type = 'before_edit';
				$res_fx->table = $ctx->table;

				if($res_fx->type == 'before_edit')
					{
						require $_SESSION['version'].'/vue/templates/edit_table.php';
						if(!empty($_POST))
						{
							if($_POST['type'] == 'go_to_edit')
							{
								$update = (object) $_POST;
								$update->id = $res_fx->id;
								$update->table = $res_fx->table;
								unset($res_fx);
								$set_var = 'nom="'.$update->nom.'", adresse="'.$update->adresse.'", login="'.$update->login.'", mdp="'.$update->mdp.'"';
								$where = 'id='.$update->id;													
								$this->update($update->table, $set_var, $where);
							}
						}
					}
								
			}
			else 
				return;
		}
		else 
			return;
	}


    public function db_get_list_table()
    {

        return parent::db_get_list_table();

    }


    public function db_search_in_table($table, $key_word, $all_table)
    {
        // premier foreach sur le tab de table si il y en a plusieurs donc faut un count


        if($all_table == TRUE)
        {

            $table = $this->db_get_list_table();

            foreach($table as $row => $values)
            {
                if($values->TABLE_NAME == 'data_sync' || $values->TABLE_NAME == 'language'
                || $values->TABLE_NAME == 'ma_cmd_cli_det' || $values->TABLE_NAME == 'ma_offers_rows')
                {
                    unset($table[$row]);
                }
            }


            $i=0;
            $j=0;
            foreach($table as $row_table)
            {
                $res_list_champs = $this->other_query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= "'.$row_table->TABLE_NAME.'" AND TABLE_SCHEMA = "matedex"');

                foreach($res_list_champs as $row)
                {
                    $req = 'SELECT * FROM '.$row_table->TABLE_NAME.' WHERE `'.$row->COLUMN_NAME.'` LIKE "%'.$key_word.'%" ORDER BY created_on';

                    $res_sql = $this->other_query('SELECT * FROM '.$row_table->TABLE_NAME.' WHERE `'.$row->COLUMN_NAME.'` LIKE "%'.$key_word.'%" ORDER BY created_on');

                    if($res_sql)
                    {
                        affiche_pre($req);
                        //affiche_pre($res_sql);
                        $i++;
                    }
                    else
                    {
                        $j++;
                    }


                }
            }// on a récupérer la liste des champs de la table
        }

        else if($all_table == FALSE)
        {

            $i=0;
            $j=0;
            foreach($table as $row_table)
            {


                $res_list_champs = $this->other_query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= "'.$row_table.'"');

                foreach($res_list_champs as $row)
                {
                    $i++;
                    $req = "SELECT * FROM '.$row_table.' WHERE `'.$row->COLUMN_NAME.'` LIKE "%'.$key_word.'%" ORDER BY created_on";

                    $res_sql = $this->other_query("SELECT * FROM '.$row_table.' WHERE `'.$row->COLUMN_NAME.'` LIKE "%'.$key_word.'%" ORDER BY created_on");

                    if($res_sql)
                    {
                        affiche_pre($req);
                        //affiche_pre($res_sql);
                        $i++;
                    }
                    else
                    {
                        $j++;
                    }
                }
            }// on a récupérer la liste des champs de la table
        }
        return paragraphe_style("Aucune lignée n'a été détéctée : " .$j. " , nombre de ligne retournée : " .$i);
    }


    public function info_table()
    {
        $res_sql = parent::db_get_list_table();

        foreach($res_sql as $key => $values)
        {
            $values->nom = $values->TABLE_NAME;
            unset($values->TABLE_NAME);
        }

        foreach($res_sql as $row => $values)
        {
            if($values->nom == 'data_sync' || $values->nom == 'language' || $values->nom == "ma_sessions")
            {
                continue;
            }
            else
            {
                $res_sql_modified = $this->other_query("SHOW COLUMNS FROM ".$values->nom." LIKE 'modified_on'");
                $res_sql_created = $this->other_query("SHOW COLUMNS FROM ".$values->nom." LIKE 'created_on'");

                if(empty($res_sql_created))
                {
                    $list_a_created[] = $values->nom;
                }
                else
                {
                    if($res_sql_created[0]->Type != "datetime")
                    {
                        $list_a_created[] = $values->nom;
                    }
                }

                if(empty($res_sql_modified))
                {
                    $list_a_modified[] = $values->nom;
                }
                else
                {
                    if($res_sql_modified[0]->Type != "datetime")
                    {
                        $list_a_modified[] = $values->nom;
                    }
                }
            }

            unset($res_sql_created);
            unset($res_sql_modified);
        }

        unset($res_sql_created);
        unset($res_sql_modified);

        if(isset($list_a_created) || isset($list_a_modified))
        {
            $list = array();
            $list["modified_on"] = array();
            $list["created_on"] = array();

            if(isset($list_a_modified))
            {
                foreach($list_a_modified as $list_simple)
                {
                    array_push($list["modified_on"], $list_simple);
                }
            }

            if(isset($list_a_created))
            {
                foreach($list_a_created as $list_simple)
                {
                    array_push($list["created_on"], $list_simple);
                }
            }

            return $list;
        }
        else
        {
            return NULL;
        }


    }


	public function verify_column_synchro($ctx = "") //recois la liste des table de la synchronisation sous forme de tab $_POST
	{
		unset($ctx['table_list']);


		if(isset($ctx) && $ctx != '' && $ctx != ' ')
		{
	
			if(is_array($ctx))
			{
				$ctx_object = new stdClass;	
				foreach($ctx as $key => $values)
				{
					$ctx_object->$key = $values;
				}	
			}
			$compteur = 0;


			foreach($ctx_object as $row)
			{
				
				$req_list_champs = 'SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_NAME="'.$row.'"';

				$res_list_champs = $this->other_query($req_list_champs);
				$created_on_create = false;
				$modified_on_create = false;	

				foreach($res_list_champs as $row_champs)
				{ // on vérifie encore si les champ sont crée
					if(isset($row_champs->COLUMN_NAME))
					{
						if($row_champs->COLUMN_NAME == "created_on")
						{
							$created_on_create = true;
						}

						if($row_champs->COLUMN_NAME == "modified_on")
						{
							$modified_on_create = true;	
						}
					}
				}

				$date_now = date('Y-m-d H:i:s');

				if($created_on_create == false)
				{
					$this->add_new_column($row, 'created_on', $type ="DATETIME NOT NULL");
					$req_sql= 'UPDATE '.$row.' SET created_on = "'.$date_now.'"';
					parent::query($req_sql);
					$compteur++;
				}
				if($modified_on_create == false)
				{
					$this->add_new_column($row, 'modified_on', $type ="DATETIME NOT NULL");
					$req_sql= 'UPDATE '.$row.' SET modified_on = "'.$date_now.'"';
					parent::query($req_sql);
					$compteur++;
				}

							

			}
		}
		else
		{
			return 'erreur survenue dans la fonction verify_column_synchro par rapport aux données reçues';
		}
	return 'Votre insertion et synchronisation + add des colonne pour la synchro se sont bien déroulée : Nobmre de modification : '.$compteur;
	}


    public function info_db_table_champ()
    {

        $req_list_champs = parent::db_get_list_champ_of_table('COLUMNS');

        foreach($req_list_champs as $row)
        {
            foreach($row as $column)
            {
                $column->COLUMN_TYPE = str_replace(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '(', ')', 'tiny', 'medium', 'var', 'date', 'time', 'unsigned'), '', $column->COLUMN_TYPE);
                $column->COLUMN_TYPE = str_replace(array('double', 'float'), 'int', $column->COLUMN_TYPE);
                $column->COLUMN_TYPE = str_replace(array('text', 'char'), 'string', $column->COLUMN_TYPE);
                if($column->COLUMN_TYPE == 'datetime')
                {
                    unset($column->COLUMN_TYPE);
                }
            }
        }
        return $req_list_champs;
    }
}

?>