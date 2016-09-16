<?php 

Class social_services extends base_module
{
	private $news = array();

	public function __construct($module_tpl_name, &$user)
	{		
		parent::__construct($module_tpl_name, $user);

		$req_news = new StdClass();
		$req_news->table = "news";
		$req_news->where = "visible = 1";
		$req_news->var = "*";
		$res_news = $this->select($req_news);
		
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
