<?
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
			if(isset($_POST['marque']) && isset($_POST['nom']))
			{
	 			$req_sql = new stdClass;
				$req_sql->table = "aromes";
				$req_sql->where = "id = '".$_POST['id']."'";
				$req_sql->ctx = new stdClass;
				$req_sql->ctx->marque = $_POST['marque'];
				$req_sql->ctx->nom = $_POST['nom'];
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