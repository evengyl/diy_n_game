<?

if(isset($_POST['marque']) && isset($_POST['nom']))
{
	//ajout a la liste des aromes dans la table aromes


	//on viérifie si l'aromes est pas encore céer on sais jamais
	$new_arome = new stdClass();
	$new_arome->table = "aromes";
	$new_arome->var = "*";
	$new_arome->where = "marque = '".$_POST['marque']."'";
	$list_arome = $this->user->select($new_arome);

	$is_it = false;
	foreach($list_arome as $row_aromes)
	{
		if($row_aromes->nom == $_POST['nom'])
			$is_it = true;
	}

	if($is_it)
		$_SESSION['error'] = "Attention cette Arômes existe déjà";
	else
	{
		$post = $_POST;
		$new_arome = new stdClass();
		$new_arome->table = "aromes";
		$new_arome->ctx = new stdClass();
		$new_arome->ctx->marque = $post['marque'];
		$new_arome->ctx->nom = $post['nom'];
		$this->user->insert_into($new_arome);
		$_SESSION['error'] = "Arôme bien inséré";


		//on dois aller recupérr l'id du new aromes
		$last_add = new stdClass();
		$last_add->table = "aromes";
		$last_add->var = "id";
		$id_last_arome = $this->user->select($last_add);
		$id_last_arome = end($id_last_arome);
		$id_last_arome = $id_last_arome->id;

		//ajout dans toutes les tables des players
		

		$arome_list_player = new stdClass();
		$arome_list_player->table = "login";
		$arome_list_player->var = "list_arome_not_have, id";
		$arome_list_player->order = "id";
		$arome_list_player = $this->user->select($arome_list_player);
		foreach($arome_list_player as $row_player)
		{
			$row_player->list_arome_not_have .= $id_last_arome.",";

				$req_sql = new stdClass;
			$req_sql->table = "login";
			$req_sql->where = "id = '".$row_player->id."'";
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->list_arome_not_have = $row_player->list_arome_not_have;
			$res_sql = $this->user->update($req_sql);
		}

		paragraphe_style("L'insertion dans l'user c'est bien déroulée");
		unset($_POST);
	}
}
else
{
	$this->user->generate_form_insert_into("aromes", array("TYPE" => "select", "CHAMPS" => array("marque")));
	//pour plus de facilité je vais lister la liste des marques qu'il y a déjà pour éviter des encombre dnas les string name
}

