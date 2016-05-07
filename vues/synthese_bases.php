	<div class="col-xs-12 col-md-12">
		<div class="col-lg-12" style="margin-bottom:15px;">
			<h3 class='col-xs-12 title' style="border-bottom:1px solid #FF7F00; font-size:18px; padding-top:25px;">
				Listes des batiments de production de ressources brut.
			</h3>	
			<form method="post" action="?page=labos_bases">
				<div class="col-lg-12" style="background:#232D3B; margin-top:15px; margin-bottom:50px;">
					<ul class="col-md-6 col-lg-6 grid cs-style-4">
						<center><li>
							<figure>
								<div><img src="<?= Config::$path_public; ?>/images/bases.jpg" alt="img04"></div>
								<figcaption>
									<h3 style="font-size:14px;">Bases :<br> 20% / 80%</h3>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Quantité en stock : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix brut : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix avec réduction due au labos : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Temps de synthèse : 2h00</b></br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Nombre de synthèse possible : </b><?= $nb_to_create[2080]; ?></li>
									<select name="2080">
										<?php
										$i = 0;
										while($i <= $nb_to_create[2080])
										{
											echo '<option value="'.$i.'">'.$i.'</option>'; 
											$i++;
										}
										?>
									</select>
								</figcaption>
							</figure>
						</li></center>
					</ul>

					<ul class="col-md-6 col-lg-6 grid cs-style-4">
						<center><li>
							<figure>
								<div><img src="<?= Config::$path_public; ?>/images/bases.jpg" alt="img04"></div>
								<figcaption>
									<h3 style="font-size:14px;">Bases :<br> 50% / 50%</h3>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Quantité en stock : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix brut : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix avec réduction due au labos : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Temps de synthèse : 1h30</b></br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Nombre de synthèse possible : </b><?= $nb_to_create[5050]; ?></li>
									<select name="5050">
										<?php
										$i = 0;
										while($i <= $nb_to_create[5050])
										{
											echo '<option value="'.$i.'">'.$i.'</option>'; 
											$i++;
										}
										?>
									</select>
								</figcaption>
							</figure>
						</li></center>
					</ul>

					<ul class="col-md-6 col-lg-6 grid cs-style-4">
						<center><li>
							<figure>
								<div><img src="<?= Config::$path_public; ?>/images/bases.jpg" alt="img04"></div>
								<figcaption>
									<h3 style="font-size:14px;">Bases :<br> 80% / 20%</h3>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Quantité en stock : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix brut : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix avec réduction due au labos : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Temps de synthèse : 2h00</b></br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Nb de synthèse possible : </b><?= $nb_to_create[8020]; ?></li>
									<select name="8020">
										<?php
										$i = 0;
										while($i <= $nb_to_create[8020])
										{
											echo '<option value="'.$i.'">'.$i.'</option>'; 
											$i++;
										}
										?>
									</select>
								</figcaption>
							</figure>
						</li></center>
					</ul>

					<ul class="col-md-6 col-lg-6 grid cs-style-4">
						<center><li>
							<figure>
								<div><img src="<?= Config::$path_public; ?>/images/bases.jpg" alt="img04"></div>
								<figcaption>
									<h3 style="font-size:14px;">Bases :<br> 100% / 0%</h3>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Quantité en stock : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix brut : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Prix avec réduction due au labos : </b><br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Temps de synthèse : 1h00</b></br></li>
									<li style="font-size:12px;" class="col-xs-12 pull-right"><b>Nombre de synthèse possible : </b><?= $nb_to_create[1000]; ?></li>
									<select name="1000">
										<?php
										$i = 0;
										while($i <= $nb_to_create[1000])
										{
											echo '<option value="'.$i.'">'.$i.'</option>'; 
											$i++;
										}
										?>
									</select>
																
								</figcaption>
							</figure>
						</li></center>
					</ul>
				<div  class="col-lg-12 form-group <?php echo (isset($_SESSION['error']))?'has-error':''; ?>">
					<?php echo (isset($_SESSION['error']))?'<label for="exampleInputPassword1">'.$_SESSION['error'].'</label>':''; ?>
				</div>
				<input type="submit" name="create_bases" value="Creer">	
				</div>					
			</form>
		</div>
	</div>
	<? unset($_SESSION['error']);