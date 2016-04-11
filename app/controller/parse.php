<?php

class parser()
{
	public function parser_main($page)
	{
		global $error;
		//parser la page complète a la recherche des __TPL_bla__ et __MOD_bla__
		if(!empty($page))
		{
			
			//execution du parseur
			return $page;
		}
		else
		{
			return $error = "Il y a un problème dans le parser Parser_main()";
		}
		
	}
}



?>