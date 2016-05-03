<?php 

Class synthese_bases extends base_module
{
	public $test ="sef";
	public function __construct($module_tpl_name)
	{		
		parent::__construct($module_tpl_name);

		affiche_pre($this->user_obj);


		return $this->assign_var("test",$this->test)->render();
	}

	public function calcul_nb_bases_to_create($user_obj)
	{
		//va renvoyer directement au template un Obj , contenant le nombre de bases uqe le joueur peux creer de chaque, définir les prix ici même dans ce controller pour changement facile 
	}

	public function recept_form_with_bases_to_create($_POST)
	{
			//ici recevra le formulaire rempli avec les bases a crées, elle seront passiblement les meme que le mex aposible mais vérifier tout les cas on sais jamais
		//va appeler la fonction de calcule de prix pour chaque champs et recevra en echange le prix total
	}

	public function caclcul_price_total_cost_bases($name_bases, $nb_bases, $user_obj)
	{
		//calculera le prix que coutera la synthese des bases et renverra a la fct précédente
	}

	public function operation_in_bsd($array_bases_prix)
	{
		//idealement recevra un tableau associatif avec le nom de la bses avec un autre array dedans  qui aura le prix total a déduire grace a la fct dans le bases module et la quantité a ajoutée en bases
	}

}
