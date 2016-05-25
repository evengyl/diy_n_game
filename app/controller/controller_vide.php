<?php 

Class name extends base_module
{

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		//je veux que ce controller puisse recevoir un post
		$this->traitement_post($_POST);

		return $this->render();
	}

	//attention de bien mettre un autre nom que $_POST, car ça va planter car tu essaie de redéfinir une var superglobal :)
	public function traitement_post($post)
	{
		//exemple du template avec un form 
		// <input type="hidden" name="nom_du_formulaire_defini_dans_le_template" value="123456789">
		if(isset($post['nom_du_formulaire_defini_dans_le_template']))
		{
			if($post['nom_du_formulaire_defini_dans_le_template'] == "123456789")
			{
				//voila c'est tout , tu sais que ce post SERA celui que tu as ETABLI dans ton TPL
			}
		}
	}

}
