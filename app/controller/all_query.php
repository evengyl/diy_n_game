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

			if(isset($req_sql->var) && $req_sql->var != "")
			{
				$construct_req .= "SELECT ".$req_sql->var." ";
			}
			else
			{
				return 0;
			}

			if(isset($req_sql->table) && $req_sql->table != "")
			{
				$construct_req .= "FROM ".$req_sql->table." ";
			}
			else
			{
				return 0;
			}

			if(isset($req_sql->where) && $req_sql->where != "")
			{
				$construct_req .= "WHERE ".$req_sql->where." ";	
			}

			if(isset($req_sql->order) && $req_sql->order != "")
			{
				$construct_req .= "ORDER BY ".$req_sql->order." ";	
			}

			$i = 0;

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