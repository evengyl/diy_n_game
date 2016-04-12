<?php 


Class base_module extends all_query
{
	public $parser;

	public function render_tpl($called_tpl)
	{
		$this->parser = new parser();
		return $this->parser->parser_main($called_tpl);
	}

	public function get_title_page($title_page)
	{
		
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
		return "<h1 class='col-lg-12 title'>".$title_page."</h1>";
	}
}