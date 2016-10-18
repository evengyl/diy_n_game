<?php 


Class base_module
{

	public $rendu;
	public $content;
	public $var_to_extract;
	public $template_name;
	public $template_path;
	public $user;


	public function __construct($module_tpl_name = "")
	{


		$this->user = singleton::getInstance()->user;
		

		if($module_tpl_name != "")
		{
			$this->template_name = $module_tpl_name;
			$this->set_template_path($this->template_name);
		}
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

//partie setter du rendu
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

	public function maj_user($ok = false, $user = "")
	{
		if($ok)
		{
			$this->get_variable_user();
		}
		return $this;
	}

	public function set_rendu($rendu)
	{
		$this->rendu = $rendu;
	}

	public function get_rendu()
	{
		//renvoi le rendu tpl générer dans render, le renvoi au parseur qui s'occuepra de le mettre dans la page html
		return $this->rendu;
	}

	public function set_template_path($name_template)
	{
		$this->template_path = "../vues/".$name_template.".php";

	}

	public function get_template_path()
	{
		return $this->template_path;
	}


//partie fonction utile de base




}