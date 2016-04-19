<?php

class parser
{
	private $module_tpl_name;
	private $var_in_mdl;
	private $rendu_module ="";
	private $user;
	private $is_connect;

	public function parser_main($page, $user = "")
	{

		global $error;
		$this->set_user($user);
		//parser la page complète a la recherche des __TPL_bla__ et __MOD_bla__
		if(!empty($page))
		{
			if(preg_match('/__TPL_[a-z_]+__/', $page, $match))
			{
				$page = $this->parse_template($match, $page);
			}
			else if(preg_match('/__MOD_[a-z_]+__/', $page, $match))
			{
				$page = $this->parse_module($match, $page);
			}
			else if(preg_match('/__MOD_[a-z_]+[(]?[a-zA-Z0-9éèçàê_\' ]*[)]?__/', $page, $match))
			{
				$page = $this->parse_module_var($match, $page);
			}
			else
			{
				return $page;
			}
		}
		else
			$error[] = "Il y a un problème dans le parser Parser_main() la page n'est pas arrivée au parseur";

		return $page;
		
	}

	private function set_user($user)
	{
		if($user != "")
		{
			$this->user = $user;	
		}
		return 0;
		
	}



	private function parse_template($match, $page)
	{
		global $error;

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
			$error[] = "Le Template : '".$path_template. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $tpl_content, $page);


		return $this->parser_main($page);


		 // permet de descendre en profondeur des templates sera recusif sur le callback du parseur main tant qu'il en détectera dans le code
	}





	private function parse_module($match, $page)
	{
		global $error;
		global $user;

		$this->module_tpl_name = str_replace(array("__MOD_","__"), "", $match[0]);				

		if($this->module_tpl_name != "")
		{
			$module = new $this->module_tpl_name($this->module_tpl_name, $this->user);
			$this->rendu_module =  $module->get_rendu();
		}
		else
		{
			$error[] = "Le module : '".$path_module. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $this->rendu_module, $page);


		return $this->parser_main($page);			
			 				
	}

	private function parse_module_var($match, $page)
	{
		global $error;
		global $user;

//		$this->module_tpl_name = str_replace(array("__MOD_","__"), "", $match[0]);	
//		affiche_pre($module_tpl_name);
		$var_in_match = stristr($match[0], "(");
		$var_in_match = stristr($var_in_match, ")", true);
		$var_in_match = substr($var_in_match, 1);


		$module_name = preg_replace("/[(][a-zA-Z0-9_éèçàê \']*[)]/", "", $match[0]);

		$this->module_name = str_replace(array("__MOD_","__"), "", $module_name);				

		if($this->module_name != "")
		{
			$module = new $this->module_name($this->module_name, $this->user, $var_in_match);
			$this->rendu_module =  $module->get_rendu();
		}
		else
		{
			$error[] = "Le module : '".$path_module. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match[0], $this->rendu_module, $page);
		return $this->parser_main($page);			
				 				
	}
}



?>