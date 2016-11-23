<?
if($_GET['action'] == "see_arome_list")
{
	$arome_list = new stdClass();
	$arome_list->table = "aromes";
	$arome_list->var = "id, marque, nom";
	$arome_list->order = "marque";
	$res_sql_arome_list = $this->user->select($arome_list);
	$tab_final_arome_acquis_traiter = render_array_final_aromes($res_sql_arome_list);

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
				

		 		if(file_exists(utf8_decode(Config::$path_public.$row_arome->img)))
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