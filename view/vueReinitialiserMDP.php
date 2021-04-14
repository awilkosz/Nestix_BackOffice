<div class="centrerBloc">
	<div class="form">
		<h2 class="titresPage">Réinitialiser le mot de passe</h2>
		<div>
			<form method="POST" id="mdpResetForm">
				<input type="hidden" name="token" value="<?php echo $token; ?>" />
				
				<div class="form-group">
					<label for="newPassword">Entrez le nouveau mot de passe :
						<input type="password" id="newPassword" name="newPassword" onblur="filtreMDPForReset()" class="form-control" autocomplete="off" required />
					</label>
					<p id="erreurMDP2"></p>
					<br />
					
					<label for="confirmPassword">Confirmez le nouveau mot de passe :
						<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" autocomplete="off" required />
					</label>
					<br />
					
					<input type="button" value="Valider" onclick="validerResetPassword()" class="btn btn-primary" />
				</div>
		</form>
		</div>
	</div>
</div>