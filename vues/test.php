<? 

// créer une fct qui récup tout les ids des arome
// la mettre dans user car utile pour la création de compte avec tout les arome adns la table arome



/*
$all_query = new all_query();
$req_sql = new stdClass();
$req_sql->table = "aromes";
$req_sql->var = "*";
$test = $all_query->select($req_sql);

foreach($test as $row)
{
	$name_image = $row->marque;
	$name_image .= "_".$row->nom.".jpg";
	$name_image = str_replace(" ", "_", $name_image);
	$name_image = strtolower($name_image);
	$name_image = "/".$row->marque."/".$name_image;
	$row->name_image = $name_image;
}


$dossier = opendir("./images/aromes/Cappela Flavor");

while(false !== ($fichier = readdir($dossier)))
{
	if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
	{
		echo '<img class="col-lg-2 img-responsive" src="/images/aromes/Cappela Flavor/' . utf8_encode($fichier) . '">';
	}
}







/*
$string = "Amaretto
Anise
Barbe à papa
Melon
gateau à la crème
Thé chai
Coca cherry
Coco Choco amande
Gateau chocolat
downut chocolat
Framboise chocolat
Menthol légere
Cranberry
Yaourt crème
Concombre
Tasse de café
Fruit du dragon
Double pomme
Energy drink
Vanilla french
Gingerbread
Donuts
crackers
anana
Pamplemousse
grenadine
Fruit rouge
Irish cream
Fraise kiwi
Jelly candy
jus d'orange
jus de peche
pancake
meringue citron
fruit de la passion
peche cream
beurre de cacahuete
poire
pina colada
popcorn
creme pralinée
cookie
vanille custard
lychee
mangue
orange
amande grillée
cupcake vanille
creme fouetée vanille
crème de beurre";


$all_query = new all_query();
$test = explode(PHP_EOL, $string);
$i = 0;
foreach($test as $row)
{
	$aka[$i]["nom"] = ucfirst($row);
	$aka[$i]["marque"] = 'capella';
	$aka[$i]["quality"] = '3';
	$aka[$i]["commentaire"] = "";
	$aka[$i]["img"] = '0';
	$i++;
}


foreach($aka as $row)
{
			$req_sql_aromes_capella = new stdClass();
		$req_sql_aromes_capella->table = "aromes";
		$req_sql_aromes_capella->ctx = new stdClass();
		$req_sql_aromes_capella->ctx = $row;

		$all_query->insert_into($req_sql_aromes_capella);
}
/*


$time_base_first = 15;
$time_base = array();
$time_in_click = 1000;
$time_finish = $time_in_click + $time_base_first;



$i = 0;

while($i <= 70)
{
	$time_base[$i] = (($time_base_first * ($i * 2)) * $i) * 2.8;

	$i++;
}



$pourcent = 0;
$pourcent_array = array();
$j = 0;
while($j <= 70)
{
	$pourcent_array[$j] = ((((($pourcent + 1) *1.5) + $j) * 1.2)*151)*$j;
	$j++;	
}

affiche_pre($pourcent_array);


$all_query = new all_query();

foreach($pourcent_array as $row => $values)
{
	$req_sql_time = ("UPDATE labos_bases SET prix = $values WHERE id = $row");	
	affiche_pre($req_sql_time);
	$all_query->query_simple($req_sql_time);
}

*/















/*

//pour la culture de vg
$all_query = new all_query();
class prod
{
	public $level ="";
	public $multi_prod = 3;
	public $multi_prix = 1.3;
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
	//$req_sql_vg = ("INSERT INTO culture_vg (time_construct) VALUES ('$array->time_construct')");	
	//$req_sql_vg = ("INSERT INTO culture_vg (level, multi_prod, multi_prix, production, prix) VALUES ('$array->level', '$array->multi_prod', '$array->multi_prix', '$array->production', '$array->prix')");
	//$req_sql_pg = ("INSERT INTO usine_pg (level, multi_prod, multi_prix, production, prix) VALUES ('$array->level', '$array->multi_prod', '$array->multi_prix', '$array->production', '$array->prix')");
	//$all_query->query_simple($req_sql_vg);
}



affiche_pre($array_global);
*/