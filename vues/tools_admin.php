<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-8" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation" style="margin-bottom:15px;" class="active"><a href='?page=tools_admin&action=add_arome'>Ajouter un arômes, ne pas oublier l'image, l'arômes s'ajoute automatiquement au joueurs</a></li>
				<li role="presentation" style="margin-bottom:15px;" class="active"><a href='?page=tools_admin&action=maj_arome'>Modifier un arômes</a></li>
				<li role="presentation" style="margin-bottom:15px;" class="active"><a href='?page=tools_admin&action=see_arome_list'>Voir la liste des aromes pour voir si toutes les images sont bonnes (n'apparaissent que ceux qui n'ont pas d'image +-)</a></li>
			</ul>
		</div>
	

<?
unset($_SESSION['error']);


if(isset($_GET['action']))
{
	if($_GET['action'] == "add_arome")
	{

		if(isset($_POST['marque']) && isset($_POST['type']) && isset($_POST['nom']) && isset($_POST['quality']))
		{
			$arome_list_player = new stdClass();
			$arome_list_player->table = "login";
			$arome_list_player->var = "list_arome_not_have, id";
			$arome_list_player->order = "id";
			$arome_list_player = $this->select($arome_list_player);


			//ajout a la liste des aromes dans la table aromes
			$post = $_POST;
			$new_arome = new stdClass();
			$new_arome->table = "aromes";
			$new_arome->ctx = new stdClass();
			$new_arome->ctx->marque = $post['marque'];
			$new_arome->ctx->nom = $post['nom'];
			$new_arome->ctx->type = $post['type'];
			$new_arome->ctx->quality = $post['quality'];
			$this->insert_into($new_arome);


			//on dois aller recupérr l'id du new aromes
			$last_add = new stdClass();
			$last_add->table = "aromes";
			$last_add->var = "id";
			$id_last_arome = $this->select($last_add);
			$id_last_arome = end($id_last_arome);
			$id_last_arome = $id_last_arome->id;

			//ajout dans toutes les tables des players
			foreach($arome_list_player as $row_player)
			{
				$row_player->list_arome_not_have .= $id_last_arome.",";

	 			$req_sql = new stdClass;
				$req_sql->table = "login";
				$req_sql->where = "id = '".$row_player->id."'";
				$req_sql->ctx = new stdClass;
				$req_sql->ctx->list_arome_not_have = $row_player->list_arome_not_have;
				$res_sql = $this->update($req_sql);
			}

			paragraphe_style("L'insertion c'est bien déroulée");
			unset($_POST);

		}
		else
		{
			$this->generate_form_insert_into("aromes");
		}

	}



	if($_GET['action'] == "maj_arome")
	{
		if(isset($_POST['id_arome_selected']) || isset($_POST['marque']))
		{
			if(isset($_POST['id_arome_selected']))
			{
				$id_selected = (int)$_POST['id_arome_selected'];

				if(is_int($id_selected))
				{
					$this->generate_form_unpdate("aromes", $id_selected);
				}
				else
				{
					return 0;
				}
			}
			else if(isset($_POST['marque']))
			{
				if(isset($_POST['marque']) && isset($_POST['type']) && isset($_POST['nom']) && isset($_POST['quality']))
				{
		 			$req_sql = new stdClass;
					$req_sql->table = "aromes";
					$req_sql->where = "id = '".$_POST['id']."'";
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->marque = $_POST['marque'];
					$req_sql->ctx->type = $_POST['type'];
					$req_sql->ctx->nom = $_POST['nom'];
					$req_sql->ctx->quality = $_POST['quality'];
					$res_sql = $this->update($req_sql);

					paragraphe_style("La modification c'est bien déroulée");
					unset($_POST);
				}
			}
		}
		else
		{?>
		    <div class='contenu_compte'>
		        <div class="row">
		            <div class="col-lg-12">
		                <form class="form-inline" style="margin:auto;" role="form" action="" method="POST">
		                    <div class="input-group">
		                        <div style="width: 200px;" class="input-group-addon">Id de l'arôme</div>
		                        <input style='width:450px;' type="text" id="inputSuccess1" required name="id_arome_selected">
		                    </div>
		                    <button style="width: 650px; margin-top:15px;" type="submit" class="btn btn-default">Submit</button>
		                </form>
		            </div>
		        </div>
		    </div><?
		}

	}	


	if($_GET['action'] == "see_arome_list")
	{
		$arome_list = new stdClass();
		$arome_list->table = "aromes";
		$arome_list->var = "id, marque, nom";
		$arome_list->order = "marque";
		$res_sql_arome_list = $this->select($arome_list);
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
?></div></div><?




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