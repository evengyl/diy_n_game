<?php 

Class contact extends base_module
{
	public function __construct($module_tpl_name)
	{		
		parent::__construct($module_tpl_name);

		if(isset($_POST['return_post_contact']))
		{
			if($_POST['return_post_contact'] == 1 && $_POST['key_safe'] == 55157141)
			{
						if(empty($user_obj))
						{
							$user_obj = new stdClass;
							$user_obj->user_infos = new stdClass;
							$user_obj->user_infos->login = $_POST['pseudo']." - non connecté";
							$user_obj->user_infos->mail = $_POST['email'];
							$user_obj->user_infos->content = $_POST['text'];
						}

				$content = "le joueur : ".$user_obj->user_infos->login." avec l'adresse mail suivante : "
				.$user_obj->user_infos->mail." Vous à envoyé un message depuis le site <br> - '".
				$user_obj->user_infos->content."'";
				mail(parent::$mail, "Message de contact du site Diy N Game.", $content);
				$_SESSION['error'] = "Votre message à bien été délivré";
			}
		}

		return $this->render();
	}

}


