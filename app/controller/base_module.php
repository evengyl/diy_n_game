<?php 


Class base_module extends all_query
{
	public $parser;

	public function render_tpl($called_tpl)
	{
		$this->parser = new parser();
		return $this->parser->parser_main($called_tpl);
	}
}