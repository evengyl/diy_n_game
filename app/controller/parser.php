<?php
class parser
{
	private $module_tpl_name;
	private $var_in_mdl;
	private $rendu_module ="";
	private $user;
	private $is_connect;


	public function parser_main($page, &$user = "")
	{

		if(!empty($page))
		{
			if(!empty($user))
				$this->user = $user;

			if(preg_match('/__TPL0_[a-z_]+__/', $page, $match))
				$page = $this->parse_template_init($match, $page);

			else if(preg_match('/__MOD0_[a-z_]+__/', $page, $match))
				$page = $this->parse_module_init($match, $page);

			else if(preg_match('/__MOD0_[a-z_]+\([a-zA-Z0-9éèçàê_\' ]*\)__/', $page, $match))
				$page = $this->parse_module_init_var($match, $page);

			else
			{
				if(preg_match('/__TPL_[a-z_]+__/', $page, $match))
					$page = $this->parse_template($match, $page);

				else if(preg_match('/__MOD_[a-z_]+__/', $page, $match))
					$page = $this->parse_module($match, $page);

				else if(preg_match('/__MOD_[a-z_]+\([a-zA-Z0-9éèçàê_\' ]*\)__/', $page, $match))
					$page = $this->parse_module_var($match, $page);

				else
				{
					if(preg_match('/__TPL2_[a-z_]+__/', $page, $match))
						$page = $this->parse_template_secondaire($match, $page);

					else if(preg_match('/__MOD2_[a-z_]+__/', $page, $match))
						$page = $this->parse_module_secondaire($match, $page);

					else if(preg_match('/__MOD2_[a-z_]+\([a-zA-Z0-9éèçàê_\' ]*\)__/', $page, $match))
						$page = $this->parse_module_secondaire_var($match, $page);

					else
						return $page;	
				}
			}
		}
		else
			$_SESSION['error'] = "Il y a un problème dans le parser Parser_main() la page n'est pas arrivée au parseur";

		return $page;
	}


	private function parse_template($match, $page)
	{
		$matching_temp = str_replace(array("__TPL_","__"), "", $match[0]);
		$path_template = '../vues/'.$matching_temp.'.php';
		$tpl_content ="";

		if(file_exists($path_template))
		{
			ob_start();
				require_once($path_template);
			$tpl_content = ob_get_clean();
		}
		else
		{
			$_SESSION['error'] = "Le Template : '".$path_template. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $tpl_content, $page);

		return $this->parser_main($page);
	}


	private function parse_template_secondaire($match, $page)
	{
		$matching_temp = str_replace(array("__TPL2_","__"), "", $match[0]);
		$path_template = '../vues/'.$matching_temp.'.php';
		$tpl_content ="";

		if(file_exists($path_template))
		{
			ob_start();
				require_once($path_template);
			$tpl_content = ob_get_clean();
		}
		else
		{
			$_SESSION['error'] = "Le Template : '".$path_template. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $tpl_content, $page);

		return $this->parser_main($page);
	}


	private function parse_module($match, $page)
	{
		$this->module_tpl_name = str_replace(array("__MOD_","__"), "", $match[0]);				

		if($this->module_tpl_name != "")
		{
			$module = new $this->module_tpl_name($this->module_tpl_name, $this->user);
			$this->rendu_module =  $module->get_rendu();
		}
		else
		{
			$_SESSION['error'] = "Le module : '".$path_module. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $this->rendu_module, $page);

		return $this->parser_main($page);			
	}


	private function parse_module_secondaire($match, $page)
	{
		$this->module_tpl_name = str_replace(array("__MOD2_","__"), "", $match[0]);				

		if($this->module_tpl_name != "")
		{
			$module = new $this->module_tpl_name($this->module_tpl_name, $this->user);
			$this->rendu_module =  $module->get_rendu();
		}
		else
		{
			$_SESSION['error'] = "Le module : '".$path_module. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $this->rendu_module, $page);

		return $this->parser_main($page);			
	}


	private function parse_module_var($match, $page)
	{
		$var_in_module_name = stristr($match[0], "(");
		$var_in_module_name = stristr($var_in_module_name, ")", true);
		$var_in_module_name = substr($var_in_module_name, 1);


		$module_name = preg_replace("/[(][a-zA-Z0-9_éèçàê \']*[)]/", "", $match[0]);

		$this->module_name = str_replace(array("__MOD_","__"), "", $module_name);				

		if($this->module_name != "")
		{
			$module = new $this->module_name($this->module_name, $this->user, $var_in_module_name);
			$this->rendu_module =  $module->get_rendu();
		}
		else
		{
			$_SESSION['error'] = "Le module : '".$path_module. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $this->rendu_module, $page);

		return $this->parser_main($page);			
	}


	private function parse_module_secondaire_var($match, $page)
	{
		$var_in_module_name = stristr($match[0], "(");
		$var_in_module_name = stristr($var_in_module_name, ")", true);
		$var_in_module_name = substr($var_in_module_name, 1);


		$module_name = preg_replace("/[(][a-zA-Z0-9_éèçàê \']*[)]/", "", $match[0]);

		$this->module_name = str_replace(array("__MOD2_","__"), "", $module_name);				

		if($this->module_name != "")
		{
			$module = new $this->module_name($this->module_name, $this->user, $var_in_module_name);
			$this->rendu_module =  $module->get_rendu();
		}
		else
		{
			$_SESSION['error'] = "Le module : '".$path_module. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $this->rendu_module, $page);

		return $this->parser_main($page);			
	}


	private function parse_template_init($match, $page)
	{
		$matching_temp = str_replace(array("__TPL0_","__"), "", $match[0]);
		$path_template = '../vues/'.$matching_temp.'.php';
		$tpl_content ="";

		if(file_exists($path_template))
		{
			ob_start();
				require_once($path_template);
			$tpl_content = ob_get_clean();
		}
		else
		{
			$_SESSION['error'] = "Le Template : '".$path_template. "' primaire à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $tpl_content, $page);

		return $this->parser_main($page);
	}


	private function parse_module_init($match, $page)
	{
		$this->module_tpl_name = str_replace(array("__MOD0_","__"), "", $match[0]);				

		if($this->module_tpl_name != "")
		{
			$module = new $this->module_tpl_name($this->module_tpl_name, $this->user);
			$this->rendu_module =  $module->get_rendu();
		}
		else
		{
			$_SESSION['error'] = "Le module : '".$path_module. "'primaire à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $this->rendu_module, $page);

		return $this->parser_main($page);			
	}


	private function parse_module_init_var($match, $page)
	{
		$var_in_module_name = stristr($match[0], "(");
		$var_in_module_name = stristr($var_in_module_name, ")", true);
		$var_in_module_name = substr($var_in_module_name, 1);


		$module_name = preg_replace("/[(][a-zA-Z0-9_éèçàê \']*[)]/", "", $match[0]);

		$this->module_name = str_replace(array("__MOD0_","__"), "", $module_name);				

		if($this->module_name != "")
		{
			$module = new $this->module_name($this->module_name, $this->user, $var_in_module_name);
			$this->rendu_module =  $module->get_rendu();
		}
		else
		{
			$_SESSION['error'] = "Le module : '".$path_module. "'primaire à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $this->rendu_module, $page);

		return $this->parser_main($page);			
	}
}
?>