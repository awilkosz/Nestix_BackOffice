<h1 class="titresPage">Liste des médias</h1>

<ul class="nav">
    <li class="nav-item m-1"><a href="./?action=listeMedias&type=Film" class="nav-link btn btn-secondary">Films</a></li>
    <li class="nav-item m-1"><a href="./?action=listeMedias&type=Chanson" class="nav-link btn btn-secondary">Musiques</a></li>
    <li class="nav-item m-1"><a href="./?action=listeMedias&type=Livre" class="nav-link btn btn-secondary">Livre</a></li>
	<li class="nav-item m-1"><a href="./?action=listeMedias&type=Artiste" class="nav-link btn btn-secondary">Artiste</a></li>
</ul>

<?php
if($error)
{
	?>
	<p class="alert alert-warning" style="width: 80%;">Le des fichier est trop volumineux ! Veuillez en choisir un autre</p>
	<?php
}
?>

<table class="border border-dark rounded">
    <thead class="border border-dark">
        <tr class="border border-dark">
            <th class="border border-dark">Image</th>
            <th class="border border-dark">Titre</th>
            <th class="border border-dark">Action</th>
        </tr>
    </thead>
    <tbody class="border border-dark">
        <?php
		if($estUnMedia)
		{
			foreach($lesMedias as $unMedia)
			{
				?>
					<tr class="border border-dark">
						<?php
						if($unMedia->media_cover == NULL)
						{
							?>
							<td class="border border-dark"><img src="./img/pas-d-image.jpg" style="width: 100px; heigth: 100px;" /></td>
							<?php
						}
						else
						{
							?>
							<td class="border border-dark"><img src="<?= 'http://localhost/nestix/public/' . $unMedia->media_cover; ?>" style="width: 100px; heigth: 100px;" /></td>
							<?php
						}
						?>
						<td class="border border-dark"><?php echo $unMedia->media_title; ?></td>
						<td>   
							<form action="./?action=ajouterImage&id=<?= $unMedia->media_id; ?>" method="post" enctype="multipart/form-data">
								<input type="file" name="monfichier" required/><br />
								<input type="submit" value="Envoyer le fichier" class="btn btn-primary" />
							</form>
						</td>
					</tr>
				<?php
			}
		}
		else
		{
			foreach($lesArtistes as $unArtiste)
			{
				?>
					<tr class="border border-dark">
						<?php
						if($unArtiste->human_pic == NULL)
						{
							?>
							<td class="border border-dark"><img src="./img/pas-d-image.jpg" style="width: 100px; heigth: 100px;" /></td>
							<?php
						}
						else
						{
							?>
							<td class="border border-dark"><img src="<?= 'http://localhost/nestix/public/' . $unArtiste->human_pic; ?>" style="width: 100px; heigth: 100px;" /></td>
							<?php
						}
						?>
						<td class="border border-dark"><?php echo $unArtiste->artist_nickname; ?></td>
						<td>   
							<form action="./?action=ajouterImageArtiste&id=<?= $unArtiste->human_id; ?>" method="post" enctype="multipart/form-data">
								<input type="file" name="monfichier" required/><br />
								<input type="submit" value="Envoyer le fichier" class="btn btn-primary" />
							</form>
						</td>
					</tr>
				<?php
			}
		}
		?>
    </tbody>
</table>