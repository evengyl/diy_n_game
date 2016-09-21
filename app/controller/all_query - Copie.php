<?php
##########################################
#	Createur : Evengyl
#	Date de creation : 29-09-2014
#	Version : 1.2
#	Date de modif : 29-10-2014
##########################################

class all_query extends _db_connect
{
	public $db_link;

	public function select($req_sql)
	{
		$construct_req = "";


		if(is_object($req_sql))
		{
			//partie traitement des var à select
			if(isset($req_sql->var) && $req_sql->var != "")
			{
				$construct_req .= "SELECT ".$req_sql->var." ";
			}
			else
			{
				$construct_req .= "SELECT * ";
			}

			
			if(isset($req_sql->table) && $req_sql->table != "")
			{
				//partie traitement de la ou des tables
				if(strpos($req_sql->table, ','))
				{
					preg_match("/([a-zA-Z_-]+)[ ]*([,])[ ]*([a-zA-Z_-]+)/", $req_sql->table, $match);
					unset($match[0]);

					$construct_req .= "FROM ";

					//on compte le nombre d'élément pour savoir le nombre de virgule qu'il va falloir mettre nombre de table -1
					$i = count($match)-1;

					foreach($match as $row_table_from)
					{
						if($i > 0)
							$construct_req .= $row_table_from .", ";	
						else
							$construct_req .= $row_table_from ." ";	
						$i--;
					}
					//on indique pour la suite du script qu'il s'agit d'une requete multi table
					$multi_table = true;
				}
				else
				{
					$construct_req .= "FROM ". $req_sql->table ." ";
					$multi_table = false;
				}


				if($multi_table)
				{
					if(isset($req_sql->where) && $req_sql->where != "")
					{
						$construct_req .= "WHERE ";	

						$i = count($match)-1;

						foreach($match as $row_table_from)
						{
							if($i > 0)
								$construct_req .= $row_table_from.".".$req_sql->where ." AND ";	
							else
								$construct_req .= $row_table_from.".".$req_sql->where ." ";	
							$i--;
						}
					}
				}
				else
				{
					if(isset($req_sql->where) && $req_sql->where != "")
					{
						$construct_req .= "WHERE ".$req_sql->where." ";	
					}
					else
					{
						return 0;
					}
				}


				if(isset($req_sql->order) && $req_sql->order != "")
				{
					$construct_req .= "ORDER BY ".$req_sql->order." ";	
				}

				$i = 0;
				affiche_pre($construct_req);

				while($row = parent::fetch_object($construct_req))
				{
					$res_fx[$i] = $row;
					$i++;
				}

				unset($construct_req); //vide le buffer de memoire $req_sql pour liberer de la place 
				if(!isset($res_fx))
					return '';
				else 
					return $res_fx;	

			}
			else
			{
				return 0;
			}


	
			
		}
	}


	public function insert_into($res_sql) // opérationnel et fonctionnel , reste à tester sur la validation
	{

		$key_all = "";
		$value_all = "";

		foreach($res_sql->ctx as $key => $values)
		{			
			$key_all = $key_all.', '.$key;
			$value_all = $value_all.', "'.$values.'"';			
		}

		$key_all = substr($key_all,2);

		$value_all = substr($value_all,2);
		$req_sql = "INSERT INTO ".$res_sql->table." (".$key_all.") VALUES (".$value_all.")";

		parent::query($req_sql);
		unset($_POST);
		//echo '<p style="font-size:17px; padding:10px; text-align:center;" class="bg-success">Ligne Ajoutée !</p>';

	}

	public function update($object) // en test et evolution
	{
		$set_all = "";

		if(is_object($object->ctx))
		{	
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
		else
		{
			echo "la requete n'est pas passée car on attendait un objet.";
		}
        return $erreur = 'modification bien appliquée';

	}


	public function delete_row($table, $where)
	{
		$req_sql = "DELETE FROM ".$table." WHERE ".$where;
		parent::query($req_sql);
	}

	public function delete($obj)
	{
		$construct_req = "";

		if(is_object($obj))
		{
			if(isset($obj->where) && $obj->where != "")
			{
				$construct_req = "DELETE FROM ". $obj->table ." WHERE ". $obj->where ."";	
				parent::query($construct_req);
			}
			else
				return 0;
		}
		else
			return 0;
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

	public function set_db_link()
	{
		$this->db_link = parent::get_db_link();
	}

    public function query_simple($query)
    {
        parent::query($query);
    }


	public function generate_form_unpdate($table_needed, $id)
	{
		$req_simply = new stdClass();
		$req_simply->table = $table_needed;
		$req_simply->var = "*";
		$req_simply->where = "id = '". $id ."'";
		$req_simply = $this->select($req_simply);?>
		
	    <div class='contenu_compte'>
	        <div class="row">
	            <div class="col-lg-12">
	                <form class="form-inline" style="margin:auto;" role="form" action="" method="POST">
	                    <br><?php
	                    foreach($req_simply[0] as $key => $value)
	                    {?>
	                            <div class="form-group <?
		                            if($key == 'id')
		                                echo  'has-error';
		                            else
	    	                            echo 'has-success';
        	                    	?>" style="margin-right:30px;">

	                                <div class="input-group">
	                                    <div style="width: 200px;" class="input-group-addon"><?php echo $key ?></div>
	                                    <input style='width:450px;' type="text" <?php echo ($key == 'id')? 'disabled id="disabledInput"':'id="inputSuccess1"'; ?>
                                            id="disabledInput" value="<?= $value ?>"
	                                        class="form-control" name="<?php echo $key ?>">

	                                </div>

	                            </div>
	                            <br><?
	                    }?>
	                    <input type="hidden" name="id" value="<?= $id ?>">
	                    <button style="width: 650px; margin-top:15px;" type="submit" class="btn btn-default">Submit</button>
	                </form>
	            </div>
	        </div>
	    </div><?
	}


	public function generate_form_insert_into($table_needed)
	{
		$req_simply = new stdClass();
		$req_simply->table = $table_needed;
		$req_simply->var = "*";
		$req_simply = $this->select($req_simply);?>
		
	    <div class='contenu_compte'>
	        <div class="row">
	            <div class="col-lg-12">
	                <form class="form-inline" style="margin:auto;" role="form" action="" method="POST">
	                    <br><?php
	                    foreach($req_simply[0] as $key => $value)
	                    {?>
	                            <div class="form-group <?
		                            if($key == 'id')
		                                echo  'has-error';
		                            else
	    	                            echo 'has-success';
        	                    	?>" style="margin-right:30px;">

	                                <div class="input-group">
	                                    <div style="width: 200px;" class="input-group-addon"><?php echo $key ?></div>
	                                    <input style='width:450px;' type="text"
	                                        <?php echo ($key == 'id')? 'disabled id="disabledInput"':'id="inputSuccess1"'; ?>
	                                        <?php echo ($key == 'id_category')? 'disabled id="disabledInput" placeholder="'.$value_2.'"':'id="inputSuccess1"'; ?>
	                                           class="form-control" name="<?php echo $key ?>">

	                                </div>
	                            </div>
	                            <br><?
	                    }?>
	                    <button style="width: 650px; margin-top:15px;" type="submit" class="btn btn-default">Submit</button>
	                </form>
	            </div>
	        </div>
	    </div><?
	}
}

?>