<?

//pour la culture de vg
$all_query = new all_query();
class prod
{
	public $level ="";
	public $multi_prod = 2.5;
	public $multi_prix = 1.5;
	public $production = 0;
	public $prix = 100;

	public function __construct($level)
	{
		$this->level = $level;
	}
}

$array_global = array();

$init = 0;
$next_level = 10;



while($init <= 70)
{
	$array_global[$init] = new prod($init);
	if($init != 0)
	{
		$array_global[$init]->multi_prod = $array_global[$init-1]->multi_prod +0.02;	
		$array_global[$init]->multi_prix = $array_global[$init-1]->multi_prix;	
	}

	$init++;
}




foreach($array_global as $array)
{


	$next_level = ceil($next_level * $array->multi_prix);	
	$array->prix = $next_level;
	$array->tmp = strlen($array->prix);

	if($array->tmp == 7)
	{
		$array->prix = ceil($array->prix/1.2);
	}

	if($array->tmp == 8)
	{
		$array->prix = ceil($array->prix/1.8);
	}

	if($array->tmp == 9)
	{
		$array->prix = ceil($array->prix/2.6);
	}

	if($array->tmp == 10)
	{
		$array->prix = ceil($array->prix/4);
	}

	if($array->tmp == 11)
	{
		$array->prix = ceil($array->prix/6);
	}

	if($array->tmp == 12)
	{
		$array->prix = ceil($array->prix/9);
	}

	if($array->tmp == 13)
	{
		$array->prix = ceil($array->prix/13);
	}

	if($array->tmp == 14)
	{
		$array->prix = ceil($array->prix/18);
	}

	if($array->tmp == 15)
	{
		$array->prix = ceil($array->prix/25);
	}

	if($array->tmp == 16)
	{
		$array->prix = ceil($array->prix/32);
	}

	if($array->tmp == 17)
	{
		$array->prix = ceil($array->prix/40);
	}

	if($array->tmp == 18)
	{
		$array->prix = ceil($array->prix/50);
	}

	if($array->tmp == 19)
	{
		$array->prix = ceil($array->prix/62);
	}

	if($array->tmp == 20)
	{
		$array->prix = ceil($array->prix/76);
	}


	$array->production = (($array->level+1) * $array->multi_prod) * ($array->multi_prod * $array->level);	
	$array->production = ceil($array->production);
}
//affiche_pre($array_global);

foreach($array_global as $array)
{
	$req_sql_vg = ("INSERT INTO culture_vg (level, multi_prod, multi_prix, production, prix) VALUES ('$array->level', '$array->multi_prod', '$array->multi_prix', '$array->production', '$array->prix')");
	$req_sql_pg = ("INSERT INTO usine_pg (level, multi_prod, multi_prix, production, prix) VALUES ('$array->level', '$array->multi_prod', '$array->multi_prix', '$array->production', '$array->prix')");
	//$all_query->query_simple($req_sql_pg);
}

//affiche_pre($array_global);
