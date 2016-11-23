<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-9" style="margin-top:1px;">




		<div class="col-xs-12 col-md-12">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation" style="margin-bottom:15px;" class="active"><a href='?page=tools_admin&action=add_arome'>Ajouter un arômes, ne pas oublier l'image, l'arômes s'ajoute automatiquement au joueurs</a></li>
				<li role="presentation" style="margin-bottom:15px;" class="active"><a href='?page=tools_admin&action=maj_arome'>Modifier un arômes</a></li>
				<li role="presentation" style="margin-bottom:15px;" class="active"><a href='?page=tools_admin&action=see_arome_list'>Voir la liste des aromes pour voir si toutes les images sont bonnes (n'apparaissent que ceux qui n'ont pas d'image +-)</a></li>
			</ul>
		</div><?
		
		include_once('admin_tool/index.php');

		if($_GET['page'] == "tools_admin")
		{
			if(isset($_GET["action"]))
			{
				if($_GET['action'] == 'add_arome')
				require_once("admin_tool/add_arome.php");

				if($_GET['action'] == 'maj_arome')
					require_once("admin_tool/maj_arome.php");

				if($_GET['action'] == 'see_arome_list')
					require_once("admin_tool/see_arome_list.php");
			}
		}?>

			<div style='font-size:13px; margin-bottom:0; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
			</div>
	</div>
</div>

<?

unset($_SESSION['error']);

	function render_array_final_aromes($tab_final_arome_acquis)
	{
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