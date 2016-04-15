<?
Class router
{
	public function router($get = array(), $is_connect = 0)
	{
		global $error, $bread;

		if(!empty($get))
		{
			if(isset($get['page']))
			{
				switch($get['page'])
				{
					case 'home':
						echo "__MOD_home__";
						break;
					case 'sign_up':
						$bread = array("Page d'inscription", $get['page']);
						echo "__MOD_sign_up__";
						break;
					case 'login':
						echo "__MOD_login__";
						break;
					case 'game_home':
						if($is_connect == 1)
						{
							echo "__MOD_game_home__";
						}							
						else
						{
							$error[] = "Vous n'êtes pas connecter donc vous ne pouvez pas accèder au jeu.";
							return 0;
						}							
						break;
					case 'test':
						echo "__TPL_test__";
						break;
					default:
						$error[] = "Le call _GET au routeur n'existe pas:  controller = Router";
						break;

				}

			}
		}
		else
			return;
		//ici on recois les gets directement depuis l'index, il faut les traiter et les renvoiyer 
		//le routeur doit permettre d'appeler des module


	}


}