<?php 

Class security extends user
{
	//doit contenir le systeme de verification des droits et des access
	// les systeme et toutes la gestions des ressources de l'user
	public $all_query;

	public function __construct()
	{
		$this->all_query = new all_query();
	}




	


}