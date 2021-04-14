<h1 class="titresPage">Liste des utilisateurs</h1>

<form action="./?action=listeUtilisateurs&todo=recherchePseudo&recherche=true" method="POST">
	<input type="hidden" name="token" value="<?php echo $token; ?>" />
	<label> Rechercher un pseudo :
	<input id = "rechercheUsersAll" type ="text" name = "pseudoRecherche" />
	</label>
	<button type="submit" class="btn btn-primary">Recherche</button>
</form>

<a href="./?action=ajouterUtilisateur" class="btn btn-primary mb-2">Nouvel utilisateur</a>

<table class="border border-dark rounded">
	<thead class="border border-dark">
		<tr class="border border-dark">
			<th class="border border-dark">Id</th>
			<th class="border border-dark">Pseudo</th>
			<th class="border border-dark">Email</th>
			<th class="border border-dark">Status</th>
			<th class="border border-dark">Date de création</th>
			<th class="border border-dark">Ville</th>
			<th class="border border-dark">Actions</th>
		</tr>
	</thead>
	<tbody class="border border-dark">
		<?php
		foreach($lesUtilisateurs as $utilisateur)
		{
			?>
			<tr class="border border-dark">
				<td class="border border-dark"><?php echo $utilisateur->human_id; ?></td>
				<td class="border border-dark"><?php echo $utilisateur->user_pseudo; ?></td>
				<td class="border border-dark"><?php echo $utilisateur->user_email; ?></td>
				<td class="border border-dark"><?php echo $utilisateur->user_status; ?></td>
				<td class="border border-dark"><?php echo $utilisateur->user_date_creat; ?></td>
				<td class="border border-dark"><?php echo GestionVilles::getVilleById($utilisateur->city_id); ?></td>
				<?php echo '<td><a href="./?action=modifierUtilisateur&id=' . $utilisateur->human_id . '" class="btn btn-primary">Modifier</a> <a href="./?action=supprimerUtilisateur&id=' . $utilisateur->human_id . '" class="btn btn-danger">Supprimer</a><a href="./?action=reinitialiserMDP&id=' . $utilisateur->human_id .'">Réinitialiser le mot de passe</a></td>'; ?>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<script src="<?= $racine; ?>/js/script.js"></script>