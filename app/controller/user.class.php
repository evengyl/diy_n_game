<?php


Class user extends all_query
{
	//doit se 
		//zone de test des ressources 
		// tout ce passe en seconde c'est plus simple 
	public $error = '';
	public $time_unix = '';
	public $ressource_avant = '';
	public $prod_acutelle = '';
	public $time_before = '';

	public function __construct()
	{
		$ressource_avant = 15000;

		$prod_acutelle = 1.25; // par seconde 

		$time_before = 1460030000; 
		//on dis que c'est recup de la bsd


		if($this->error != '')
		{
			return $error;
		}

	}



	public function render()
	{
		// retoune le template avec tout les element
	}

	public function calcul_time()
	{
		$secondes = date("U");

		$minutes = $secondes/60;

		$heures = $minutes/60;

		$jours = $heures/24;

		$annees = $jours/365;

		affiche_pre("L'heure universelle UNIX à : ".$secondes. " Secondes !");





		return get_new_ressource($time_before, $prod_acutelle ,$ressource_avant);


	}


	public function get_new_ressource($time_before, $value_prod, $ressource)
	{
		if(is_numeric($time_before))
		{
			if(is_numeric($value_prod))
			{
				if(is_numeric($ressource))
				{
					echo "it's ok";
				}
			}
		}

		if($time_before < date("U") || $time_before == date("U"))
		{

		}
		else if($time_before > date("U"))
		{
			$this->error =  "Vous avez triché ou alors, si le bu persiste, prenez contact avec l'administrateur";
		}
	}
}