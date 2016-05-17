<?php



class _db_connect extends Config
{
	private $db_link;	
	private $is_connected = false;
	private $last_res_sql = null;
	private $last_req_sql = null;
	


	public function __construct()
	{
		$this->connect();
	}

    public function get_connect_data()
    {
        return array(parent::$hote, parent::$user, parent::$Mpass, parent::$base);
    }
	
	public function connect()
	{

		$this->db_link  = mysqli_connect(parent::$hote, parent::$user, parent::$Mpass, parent::$base)or die('erreur');
		$this->is_connected = true;
		mysqli_set_charset($this->db_link, 'utf8');
		
	}

	//cette fonction va permettre de remplacer dans toute les boucle de fetch, par mysqli_fetch_object
	//elle recois la requete envoyer par l'appelant  
	public function fetch_object($req_sql)  // elle recois la requ�te sql sous forme de string
	{	

		
		

		if($this->is_connected == false) // v�rifie si la connection � la DB est �tablie si pas , elle le fait
			$this->connect(); //appel la fonction

		if(is_null($this->last_req_sql) || is_null($this->last_res_sql) || $req_sql != $this->last_req_sql)
		{
			$this->last_req_sql = $req_sql; // enregistre une copie temporaire de la requete
			parent::set_list_req_sql($req_sql);
			$this->last_res_sql = mysqli_query($this->db_link, $req_sql)or die('Probleme de requete = '. $req_sql);// enregistre une copie temporaire de la reponse requete
		}// si les valeurs sont null ou diff�rente , enregistre les variable correctement

		$res = mysqli_fetch_object($this->last_res_sql);  //enregistre les lignes de la requ�te sur un object
		if (is_null($res))
		 // fetch va vider l'objet envoyer donc on v�rifie si le resultat est null , 
		//si c'est le cas on vide le buffer et remet la variable a null pour une prochaine requ�te
		{
			mysqli_free_result($this->last_res_sql);
			$this->last_res_sql = null;
		}
		
		
		return $res; // renvoi un tableau d'objet
	}


	public function fetch_array($req_sql)
	{
		parent::set_list_req_sql($req_sql);
		if($this->is_connected == false)
			$this->connect();
	
		if(is_null($this->last_req_sql) || is_null($this->last_res_sql) || $req_sql != $this->last_req_sql)
		{
			$this->last_req_sql = $req_sql;
			parent::set_list_req_sql($req_sql);
			$this->last_res_sql = mysqli_query($this->db_link, $req_sql);
		}
		$res = mysqli_fetch_array($this->last_res_sql);
		if (is_null($res))
		{
			mysqli_free_result($this->last_res_sql);
			$this->last_res_sql = null;
		}
		return $res; // renvoi des trucs bizarre petite erreur quelque part
	}


	public function fetch_assoc($req_sql)
	{
		parent::set_list_req_sql($req_sql);
		if($this->is_connected == false)
			$this->connect();
	
		if(is_null($this->last_req_sql) || is_null($this->last_res_sql) || $req_sql != $this->last_req_sql)
		{
			$this->last_req_sql = $req_sql;
			parent::set_list_req_sql($req_sql);
			$this->last_res_sql = mysqli_query($this->db_link, $req_sql);
		}
		$res = mysqli_fetch_assoc($this->last_res_sql);
		if (is_null($res))
		{
			mysqli_free_result($this->last_res_sql);
			$this->last_res_sql = null;
		}
		return $res; //renvoi un tableau de tableau assosiatif
	}


	public function query($req_sql) //not for return somethings
	{
		parent::set_list_req_sql($req_sql);
		$this->connect();
		return mysqli_query($this->db_link, $req_sql)or die(mysqli_error($this->db_link));
		
	}


    public function escape_sql($var)
    {
        $this->connect();
        return mysqli_real_escape_string($this->db_link, $var);
    }

	public function get_last_insert_id()
	{
		return mysqli_insert_id($this->db_link);
	}


	public function get_db_link()
	{
		if($this->is_connected == false) // v�rifie si la connection � la DB est �tablie si pas , elle le fait
			$this->connect(); //appel la fonction
		return $this->db_link;
	}


	public function escape_string($txt)
	{
		if($this->is_connected == false)
			$this->connect();
		return mysqli_real_escape_string($this->db_link, $txt);
	}


    public function get_db_name()
    {
        return $this->base;
    }

    public function db_get_list_table()
    {

        $res_sql = $this->other_query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'matedex'");

        foreach($res_sql as $values => $row)
        {
            unset($row->TABLE_CATALOG);
            unset($row->ENGINE);
            unset($row->VERSION);
            unset($row->AVG_ROW_LENGTH);
            unset($row->INDEX_LENGTH);
            unset($row->DATA_FREE);
            unset($row->CHECK_TIME);
            unset($row->CHECKSUM);
            unset($row->CREATE_OPTIONS);
            unset($row->TABLE_COMMENT);
            unset($row->TABLE_COMMENT);
            unset($row->TABLE_SCHEMA);
            unset($row->TABLE_TYPE);
            unset($row->ROW_FORMAT);
            unset($row->TABLE_ROWS);
            unset($row->DATA_LENGTH);
            unset($row->MAX_DATA_LENGTH);
            unset($row->AUTO_INCREMENT);
            unset($row->CREATE_TIME);
            unset($row->UPDATE_TIME);
            unset($row->TABLE_COLLATION);
        }

        return $res_sql;

    }

    public function db_get_list_champ_of_table($value_require)
    {
        $req_list_champs = array();
        $res_sql = $this->other_query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'matedex'");


        foreach($res_sql as $values => $row)
        {
            unset($row->TABLE_CATALOG);
            unset($row->ENGINE);
            unset($row->VERSION);
            unset($row->AVG_ROW_LENGTH);
            unset($row->INDEX_LENGTH);
            unset($row->DATA_FREE);
            unset($row->CHECK_TIME);
            unset($row->CHECKSUM);
            unset($row->CREATE_OPTIONS);
            unset($row->TABLE_COMMENT);
            unset($row->TABLE_SCHEMA);
            unset($row->TABLE_TYPE);
            unset($row->ROW_FORMAT);
            unset($row->TABLE_ROWS);
            unset($row->DATA_LENGTH);
            unset($row->MAX_DATA_LENGTH);
            unset($row->AUTO_INCREMENT);
            unset($row->CREATE_TIME);
            unset($row->UPDATE_TIME);
            unset($row->TABLE_COLLATION);
        }
        foreach($res_sql as $row => $values)
        {
            $req_list_champs[] = $this->other_query('SELECT COLUMN_TYPE FROM information_schema.'.$value_require.' WHERE TABLE_NAME="'.$values->TABLE_NAME.'"');
        }
    }

}

?>
