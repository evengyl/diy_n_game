<?



class module
{
	public $var_to_extract;
	public $template_name;
	public $template_path;

	public function __construct($template_name)
	{
		$this->template_name = $template_name;
		$this->set_template_path($this->template_name);

	}

	public function set_template_path($name_template)
	{
		$this->template_path = $name_template.".php";
	}

	public function get_template_path()
	{
		return $this->template_path;
	}

	public function render()
	{

		ob_start();
			extract($this->var_to_extract);
			require($this->get_template_path());
		$rendu = ob_get_contents();
		ob_end_clean();
		echo $rendu;
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

}

$module = new module('tpl_test');

$module->assign_var("test", "bonjour je suis une var de test")->assign_var("i", "i est toujours used pour faire des boucle c'est connu")->render();


?>