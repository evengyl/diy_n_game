<?php

Class breadcrumb extends base_module
{

	public function __construct($module_tpl_name, $var_in_match)
	{	

		parent::__construct($module_tpl_name);


		if(!empty($var_in_match))
		{
			$breadcrumb = array("Accueil" => "?page=home", $var_in_match => "?page=".$_GET['page']);
		
		}
		else if(isset($_GET['page']))
		{
			$breadcrumb = array("Accueil" => "?page=home", $_GET['page'] => "?page=".$_GET['page']);
		}
		else
		{
			$breadcrumb = array("Accueil" => "?page=home");
		}

		
		$title_page ="<h1 style='margin-top:0px; margin-bottom:-4px; display:inline-block;'><div class='home_button_bread'><a href='?page=home'><span class='glyphicon glyphicon-home'></span></a></div><div class='fleche_externe'></div>";

		foreach($breadcrumb as $title => $link)
		{
			$title_page .= "<div class='fleche_interne'></div><div class='level_bread'><a style='color:#C0C0C0;' href='".$link."'>".$title."</a></div><div class='fleche_externe'></div>";
		}
		$title_page .= "<div class='fleche_remplie'></div><div class='fleche_remplie'></div><div class='fleche_remplie'></div></h1>";


		return $this->assign_var("breadcrumb", $title_page)->render();
	}

}


