<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav_game__
	<div class="col-lg-9" style="margin-top:1px;">

		<div class="col-xs-12 col-md-12">
			<div class="col-lg-12 explication pull-right">
				<h3 class="title">Explication : </h3>
				<span>Dans Diy_n_game, Pour créer et vous aidez à conçevoir toujours plus de produits, des personnes sont la pour rechercher des améliorations.
					Celles-ci permette de payer moins chère ou que votre coup en ressources soit réduits, ainsi que les temps des recherches des arômes par exemple ect...</span>
			</div>
			<div style='font-size:18px; color:red' class="col-lg-12 form-group <?php echo (isset($_SESSION['error']) OR isset($_SESSION['error_bases_down']))?'has-error':''; ?>">
				<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
			</div><?

			if(isset($user->update->{0}))
			{?>
				<div class="col-sm-6 col-md-12" >
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<div class="col-lg-12 pull-right ressource_now">
							<h3 class="title">&nbsp;Recherches en cours :</h3>
							<table class="table table-stripped table-hover" style="color:white;">
								<tr class="success" style="color:black;">
									<th>Nom de la recherche <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
									<th>Heure de fin<span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
								</tr>
								<tr class="success" style="color:black;">
									<td style="background:#D0E9C6;"><b><?= (isset($user->update->{0}))? $user->update->{0}->real_name_search :''; ?></td>
									<td style="background:#D0E9C6;"><b><?= (isset($user->update->{0}))? date('d/m/Y', $user->update->{0}->time_finish)." &agrave; ".date('H:i:s', $user->update->{0}->time_finish) :''; ?></b></td>
								</tr>
							</table>
						</div>
					</div>
				</div><?
			}?>



			<div style="border:1px solid #FF7F00; padding-top:15px; margin-top:25px;" class="col-lg-12">
				<?
				foreach($array_update_for_tpl as $row_update)
				{?>

					<form method="post" action="?page=labos_update_tools">
						<div class="col-sm-6 col-md-4">
							<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
								<img src="<?= Config::$path_public."/images/update_search_aromes.jpg" ?>" style="height:130px;" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
								<div class="caption">
									<h3 style="font-size:16px; margin:7px 0 7px 0; color:white;"><?= $row_update->real_name; ?></h3>
									<h3 style="font-size:14px; margin:7px 0 7px 0; color:#31DE44;">- Niveaux de recherche actuel : <?= $row_update->level; ?></h3>
									<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">- Niveaux de recherche MAX : <?= $row_update->level_max; ?></h3>
									<h3 style="font-size:14px; margin:7px 0 7px 0; color:#31DE44;">- Temps de construction : <?= $row_update->time_finish_construct_real; ?></h3>
									<h3 style="font-size:14px; margin:7px 0 7px 0; color:yellow;">- Prix prochain niveau : <?= $row_update->prix_next_level; ?>&euro;</h3>
									<?
						 			if($row_update->ok_for_search == 0)
						 			{
						 				echo "<a disabled class='btn btn-primary col-lg-12' style='background:#FF7F00;' href=''>&nbsp;Une recherhce est déjà en cours&nbsp;</a>";
						 			}
						 			else if($row_update->ok_for_search == 1)
						 			{
						 				echo "<a disabled class='btn btn-primary col-lg-12' style='background:#FF7F00;' href=''>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a>";
						 			}
						 			else if($row_update->ok_for_search == 2)
						 			{
						 				if($row_update->level < $row_update->level_max)
						 					echo '<input  value="Lancer une amélioration" class="col-lg-12 btn btn-primary" type="submit">';
						 			}?>
									
									<input name="price" value="<?= $row_update->prix_next_level; ?>" type="hidden">
									<input name="name_search" value="<?= $row_update->name; ?>" type="hidden">
								</div>
							</div>
						</div>
					</form><?
				}?>
			</div>
		</div>
	</div>
</div>
<?
unset($_SESSION['error']);