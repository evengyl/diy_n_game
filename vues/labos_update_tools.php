<div class="col-xs-10 col-lg-12 col-without-padding col-without-radius content_game">
	__TPL_nav__
	<div class="col-lg-8" style="margin-top:1px;">

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
									<th>temps restant <span style="color:black;" class="glyphicon glyphicon-arrow-down"></span></th>
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


			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Recherche pour améliorer la réduction du prix des différentes recherches d'arômes.
			</h3>

			<form method="post" action="?page=labos_update_tools">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/update_search_aromes.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Niveaux de recherche d'arômes 1</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche actuel : <?= $user->amelioration_var_config->price_search_1 ?></h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche MAX : 19</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Prix de la recherche : 10 000</h3><?
				 			if($in_make == 1)
				 			{
				 				echo "<a class='btn btn-primary col-lg-12' style='background:#FF7F00;' href=''>&nbsp;Une recherhce est déjà en cours&nbsp;</a>";
				 			}
				 			else if($in_make == 2)
				 			{
				 				echo "<a class='btn btn-primary' style='background:#FF7F00;' href=''>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a>";
				 			}
				 			else
				 			{
				 				if($user->amelioration_var_config->price_search_1 < 19)
				 					echo '<input name="update_price_search_arome_1" value="Lancer une amélioration de recherche" class="col-lg-12 btn btn-primary" type="submit">';
				 			}?>
							
							<input name="price" value="10000" type="hidden">
							<input name="name_search" value="price_search_1" type="hidden">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=labos_update_tools">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/update_search_aromes.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 2">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Niveaux de recherche d'arômes 2</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche actuel : <?= $user->amelioration_var_config->price_search_2 ?></h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche MAX : 19</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Prix de la recherche : 15 000</h3><?
				 			if($in_make == 1)
				 			{
				 				echo "<a class='btn btn-primary col-lg-12' style='background:#FF7F00;' href=''>&nbsp;Une recherhce est déjà en cours&nbsp;</a>";
				 			}
				 			else if($in_make == 2)
				 			{
				 				echo "<a class='btn btn-primary' style='background:#FF7F00;' href=''>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a>";
				 			}
				 			else
				 			{
				 				if($user->amelioration_var_config->price_search_2 < 19)
				 					echo '<input name="update_price_search_arome_2" value="Lancer une amélioration de recherche" class="col-lg-12 btn btn-primary" type="submit">';
				 			}?>
							
							<input name="price" value="15000" type="hidden">
							<input name="name_search" value="price_search_2" type="hidden">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=labos_update_tools">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/update_search_aromes.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Niveaux de recherche d'arômes 3</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche actuel : <?= $user->amelioration_var_config->price_search_3 ?></h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche MAX : 19</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Prix de la recherche : 20 000</h3><?
				 			if($in_make == 1)
				 			{
				 				echo "<a class='btn btn-primary col-lg-12' style='background:#FF7F00;' href=''>&nbsp;Une recherhce est déjà en cours&nbsp;</a>";
				 			}
				 			else if($in_make == 2)
				 			{
				 				if($user->amelioration_var_config->price_search_3 < 19)
				 					echo "<a class='btn btn-primary' style='background:#FF7F00;' href=''>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a>";
				 			}
				 			else
				 			{
				 				echo '<input name="update_price_search_arome_3" value="Lancer une amélioration de recherche" class="col-lg-12 btn btn-primary" type="submit">';
				 			}?>
							
							<input name="price" value="20000" type="hidden">
							<input name="name_search" value="price_search_3" type="hidden">
						</div>
					</div>
				</div>
			</form>	


			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Recherche pour améliorer les chances de réussites des différentes recherches d'arômes.
			</h3>

			<form method="post" action="?page=labos_update_tools">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/update_search_aromes.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Chance de Win un arômes stade 1</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche actuel : <?= $user->amelioration_var_config->chance_to_win_1 ?></h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche MAX : 50</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Prix de la recherche : 20 000</h3><?
				 			if($in_make == 1)
				 			{
				 				echo "<a class='btn btn-primary col-lg-12' style='background:#FF7F00;' href=''>&nbsp;Une recherhce est déjà en cours&nbsp;</a>";
				 			}
				 			else if($in_make == 2)
				 			{
				 				if($user->amelioration_var_config->chance_to_win_1 < 50)
				 					echo "<a class='btn btn-primary' style='background:#FF7F00;' href=''>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a>";
				 			}
				 			else
				 			{
				 				echo '<input name="update_price_search_arome_3" value="Lancer une amélioration de recherche" class="col-lg-12 btn btn-primary" type="submit">';
				 			}?>
							
							<input name="price" value="20000" type="hidden">
							<input name="name_search" value="chance_to_win_1" type="hidden">
						</div>
					</div>
				</div>
			</form>	

			<form method="post" action="?page=labos_update_tools">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/update_search_aromes.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Chance de Win un arômes stade 1</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche actuel : <?= $user->amelioration_var_config->chance_to_win_2 ?></h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche MAX : 50</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Prix de la recherche : 30 000</h3><?
				 			if($in_make == 1)
				 			{
				 				echo "<a class='btn btn-primary col-lg-12' style='background:#FF7F00;' href=''>&nbsp;Une recherhce est déjà en cours&nbsp;</a>";
				 			}
				 			else if($in_make == 2)
				 			{
				 				if($user->amelioration_var_config->chance_to_win_2 < 50)
				 					echo "<a class='btn btn-primary' style='background:#FF7F00;' href=''>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a>";
				 			}
				 			else
				 			{
				 				echo '<input name="update_price_search_arome_3" value="Lancer une amélioration de recherche" class="col-lg-12 btn btn-primary" type="submit">';
				 			}?>
							
							<input name="price" value="30000" type="hidden">
							<input name="name_search" value="chance_to_win_2" type="hidden">
						</div>
					</div>
				</div>
			</form>	

			<form method="post" action="?page=labos_update_tools">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/update_search_aromes.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Chance de Win un arômes stade 1</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche actuel : <?= $user->amelioration_var_config->chance_to_win_3 ?></h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Niveaux de recherche MAX : 50</h3>
							<h3 style="font-size:14px; margin:7px 0 7px 0; color:white;">Prix de la recherche : 40 000</h3><?
				 			if($in_make == 1)
				 			{
				 				echo "<a class='btn btn-primary col-lg-12' style='background:#FF7F00;' href=''>&nbsp;Une recherhce est déjà en cours&nbsp;</a>";
				 			}
				 			else if($in_make == 2)
				 			{
				 				if($user->amelioration_var_config->chance_to_win_3 < 50)
				 					echo "<a class='btn btn-primary' style='background:#FF7F00;' href=''>&nbsp;Vous n'avez pas les moyens pour construire ceci&nbsp;</a>";
				 			}
				 			else
				 			{
				 				echo '<input name="update_price_search_arome_3" value="Lancer une amélioration de recherche" class="col-lg-12 btn btn-primary" type="submit">';
				 			}?>
							
							<input name="price" value="40000" type="hidden">
							<input name="name_search" value="chance_to_win_3" type="hidden">
						</div>
					</div>
				</div>
			</form>	




















			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Recherche pour diminuer le temps des différentes recherches d'arômes.
			</h3>

			<form method="post" action="?page=arome_list">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_1.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<input name="update_time_search_arome" value="Lancer une recherche à 1000€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="1000" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>


			<h3 class='col-xs-12 title' style="margin-bottom:15px; border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Recherche pour Diminuer le prix de la création des bases pures.
			</h3>

			<form method="post" action="?page=arome_list">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_1.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 1">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<input name="update_price_concept_2080" value="Lancer une recherche à 1000€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="1000" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=arome_list">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_2.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 2">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<input name="update_price_concept_5050" value="Lancer une recherche à 2500€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="2500" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>

			<form method="post" action="?page=arome_list">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_3.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<input name="update_price_concept_8020" value="Lancer une recherche à 5000€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="5000" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>	

			<form method="post" action="?page=arome_list">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail col-lg-12" style="padding-bottom:10px;">
						<img src="<?= Config::$path_public."/images/quality_search_aromes_3.jpg" ?>" class="img-responsive" alt="Qualité de la recherche d'aromes 3">
						<div class="caption">
							<h3 style="font-size:18px; margin:7px 0 7px 0; color:white;">Recherche d'arômes</h3>
							<input name="update_price_concept_1000" value="Lancer une recherche à 5000€" class="col-lg-12 btn btn-primary" type="submit">
							<input name="value" value="5000" class="col-lg-12 btn btn-primary" type="hidden">
						</div>
					</div>
				</div>
			</form>	
		

		</div>
	__TPL_social_services__
	</div>
</div>
<?
unset($_SESSION['error']);