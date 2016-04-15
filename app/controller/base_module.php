<?php 


Class base_module extends all_query
{
	public $rendu;
	public $content;
	public $var_to_extract;
	public $template_name;
	public $template_path;


	public function __construct($module_tpl_name = "")
	{
		if($module_tpl_name != "")
		{
			$this->template_name = $module_tpl_name;
			$this->set_template_path($this->template_name);					
		}
		
	}

	public function set_template_path($name_template)
	{
		$this->template_path = "../vues/".$name_template.".php";

	}

	public function get_template_path()
	{
		return $this->template_path;
	}

	public function assign_var($var_name , $value)
	{

        if(is_array($var_name))
        {
            $this->var_to_extract = array_merge($this->var_to_extract, $var_name);
        }
        else
        {
            $this->var_to_extract[$var_name] = $value;
        }
        return $this;
	}


	public function render()
	{
		ob_start();
			if(!empty($this->var_to_extract))
			{
				extract($this->var_to_extract);
			}			
			require($this->get_template_path());
		$rendu = ob_get_contents();
		ob_end_clean();
		$this->set_rendu($rendu);
	}

	public function set_rendu($rendu)
	{
		$this->rendu = $rendu;
	}

	public function get_rendu()
	{
		return $this->rendu;
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