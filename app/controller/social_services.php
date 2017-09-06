<?php 

Class social_services extends base_module
{
	private $news = array();

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$this->_app->navigation->set_breadcrumb("Consommation");

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
	

		$this->get_html_tpl =  $this->assign_var("news", $this->news)->render_tpl();
	}

}
