<?php 


Class base_module extends all_query
{
	public $parser;
	public $rendu;

	public function __construct($name_module= "", $name_tpl ="")
	{
		if($name_module != "")
		{
			$this->rendu = $this->render_module($name_module, $name_tpl);	
		}
		
	}

	public function render_tpl($called_tpl)
	{
		
		$test = "bonjour je suis un test a la con";
		$this->parser = new parser();
			$tpl = $this->parser->parser_main($called_tpl);

		affiche_pre(htmlentities($tpl));
		//return $tpl;
	}

	public function render_module($name_module, $name_tpl)
	{
		require_once('../app/controller/'.$name_module.'.php');
		$module = new $name_module($name_module, $name_tpl);
		return $module;
	}



	public function generate_breadcrumb($referer = array())
	{
		$title_page = "";
		$number_separate =  count($referer)-1;

		foreach($referer as $row => $values)
		{
			$title_page .= "<a href='".$values."' >".$row."</a>";
			if($number_separate > 0)
				$title_page .= " > ";
			$number_separate--;
		}
		return "<h1 class='col-xs-12 title'>".$title_page."</h1>";
	}
}