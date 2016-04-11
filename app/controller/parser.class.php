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
					$page = $this->parse_template($match, $page);
				else
					return;
		}
		else
			echo  $error = "Il y a un problème dans le parser Parser_main() la page n'est pas arrivée au parseur";

		return $page;
		
	}


	private function parse_template($match, $page)
	{
		global $error;
		if(!empty($match))
		{
			foreach($match as $array_match)
			{
				foreach($array_match as $matching)
				{
					$matching_temp = str_replace(array("__TPL_","__"), "", $matching);
					$path_template = '../vues/'.$matching_temp.'.php';

					ob_start();
						require_once($path_template);
					$matching_content = ob_get_clean();


					if(preg_match_all('/__TPL_[a-z_]+__/', $matching_content, $match))
					{
						$matching_content = $this->parser_main($matching_content);
					} // permet de descendre en profondeur des templates sera recusif sur le callback du parseur main tant qu'il en détectera dans le code
					

					$page = str_replace($matching, $matching_content, $page);
					
				}			
			}
			return $page;
		}
		else
		{
			echo $error = "Une erreur est survenue lors du traitement des templates dans le parser parse_template()";
		}
	}





	private function parse_module($match)
	{
			//réception du nom du module et renvoi de contenu
		//traite les infos dans le module en question et le module appel le template

	}
}



?>