<div class="centrerBloc">
	<div class="form">
	<h1 class="titresPage">Ajouter un nouvel utilisateur</h1>
		<div>
			<form method="post" action="./?action=modifierUtilisateur">
				<input type="hidden" name="token" value="<?php echo $token; ?>" />

				<div class="form-group">
					<label>Pseudo : <input type="text" id="pseudoUser" name="pseudoUser" class="form-control" value="<?php echo $utilisateur->user_pseudo; ?>" required /></label>
					<br />
					<label>Email : <input type="text" id="emailUser" name="emailUser" class="form-control" value="<?php echo $utilisateur->user_email; ?>" required onblur="filtreMail()" /></label>
					<p id="erreurMail"></p>
					<br />
					<label>Status : 
						<select id="statusUser" name="statusUser" class="form-control">
							<option value="Autorisé" selected>Autorisé</option>
							<option value="Bloqué">Bloqué</option>
						</select>
					</label>
					<br />
					<label>Ville : 
						<select type="text" id="idVilleUser" name="villeUser" class="form-control">
							<?php
							foreach($lesVilles as $ville)
							{
								if($ville->city_id == $utilisateur->city_id)
								{
									?>
									<option value='<?= $ville->city_id; ?>' selected><?= $ville->city_name; ?></option>
									<?php
								}
								else
								{
									?>
									<option value='<?= $ville->city_id; ?>'><?= $ville->city_name; ?></option>
									<?php
								}
							}
							?>
						</select>
					</label>
					<br />
					<input type="submit" value="Valider" class="btn btn-primary" />
				</div>
			</form>

			<div>
				<h3>Médias proposés par l'utilisateur</h3>
				<?php
				foreach($mediasProposes as $unMedia)
				{
					?>
					<div>
						<?= $unMedia->media_title; ?>
					</div>
					<?php
				}
				?>
			</div>

			<p><a href="./?action=listeUtilisateurs">Liste des utilisateurs</a></p>
		</div>
	</div>
</div>