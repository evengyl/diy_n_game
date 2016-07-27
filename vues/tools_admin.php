<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-8" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation" class="active"><a href='?page=tools_admin&action=maj_arome'>Mettre les arômes à jours de la table des user, avec la nouvelle liste des aromes</a></li>
				<li role="presentation" class="active"><a href='?page=tools_admin&action=see_arome_list'>Voir la liste des aromes pour voir si toutes les images sont bonnes</a></li>
			</ul>
		</div>
	</div>
</div>
<?
unset($_SESSION['error']);


if(isset($_GET['action']))
{
	if($_GET['action'] == "maj_arome")
	{

	}
	if($_GET['action'] == "see_arome_list")
	{
		$arome_list = new stdClass();
		$arome_list->table = "aromes";
		$arome_list->var = "id, marque, nom";
		$arome_list->order = "marque";
		$res_sql_arome_list = $this->select($arome_list);
		$tab_final_arome_acquis_traiter = traitement_array_final_aromes($res_sql_arome_list);

		?>

		<div class="col-lg-12" style="background:#232D3B;"><?
			foreach($tab_final_arome_acquis_traiter as $key => $value)
			{?>
			 	<h3 class='col-xs-12 title' style="border-bottom:1px solid #FF7F00; font-size:18px; margin-bottom:15px; padding-top:25px;">Marques : <?= $key; ?></h3><?
			 	foreach($value as $row_arome)
			 	{
					$name_image = $row_arome->marque;
					$name_image .= "_".trim($row_arome->nom).".jpg";
					$name_image = str_replace(" ", "_", $name_image);
					$name_image = mb_convert_case($name_image, MB_CASE_LOWER, "UTF-8"); 
					

			 		if(file_exists(Config::$path_public.$row_arome->img))
			 			continue;?>

					<div class="col-xs-6 col-md-3">
						<a class="thumbnail">
							<center>
								<img style="height:150px;" class="img-responsive" src="<?= Config::$path_public.$row_arome->img ?>">
								<h5 style="color:white;">Arôme n° <?= $row_arome->id; ?></h5>
								<h5 style="color:white;"><?= $row_arome->nom; ?></h5>
								<h5 style="color:white;"><?= $name_image; ?></h5>
					        	<span style="color:green;" class="glyphicon glyphicon-ok"></span>
					        	<span style="color:red;" class="glyphicon glyphicon-remove"></span>
					        </center>
					    </a>
					</div><?
			 	}
			}?>
		</div><?
	}
}















	function traitement_array_final_aromes(&$tab_final_arome_acquis)
	{
		//astuce pour ne pas avoir un element en moins dans le tableau lors de la premire passe pour inscrire le nom de la marque dans le tab

		$tab_final_arome_acquis_traiter = array();
		$i=0;

		foreach($tab_final_arome_acquis as $row)
		{
			if(!isset($tab_final_arome_acquis_traiter[$row->marque]))
			{
				$tab_final_arome_acquis_traiter[$row->marque] = array();
				end($tab_final_arome_acquis_traiter);
			}

			if(key($tab_final_arome_acquis_traiter) == $row->marque)
			{
				$name_image = $row->marque;
				$name_image .= "_".trim($row->nom).".jpg";
				$name_image = str_replace(" ", "_", $name_image);
				$name_image = mb_convert_case($name_image, MB_CASE_LOWER, "UTF-8"); 
				$name_image = "/images/aromes/".$row->marque."/".$name_image;

				$tab_final_arome_acquis_traiter[$row->marque][$i] = new stdClass();
				$tab_final_arome_acquis_traiter[$row->marque][$i]->nom = $row->nom;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->id = $row->id;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->img = $name_image;
				$tab_final_arome_acquis_traiter[$row->marque][$i]->marque = $row->marque;

			}
			else
			{
				$tab_final_arome_acquis_traiter[$row->marque] = array();
				end($tab_final_arome_acquis_traiter);
			}
			$i++;
		}
		return $tab_final_arome_acquis_traiter;
	}
?>