<h1 class="titresPage">Propositions des utilisateurs</h1>

<table class="border border-dark rounded">
    <thead class="border border-dark">
        <tr class="border border-dark">
            <th class="border border-dark">Type</th>
            <th class="border border-dark">Titre</th>
            <th class="border border-dark">Action</th>
        </tr>
    </thead>
	<tbody class="border border-dark">
	<?php
	foreach($mediasProposes as $media)
	{
		?>
		<tr class="border border-dark">
			<td class="border border-dark"><?= $media->media_type; ?></td>
			<td class="border border-dark"><?= $media->media_title; ?></td>
			<td class="border border-dark"><a href="./?action=verifierMedia&id=<?= $media->media_id; ?>" class="btn btn-primary">Vérifier</a> <a href="./?action=supprimerMedia&id=<?= $media->media_id; ?>" class="btn btn-danger">Supprimer</a></td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>