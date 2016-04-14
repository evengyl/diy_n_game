<?php

class parser
{
	public function parser_main($page)
	{
		global $error;
		//parser la page complète a la recherche des __TPL_bla__ et __MOD_bla__
		if(!empty($page))
		{


			if(preg_match_all('/__TPL_[a-z_]+__/', $page, $match))
			{
				$page = $this->parse_template($match, $page);
			}
			
			if(preg_match_all('/__MOD_[a-z_]+__/', $page, $match))
			{
				$page = $this->parse_module($match, $page);
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


	private function parse_template($match, $page)
	{
		global $error;
		if(!empty($match))
		{
			foreach($match[0] as $matching)
			{
				$matching_temp = str_replace(array("__TPL_","__"), "", $matching);
				$path_template = '../vues/'.$matching_temp.'.php';

				if(file_exists($path_template))
				{
					ob_start();
						require_once($path_template);
					$matching_content = ob_get_clean();
				}
				else
				{
					$error[] = "Le Template : '".$path_template. "' à été demander mais n'existe pas, le fichier n'est pas créé";
					return '';
				}


				if(preg_match_all('/__TPL_[a-z_]+__/', $matching_content, $match_recursif) || preg_match_all('/__MOD_[a-z_]+__/', $matching_content, $match_recursif))
				{
					$matching_content = $this->parser_main($matching_content);
				}
				 // permet de descendre en profondeur des templates sera recusif sur le callback du parseur main tant qu'il en détectera dans le code

				$page = str_replace($matching, $matching_content, $page);

			}			
			//affiche_pre(htmlentities($page));	
			return $page;
		}
		else
		{
			$error[] = "Une erreur est survenue lors du traitement des templates dans le parser parse_template()";
		}
	}





	private function parse_module($match, $page)
	{
		global $error;

		if(!empty($match))
		{

			foreach($match[0] as $matching)
			{
				$module_name = str_replace(array("__MOD_","__"), "", $matching);				
				$tpl_name = str_replace(array("__MOD_","__"), array("__TPL_","__"), $matching);
				$module="";

				if($module_name != "")
				{
					$module = new base_module($module_name, $tpl_name);
					$module = $module->rendu->page_tpl;
				}
				else
				{
					$error[] = "Le module : '".$path_module. "' à été demander mais n'existe pas, le fichier n'est pas créé";
					return '';
				}
				



				// if(preg_match_all('/__MOD_[a-z_]+__/', $return_controller->page_tpl, $match) || preg_match_all('/__TPL_[a-z_]+__/', $return_controller->page_tpl, $match))
				// {

				// 	$matching_content = $this->parser_main($return_controller->page_tpl);						
				// }
				 // permet de descendre en profondeur des templates sera recusif sur le callback du parseur main tant qu'il en détectera dans le code

				$page = str_replace($matching, $module, $page);
				
			}			
			
			return $page;
		}
		else
		{
			$error[] = "Une erreur est survenue lors du traitement des templates dans le parser parse_module()";
		}
	}
}



?>