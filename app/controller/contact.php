<?php 

Class contact extends base_module
{
	public function __construct($module_tpl_name, $user)
	{		
		parent::__construct($module_tpl_name);

		if(isset($_POST['return_post_contact']))
		{
			if($_POST['return_post_contact'] == 1 && $_POST['key_safe'] == 55157141)
			{
						if(empty($user))
						{
							$user = new stdClass;
							$user->user_infos = new stdClass;
							$user->user_infos->login = $_POST['pseudo']." - non connecté";
							$user->user_infos->mail = $_POST['email'];
							$user->user_infos->content = $_POST['text'];
						}

				$content = "le joueur : ".$user->user_infos->login." avec l'adresse mail suivante : "
				.$user->user_infos->mail." Vous à envoyé un message depuis le site <br> - '".
				$user->user_infos->content."'";
				//mail(parent::$mail, "Message de contact du site Diy N Game.", $content);
				$_SESSION['error'] = "Votre message à bien été délivré";
			}
		}

		return $this->render();
	}

}


