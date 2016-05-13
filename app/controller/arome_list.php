<?php 

Class arome_list extends base_module
{

	public function __construct($module_tpl_name)
	{		
		parent::__construct($module_tpl_name);		

		$arome_list = new stdClass();
		$arome_list->table = "aromes";
		$arome_list->var = "*";
		$arome_list->where = "marque = 'Cappela Flavor'";
		$res_sql = $this->select($arome_list);

		

$test = array();
		foreach($res_sql as $row)
		{
			$test[][$row->marque] = $row->nom;
		}

		



		return $this->assign_var("test", $test)->assign_var("user", $this->user_obj)->render();
	}


}
