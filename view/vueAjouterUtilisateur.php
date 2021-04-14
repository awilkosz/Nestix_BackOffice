<div class="centrerBloc">
	<div class="form">
	<h1 class="titresPage">Ajouter un nouvel utilisateur</h1>
		<div>
			<form method="post" action="./?action=ajouterUtilisateur" id="formulaireAjout">
				<input type="hidden" name="token" value="<?php echo $token; ?>" />
				<div class="form-group">
				<label>Pseudo : <input type="text" id="pseudoUser" name="pseudoUser" class="form-control" required/></label>
				<br />
				<label>Email : <input type="text" id="emailUser" name="emailUser" class="form-control" onblur="filtreMail()" required/></label>
				<p id="erreurMail"></p>
				<br />
				<label>Status : 
					<select id="statusUser" name="statusUser" class="form-control"/>
						<option value="Autorisé" selected>Autorisé</option>
						<option value="Bloqué">Bloqué</option>
					</select>
				</label>
				<br />
				<label>Mot de passe : <input type="password" id="mdpUser" name="mdpUser" class="form-control" onblur="filtreMDP()" autocomplete="off" required/></label>
				<p id="erreurMDP"></p>
				<br />
				<label>Ville : 
					<select type="text" id="idVilleUser" name="villeUser" class="form-control"/>
						<?php
						foreach($lesVilles as $ville)
						{
							?>
							<option value='<?= $ville->city_id; ?>'><?= $ville->city_name; ?></option>
							<?php
						}
						?>
					</select>
				</label>
				<br />
				<input type="button" value="Valider" class="btn btn-primary" onclick="verifierFormulaire()" />
				</div>
			</form>
			<p><a href="./?action=listeUtilisateurs">Liste des utilisateurs</a></p>
		</div>
	</div>
</div>