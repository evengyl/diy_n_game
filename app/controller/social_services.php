<?php 

Class social_services extends base_module
{
	private $news = array();

	public function __construct($module_tpl_name)
	{		
		parent::__construct($module_tpl_name);

		$res_news = $this->other_query("SELECT * FROM news WHERE visible=1");
		if(!empty($res_news))
		{
			foreach($res_news as $row_news)
			{
				$this->news[] = $row_news;
			}
		}
	

		return $this->assign_var("news", $this->news)->render();
	}

}
